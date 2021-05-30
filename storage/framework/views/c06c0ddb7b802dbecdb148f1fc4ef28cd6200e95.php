<?php $__env->startSection('konten'); ?>
<section class="content-header">
    <h4><b>Pengaturan Ujian Kerja Praktik</b></h4>
</section>
<br>
<div class="row">
    <div class="col-md">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h7><b>Nama Koordinator KP : </b></h7>
                <?php echo e(auth()->user()->name); ?><br>
                <h7><b>NIDN : </b></h7>
                <?php $__currentLoopData = $nidn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nidn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($nidn->nidn); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><br><br>
                <table class="table table-bordered border-primary">
                    <thead class="table-primary">
                        <tr align="center">
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Dosen Pembimbing</th>
                            <th scope="col">Dosen Penguji</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Jam</th>
                            <th scope="col">Ruangan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dataUjian): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($dataUjian->nidn == null): ?>
                            <form method="post" id="masuk" enctype="multipart/form-data" action="<?php echo e(URL::to('/')); ?>/sikp/setUjian">
                                <?php echo e(csrf_field()); ?>

                                <fieldset disabled>
                                    <div class="form-row">
                                        <div class="col-7">
                                            <?php
                                            $idUjian = $dataUjian->idUjian;
                                            ?>
                                            <input type="hidden" name="idUjian" value="<?php echo e($idUjian); ?>">
                                            <td><input type="text" name="nim" value="<?php echo e($dataUjian->nim); ?>" class="form-control" readonly></td>
                                            <td><input type="text" name="nama" value="<?php echo e($dataUjian->namaMhs); ?>" class="form-control" disabled></td>
                                            <td><input type="text" name="judul" value="<?php echo e($dataUjian->judul); ?>" class="form-control" disabled></td>
                                            <td><input type="text" name="namaDosen" value="<?php echo e($dataUjian->namaDosen); ?>" class="form-control" disabled></td>
                                        </div>
                                    </div>
                                </fieldset>
                                <td>
                                    <select class="custom-select-lg" name="nidn" required>
                                        <?php $__currentLoopData = $dosenPenguji; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dosen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($dosen->nidn); ?>"><?php echo e($dosen->namaDosen); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </td>
                                <td>
                                    <input type="date" class="form-control" name="tglUjian" required="required">
                                </td>
                                <td>
                                    <input type="time" class="form-control" name="jamUjian" required="required">
                                </td>
                                <td>
                                    <select class="custom-select-lg" name="ruang" id="ruangan" required>
                                        <?php $__currentLoopData = $dataRuangan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ruang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $idRuang = $ruang->idRuang ?>
                                        <option value="<?php echo e($idRuang); ?>"><?php echo e($ruang->namaRuang); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                </td>
                                <td>
                                    <button type="submit" href="/sikp/setSurat" name="input" class="btn btn-primary btn-sm" value="<?php echo e($idUjian); ?>">
                                        <span>Submit</span>
                                </td>
                        </tr>
                        </form>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('sikp.layout.koorLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\sikp_fix\resources\views/sikp/Koordinator/setUjian.blade.php ENDPATH**/ ?>