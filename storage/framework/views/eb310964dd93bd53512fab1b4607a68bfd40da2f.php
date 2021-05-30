<?php $__env->startSection('konten'); ?>
    <section class="content-header">
    <div class="card-header bg-primary text-white">
        <h4><b><center>Daftar Pengajuan Surat Keterangan KP Mahasiswa</center></b></h4>
    </section>
    <br> 
            <form method="post" enctype="multipart/form-data" action="<?php echo e(URL::to('/')); ?>/sikp/setSurat">
                <?php echo e(csrf_field()); ?>

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
                                    <th scope="col">Lembaga</th>
                                    <th scope="col">Dokumen Surat</th>
                                    <th scope="col">Status Verifikasi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $surat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dataSurat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="hidden" name="idReg" value="<?php echo e($dataSurat->idReg); ?>">
                                <tr>
                                    <td><?php echo e($dataSurat->nim); ?></td>
                                    <td><?php echo e($dataSurat->namaMhs); ?></td>
                                    <td><?php echo e($dataSurat->lembaga); ?></td>
                                    <td>
                                        <a href="/sikp/opensurat/<?php echo e($dataSurat->nim); ?>" target="_blank" class="btn btn-primary">
                                            View File 
                                        </a>
                                        <td>
                                            <input type="hidden" name="idReg" value="<?php echo e($dataSurat->idReg); ?>">
                                            <div class="form-group">
                                                <button type="submit" href="/sikp/setSurat" name="terima" class="btn btn-success btn-sm" value="<?php echo e($dataSurat->idReg); ?>">Setuju</button>
                                                <button type="submit" href="/sikp/setSurat" name="tolak" class="btn btn-danger btn-sm" value="<?php echo e($dataSurat->idReg); ?>">Tolak</button>
                                                
                                            </div>
                                        </td>
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
    <div class="container">
        <div class="row d-flex justify-content-center mt-200"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">List Verifikasi Status Surat</button> </div> <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Daftar Verifikasi Status Surat Keterangan</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                      </div>
                      <div class="modal-body">
                        <div id="smartwizard">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4><b><center>Daftar Verifikasi Pengajuan Surat Keterangan KP</center></b></h4><br>
                    <table class="table table-bordered border-primary">
                        <thead class="table-primary">
                            <tr align="center">
                                <th style="width: 10px">No</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Lembaga</th>
                                <th scope="col">Dokumen Surat</th>
                                <th scope="col">Status Verifikasi</th>
                            </tr>
                        </thead>
                        <?php
                            $no = 1;    
                        ?>
                        <tbody>
                            <?php $__currentLoopData = $dataStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dataVer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($dataVer->statusSurat == 1): ?>
                                    <tr>
                                        <td><?php echo e($no++); ?></td>
                                        <td><?php echo e($dataVer->nim); ?></td>
                                        <td><?php echo e($dataVer->namaMhs); ?></td>
                                        <td><?php echo e($dataVer->lembaga); ?></td>
                                        <td>
                                            <a href="/sikp/opensurat/<?php echo e($dataVer->nim); ?>" target="_blank" class="btn btn-primary">
                                                View File 
                                            </a>
                                        </td>
                                        <td>
                                            <span  style="color:green"><h4><center>Diterima</center></h4>
                                        </td>
                                    </tr>
                                     <?php elseif($dataVer->statusSurat == 2): ?>
                                    <tr>
                                        <td><?php echo e($no++); ?></td>
                                        <td><?php echo e($dataVer->nim); ?></td>
                                        <td><?php echo e($dataVer->namaMhs); ?></td>
                                        <td><?php echo e($dataVer->lembaga); ?></td>
                                        <td>
                                            <a href="/sikp/opensurat/<?php echo e($dataVer->nim); ?>" target="_blank" class="btn btn-primary">
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
<?php echo $__env->make('sikp.layout.koorLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SIKP\sikp_fix\resources\views/sikp/Koordinator/suratKeterangan.blade.php ENDPATH**/ ?>