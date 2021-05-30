<?php $__env->startSection('konten'); ?>
    <section class="content-header">
        <h4><b><center>Pengaturan Set Batas Pelaksanaan KP</center></b></h4>
    </section>
    <br> 
    <div class="row">
        <div class="col-md">
            <h7><b>Nama Koordinator KP : </b></h7>
            <?php echo e(auth()->user()->name); ?><br>
            <h7><b>NIDN : </b></h7>
            <?php $__currentLoopData = $nidn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nidn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($nidn->nidn); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><br><br>
            <form method="post" action="<?php echo e(URL::to('/')); ?>/sikp/setBatas">
                <?php echo e(csrf_field()); ?>

                <div class="col-md-12 mt-5">
                    <div class="card-header bg-primary text-white">
                  <h4><center>Batas Periode Pelaksanaan KP</center></h4>
                    </div>
                    <hr />         
                    <table class="table table-bordered border-primary">
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
                    <div class="container">
                        <div class="row d-flex justify-content-center mt-200"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Aktifkan Status</button> </div> <!-- Modal -->
                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Pengajuan Aktivasi Surat Keterangan KP</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                      </div>
                                      <div class="modal-body">
                                        <div id="smartwizard">
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
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Tanggal Batas Pelaksanaan KP : </label>
                        <input type="date" class="form-control" name="akhirKp"style="width: 25%">
                    </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">
                            Submit 
                        </button>
                    </div>
                </div>
            </form>
        </div>
        
        <div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('sikp.layout.koorLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SIKP\sikp_fix\resources\views/sikp/Koordinator/batasKp.blade.php ENDPATH**/ ?>