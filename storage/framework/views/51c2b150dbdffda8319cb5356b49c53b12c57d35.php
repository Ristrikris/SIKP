<?php $__env->startSection('konten'); ?>
<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
<section class="content-header">
    <h3><b>Selamat Datang,Mahasiswa</b></h3>
                    <?php if(auth()->user()->photo): ?>
                    <br><img src="<?php echo e(auth()->user()->photo); ?>" alt="photo" height="150" width="150" class="rounded-circle"><br><br>
                    <?php endif; ?>
                        <tbody>
                            <tr>
                                <td><h4> <?php echo e(auth()->user()->name); ?></h4> </td>
                            </tr>
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
<?php echo $__env->make('sikp.layout.masterMhs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\sikp__\resources\views/home.blade.php ENDPATH**/ ?>