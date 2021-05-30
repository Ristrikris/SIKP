<!-- Menghubungkan dengan view template master -->


<!-- isi bagian konten -->
<?php $__env->startSection('konten'); ?>
<?php if(session('sukses')): ?>
<div class="alert alert-success" role="alert">
    <?php echo e(session('sukses')); ?>

</div>
<?php elseif(session('gagal')): ?>
<div class="alert alert-danger" role="alert">
    <?php echo e(session('gagal')); ?>

</div>
<?php endif; ?>
<!--BAGIAN KP-->
<section class="content-header">
    <h4><b>Daftar Registrasi KP Mahasiswa</b></h4>
</section>
<br>
<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h7><b>Nama Koordinator KP : </b></h7>
                <!--<?php $__currentLoopData = $namaDosen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $namaDosenLogin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($namaDosenLogin->namaDosen); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                <?php echo e(auth()->user()->name); ?><br>
                <h7><b>NIK : </b></h7>
                <?php $__currentLoopData = $nik; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nikDosenLogin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($nikDosenLogin->nik); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><br><br>
                <table class="table table-striped table-hover table-responsive">
                    <caption><i>Daftar Registrasi KP Mahasiswa</i></caption>
                    <thead class="thead-dark">
                        <tr align="center">
                            <th scope="col">Dosen Pembimbing</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Lembaga</th>
                            <th scope="col">Dokumen KP</th>
                            <th scope="col">Status Verifikasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dataKp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <form method="post" enctype="multipart/form-data" action="<?php echo e(URL::to('/')); ?>/sikp/setKp">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="idReg" value="<?php echo e($dataKp->idReg); ?>">
                            <tr>
                                <td>
                                    <!-- UTK MILIH NAMA DOSBING DISINI NANTI PAKE DROPDOWN-->
                                    <select class="custom-select" name="dosenUji">
                                        <option value="">Nama Dosen</option>
                                        <?php $__currentLoopData = $nikDosbing; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nikDos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($nikDos->nik); ?>"><?php echo e($nikDos->namaDosen); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </td>
                                <td><?php echo e($dataKp->nim); ?></td>
                                <td><?php echo e($dataKp->nama); ?></td>
                                <td><?php echo e($dataKp->judul); ?></td>
                                <td><?php echo e($dataKp->lembaga); ?></td>
                                <td>
                                    <a href="/sikp/openkp/<?php echo e($dataKp->nim); ?>" target="_blank" class="btn btn-primary">
                                        View File <span class="glyphicon glyphicon-eye-open">
                                    </a>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="hidden" name="idReg" value="<?php echo e($dataKp->idReg); ?>">
                                        <button type="submit" href="/sikp/setKp" name="terima" class="btn btn-success btn-sm" value="<?php echo e($dataKp->idReg); ?>">
                                            <span class="glyphicon glyphicon-ok"></span>

                                            <button type="submit" href="/sikp/setKp" name="tolak" class="btn btn-danger btn-sm" value="<?php echo e($dataKp->idReg); ?>">
                                                <span class="glyphicon glyphicon-remove">
                                    </div>
                                </td>
                            </tr>
                        </form>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- BAGIAN VIEW TABEL PENGAJUAN KP YG UDAH DITERIMA-->
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h4><b>Daftar Verifikasi Pengajuan KP Mahasiswa</b></h4><br>
                <table class="table table-striped table-hover table-responsive">
                    <caption><i>Daftar Verifikasi Pengajuan KP Mahasiswa</i></caption>
                    <thead class="thead-dark">
                        <tr align="center">
                            <th style="width: 10px">#</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Dokumen KP</th>
                            <th scope="col">Status Verifikasi</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    ?>
                    <tbody>
                        <?php $__currentLoopData = $dataStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dataVer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($dataVer->statusUjiKp == 1): ?>
                        <tr>
                            <td><?php echo e($no++); ?></td>
                            <td><?php echo e($dataVer->nim); ?></td>
                            <td><?php echo e($dataVer->nama); ?></td>
                            <td><?php echo e($dataVer->judul); ?></td>
                            <td>
                                <a href="/sikp/openkp/<?php echo e($dataVer->nim); ?>" target="_blank" class="btn btn-primary">
                                    View File <span class="glyphicon glyphicon-eye-open">
                                </a>
                            </td>
                            <td>
                                <span class="glyphicon glyphicon-ok-sign" style="color:green"> Diterima
                            </td>
                        </tr>
                        <?php elseif($dataVer->statusUjiKp == 2): ?>
                        <tr>
                            <td><?php echo e($no++); ?></td>
                            <td><?php echo e($dataVer->nim); ?></td>
                            <td><?php echo e($dataVer->nama); ?></td>
                            <td><?php echo e($dataVer->judul); ?></td>
                            <td>
                                <a href="/sikp/openkp/<?php echo e($dataVer->nim); ?>" target="_blank" class="btn btn-primary">
                                    View File <span class="glyphicon glyphicon-eye-open">
                                </a>
                            </td>
                            <td>
                                <span class="glyphicon glyphicon-remove-sign" style="color:red"> Ditolak
                            </td>
                        </tr>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('sikp.layout.masterKoor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\sikp__\resources\views/sikp/koor/regis_kp.blade.php ENDPATH**/ ?>