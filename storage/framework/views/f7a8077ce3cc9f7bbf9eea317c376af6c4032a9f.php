<?php $__env->startSection('konten'); ?>
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
    <section class="content-header">
    <div class="col-md-12 mt-5">
            <div class="card-header bg-primary text-white">
        <h4><b><center>Daftar Ujian Kerja Praktik</center></b></h4>
    </section>
    <br> 
                    <table class="table  table-bordered border-primary">
                        <thead class="table-primary">
                            <tr align="center">
                                <th style="width: 10px">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Jam</th>
                                <th scope="col">Ruangan</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Lembaga</th>
                                <th scope="col">Dosen Penguji</th>
                            </tr>
                        </thead>
                        <?php
                            $no = 1;    
                        ?>
                        <tbody>
                            <?php $__currentLoopData = $nidn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nidnDosbing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $dafUjian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $daftar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($nidnDosbing->nidn == $daftar->nidn): ?>
                                        <tr>
                                            <td><?php echo e($no++); ?></td>
                                            <td><?php echo e($daftar->tglUjian); ?></td>
                                            <td><?php echo e($daftar->jamUjian); ?></td>
                                            <td><?php echo e($daftar->namaRuang); ?></td>
                                            <td><?php echo e($daftar->nim); ?></td>
                                            <td><?php echo e($daftar->namaMhs); ?></td>
                                            <td><?php echo e($daftar->judul); ?></td>
                                            <td><?php echo e($daftar->lembaga); ?></td>
                                            <td><?php echo e($daftar->namaDosen); ?></td>
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
<?php echo $__env->make('sikp.layout.koorLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SIKP\sikp_fix\resources\views/sikp/Koordinator/daftarUjian.blade.php ENDPATH**/ ?>