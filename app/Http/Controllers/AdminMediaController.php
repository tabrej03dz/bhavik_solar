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
    private function resolveItem(string $type, int $id): Product|SolarProject
    {
        return match ($type) {
            'product' => Product::findOrFail($id),
            'project' => SolarProject::findOrFail($id),
            default => abort(404),
        };
    }

    private function title(Product|SolarProject $item): string
    {
        return $item instanceof Product ? $item->name : $item->title;
    }

    public function index(string $type, int $id)
    {
        $item = $this->resolveItem($type, $id);

        $media = SolarMedia::query()
            ->where('mediable_type', $item->getMorphClass())
            ->where('mediable_id', $item->id)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.media.index', [
            'item' => $item,
            'type' => $type,
            'title' => $this->title($item),
            'mediaItems' => $media,
            'images' => $media->where('type', 'image'),
            'videos' => $media->where('type', 'video'),
        ]);
    }

    public function store(Request $request, string $type, int $id)
    {
        $item = $this->resolveItem($type, $id);

        $request->validate([
            'media' => ['required', 'array', 'min:1', 'max:30'],
            'media.*' => ['required', 'file', 'mimes:jpg,jpeg,png,webp,mp4,mov,webm', 'max:51200'],
        ]);

        $files = $request->file('media', []);
        $images = 0;
        $videos = 0;

        foreach ($files as $file) {
            $extension = strtolower($file->getClientOriginalExtension());
            // Check actual MIME, rather than trusting only the filename extension.
            $mime = strtolower((string) $file->getMimeType());
            $isImage = in_array($mime, ['image/jpeg', 'image/png', 'image/webp'], true);
            $isVideo = in_array($mime, ['video/mp4', 'video/quicktime', 'video/webm', 'application/octet-stream'], true)
                && in_array($extension, ['mp4', 'mov', 'webm'], true);

            if (!$isImage && !$isVideo) {
                throw ValidationException::withMessages([
                    'media' => 'Only JPG, PNG, WebP, MP4, MOV and WebM files are allowed.',
                ]);
            }

            if ($isImage) {
                $images++;
                if ($file->getSize() > 10 * 1024 * 1024) {
                    throw ValidationException::withMessages([
                        'media' => 'Each image must be 10 MB or smaller.',
                    ]);
                }
            } else {
                $videos++;
            }
        }

        if ($images > 20 || $videos > 10) {
            throw ValidationException::withMessages([
                'media' => 'Select a maximum of 20 images and 10 videos per upload.',
            ]);
        }

        $nextOrder = ((int) SolarMedia::query()
            ->where('mediable_type', $item->getMorphClass())
            ->where('mediable_id', $item->id)
            ->max('sort_order')) + 1;

        foreach ($files as $file) {
            $mime = strtolower((string) $file->getMimeType());
            $mediaType = in_array($mime, ['image/jpeg', 'image/png', 'image/webp'], true) ? 'image' : 'video';
            $directory = "solar/{$type}/{$item->id}/" . ($mediaType === 'image' ? 'images' : 'videos');
            $path = $file->store($directory, 'public');

            try {
                SolarMedia::create([
                    'mediable_type' => $item->getMorphClass(),
                    'mediable_id' => $item->id,
                    'type' => $mediaType,
                    'file_path' => $path,
                    'original_name' => $file->getClientOriginalName(),
                    'alt_text' => $mediaType === 'image' ? $this->title($item) : null,
                    'sort_order' => $nextOrder++,
                ]);
            } catch (\Throwable $exception) {
                Storage::disk('public')->delete($path);
                throw $exception;
            }
        }

        return redirect()->route('admin.media.index', [
            'type' => $type,
            'id' => $id,
        ])->with('success', count($files) . ' media file(s) uploaded successfully.');
    }

    public function destroy(string $type, int $id, SolarMedia $media)
    {
        $item = $this->resolveItem($type, $id);

        abort_unless(
            $media->mediable_type === $item->getMorphClass()
                && (int) $media->mediable_id === (int) $item->id,
            404
        );

        Storage::disk('public')->delete($media->file_path);
        $media->delete();

        return redirect()->route('admin.media.index', [
            'type' => $type,
            'id' => $id,
        ])->with('success', 'Media deleted successfully.');
    }
}
