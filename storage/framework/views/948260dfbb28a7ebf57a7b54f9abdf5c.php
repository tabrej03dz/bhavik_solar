

<?php $__env->startSection('title', 'Enquiries Management'); ?>
<?php $__env->startSection('page-title', 'Enquiries Management'); ?>
<?php $__env->startSection('title', 'Enquiry #'.$enquiry->id); ?>
<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-slate-50 px-4 py-10"><div class="mx-auto max-w-4xl">
 <a href="<?php echo e(route('admin.enquiries.index')); ?>" class="font-bold text-emerald-700">← Back to all enquiries</a>
 <h1 class="my-5 text-3xl font-black">Manage Enquiry #<?php echo e($enquiry->id); ?></h1>
 <?php if(session('success')): ?><div class="mb-5 rounded-xl bg-green-100 p-4 text-green-800"><?php echo e(session('success')); ?></div><?php endif; ?>
 <?php if($errors->any()): ?><div class="mb-5 rounded-xl bg-red-100 p-4 text-red-800"><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><p><?php echo e($error); ?></p><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></div><?php endif; ?>
 <div class="mb-5 flex flex-wrap gap-3"><a href="tel:<?php echo e($enquiry->phone); ?>" class="rounded-xl bg-slate-800 px-5 py-3 font-bold text-white">Call Customer</a><a href="https://wa.me/<?php echo e(preg_replace('/\D+/', '', $enquiry->phone)); ?>" target="_blank" rel="noopener noreferrer" class="rounded-xl bg-green-700 px-5 py-3 font-bold text-white">WhatsApp Customer</a></div>
 <form method="POST" action="<?php echo e(route('admin.enquiries.update', $enquiry)); ?>" class="space-y-5 rounded-2xl bg-white p-6 shadow-sm md:p-9"><?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
 <div class="grid gap-5 md:grid-cols-2">
 <?php $__currentLoopData = ['name'=>'Customer Name','phone'=>'Phone Number','location'=>'Location','email'=>'Email']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field=>$label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <label class="block font-bold"><?php echo e($label); ?><input name="<?php echo e($field); ?>" value="<?php echo e(old($field, $enquiry->{$field})); ?>" <?php if($field!=='email'): ?> required <?php endif; ?> class="mt-2 w-full rounded-xl border p-3"></label>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <label class="block font-bold">Service<select required name="service" class="mt-2 w-full rounded-xl border p-3"><?php $__currentLoopData = \App\Models\SolarEnquiry::SERVICES; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($service); ?>" <?php if(old('service',$enquiry->service)===$service): echo 'selected'; endif; ?>><?php echo e($service); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></label>
 <label class="block font-bold">Status<select required name="status" class="mt-2 w-full rounded-xl border p-3"><?php $__currentLoopData = \App\Models\SolarEnquiry::STATUSES; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($status); ?>" <?php if(old('status',$enquiry->status)===$status): echo 'selected'; endif; ?>><?php echo e(ucwords(str_replace('_',' ',$status))); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></label>
 </div>
 <label class="block font-bold">Customer Requirement<textarea name="message" required rows="5" class="mt-2 w-full rounded-xl border p-3"><?php echo e(old('message',$enquiry->message)); ?></textarea></label>
 <label class="block font-bold">Internal Admin Notes<textarea name="admin_notes" rows="5" class="mt-2 w-full rounded-xl border p-3" placeholder="Follow-up date, quotation, call discussion..."><?php echo e(old('admin_notes',$enquiry->admin_notes)); ?></textarea></label>
 <p class="text-sm text-slate-500">Received: <?php echo e($enquiry->created_at->format('d M Y, h:i A')); ?></p>
 <button class="rounded-xl bg-emerald-700 px-8 py-3 font-bold text-white">Save Changes</button>
 </form>
 <form method="POST" class="mt-6" action="<?php echo e(route('admin.enquiries.destroy', $enquiry)); ?>" onsubmit="return confirm('Delete this enquiry permanently?')"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button class="rounded-xl border border-red-300 px-5 py-3 font-bold text-red-700">Delete Enquiry</button></form>
</div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\work1\Bhavik_Solar_Complete_CMS_Laravel\resources\views/admin/enquiries/show.blade.php ENDPATH**/ ?>