<?php $__env->startSection('konten'); ?>
    <section class="content-header">
    </section>
    <br> 
    <div class="row">
        <div class="col-md">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h7><b>Nama Dosen : </b></h7>
                    <?php echo e(auth()->user()->name); ?><br>
                    <h7><b>NIDN : </b></h7>
                    <?php $__currentLoopData = $nidn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nidnDosenLogin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($nidnDosenLogin->nidn); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><br><br>
                    <h5><b></b></h5>
                    <h4><b><center>Daftar Ujian Kerja Praktik</center></b></h4>
                    <table class="table table-bordered border-primary">
                        <thead class="table-primary">
                            <tr align="center">
                                <th style="width: 10px">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Jam</th>
                                <th scope="col">Ruangan</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Judul</th>
                            </tr>
                        </thead>
                        <?php
                            $no = 1;    
                        ?>
                        <tbody>
                            <?php $__currentLoopData = $nidn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nidnPenguji): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $dafPenguji; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $daftarPenguji): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($nidnPenguji->nidn == $daftarPenguji->nidn): ?>
                                        <tr>
                                            <td><?php echo e($no++); ?></td>
                                            <td><?php echo e($daftarPenguji->tglUjian); ?></td>
                                            <td><?php echo e($daftarPenguji->jamUjian); ?></td>
                                            <td><?php echo e($daftarPenguji->namaRuang); ?></td>
                                            <td><?php echo e($daftarPenguji->nim); ?></td>
                                            <td><?php echo e($daftarPenguji->judul); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('sikp.layout.dosenLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SIKP\sikp_fix\resources\views/sikp/Dosen/daftarUjianDosen.blade.php ENDPATH**/ ?>