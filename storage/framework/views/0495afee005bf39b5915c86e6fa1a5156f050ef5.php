<!-- Menghubungkan Ke View Master Template -->


<!-- isi bagian konten -->
<?php $__env->startSection('konten'); ?>
<!-- <section class="content-header">
        <b>Identitas Dosen</b>
    </section> -->
<div class="row">
  <div class="col-md">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><b>Daftar Ujian Kerja Praktik</b></h3>
        <?php $__currentLoopData = $nama; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nama_mhs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <h7>Nama : </h7>
          <?php echo e($nama_mhs->nama); ?><br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = $nim; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nim_mhs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <h7>NIM : </h7>
          <?php echo e($nim_mhs->nim); ?><br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <!--NIM AMBIL DARI DATABASE TARUH DISINI--><br><br>
        <!--TAMPILIN TABEL VIEW_JADWAL_UJIAN DISINI-->
        <table class="table table-striped table-hover table-responsive">
          <caption><i>Daftar Ujian Kerja Praktik</i></caption>
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Jam</th>
              <th scope="col">Ruang</th>
              <th scope="col">Judul</th>
              <th scope="col">Dosen Pembimbing</th>
              <th scope="col">Dosen Penguji</th>
            </tr>
          </thead>
          <?php
            $no = 1;
          ?>
          <tbody>
            <?php $__currentLoopData = $ujian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <!--DATA NANTI DIMASUKKAN DISINI, AMBIL DARI DATABASE-->
              <td><?php echo e($no++); ?></td>
              <td><?php echo e($u->tglUjian); ?></td>
              <td><?php echo e($u->jamUjian); ?></td>
              <td><?php echo e($u->namaRuang); ?></td>
              <?php $__currentLoopData = $dosbing; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td><?php echo e($d->judul); ?></td>
                <td><?php echo e($d->namaDosen); ?></td>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <td><?php echo e($u->namaDosen); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('sikp.layout.masterMhs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\sikp\resources\views/sikp/mhs/jadwalUjian.blade.php ENDPATH**/ ?>