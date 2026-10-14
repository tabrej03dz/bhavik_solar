<?php

namespace App\Http\Controllers;

use App\Models\SolarEnquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Throwable;

class SolarEnquiryController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'phone' => ['required', 'string', 'regex:/^[0-9+() \-]{10,20}$/'],
            'service' => ['required', Rule::in(SolarEnquiry::SERVICES)],
            'location' => ['required', 'string', 'max:180'],
            'email' => ['nullable', 'email', 'max:180'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        try {
            // The insert must succeed before a WhatsApp redirect is returned.
            $enquiry = SolarEnquiry::create($validated);
        } catch (Throwable $exception) {
            Log::error('Solar enquiry database insert failed', [
                'exception' => $exception->getMessage(),
            ]);

            return back()->withInput()->withErrors([
                'database' => 'Enquiry save nahi ho paayi. Please try again.',
            ]);
        }

        $message = implode("\n", [
            'New Solar Enquiry #' . $enquiry->id,
            'Name: ' . $enquiry->name,
            'Phone: ' . $enquiry->phone,
            'Service: ' . $enquiry->service,
            'Location: ' . $enquiry->location,
            'Email: ' . ($enquiry->email ?: 'Not provided'),
            'Requirement: ' . $enquiry->message,
        ]);

        return redirect()->away('https://wa.me/918093870837?text=' . rawurlencode($message));
    }

    // Admin routes MUST have auth + admin authorization middleware.
    private function filteredQuery(Request $request)
    {
        return SolarEnquiry::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $term = trim((string) $request->input('search'));
                $query->where(function ($q) use ($term) {
                    $q->where('name', 'like', "%{$term}%")
                        ->orWhere('phone', 'like', "%{$term}%")
                        ->orWhere('email', 'like', "%{$term}%")
                        ->orWhere('location', 'like', "%{$term}%")
                        ->orWhere('service', 'like', "%{$term}%");
                });
            })
            ->when($request->filled('status'), fn ($q) => $q->where('status', $request->input('status')))
            ->when($request->filled('from'), fn ($q) => $q->whereDate('created_at', '>=', $request->input('from')))
            ->when($request->filled('to'), fn ($q) => $q->whereDate('created_at', '<=', $request->input('to')));
    }

    private function validateFilters(Request $request): void
    {
        $request->validate([
            'search' => ['nullable', 'string', 'max:150'],
            'status' => ['nullable', Rule::in(SolarEnquiry::STATUSES)],
            'from' => ['nullable', 'date_format:Y-m-d'],
            'to' => ['nullable', 'date_format:Y-m-d', 'after_or_equal:from'],
        ]);
    }

    public function index(Request $request)
    {
        $this->validateFilters($request);
        $enquiries = $this->filteredQuery($request)->latest('id')->paginate(15)->withQueryString();
        $counts = SolarEnquiry::query()
            ->select('status', DB::raw('COUNT(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status');
        $total = $counts->sum();

        return view('admin.enquiries.index', compact('enquiries', 'counts', 'total'));
    }

    public function show(Request $request, SolarEnquiry $enquiry)
    {
        return view('admin.enquiries.show', compact('enquiry'));
    }

    public function update(Request $request, SolarEnquiry $enquiry)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'phone' => ['required', 'string', 'regex:/^[0-9+() \-]{10,20}$/'],
            'service' => ['required', Rule::in(SolarEnquiry::SERVICES)],
            'location' => ['required', 'string', 'max:180'],
            'email' => ['nullable', 'email', 'max:180'],
            'message' => ['required', 'string', 'max:5000'],
            'status' => ['required', Rule::in(SolarEnquiry::STATUSES)],
            'admin_notes' => ['nullable', 'string', 'max:10000'],
        ]);

        $enquiry->update($data);
        return redirect()->route('admin.enquiries.show', $enquiry)
            ->with('success', 'Enquiry updated.');
    }

    public function destroy(Request $request, SolarEnquiry $enquiry)
    {
        $enquiry->delete();
        return redirect()->route('admin.enquiries.index')
            ->with('success', 'Enquiry deleted.');
    }

    public function export(Request $request): StreamedResponse
    {
        $this->validateFilters($request);
        $query = $this->filteredQuery($request)->orderBy('id');

        return response()->streamDownload(function () use ($query) {
            $handle = fopen('php://output', 'w');
            fwrite($handle, "\xEF\xBB\xBF");
            fputcsv($handle, ['ID', 'Name', 'Phone', 'Service', 'Location', 'Email', 'Requirement', 'Status', 'Admin Notes', 'Created At']);

            foreach ($query->cursor() as $item) {
                $values = [
                    $item->id, $item->name, $item->phone, $item->service,
                    $item->location, $item->email, $item->message, $item->status,
                    $item->admin_notes, $item->created_at,
                ];
                $values = array_map(function ($value) {
                    $value = (string) ($value ?? '');
                    // Prevent CSV spreadsheet formula injection.
                    return preg_match('/^\s*[=+@\-]/u', $value) ? "'" . $value : $value;
                }, $values);
                fputcsv($handle, $values);
            }
            fclose($handle);
        }, 'solar-enquiries-' . now()->format('Y-m-d') . '.csv', [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }
}
