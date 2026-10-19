
<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SolarMedia;
use App\Models\SolarProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class AdminMediaController extends Controller
{
    private function resolveItem(
        string $type,
        int $id
    ): Product|SolarProject {

        return match ($type) {
            'product' => Product::findOrFail($id),
            'project' => SolarProject::findOrFail($id),
            default => abort(404),
        };
    }

    private function title(
        Product|SolarProject $item
    ): string {
        return $item instanceof Product
            ? $item->name
            : $item->title;
    }

    public function index(string $type, int $id)
    {
        $item = $this->resolveItem($type, $id);

        $images = SolarMedia::query()
            ->where('mediable_type', $item->getMorphClass())
            ->where('mediable_id', $item->id)
            ->where('type', 'image')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $videos = SolarMedia::query()
            ->where('mediable_type', $item->getMorphClass())
            ->where('mediable_id', $item->id)
            ->where('type', 'video')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.media.index', [
            'item' => $item,
            'type' => $type,
            'title' => $this->title($item),
            'images' => $images,
            'videos' => $videos,
        ]);
    }

    public function store(
        Request $request,
        string $type,
        int $id
    ) {
        $item = $this->resolveItem($type, $id);

        $request->validate([
            'images' => 'nullable|array|max:20',
            'images.*' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:10240',
            ],

            'videos' => 'nullable|array|max:10',
            'videos.*' => [
                'required',
                'file',
                'mimes:mp4,mov,webm',
                'max:51200',
            ],
        ]);

        if (
            !$request->hasFile('images') &&
            !$request->hasFile('videos')
        ) {
            throw ValidationException::withMessages([
                'media' => 'Please select images or videos.',
            ]);
        }

        $nextOrder = (int) SolarMedia::query()
            ->where('mediable_type', $item->getMorphClass())
            ->where('mediable_id', $item->id)
            ->max('sort_order') + 1;

        foreach ($request->file('images', []) as $image) {

            $path = $image->store(
                "solar/{$type}/{$item->id}/images",
                'public'
            );

            SolarMedia::create([
                'mediable_type' => $item->getMorphClass(),
                'mediable_id' => $item->id,
                'type' => 'image',
                'file_path' => $path,
                'original_name' => $image->getClientOriginalName(),
                'alt_text' => $this->title($item),
                'sort_order' => $nextOrder++,
            ]);
        }

        foreach ($request->file('videos', []) as $video) {

            $path = $video->store(
                "solar/{$type}/{$item->id}/videos",
                'public'
            );

            SolarMedia::create([
                'mediable_type' => $item->getMorphClass(),
                'mediable_id' => $item->id,
                'type' => 'video',
                'file_path' => $path,
                'original_name' => $video->getClientOriginalName(),
                'sort_order' => $nextOrder++,
            ]);
        }

        return redirect()
            ->route('admin.media.index', [
                'type' => $type,
                'id' => $id,
            ])
            ->with('success', 'Media uploaded successfully.');
    }

    public function destroy(
        string $type,
        int $id,
        SolarMedia $media
    ) {
        $item = $this->resolveItem($type, $id);

        abort_unless(
            $media->mediable_type === $item->getMorphClass()
            && (int) $media->mediable_id === (int) $item->id,
            404
        );

        Storage::disk('public')
            ->delete($media->file_path);

        $media->delete();

        return back()->with(
            'success',
            'Media deleted successfully.'
        );
    }
}
