<?php $__env->startSection('konten'); ?>
<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
<section class="content-header">
    <h3><b>Selamat Datang, Mahasiswa</b></h3>
        <tr>
            <td><h4> <?php echo e(auth()->user()->name); ?></h4> </td>
        </tr>
                        <?php if(auth()->user()->photo): ?>
                    <br><img src="<?php echo e(auth()->user()->photo); ?>" alt="photo" height="150" width="150" class="rounded"><br><br>
                    <?php endif; ?>
                        <tbody>
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
<?php echo $__env->make('sikp.layout.mahasiswaLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SIKP\web\resources\views/home.blade.php ENDPATH**/ ?>