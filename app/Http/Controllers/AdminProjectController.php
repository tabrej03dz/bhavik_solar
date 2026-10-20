<?php

namespace App\Http\Controllers;

use App\Models\SolarProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = SolarProject::query();

        if ($request->filled('search')) {
            $query->where(
                'title',
                'like',
                '%' . trim($request->search) . '%'
            );
        }

        $items = $query
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->paginate(15)
            ->withQueryString();

        return view('admin.solar.index', [
            'items' => $items,
            'type' => 'projects',
        ]);
    }

    public function create()
    {
        return view('admin.solar.form', [
            'item' => new SolarProject(),
            'type' => 'projects',
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        $data['slug'] = $this->uniqueSlug(
            $data['title']
        );

        $newPaths = [];

        try {
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')
                    ->store('solar/projects', 'public');

                $newPaths[] = $data['image'];
            }

            $project = DB::transaction(function () use (
                $request,
                $data,
                &$newPaths
            ) {
                $project = SolarProject::create($data);

                $this->uploadMedia(
                    $request,
                    $project,
                    $newPaths
                );

                return $project;
            });
        } catch (\Throwable $exception) {
            Storage::disk('public')->delete($newPaths);

            throw $exception;
        }

        return redirect()
            ->route('admin.projects.edit', $project->id)
            ->with(
                'success',
                'Project created successfully. All selected media has been uploaded.'
            );
    }

    public function edit(SolarProject $item)
    {
        $item->load('media');

        return view('admin.solar.form', [
            'item' => $item,
            'type' => 'projects',
        ]);
    }

    public function update(
        Request $request,
        SolarProject $item
    ) {
        $data = $this->validated($request);

        $oldPaths = [];
        $newPaths = [];

        if ($item->title !== $data['title']) {
            $data['slug'] = $this->uniqueSlug(
                $data['title'],
                $item->id
            );
        }

        try {
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')
                    ->store('solar/projects', 'public');

                $newPaths[] = $data['image'];

                if ($item->image) {
                    $oldPaths[] = $item->image;
                }
            } elseif ($request->boolean('remove_image')) {
                if ($item->image) {
                    $oldPaths[] = $item->image;
                }

                $data['image'] = null;
            }

            DB::transaction(function () use (
                $request,
                $item,
                $data,
                &$newPaths,
                &$oldPaths
            ) {
                $item->update($data);

                $this->deleteSelectedMedia(
                    $request,
                    $item,
                    $oldPaths
                );

                $this->uploadMedia(
                    $request,
                    $item,
                    $newPaths
                );
            });
        } catch (\Throwable $exception) {
            Storage::disk('public')->delete($newPaths);

            throw $exception;
        }

        // Delete old files only after database changes succeed.
        Storage::disk('public')->delete(
            array_unique($oldPaths)
        );

        return redirect()
            ->route('admin.projects.edit', $item->id)
            ->with(
                'success',
                'Project details, images and videos updated successfully.'
            );
    }

    public function destroy(SolarProject $item)
    {
        $paths = [];

        if ($item->image) {
            $paths[] = $item->image;
        }

        foreach ($item->media as $media) {
            $paths[] = $media->file_path;
        }

        DB::transaction(function () use ($item) {
            $item->media()->delete();
            $item->delete();
        });

        Storage::disk('public')->delete(
            array_unique($paths)
        );

        return redirect()
            ->route('admin.projects.index')
            ->with(
                'success',
                'Project and all its media deleted successfully.'
            );
    }

    private function validated(Request $request): array
    {
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'short_description' => [
                'nullable',
                'string',
                'max:500',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'location' => [
                'nullable',
                'string',
                'max:255',
            ],

            'capacity' => [
                'nullable',
                'string',
                'max:255',
            ],

            'completed_at' => [
                'nullable',
                'date',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            'remove_image' => [
                'nullable',
                'boolean',
            ],

            'images' => [
                'nullable',
                'array',
                'max:20',
            ],

            'images.*' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:10240',
            ],

            'videos' => [
                'nullable',
                'array',
                'max:10',
            ],

            'videos.*' => [
                'required',
                'file',
                'mimes:mp4,mov,webm',
                'max:51200',
            ],

            'delete_media' => [
                'nullable',
                'array',
            ],

            'delete_media.*' => [
                'required',
                'integer',
                'distinct',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Remove non-column fields
        |--------------------------------------------------------------------------
        */

        unset(
            $validated['image'],
            $validated['images'],
            $validated['videos'],
            $validated['delete_media'],
            $validated['remove_image']
        );

        $validated['is_active'] = $request->boolean('is_active');
        $validated['is_featured'] = $request->boolean('is_featured');

        $validated['sort_order'] =
            $validated['sort_order'] ?? 0;

        return $validated;
    }

    private function uploadMedia(
        Request $request,
        SolarProject $project,
        array &$newPaths
    ): void {
        $nextOrder = (int) $project->media()
            ->max('sort_order') + 1;

        foreach ($request->file('images', []) as $image) {
            $path = $image->store(
                'solar/projects/' . $project->id . '/images',
                'public'
            );

            $newPaths[] = $path;

            $project->media()->create([
                'type' => 'image',
                'file_path' => $path,
                'original_name' => $image->getClientOriginalName(),
                'alt_text' => $project->title,
                'sort_order' => $nextOrder++,
            ]);
        }

        foreach ($request->file('videos', []) as $video) {
            $path = $video->store(
                'solar/projects/' . $project->id . '/videos',
                'public'
            );

            $newPaths[] = $path;

            $project->media()->create([
                'type' => 'video',
                'file_path' => $path,
                'original_name' => $video->getClientOriginalName(),
                'sort_order' => $nextOrder++,
            ]);
        }
    }

    private function deleteSelectedMedia(
        Request $request,
        SolarProject $project,
        array &$oldPaths
    ): void {
        $ids = $request->input('delete_media', []);

        if (empty($ids)) {
            return;
        }

        $mediaItems = $project->media()
            ->whereIn('id', $ids)
            ->get();

        foreach ($mediaItems as $media) {
            $oldPaths[] = $media->file_path;
            $media->delete();
        }
    }

    private function uniqueSlug(
        string $title,
        ?int $exceptId = null
    ): string {
        $base = Str::slug($title) ?: 'solar-project';

        $slug = $base;
        $counter = 2;

        while (
            SolarProject::query()
                ->where('slug', $slug)
                ->when(
                    $exceptId !== null,
                    fn ($q) => $q->where('id', '!=', $exceptId)
                )
                ->exists()
        ) {
            $slug = $base . '-' . $counter++;
        }

        return $slug;
    }
}
