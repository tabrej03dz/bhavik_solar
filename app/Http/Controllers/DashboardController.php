<?php
namespace App\Http\Controllers;
use App\Models\{Product,Enquiry,SolarService,SolarProject};
class DashboardController extends Controller {
    public function index() {
        return view('dashboard', [
            'totalProducts'=>Product::count(), 'activeProducts'=>Product::where('is_active',true)->count(),
            'totalServices'=>SolarService::count(), 'activeServices'=>SolarService::where('is_active',true)->count(),
            'totalProjects'=>SolarProject::count(), 'activeProjects'=>SolarProject::where('is_active',true)->count(),
            'totalEnquiries'=>Enquiry::count(), 'todayEnquiries'=>Enquiry::whereDate('created_at',today())->count(),
            'recentEnquiries'=>Enquiry::latest()->take(8)->get(),
            'recentProjects'=>SolarProject::latest()->take(5)->get(),
        ]);
    }
}
