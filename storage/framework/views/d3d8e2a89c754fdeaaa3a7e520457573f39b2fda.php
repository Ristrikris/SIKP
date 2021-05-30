<?php $__env->startSection('konten'); ?>
    <section class="content-header">
        <h4><b>Daftar Ujian Kerja Praktik</b></h4>
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
                    <table class="table table-striped table-hover table-responsive">
                        <caption><i>Daftar Ujian Kerja Praktik</i></caption>
                        <thead class="thead-dark">
                            <tr align="center">
                                <th style="width: 10px">#</th>
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
                            <!--PAKAI FOREACH BIAR TIAP BARIS MUNCUL TOMBOLNYA DISINI-->
                            <?php $__currentLoopData = $nidn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nidnDosbing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $dafUjian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $daftar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($nidnDosbing->nidn == $daftar->nidn): ?>
                                        <tr>
                                            <!--TAMPILIN TABEL VIEW_JADWAL_UJIAN DISINI, yg ini cm contoh-->
                                            <td><?php echo e($no++); ?></td>
                                            <td><?php echo e($daftar->tglUjian); ?></td>
                                            <td><?php echo e($daftar->jamUjian); ?></td>
                                            <td><?php echo e($daftar->namaRuang); ?></td>
                                            <td><?php echo e($daftar->nim); ?></td>
                                            <td><?php echo e($daftar->namaMhs); ?></td>
                                            <td><?php echo e($daftar->judul); ?></td>
                                            <td><?php echo e($daftar->lembaga); ?></td>
                                            <td><?php echo e($daftar->namaDosen); ?></td>
                                        <!-- DISINI DITUTUP PAKAI ENDFOREACH NYA-->
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <h5><b></b></h5>
                    <table class="table table-striped table-hover table-responsive">
                        <caption><i>Daftar Ujian sebagai Dosen Penguji</i></cap tion>
                        <thead class="thead-dark">
                            <tr align="center">
                                <th style="width: 10px">#</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Jam</th>
                                <th scope="col">Ruangan</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Lembaga</th>
                                <th scope="col">Dosen Pembimbing</th>
                            </tr>
                        </thead>
                        <?php
                            $no = 1;    
                        ?>
                        <tbody>
                            <!--PAKAI FOREACH BIAR TIAP BARIS MUNCUL TOMBOLNYA DISINI-->
                            <?php $__currentLoopData = $nidn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nidnPenguji): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $dafPenguji; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $daftarPenguji): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($nidnPenguji->nidn == $daftarPenguji->nidn): ?>
                                        <tr>
                                            <!--TAMPILIN TABEL VIEW_JADWAL_UJIAN DISINI, yg ini cm contoh-->
                                            <td><?php echo e($no++); ?></td>
                                            <td><?php echo e($daftarPenguji->tglUjian); ?></td>
                                            <td><?php echo e($daftarPenguji->jamUjian); ?></td>
                                            <td><?php echo e($daftarPenguji->namaRuang); ?></td>
                                            <td><?php echo e($daftarPenguji->nim); ?></td>
                                            <td><?php echo e($daftarPenguji->namaMhs); ?></td>
                                            <td><?php echo e($daftarPenguji->judul); ?></td>
                                            <td><?php echo e($daftarPenguji->lembaga); ?></td>
                                            <td><?php echo e($daftarPenguji->namaDosen); ?></td>
                                        <!-- DISINI DITUTUP PAKAI ENDFOREACH NYA-->
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
<?php echo $__env->make('sikp.layout.masterKoor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\sikp_fix\resources\views/sikp/koor/daftarUjian.blade.php ENDPATH**/ ?>