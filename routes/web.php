<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PublicProductController;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\SolarEnquiryController;
use App\Http\Controllers\TestimonialController;
use App\Models\Product;
use App\Models\SolarService;

/*
|--------------------------------------------------------------------------
| Public Website
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/about', 'bhavik.about')->name('about');
Route::get('/services', function () {

    $managedServices = SolarService::query()
        ->where('is_active', true)
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'desc')
        ->get();

    return view('bhavik.services', compact('managedServices'));

})->name('services');
Route::get('/product', function () {

    $managedProducts = Product::query()
        ->where('is_active', true)
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'desc')
        ->get();

    return view('bhavik.products', compact('managedProducts'));

})->name('product');
Route::get('/projects', function () {

    $managedProjects = \App\Models\SolarProject::query()
        ->where('is_active', true)
        ->orderBy('sort_order', 'asc')
        ->get();

    return view('bhavik.projects', compact('managedProjects'));

})->name('projects');
Route::view('/contact', 'bhavik.contact')->name('contact');


/*
|--------------------------------------------------------------------------
| Public Product Catalogue
|--------------------------------------------------------------------------
|
| /all-products
| /product/black-bull
|
*/

Route::get(
    '/all-products',
    [PublicProductController::class, 'index']
)->name('catalog.index');


Route::get(
    '/product/{product}',
    [PublicProductController::class, 'show']
)->name('catalog.show');


/*
|--------------------------------------------------------------------------
| Enquiry
|--------------------------------------------------------------------------
*/

Route::post(
    '/enquiries',
    [EnquiryController::class, 'store']
)->name('enquiries.store');


/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::get(
        '/login',
        [AuthenticatedSessionController::class, 'create']
    )->name('login');


    Route::post(
        '/login',
        [AuthenticatedSessionController::class, 'store']
    )->name('login.store');


    Route::get(
        '/register',
        [RegisteredUserController::class, 'create']
    )->name('register');


    Route::post(
        '/register',
        [RegisteredUserController::class, 'store']
    )->name('register.store');

});


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/dashboard',
        [DashboardController::class, 'index']
    )->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | Admin Product Management
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/products',
        [ProductController::class, 'index']
    )->name('products.index');


    Route::get(
        '/products/create',
        [ProductController::class, 'create']
    )->name('products.create');


    Route::post(
        '/products',
        [ProductController::class, 'store']
    )->name('products.store');


    Route::get(
        '/products/{product}/edit',
        [ProductController::class, 'edit']
    )->name('products.edit');


    Route::put(
        '/products/{product}',
        [ProductController::class, 'update']
    )->name('products.update');


    Route::delete(
        '/products/{product}',
        [ProductController::class, 'destroy']
    )->name('products.destroy');


    Route::patch(
        '/products/{product}/toggle-status',
        [ProductController::class, 'toggleStatus']
    )->name('products.toggle-status');


    // Bhavik Solar CMS: Services and Projects
    Route::prefix('manage')->name('admin.')->group(function () {
        foreach (['services' => \App\Http\Controllers\AdminServiceController::class,
                  'projects' => \App\Http\Controllers\AdminProjectController::class] as $resource => $controller) {
            Route::get($resource, [$controller, 'index'])->name($resource.'.index');
            Route::get($resource.'/create', [$controller, 'create'])->name($resource.'.create');
            Route::post($resource, [$controller, 'store'])->name($resource.'.store');
            Route::get($resource.'/{item}/edit', [$controller, 'edit'])->name($resource.'.edit');
            Route::put($resource.'/{item}', [$controller, 'update'])->name($resource.'.update');
            Route::delete($resource.'/{item}', [$controller, 'destroy'])->name($resource.'.destroy');
        }
    });



    Route::patch(
        'testimonials/{testimonial}/toggle-status',
        [TestimonialController::class, 'toggleStatus']
    )->name('testimonials.toggle-status');

    Route::patch(
        'testimonials/{testimonial}/toggle-featured',
        [TestimonialController::class, 'toggleFeatured']
    )->name('testimonials.toggle-featured');

    Route::resource(
        'testimonials',
        TestimonialController::class
    );


    Route::post('/contact/enquiry', [SolarEnquiryController::class, 'store'])
    ->middleware('throttle:10,1')->name('contact.enquiry.store');

    Route::prefix('enquiries')->name('admin.enquiries.')->group(function () {
        Route::get('/', [SolarEnquiryController::class, 'index'])->name('index');
        Route::get('/export', [SolarEnquiryController::class, 'export'])->name('export');
        Route::get('/{enquiry}', [SolarEnquiryController::class, 'show'])->name('show');
        Route::put('/{enquiry}', [SolarEnquiryController::class, 'update'])->name('update');
        Route::delete('/{enquiry}', [SolarEnquiryController::class, 'destroy'])->name('destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Logout
    |--------------------------------------------------------------------------
    */

    Route::post(
        '/logout',
        [AuthenticatedSessionController::class, 'destroy']
    )->name('logout');


    

});



/*
|--------------------------------------------------------------------------
| Bhavik Solar - Public Detail Pages
|--------------------------------------------------------------------------
*/

Route::get(
    '/solar-product/{product}',
    [\App\Http\Controllers\SolarDetailController::class, 'product']
)->name('solar.product.show');

Route::get(
    '/service/{slug}',
    [\App\Http\Controllers\SolarDetailController::class, 'service']
)->name('solar.service.show');

Route::get(
    '/project/{slug}',
    [\App\Http\Controllers\SolarDetailController::class, 'project']
)->name('solar.project.show');


/*
|--------------------------------------------------------------------------
| Bhavik Solar - Admin Media Management
|--------------------------------------------------------------------------
*/

Route::middleware('auth')
    ->prefix('dashboard/manage/media')
    ->name('admin.media.')
    ->group(function () {

        Route::get(
            '/{type}/{id}',
            [\App\Http\Controllers\AdminMediaController::class, 'index']
        )->where('type', 'product|project')
         ->whereNumber('id')
         ->name('index');

        Route::post(
            '/{type}/{id}',
            [\App\Http\Controllers\AdminMediaController::class, 'store']
        )->where('type', 'product|project')
         ->whereNumber('id')
         ->name('store');

        Route::delete(
            '/{type}/{id}/{media}',
            [\App\Http\Controllers\AdminMediaController::class, 'destroy']
        )->where('type', 'product|project')
         ->whereNumber('id')
         ->name('destroy');

    });
