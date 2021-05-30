<!-- Menghubungkan dengan view template master -->


<!-- isi bagian konten -->
<?php $__env->startSection('konten'); ?>
    <section class="content-header">
        <h4><b>Daftar Bimbingan Kerja Praktik Mahasiswa</b></h4>
    </section>
    <br> 
    <div class="row">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h7><b>Nama Dosen : </b></h7>
                    <!--<?php $__currentLoopData = $namaDosen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $namaDosenLogin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($namaDosenLogin->namaDosen); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                    <?php echo e(auth()->user()->name); ?><br>
                    <h7><b>NIDN : </b></h7>
                    <?php $__currentLoopData = $nidn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nidn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($nidn->nidn); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><br><br>  
                    <table class="table table-striped table-hover table-responsive">
                        <caption><i>Daftar Bimbingan Kerja Praktik Mahasiswa</i></caption>
                        <thead class="thead-dark">
                            <tr align="center">
                                <th scope="col">Pengajuan Ujian</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Lembaga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--PAKAI FOREACH BIAR TIAP BARIS MUNCUL TOMBOLNYA DISINI-->
                            <?php $__currentLoopData = $nidn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nidn_dosen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bimbinganKp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($nidn_dosen->nidn == $bimbinganKp->nidn): ?>
                                        <?php if($bimbinganKp->pengajuanUjian == '0'): ?>
                                            <tr>
                                                <td>
                                                    <form method="post" action="/sikp/{idKp}/{nim}/koorSetUjian">
                                                        <?php echo e(csrf_field()); ?>

                                                        <!--DITERIMA-->
                                                        <a class="btn btn-success btn-sm" href="/sikp/<?php echo e($bimbinganKp->idKp); ?>/<?php echo e($bimbinganKp->nim); ?>/koorSetUjian">
                                                            Ajukan <span class="glyphicon glyphicon-ok"> 
                                                        </a>
                                                        <!--DITOLAK
                                                        <a class="btn btn-danger btn-sm" href="#">
                                                            <span class="glyphicon glyphicon-remove">
                                                        </a>-->
                                                    </form>
                                                </td>
                                                <!--TAMPILIN TABEL VIEW_JADWAL_UJIAN DISINI, yg ini cm contoh-->
                                                <td><?php echo e($bimbinganKp->nim); ?></td>
                                                <td><?php echo e($bimbinganKp->namaMhs); ?></td>
                                                <td><?php echo e($bimbinganKp->judul); ?></td>
                                                <td><?php echo e($bimbinganKp->lembaga); ?></td>
                                                <!--<td><?php echo e($bimbinganKp->idKp); ?></td>-->
                                            <!-- DISINI DITUTUP PAKAI ENDFOREACH NYA-->
                                            </tr>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- BAGIAN VIEW TABEL MAHASISWA YANG DITERIMA UJIAN-->
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4><b>Daftar Status Pengajuan Ujian Mahasiswa</b></h4><br>
                    <table class="table table-striped table-hover table-responsive">
                        <caption><i>Daftar Status Pengajuan Ujian Mahasiswa</i></caption>
                        <thead class="thead-dark">
                            <tr align="center">
                                <th style="width: 10px">#</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Status Pengajuan Ujian</th>
                            </tr>
                        </thead>
                        <?php
                            $no = 1;    
                        ?>
                        <tbody>
                            <!--CONTOH YG DITERIMA-->
                            <?php $__currentLoopData = $nidn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nidn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $dafPengajuan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $daftar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($daftar->nidn == $nidn->nidn): ?>
                                        <?php if($daftar->pengajuanUjian == '1'): ?>
                                            <tr>
                                                <td><?php echo e($no++); ?></td>
                                                <td><?php echo e($daftar->nim); ?></td>
                                                <td><?php echo e($daftar->namaMhs); ?></td>
                                                <td>
                                                
                                                    <span class="glyphicon glyphicon-ok-sign" style="color:green"> Diterima 
                                                
                                                </td>
                                                <!--<td><?php echo e($daftar->idKp); ?></td>-->
                                            <!-- DISINI DITUTUP PAKAI ENDFOREACH NYA-->
                                            </tr>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            <div>
        </div>
    </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('sikp.layout.masterKoor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\sikp_fix\resources\views/sikp/koor/koor_bimbingan.blade.php ENDPATH**/ ?>