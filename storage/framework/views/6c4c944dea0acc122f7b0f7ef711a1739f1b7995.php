<?php $__env->startSection('konten'); ?>
<div class="container mt-5 mb-5 d-flex justify-content-center">
    <div class="card rounded">
        <div class=" d-block justify-content-center">
            <div class="area1 "> </div>
            <div class="area2 p- text-center">
<section class="content-header">
    <h3><b>Selamat Datang, Mahasiswa</b></h3>
    <?php if(auth()->user()->photo): ?>
    <div class="image mr-3"> <img src="<?php echo e(auth()->user()->photo); ?>" alt="photo" height="150" width="150" class="rounded-circle">
    <?php endif; ?>
    <form method="post" action="#">
            <tbody>
                <tr>
                    <td><h4> <?php echo e(auth()->user()->name); ?></h4> </td>
                </tr>
                <?php $__currentLoopData = $nim; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nim_mhs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($nim_mhs->nim); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       <br>
    </div>
</div>
</div>
</section>
</div>
            </div>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('sikp.layout.mahasiswaLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\sikp_fix\resources\views/home.blade.php ENDPATH**/ ?>