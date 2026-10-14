<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $query = Product::query();

        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */
        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%")
                    ->orWhere('short_description', 'like', "%{$search}%");
            });
        }

        /*
        |--------------------------------------------------------------------------
        | Status Filter
        |--------------------------------------------------------------------------
        */
        if ($request->status === 'active') {
            $query->where('is_active', true);
        }

        if ($request->status === 'inactive') {
            $query->where('is_active', false);
        }

        /*
        |--------------------------------------------------------------------------
        | Category Filter
        |--------------------------------------------------------------------------
        */
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $products = $query
            ->orderBy('sort_order')
            ->latest('id')
            ->paginate(15)
            ->withQueryString();

        $categories = Product::query()
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('products.index', compact(
            'products',
            'categories'
        ));
    }

    public function create(): View
    {
        $categories = Product::query()
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('products.create', compact('categories'));
    }

    // public function store(Request $request): RedirectResponse
    // {
    //     $validated = $request->validate([
    //         'name' => [
    //             'required',
    //             'string',
    //             'max:255',
    //         ],

    //         'category' => [
    //             'nullable',
    //             'string',
    //             'max:255',
    //         ],

    //         'short_description' => [
    //             'nullable',
    //             'string',
    //             'max:500',
    //         ],

    //         'description' => [
    //             'nullable',
    //             'string',
    //         ],

    //         'price' => [
    //             'nullable',
    //             'numeric',
    //             'min:0',
    //             'max:9999999999.99',
    //         ],

    //         'unit' => [
    //             'nullable',
    //             'string',
    //             'max:100',
    //         ],

    //         'stock' => [
    //             'nullable',
    //             'integer',
    //             'min:0',
    //         ],

    //         'sort_order' => [
    //             'nullable',
    //             'integer',
    //             'min:0',
    //         ],

    //         'image' => [
    //             'nullable',
    //             'image',
    //             'mimes:jpg,jpeg,png,webp',
    //             'max:5120',
    //         ],
    //     ]);

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Unique Slug
    //     |--------------------------------------------------------------------------
    //     */
    //     $validated['slug'] = $this->generateUniqueSlug(
    //         $validated['name']
    //     );

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Checkbox Values
    //     |--------------------------------------------------------------------------
    //     */
    //     $validated['is_active'] = $request->boolean('is_active');

    //     $validated['is_featured'] = $request->boolean(
    //         'is_featured'
    //     );

    //     $validated['stock'] = $validated['stock'] ?? 0;
    //     $validated['sort_order'] = $validated['sort_order'] ?? 0;

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Product Image
    //     |--------------------------------------------------------------------------
    //     */
    //     if ($request->hasFile('image')) {
    //         $validated['image'] = $request
    //             ->file('image')
    //             ->store('products', 'public');
    //     }

    //     Product::create($validated);

    //     return redirect()
    //         ->route('products.index')
    //         ->with('success', 'Product added successfully.');
    // }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'category' => [
                'nullable',
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

            'price' => [
                'nullable',
                'numeric',
                'min:0',
                'max:9999999999.99',
            ],

            'unit' => [
                'nullable',
                'string',
                'max:100',
            ],

            'stock' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],

            /*
            |--------------------------------------------------------------------------
            | Feature Image
            |--------------------------------------------------------------------------
            */
            'image' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            /*
            |--------------------------------------------------------------------------
            | Gallery Images
            |--------------------------------------------------------------------------
            */
            'gallery_images' => [
                'nullable',
                'array',
            ],

            'gallery_images.*' => [
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Unique Slug
        |--------------------------------------------------------------------------
        */
        $validated['slug'] = $this->generateUniqueSlug(
            $validated['name']
        );

        /*
        |--------------------------------------------------------------------------
        | Checkbox Values
        |--------------------------------------------------------------------------
        */
        $validated['is_active'] = $request->boolean('is_active');

        $validated['is_featured'] = $request->boolean(
            'is_featured'
        );

        /*
        |--------------------------------------------------------------------------
        | Default Values
        |--------------------------------------------------------------------------
        */
        $validated['stock'] = $validated['stock'] ?? 0;
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        /*
        |--------------------------------------------------------------------------
        | Remove Gallery Field Before Product Create
        |--------------------------------------------------------------------------
        */
        unset($validated['gallery_images']);

        /*
        |--------------------------------------------------------------------------
        | Store Feature Image
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('image')) {
            $validated['image'] = $request
                ->file('image')
                ->store('products/feature', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Create Product
        |--------------------------------------------------------------------------
        */
        $product = Product::create($validated);

        /*
        |--------------------------------------------------------------------------
        | Store Multiple Gallery Images
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('gallery_images')) {

            foreach (
                $request->file('gallery_images') as $index => $galleryImage
            ) {

                $path = $galleryImage->store(
                    'products/gallery',
                    'public'
                );

                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $path,
                    'alt_text' => $product->name,
                    'sort_order' => $index,
                ]);
            }
        }

        return redirect()
            ->route('products.index')
            ->with(
                'success',
                'Product added successfully.'
            );
    }

    public function edit(Product $product): View
    {
        $categories = Product::query()
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('products.edit', compact(
            'product',
            'categories'
        ));
    }

    // public function update(
    //     Request $request,
    //     Product $product
    // ): RedirectResponse {
    //     $validated = $request->validate([
    //         'name' => [
    //             'required',
    //             'string',
    //             'max:255',
    //         ],

    //         'category' => [
    //             'nullable',
    //             'string',
    //             'max:255',
    //         ],

    //         'short_description' => [
    //             'nullable',
    //             'string',
    //             'max:500',
    //         ],

    //         'description' => [
    //             'nullable',
    //             'string',
    //         ],

    //         'price' => [
    //             'nullable',
    //             'numeric',
    //             'min:0',
    //             'max:9999999999.99',
    //         ],

    //         'unit' => [
    //             'nullable',
    //             'string',
    //             'max:100',
    //         ],

    //         'stock' => [
    //             'nullable',
    //             'integer',
    //             'min:0',
    //         ],

    //         'sort_order' => [
    //             'nullable',
    //             'integer',
    //             'min:0',
    //         ],

    //         'image' => [
    //             'nullable',
    //             'image',
    //             'mimes:jpg,jpeg,png,webp',
    //             'max:5120',
    //         ],
    //     ]);

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Change Slug Only When Name Changes
    //     |--------------------------------------------------------------------------
    //     */
    //     if ($product->name !== $validated['name']) {
    //         $validated['slug'] = $this->generateUniqueSlug(
    //             $validated['name'],
    //             $product->id
    //         );
    //     }

    //     $validated['is_active'] = $request->boolean('is_active');

    //     $validated['is_featured'] = $request->boolean(
    //         'is_featured'
    //     );

    //     $validated['stock'] = $validated['stock'] ?? 0;
    //     $validated['sort_order'] = $validated['sort_order'] ?? 0;

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Replace Image
    //     |--------------------------------------------------------------------------
    //     */
    //     if ($request->hasFile('image')) {

    //         if (
    //             $product->image &&
    //             Storage::disk('public')->exists($product->image)
    //         ) {
    //             Storage::disk('public')->delete($product->image);
    //         }

    //         $validated['image'] = $request
    //             ->file('image')
    //             ->store('products', 'public');
    //     }

    //     $product->update($validated);

    //     return redirect()
    //         ->route('products.index')
    //         ->with('success', 'Product updated successfully.');
    // }


    public function update(
        Request $request,
        Product $product
    ): RedirectResponse {

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'category' => [
                'nullable',
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

            'price' => [
                'nullable',
                'numeric',
                'min:0',
                'max:9999999999.99',
            ],

            'unit' => [
                'nullable',
                'string',
                'max:100',
            ],

            'stock' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],

            /*
            |--------------------------------------------------------------------------
            | New Feature Image
            |--------------------------------------------------------------------------
            */
            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            /*
            |--------------------------------------------------------------------------
            | New Gallery Images
            |--------------------------------------------------------------------------
            */
            'gallery_images' => [
                'nullable',
                'array',
            ],

            'gallery_images.*' => [
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            /*
            |--------------------------------------------------------------------------
            | Existing Gallery Images To Delete
            |--------------------------------------------------------------------------
            */
            'remove_gallery_images' => [
                'nullable',
                'array',
            ],

            'remove_gallery_images.*' => [
                'integer',
                'exists:product_images,id',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Update Slug When Product Name Changes
        |--------------------------------------------------------------------------
        */
        if ($product->name !== $validated['name']) {

            $validated['slug'] = $this->generateUniqueSlug(
                $validated['name'],
                $product->id
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Checkbox Values
        |--------------------------------------------------------------------------
        */
        $validated['is_active'] = $request->boolean(
            'is_active'
        );

        $validated['is_featured'] = $request->boolean(
            'is_featured'
        );

        /*
        |--------------------------------------------------------------------------
        | Defaults
        |--------------------------------------------------------------------------
        */
        $validated['stock'] = $validated['stock'] ?? 0;
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        /*
        |--------------------------------------------------------------------------
        | Remove Non Product Columns
        |--------------------------------------------------------------------------
        */
        unset(
            $validated['gallery_images'],
            $validated['remove_gallery_images']
        );

        /*
        |--------------------------------------------------------------------------
        | Replace Feature Image
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('image')) {

            if (
                $product->image &&
                Storage::disk('public')->exists($product->image)
            ) {
                Storage::disk('public')->delete(
                    $product->image
                );
            }

            $validated['image'] = $request
                ->file('image')
                ->store(
                    'products/feature',
                    'public'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | Update Product
        |--------------------------------------------------------------------------
        */
        $product->update($validated);

        /*
        |--------------------------------------------------------------------------
        | Remove Selected Gallery Images
        |--------------------------------------------------------------------------
        */
        if ($request->filled('remove_gallery_images')) {

            $galleryImagesToDelete = ProductImage::query()
                ->where('product_id', $product->id)
                ->whereIn(
                    'id',
                    $request->input(
                        'remove_gallery_images',
                        []
                    )
                )
                ->get();

            foreach ($galleryImagesToDelete as $galleryImage) {

                if (
                    $galleryImage->image &&
                    Storage::disk('public')
                        ->exists($galleryImage->image)
                ) {
                    Storage::disk('public')
                        ->delete($galleryImage->image);
                }

                $galleryImage->delete();
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Find Next Gallery Sort Order
        |--------------------------------------------------------------------------
        */
        $nextSortOrder = ProductImage::query()
            ->where('product_id', $product->id)
            ->max('sort_order');

        $nextSortOrder = $nextSortOrder === null
            ? 0
            : $nextSortOrder + 1;

        /*
        |--------------------------------------------------------------------------
        | Add New Gallery Images
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('gallery_images')) {

            foreach (
                $request->file('gallery_images') as $galleryImage
            ) {

                $path = $galleryImage->store(
                    'products/gallery',
                    'public'
                );

                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $path,
                    'alt_text' => $product->name,
                    'sort_order' => $nextSortOrder,
                ]);

                $nextSortOrder++;
            }
        }

        return redirect()
            ->route('products.index')
            ->with(
                'success',
                'Product updated successfully.'
            );
    }

    public function destroy(Product $product): RedirectResponse
    {
        if (
            $product->image &&
            Storage::disk('public')->exists($product->image)
        ) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }

    public function toggleStatus(Product $product): RedirectResponse
    {
        $product->update([
            'is_active' => !$product->is_active,
        ]);

        return back()->with(
            'success',
            $product->is_active
                ? 'Product activated successfully.'
                : 'Product deactivated successfully.'
        );
    }

    private function generateUniqueSlug(
        string $name,
        ?int $ignoreId = null
    ): string {
        $baseSlug = Str::slug($name);

        if ($baseSlug === '') {
            $baseSlug = 'product';
        }

        $slug = $baseSlug;
        $counter = 1;

        while (
            Product::where('slug', $slug)
                ->when(
                    $ignoreId,
                    fn ($query) =>
                    $query->where('id', '!=', $ignoreId)
                )
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}