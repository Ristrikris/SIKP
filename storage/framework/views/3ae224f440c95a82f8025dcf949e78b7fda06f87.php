<?php $__env->startSection('konten'); ?>
    <section class="content-header">
    </section>
    <br> 
    <div class="row">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h7><b>Nama Dosen : </b></h7>
                    <?php echo e(auth()->user()->name); ?><br>
                    <h7><b>NIDN : </b></h7>
                    <?php $__currentLoopData = $nidn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nidnDosenLogin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($nidnDosenLogin->nidn); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><br><br>  
                    <h4><b><center>Daftar Bimbingan Kerja Praktik Mahasiswa</center></b></h4>
                    <table class="table  table-bordered border-primary">
                        <thead class="table-primary">
                            <tr align="center">
                                <th scope="col">Pengajuan Ujian</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Lembaga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $nidn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nidn_dosen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bimbinganKp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($nidn_dosen->nidn == $bimbinganKp->nidn): ?>
                                        <?php if($bimbinganKp->pengajuanUjian == '0'): ?>
                                            <tr>
                                                <td>
                                                    <form method="post" action="/sikp/{idKp}/{nim}/koorSetUjian">
                                                        <?php echo e(csrf_field()); ?>

                                                        <a class="btn btn-success btn-sm" href="/sikp/<?php echo e($bimbinganKp->idKp); ?>/<?php echo e($bimbinganKp->nim); ?>/koorSetUjian">
                                                            Ajukan <span class="glyphicon glyphicon-ok"> 
                                                        </a>
                                                    </form>
                                                </td>
                                                <td><?php echo e($bimbinganKp->nim); ?></td>
                                                <td><?php echo e($bimbinganKp->namaMhs); ?></td>
                                                <td><?php echo e($bimbinganKp->judul); ?></td>
                                                <td><?php echo e($bimbinganKp->lembaga); ?></td>
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
        <div class="container">
            <div class="row d-flex justify-content-center mt-200"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Pengajuan Surat Keterangan</button> </div> <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Pengajuan Surat Keterangan</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                          </div>
                          <div class="modal-body">
                            <div id="smartwizard">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4><b>Daftar Status Pengajuan Ujian Mahasiswa</b></h4><br>
                    <table class="table table-bordered border-primary">
                        <thead class="table-primary">
                            <tr align="center">
                                <th style="width: 10px">No</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Status Pengajuan Ujian</th>
                            </tr>
                        </thead>
                        <?php
                            $no = 1;    
                        ?>
                        <tbody>
                            <?php $__currentLoopData = $nidn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nidn_dosen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $dafPengajuan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $daftar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($daftar->nidn == $nidn_dosen->nidn): ?>
                                        <?php if($daftar->pengajuanUjian == '1'): ?>
                                            <tr>
                                                <td><?php echo e($no++); ?></td>
                                                <td><?php echo e($daftar->nim); ?></td>
                                                <td><?php echo e($daftar->namaMhs); ?></td>
                                                <td>
                                                
                                                    <span class="glyphicon glyphicon-ok-sign" style="color:green"> Diterima 
                                                
                                                </td>
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
<?php echo $__env->make('sikp.layout.koorLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SIKP\sikp_fix\resources\views/sikp/Koordinator/BimbinganKoor.blade.php ENDPATH**/ ?>