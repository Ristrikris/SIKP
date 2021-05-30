<!-- Menghubungkan Ke View Master Template -->

<!-- isi bagian konten -->
<?php $__env->startSection('konten'); ?>
<section class="content-header">
    <h3><b>Identitas Mahasiswa</b></h3>
</section>
<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <?php if(auth()->user()->photo): ?>
                <br><img src="<?php echo e(auth()->user()->photo); ?>" alt="photo" height="150" width="150" class="rounded-circle"><br><br>
                <?php endif; ?>
                <table>
                    <tbody>
                        <tr>
                            <td><b>Nama : </b></td>
                            <td> <?php echo e(auth()->user()->name); ?> </td>
                        </tr>
                        <?php $__currentLoopData = $nim; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nim_mhs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><b>NIM : </b></td>
                            <td><?php echo e($nim_mhs->nim); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><b>E-Mail : </b></td>
                            <td> <?php echo e(auth()->user()->email); ?> </td>
                        </tr>
                    </tbody>
                </table><br>
            </div>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('sikp.layout.masterMhs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\sikp\resources\views/home.blade.php ENDPATH**/ ?>