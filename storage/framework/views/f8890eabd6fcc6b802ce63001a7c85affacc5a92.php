<!-- Menghubungkan dengan view template master -->


<!-- isi bagian konten -->
<?php $__env->startSection('konten'); ?>
    <section class="content-header">
        <h4><b>Pengaturan Batas Pelaksanaan Kerja Praktik</b></h4>
    </section>
    <br> 
    <div class="row">
        <div class="col-md-6">
            <h7><b>Nama Koordinator KP : </b></h7>
            <!--<?php $__currentLoopData = $namaDosen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $namaDosenLogin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($namaDosenLogin->namaDosen); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
            <?php echo e(auth()->user()->name); ?><br>
            <h7><b>NIK : </b></h7>
            <?php $__currentLoopData = $nik; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nikDosenLogin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($nikDosenLogin->nik); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><br><br>
            <form method="post" action="<?php echo e(URL::to('/')); ?>/sikp/setBatas">
                <?php echo e(csrf_field()); ?>

                <div class="box-body">
                    <div class="form-row">
                        <div class="form-group col-sm">
                            <label for="exampleFormControlSelect1">Semester : </label>
                            <select class="form-control" name="semester" style="width: 50%">
                            <option value="Gasal">Gasal</option>
                            <option value="Genap">Genap</option>
                            </select>
                        </div>
                        <div class="form-group col-sm">
                            <label for="exampleFormControlInput1">Tahun : </label>
                            <input type="text" class="form-control" name="tahun" style="width: 50%" placeholder="yyyy">
                        </div>
                    </div>
                    <!--<div class="form-group">
                        <label for="exampleFormControlInput1">Tanggal Mulai : </label>
                        <input type="date" class="form-control" name="mulaiKp" style="width: 25%">
                    </div>--><!--TANGGAL MULAI AMBIL TANGGAL TERBARU/HARI INI UTK INSERT KE DATABASE -->
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Tanggal Batas Pelaksanaan KP : </label>
                        <input type="date" class="form-control" name="akhirKp"style="width: 25%">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Aktifkan Periode Batas KP Ini ?</label>  
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="aktif" value="1" checked>
                            <label class="form-check-label" for="inlineRadio1">Ya</label>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">
                            Submit <!--<span class="glyphicon glyphicon-floppy-disk">--> 
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-12 mt-5">
            <div class="card-header bg-success text-white">
          <h4>Batas Periode Pelaksanaan KP</h4>
            </div>
            <hr />         
            <table class="table table-striped table-hover table-responsive">
                <thead>
                    <tr>
                        <th style="width: 10px">No</th>
                        <th>Semester</th>
                        <th>Tahun</th>
                        <th>Tanggal Mulai Pelaksanaan KP</th>
                        <th>Tanggal Batas Pelaksanaan KP</th>
                        <th style="width: 100px">Status</th>
                    </tr>
                </thead>
                <?php
                    $no = 1;    
                ?>
                <tbody>
                    <?php $__currentLoopData = $aktif; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $batas_aktif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($no++); ?></td>
                        <td><?php echo e($batas_aktif->semester); ?></td>
                        <td><?php echo e($batas_aktif->tahun); ?></td>
                        <td><?php echo e($batas_aktif->mulaiKp); ?></td>
                        <td><?php echo e($batas_aktif->akhirKp); ?></td>
                        <td>
                        <?php if($batas_aktif->aktif == '0'): ?>
                            <span class="glyphicon glyphicon-remove-sign" style="color:red"> Non-Aktif 
                        <?php endif; ?>

                        <?php if($batas_aktif->aktif == '1'): ?>
                            <span class="glyphicon glyphicon-ok-sign" style="color:green"> Aktif 
                        <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('sikp.layout.masterKoor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\sikp__\resources\views/sikp/koor/batasKp.blade.php ENDPATH**/ ?>