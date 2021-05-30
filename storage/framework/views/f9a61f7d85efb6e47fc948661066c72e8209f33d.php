<?php $__env->startSection('konten'); ?>
<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
    <section class="content-header">
    <h3><b>Selamat Datang, Koordinator</b></h3>
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
<?php echo $__env->make('sikp.layout.masterKoor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\sikp_fix\resources\views/koorHome.blade.php ENDPATH**/ ?>