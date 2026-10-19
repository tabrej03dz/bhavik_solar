<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SolarMedia;
use App\Models\SolarProject;
use App\Models\SolarService;
use Illuminate\View\View;

class SolarDetailController extends Controller
{
    public function product(Product $product): View
    {
        abort_unless($product->is_active, 404);

        $product->load('images');

        $media = $this->getMedia($product);

        $legacyImages = $product->images
            ->map(function ($image) {
                return [
                    'url' => \Illuminate\Support\Facades\Storage::disk('public')
                        ->url($image->image),
                    'alt' => $image->alt_text,
                ];
            })
            ->all();

        $related = Product::query()
            ->where('is_active', true)
            ->where('id', '!=', $product->id)
            ->orderByDesc('is_featured')
            ->limit(4)
            ->get();

        return view('bhavik.detail', [
            'item' => $product,
            'type' => 'product',
            'title' => $product->name,
            'media' => $media,
            'legacyImages' => $legacyImages,
            'related' => $related,
        ]);
    }

    public function service(string $slug): View
    {
        $service = SolarService::query()
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $related = SolarService::query()
            ->where('is_active', true)
            ->where('id', '!=', $service->id)
            ->orderBy('sort_order')
            ->limit(4)
            ->get();

        return view('bhavik.detail', [
            'item' => $service,
            'type' => 'service',
            'title' => $service->title,
            'media' => collect(),
            'legacyImages' => [],
            'related' => $related,
        ]);
    }

    public function project(string $slug): View
    {
        $project = SolarProject::query()
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $media = $this->getMedia($project);

        $related = SolarProject::query()
            ->where('is_active', true)
            ->where('id', '!=', $project->id)
            ->orderBy('sort_order')
            ->limit(4)
            ->get();

        return view('bhavik.detail', [
            'item' => $project,
            'type' => 'project',
            'title' => $project->title,
            'media' => $media,
            'legacyImages' => [],
            'related' => $related,
        ]);
    }

    private function getMedia($item)
    {
        return SolarMedia::query()
            ->where('mediable_type', $item->getMorphClass())
            ->where('mediable_id', $item->id)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();
    }
}
