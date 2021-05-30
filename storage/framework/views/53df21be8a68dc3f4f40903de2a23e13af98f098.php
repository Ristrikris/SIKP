<?php $__env->startSection('konten'); ?>
<div class="container">
  <div class="row">
    <div class="col-md-12 mt-5">
      <div class="card-header bg-success text-white">
    <h4>Data Pengajuan KP</h4>
      </div>
    <form action="/sikp/insertPengajuanKp" method="POST" enctype="multipart/form-data">
      <?php echo e(csrf_field()); ?>

      
      <?php $__currentLoopData = $nim_login; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nim_mhs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="form-group">
          <label for="exampleInputEmail1">NIM :</label>
          <input name="nim" type="text" class="form-control" id="nim" required="required" style="width: 50%"
            value="<?php echo e($nim_mhs->nim); ?>" readonly>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      <?php $__currentLoopData = $perAktif; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aktif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="form-row">
        <div class="form-group col-sm">
          <label for="exampleFormControlSelect1">Semester : </label>
          <input type="text" class="form-control" name="semester" style="width: 50%" required="required"
            value="<?php echo e($aktif->semester); ?>" readonly>
        </div>
        <div class="form-group col-sm">
          <label for="exampleFormControlInput1">Tahun : </label>
          <input type="number" class="form-control" name="tahun" style="width: 50%" required="required"
            value="<?php echo e($aktif->tahun); ?>" readonly>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      <div class="form-group">
        <label for="exampleFormControlTextarea1">Judul Kerja Praktik :</label>
        <textarea class="form-control" id="judul" name="judul" rows="3" required="required"></textarea>
      </div>

      <div class="form-group">
        <label for="exampleFormControlTextarea1">Tools :</label>
        <textarea class="form-control" id="tools" name="tools" rows="3" required="required"></textarea>
      </div>

      <div class="form-group">
        <label for="exampleFormControlTextarea1">Spesifikasi Perangkat Lunak :</label>
        <textarea class="form-control" id="spesifikasi" name="spesifikasi" rows="3" required="required"></textarea>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Nama Lembaga :</label>
        <input name="lembaga" type="text" class="form-control" id="lembaga" required="required">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1"> Nama Pimpinan Lembaga :</label>
        <input name="pimpinan" type="text" class="form-control" id="pimpinan" required="required">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">No. Telp Lembaga :</label>
        <input name="noTelp" type="text" class="form-control" id="noTelp" required="required">
      </div>

      <div class="form-group">
        <label for="exampleFormControlTextarea1">Alamat Lembaga :</label>
        <textarea class="form-control" id="alamat" name="alamat" rows="3" required="required"></textarea>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Fax :</label>
        <input name="fax" type="text" class="form-control" id="fax" aria-describedby="emailHelp" required="required">
      </div>

      <div class="form-group">
        <label for="exampleFormControlFile1">Dokumen Pengajuan KP :</label>
        <input type="file" class="form-control-file" id="dokumenKp" name="dokumenKp" required="required">
        <i style="color:#db1a1a">File <b>Harus</b> bertipe <b>.PDF</b></i>
      </div>

      <button type="submit" class="btn btn-primary" name="Submit">Submit</button>
    </form>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-12 mt-5">
        <div class="card-header bg-success text-white">
      <h4>Daftar Pengajuan KP</h4>
        </div>
    <div class="box-body no-padding">
      <table class="table table-striped table-hover table-responsive">
        <thead>
          <tr>
            <th style="width: 10px">No</th>
            <th>NIM</th>
            <th>Judul</th>
            <th>Nama Lembaga</th>
            <th>Dosen Pembimbing</th>
            <th style="width: 100px">Status</th>
          </tr>
        </thead>
        <?php
            $no = 1;    
        ?>
        <tbody>
          <?php $__currentLoopData = $nim_login; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nim_log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $kp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $daftarPengajuanKp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($daftarPengajuanKp->aktif == '1'): ?>
                <?php if($nim_log->nim == $daftarPengajuanKp->nim): ?>
                  <tr>
                    <td><?php echo e($no++); ?></td>
                    <td><?php echo e($daftarPengajuanKp->nim); ?></td>
                    <td><?php echo e($daftarPengajuanKp->judul); ?></td>
                    <td><?php echo e($daftarPengajuanKp->lembaga); ?></td>
                    <td>
                    <?php $__currentLoopData = $dosenPembimbing; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($daftarPengajuanKp->statusUjianKp == '0'): ?>
                        
                      <?php elseif($daftarPengajuanKp->statusUjianKp == '1'): ?>
                        <?php if($d->nidn == $daftarPengajuanKp->nidn): ?>
                          <?php echo e($d->namaDosen); ?>

                        <?php endif; ?>
                      <?php elseif($daftarPengajuanKp->statusUjianKp == '2'): ?>
                        
                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <td>
                      <?php if($daftarPengajuanKp->statusUjianKp == '0'): ?>
                        <b>Belum Diverifikasi</b>
                      <?php endif; ?>

                      <?php if($daftarPengajuanKp->statusUjianKp == '1'): ?>
                        <span class="glyphicon glyphicon-ok-sign" style="color:green"> Diterima 
                      <?php endif; ?>

                      <?php if($daftarPengajuanKp->statusUjianKp == '2'): ?>
                        <span class="glyphicon glyphicon-remove-sign" style="color:red"> Ditolak 
                      <?php endif; ?>
                    </td>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('sikp.layout.mahasiswaLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\sikp_fix\resources\views/sikp/Mahasiswa/pengajuanKP.blade.php ENDPATH**/ ?>