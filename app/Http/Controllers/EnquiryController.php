<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'mobile' => ['required', 'string', 'max:25'],
            'requirement' => ['required', 'string', 'max:120'],
            'city' => ['nullable', 'string', 'max:120'],
            'message' => ['nullable', 'string', 'max:2000'],
        ]);

        Enquiry::create($validated);

        return redirect()->to(route('home').'#contact')->with('success', 'Thank you! Your enquiry has been submitted successfully.');
    }
}
