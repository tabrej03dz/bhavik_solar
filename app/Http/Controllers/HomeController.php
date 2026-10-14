<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SolarProject;
use App\Models\SolarService;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(Request $request): View
    {
        /*
        |--------------------------------------------------------------------------
        | Home Page Products
        |--------------------------------------------------------------------------
        */

        $products = Product::query()
            ->where('is_active', true)
            ->orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->limit(8)
            ->get();

        $totalProducts = Product::query()
            ->where('is_active', true)
            ->count();

        /*
        |--------------------------------------------------------------------------
        | Home Page Services
        |--------------------------------------------------------------------------
        */

        $services = SolarService::query()
            ->where('is_active', true)
            ->orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->limit(6)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Home Page Projects
        |--------------------------------------------------------------------------
        */

        $projects = SolarProject::query()
            ->where('is_active', true)
            ->orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->limit(4)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Customer Testimonials
        |--------------------------------------------------------------------------
        */

        $testimonials = Testimonial::query()
            ->where('is_active', true)
            ->orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Selected Product for Enquiry
        |--------------------------------------------------------------------------
        */

        $selectedProduct = $request->filled('product')
            ? trim((string) $request->query('product'))
            : null;

        return view('bhavik.index', compact(
            'products',
            'totalProducts',
            'services',
            'projects',
            'testimonials',
            'selectedProduct'
        ));
    }
}
