@extends('layouts.website')
@section('title', 'Enquiry #'.$enquiry->id)
@section('content')
<div class="min-h-screen bg-slate-50 px-4 py-10"><div class="mx-auto max-w-4xl">
 <a href="{{ route('admin.enquiries.index') }}" class="font-bold text-emerald-700">← Back to all enquiries</a>
 <h1 class="my-5 text-3xl font-black">Manage Enquiry #{{ $enquiry->id }}</h1>
 @if(session('success'))<div class="mb-5 rounded-xl bg-green-100 p-4 text-green-800">{{ session('success') }}</div>@endif
 @if($errors->any())<div class="mb-5 rounded-xl bg-red-100 p-4 text-red-800">@foreach($errors->all() as $error)<p>{{ $error }}</p>@endforeach</div>@endif
 <div class="mb-5 flex flex-wrap gap-3"><a href="tel:{{ $enquiry->phone }}" class="rounded-xl bg-slate-800 px-5 py-3 font-bold text-white">Call Customer</a><a href="https://wa.me/{{ preg_replace('/\D+/', '', $enquiry->phone) }}" target="_blank" rel="noopener noreferrer" class="rounded-xl bg-green-700 px-5 py-3 font-bold text-white">WhatsApp Customer</a></div>
 <form method="POST" action="{{ route('admin.enquiries.update', $enquiry) }}" class="space-y-5 rounded-2xl bg-white p-6 shadow-sm md:p-9">@csrf @method('PUT')
 <div class="grid gap-5 md:grid-cols-2">
 @foreach(['name'=>'Customer Name','phone'=>'Phone Number','location'=>'Location','email'=>'Email'] as $field=>$label)
 <label class="block font-bold">{{ $label }}<input name="{{ $field }}" value="{{ old($field, $enquiry->{$field}) }}" @if($field!=='email') required @endif class="mt-2 w-full rounded-xl border p-3"></label>
 @endforeach
 <label class="block font-bold">Service<select required name="service" class="mt-2 w-full rounded-xl border p-3">@foreach(\App\Models\SolarEnquiry::SERVICES as $service)<option value="{{ $service }}" @selected(old('service',$enquiry->service)===$service)>{{ $service }}</option>@endforeach</select></label>
 <label class="block font-bold">Status<select required name="status" class="mt-2 w-full rounded-xl border p-3">@foreach(\App\Models\SolarEnquiry::STATUSES as $status)<option value="{{ $status }}" @selected(old('status',$enquiry->status)===$status)>{{ ucwords(str_replace('_',' ',$status)) }}</option>@endforeach</select></label>
 </div>
 <label class="block font-bold">Customer Requirement<textarea name="message" required rows="5" class="mt-2 w-full rounded-xl border p-3">{{ old('message',$enquiry->message) }}</textarea></label>
 <label class="block font-bold">Internal Admin Notes<textarea name="admin_notes" rows="5" class="mt-2 w-full rounded-xl border p-3" placeholder="Follow-up date, quotation, call discussion...">{{ old('admin_notes',$enquiry->admin_notes) }}</textarea></label>
 <p class="text-sm text-slate-500">Received: {{ $enquiry->created_at->format('d M Y, h:i A') }}</p>
 <button class="rounded-xl bg-emerald-700 px-8 py-3 font-bold text-white">Save Changes</button>
 </form>
 <form method="POST" class="mt-6" action="{{ route('admin.enquiries.destroy', $enquiry) }}" onsubmit="return confirm('Delete this enquiry permanently?')">@csrf @method('DELETE')<button class="rounded-xl border border-red-300 px-5 py-3 font-bold text-red-700">Delete Enquiry</button></form>
</div></div>
@endsection
