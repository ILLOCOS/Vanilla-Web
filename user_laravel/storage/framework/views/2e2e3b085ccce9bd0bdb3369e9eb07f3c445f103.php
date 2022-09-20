
<?php $__env->startSection('content'); ?>
<div class="card mt-5" style="background-color:blanchedalmond;">
  <h2 class="pt-2 pb-2 mx-3">Create an account</h2>
  <div class="card-header">Please fill out the form below with the necessary information.</div>
  <div class="card-body">
      
      <form action="<?php echo e(url('employee')); ?>" method="post" enctype="multipart/form-data" ">
        <?php echo csrf_field(); ?>

        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" required></br>
        <label>Address</label></br>
        <input type="text" name="address" id="address" class="form-control" placeholder="Enter your address" required></br>
        <label>Mobile Number</label></br>
        <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter your mobile number" required></br>
        <label>Mobile Number</label></br>
        <input class="form-control" name="photo" type="file" id="photo">
        <input type="submit" value="Register" class="btn btn-primary mt-5" style="display: block; margin: auto;"></br>
    </form>
  
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('employee.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\user_laravel\resources\views/employee/index.blade.php ENDPATH**/ ?>