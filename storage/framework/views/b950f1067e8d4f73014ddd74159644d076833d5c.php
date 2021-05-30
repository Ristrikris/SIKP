<?php $__env->startSection('konten'); ?>
    <section class="content-header">
    <div class="col-md-12 mt-5">
      <div class="card-header bg-success text-white">
        <h4><b>Daftar Pengajuan Pra KP </b></h4>
    </section>
    <br> 
    <div class="row">
        <div class="col-md-6">
            <form method="post" enctype="multipart/form-data" action="<?php echo e(URL::to('/')); ?>/sikp/setPraKp">
                <?php echo e(csrf_field()); ?>

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h7><b>Nama Koordinator KP : </b></h7>
                        <?php echo e(auth()->user()->name); ?><br>
                        <h7><b>NIDN : </b></h7>
                        <?php $__currentLoopData = $nidn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nidn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($nidn->nidn); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><br><br>
                        <table class="table table-striped table-hover table-responsive">
                            <thead class="table-success">
                                <tr align="center">
                                    <th scope="col">Status Verifikasi</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Lembaga</th>
                                    <th scope="col">Dokumen Pra KP</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dataPraKp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <input type="hidden" name="idReg" value="<?php echo e($dataPraKp->idReg); ?>">
                                    <tr>
                                        <td>
                                            <input type="hidden" name="idReg" value="<?php echo e($dataPraKp->idReg); ?>">
                                            <div class="form-group">
                                                <button type="submit" href="/sikp/setPraKp" name="terima" class="btn btn-success btn-sm" value="<?php echo e($dataPraKp->idReg); ?>"> Terima </button>
                                            
                                                <button type="submit" href="/sikp/setPraKp" name="tolak" class="btn btn-danger btn-sm" value="<?php echo e($dataPraKp->idReg); ?>"> Tolak </button>
                                            </div>
                                        </td>
                                        <td><?php echo e($dataPraKp->nim); ?></td>
                                        <td><?php echo e($dataPraKp->namaMhs); ?></td>
                                        <td><?php echo e($dataPraKp->judul); ?></td>
                                        <td><?php echo e($dataPraKp->lembaga); ?></td>
                                        <td>
                                            <a href="/sikp/openprakp/<?php echo e($dataPraKp->nim); ?>" target="_blank" class="btn btn-primary">
                                               View File <span class="glyphicon glyphicon-eye-open">
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
        </div>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4><b>Daftar Verifikasi Pengajuan Pra KP Mahasiswa</b></h4><br>
                        <table class="table table-striped table-hover table-responsive">
                            <thead class="table-success">
                                <tr align="center">
                                    <th style="width: 10px">No</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Dokumen Pra KP</th>
                                    <th scope="col">Status Verifikasi</th>
                                </tr>
                            </thead>
                            <?php
                                $no = 1;    
                            ?>
                            <tbody>
                                <?php $__currentLoopData = $dataStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dataVer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($dataVer->statusPraKp == 1): ?>
                                        <tr>
                                            <td><?php echo e($no++); ?></td>
                                            <td><?php echo e($dataVer->nim); ?></td>
                                            <td><?php echo e($dataVer->namaMhs); ?></td>
                                            <td><?php echo e($dataVer->judul); ?></td>
                                            <td>
                                                <a href="/sikp/openprakp/<?php echo e($dataVer->nim); ?>" target="_blank" class="btn btn-primary">
                                                    View File <span class="glyphicon glyphicon-eye-open">
                                                </a>
                                            </td>
                                            <td>
                                                <span class="glyphicon glyphicon-ok-sign" style="color:green"> Diterima
                                            </td>
                                        </tr>
                                    <?php elseif($dataVer->statusPraKp == 2): ?>
                                    <tr>
                                        <td><?php echo e($no++); ?></td>
                                        <td><?php echo e($dataVer->nim); ?></td>
                                        <td><?php echo e($dataVer->namMhs); ?></td>
                                        <td><?php echo e($dataVer->judul); ?></td>
                                        <td>
                                            <a href="/sikp/openprakp/<?php echo e($dataVer->nim); ?>" target="_blank" class="btn btn-primary">
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
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('sikp.layout.koorLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\sikp_fix\resources\views/sikp/Koordinator/praKpRegis.blade.php ENDPATH**/ ?>