


<?php $__env->startSection('title', 'Enquiries Management'); ?>
<?php $__env->startSection('page-title', 'Enquiries Management'); ?>

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-slate-50 py-10 px-4">
 <div class="mx-auto max-w-7xl">
  <div class="mb-7 flex flex-wrap items-end justify-between gap-3">
   <div><p class="text-sm font-bold text-emerald-700">ADMIN PANEL</p><h1 class="text-3xl font-black">Solar Enquiries</h1><p class="text-slate-500">Manage leads received through your contact form.</p></div>
   <a href="<?php echo e(route('admin.enquiries.export', request()->query())); ?>" class="rounded-xl bg-emerald-700 px-5 py-3 font-bold text-white">Export Filtered CSV</a>
  </div>
  <?php if(session('success')): ?><div class="mb-5 rounded-xl bg-green-100 p-4 text-green-800"><?php echo e(session('success')); ?></div><?php endif; ?>
  <div class="mb-6 grid grid-cols-2 gap-3 md:grid-cols-6">
   <div class="rounded-xl bg-white p-4 shadow-sm"><div class="text-sm text-slate-500">Total</div><div class="text-2xl font-black"><?php echo e($total); ?></div></div>
   <?php $__currentLoopData = \App\Models\SolarEnquiry::STATUSES; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <div class="rounded-xl bg-white p-4 shadow-sm"><div class="text-sm text-slate-500"><?php echo e(ucwords(str_replace('_',' ',$status))); ?></div><div class="text-2xl font-black"><?php echo e($counts[$status] ?? 0); ?></div></div>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
  <form method="GET" action="<?php echo e(route('admin.enquiries.index')); ?>" class="mb-6 grid gap-3 rounded-2xl bg-white p-5 shadow-sm md:grid-cols-5">
   <input class="rounded-xl border p-3" name="search" value="<?php echo e(request('search')); ?>" placeholder="Search name, mobile, city...">
   <select class="rounded-xl border p-3" name="status"><option value="">All statuses</option><?php $__currentLoopData = \App\Models\SolarEnquiry::STATUSES; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($status); ?>" <?php if(request('status') === $status): echo 'selected'; endif; ?>><?php echo e(ucwords(str_replace('_',' ',$status))); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select>
   <input class="rounded-xl border p-3" type="date" name="from" value="<?php echo e(request('from')); ?>">
   <input class="rounded-xl border p-3" type="date" name="to" value="<?php echo e(request('to')); ?>">
   <div class="flex gap-2"><button class="flex-1 rounded-xl bg-slate-900 px-4 py-2 font-bold text-white">Filter</button><a class="rounded-xl border px-4 py-3" href="<?php echo e(route('admin.enquiries.index')); ?>">Reset</a></div>
  </form>
  <div class="overflow-x-auto rounded-2xl bg-white shadow-sm"><table class="w-full min-w-[950px] text-left text-sm"><thead class="bg-emerald-950 text-white"><tr><th class="p-4">#</th><th class="p-4">Customer</th><th class="p-4">Service</th><th class="p-4">Location</th><th class="p-4">Status</th><th class="p-4">Date</th><th class="p-4">Action</th></tr></thead><tbody>
  <?php $__empty_1 = true; $__currentLoopData = $enquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><tr class="border-b hover:bg-slate-50"><td class="p-4"><?php echo e($enquiry->id); ?></td><td class="p-4"><div class="font-bold"><?php echo e($enquiry->name); ?></div><a href="tel:<?php echo e($enquiry->phone); ?>" class="text-emerald-700"><?php echo e($enquiry->phone); ?></a><div class="text-slate-500"><?php echo e($enquiry->email); ?></div></td><td class="p-4"><?php echo e($enquiry->service); ?></td><td class="p-4"><?php echo e($enquiry->location); ?></td><td class="p-4"><span class="rounded-full bg-emerald-100 px-3 py-1 font-bold text-emerald-900"><?php echo e(ucwords(str_replace('_',' ',$enquiry->status))); ?></span></td><td class="p-4"><?php echo e($enquiry->created_at->format('d M Y, h:i A')); ?></td><td class="p-4"><a href="<?php echo e(route('admin.enquiries.show',$enquiry)); ?>" class="font-bold text-emerald-700">View / Edit →</a></td></tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><tr><td colspan="7" class="p-8 text-center text-slate-500">No enquiries found.</td></tr><?php endif; ?>
  </tbody></table></div>
  <div class="mt-6"><?php echo e($enquiries->links()); ?></div>
 </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\work1\Bhavik_Solar_Complete_CMS_Laravel\resources\views/admin/enquiries/index.blade.php ENDPATH**/ ?>