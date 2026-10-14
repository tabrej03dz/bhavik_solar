<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    /**
     * List Testimonials
     */
    public function index(Request $request): View
    {
        $request->validate([
            'search' => ['nullable', 'string', 'max:200'],
            'status' => [
                'nullable',
                Rule::in(['active', 'inactive']),
            ],
            'featured' => [
                'nullable',
                Rule::in(['yes', 'no']),
            ],
        ]);

        $testimonials = Testimonial::query()

            ->when($request->filled('search'), function ($query) use ($request) {
                $search = trim($request->input('search'));

                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('company', 'like', "%{$search}%")
                        ->orWhere('location', 'like', "%{$search}%")
                        ->orWhere('review', 'like', "%{$search}%");
                });
            })

            ->when($request->filled('status'), function ($query) use ($request) {
                $query->where(
                    'is_active',
                    $request->input('status') === 'active'
                );
            })

            ->when($request->filled('featured'), function ($query) use ($request) {
                $query->where(
                    'is_featured',
                    $request->input('featured') === 'yes'
                );
            })

            ->orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->orderByDesc('id')

            ->paginate(15)
            ->withQueryString();

        return view(
            'admin.testimonials.index',
            compact('testimonials')
        );
    }

    /**
     * Add Testimonial Page
     */
    public function create(): View
    {
        return view('admin.testimonials.create');
    }

    /**
     * Save Testimonial
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate($this->rules());

        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active'] = $request->boolean('is_active');
        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['rating'] = $data['rating'] ?? 5;

        if ($request->hasFile('image')) {
            $data['image'] = $request
                ->file('image')
                ->store('testimonials', 'public');
        }

        Testimonial::create($data);

        return redirect()
            ->route('testimonials.index')
            ->with('success', 'Testimonial added successfully.');
    }

    /**
     * Show Details
     */
    public function show(Testimonial $testimonial): View
    {
        return view(
            'admin.testimonials.show',
            compact('testimonial')
        );
    }

    /**
     * Edit Testimonial Page
     */
    public function edit(Testimonial $testimonial): View
    {
        return view(
            'admin.testimonials.edit',
            compact('testimonial')
        );
    }

    /**
     * Update Testimonial
     */
    public function update(
        Request $request,
        Testimonial $testimonial
    ): RedirectResponse {

        $data = $request->validate($this->rules());

        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active'] = $request->boolean('is_active');
        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['rating'] = $data['rating'] ?? 5;

        $oldImage = $testimonial->image;

        if ($request->hasFile('image')) {
            $data['image'] = $request
                ->file('image')
                ->store('testimonials', 'public');
        }

        $testimonial->update($data);

        if ($request->hasFile('image') && $oldImage) {
            Storage::disk('public')->delete($oldImage);
        }

        return redirect()
            ->route('testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    /**
     * Delete Testimonial
     */
    public function destroy(
        Testimonial $testimonial
    ): RedirectResponse {

        $image = $testimonial->image;

        $testimonial->delete();

        if ($image) {
            Storage::disk('public')->delete($image);
        }

        return redirect()
            ->route('testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }

    /**
     * Active / Inactive
     */
    public function toggleStatus(
        Testimonial $testimonial
    ): RedirectResponse {

        $testimonial->update([
            'is_active' => ! $testimonial->is_active,
        ]);

        return back()
            ->with('success', 'Testimonial status updated.');
    }

    /**
     * Featured / Not Featured
     */
    public function toggleFeatured(
        Testimonial $testimonial
    ): RedirectResponse {

        $testimonial->update([
            'is_featured' => ! $testimonial->is_featured,
        ]);

        return back()
            ->with('success', 'Featured status updated.');
    }

    /**
     * Common Validation Rules
     */
    private function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'designation' => [
                'nullable',
                'string',
                'max:255',
            ],

            'company' => [
                'nullable',
                'string',
                'max:255',
            ],

            'location' => [
                'nullable',
                'string',
                'max:255',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'review' => [
                'required',
                'string',
                'max:5000',
            ],

            'rating' => [
                'required',
                'integer',
                'between:1,5',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
                'max:4294967295',
            ],

            'is_featured' => [
                'nullable',
                'boolean',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],
        ];
    }
}
