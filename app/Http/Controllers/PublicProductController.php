<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicProductController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | All Products Page
    |--------------------------------------------------------------------------
    */

    public function index(Request $request): View
    {
        $query = Product::query()
            ->where('is_active', true);

        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search = trim($request->search);

            $query->where(function ($q) use ($search) {

                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('category', 'like', '%' . $search . '%')
                    ->orWhere('short_description', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');

            });
        }

        /*
        |--------------------------------------------------------------------------
        | Category Filter
        |--------------------------------------------------------------------------
        */

        if ($request->filled('category')) {

            $query->where(
                'category',
                $request->category
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Products With Pagination
        |--------------------------------------------------------------------------
        |
        | 12 products per page.
        |
        */

        $products = $query
            ->orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->paginate(12)
            ->withQueryString();

        /*
        |--------------------------------------------------------------------------
        | Categories
        |--------------------------------------------------------------------------
        */

        $categories = Product::query()
            ->where('is_active', true)
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view(
            'public-products.index',
            compact(
                'products',
                'categories'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Product Detail Page
    |--------------------------------------------------------------------------
    */

    public function show(Product $product): View
    {
        /*
        |--------------------------------------------------------------------------
        | Only Active Products Publicly Visible
        |--------------------------------------------------------------------------
        */


        abort_unless(
            $product->is_active,
            404
        );
        $product->load('images');

        /*
        |--------------------------------------------------------------------------
        | Related Products
        |--------------------------------------------------------------------------
        */

        $relatedProducts = Product::query()
            ->where('is_active', true)
            ->where('id', '!=', $product->id)
            ->when(
                $product->category,
                function ($query) use ($product) {

                    $query->where(
                        'category',
                        $product->category
                    );

                }
            )
            ->orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->limit(4)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Fallback Related Products
        |--------------------------------------------------------------------------
        |
        | Agar same category me products nahi hain.
        |
        */

        if ($relatedProducts->isEmpty()) {

            $relatedProducts = Product::query()
                ->where('is_active', true)
                ->where('id', '!=', $product->id)
                ->orderByDesc('is_featured')
                ->orderBy('sort_order')
                ->limit(4)
                ->get();
        }

        return view(
            'public-products.show',
            compact(
                'product',
                'relatedProducts'
            )
        );
    }
}