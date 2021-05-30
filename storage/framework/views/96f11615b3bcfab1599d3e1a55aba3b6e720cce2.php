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
<section class="content-header">
<div class="col-md">
      <div class="card-header bg-primary text-white">
    <h4><b><center>Daftar Registrasi KP Mahasiswa</center></b></h4>
</section>
<br>
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
                                    <select class="custom-select" name="dosenUji">
                                        <option value="">Nama Dosen</option>
                                        <?php $__currentLoopData = $nidnDosbim; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nidnDosbim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($nidnDosbim->nidn); ?>"><?php echo e($nidnDosbim->namaDosen); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </td>
                                <td><?php echo e($dataKp->nim); ?></td>
                                <td><?php echo e($dataKp->namaMhs); ?></td>
                                <td><?php echo e($dataKp->judul); ?></td>
                                <td><?php echo e($dataKp->lembaga); ?></td>
                                <td>
                                    <a href="/sikp/openkp/<?php echo e($dataKp->nim); ?>" target="_blank" class="btn btn-primary">
                                        View File 
                                    </a>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="hidden" name="idReg" value="<?php echo e($dataKp->idReg); ?>">
                                        <button type="submit" href="/sikp/setKp" name="terima" class="btn btn-success btn-sm" value="<?php echo e($dataKp->idReg); ?>"> Terima </button>

                                            <button type="submit" href="/sikp/setKp" name="tolak" class="btn btn-danger btn-sm" value="<?php echo e($dataKp->idReg); ?>"> Tolak </button>
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
    </div>
    <div class="container">
        <div class="row d-flex justify-content-center mt-200"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">List Verifikasi Status KP</button> </div> <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Daftar Verifikasi Status Pengajuan KP Mahasiswa</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                      </div>
                      <div class="modal-body">
                        <div id="smartwizard">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h4><b><center>Daftar Verifikasi Pengajuan KP Mahasiswa</center></b></h4><br>
                <table class="table table-bordered border-primary">
                    <thead class="table-primary">
                        <tr align="center">
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
                        <?php if($dataVer->statusUjianKp == 1): ?>
                        <tr>
                            <td><?php echo e($dataVer->nim); ?></td>
                            <td><?php echo e($dataVer->namaMhs); ?></td>
                            <td><?php echo e($dataVer->judul); ?></td>
                            <td>
                                <a href="/sikp/openkp/<?php echo e($dataVer->nim); ?>" target="_blank" class="btn btn-primary">
                                    View File 
                                </a>
                            </td>
                            <td>
                                <span  style="color:green"> Diterima
                            </td>
                        </tr>
                        <?php elseif($dataVer->statusUjianKp == 2): ?>
                        <tr>
                            <td><?php echo e($no++); ?></td>
                            <td><?php echo e($dataVer->nim); ?></td>
                            <td><?php echo e($dataVer->namaMhs); ?></td>
                            <td><?php echo e($dataVer->judul); ?></td>
                            <td>
                                <a href="/sikp/openkp/<?php echo e($dataVer->nim); ?>" target="_blank" class="btn btn-primary">
                                    View File 
                                </a>
                            </td>
                            <td>
                                <span style="color:red"> Ditolak
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
<?php echo $__env->make('sikp.layout.koorLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SIKP\sikp_fix\resources\views/sikp/Koordinator/kpRegis.blade.php ENDPATH**/ ?>