<?php $__env->startSection('konten'); ?>
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-5">
          <div class="card-header bg-secondary text-white">
        <h4><center>Jadwal Ujian KP</center></h4>
        <?php $__currentLoopData = $namaMhs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nama_mhs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <h4>Nama : <?php echo e($nama_mhs->namaMhs); ?> </h4>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = $nim; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nim_mhs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <h4>NIM : <?php echo e($nim_mhs->nim); ?> </h4> 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <br><br><br>
        <table class="table table-bordered border-primary">
          <thead class="table table-success table-striped">
            <tr>
              <th scope="col">No</th>
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
              <td><?php echo e($no++); ?></td>
              <td><?php echo e($u->tglUjian); ?></td>
              <td><?php echo e($u->jamUjian); ?></td>
              <td><?php echo e($u->namaRuang); ?></td>
              <?php $__currentLoopData = $dosenPembimbing; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dosen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td><?php echo e($dosen->judul); ?></td>
                <td><?php echo e($dosen->namaDosen); ?></td>
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
<?php echo $__env->make('sikp.layout.mahasiswaLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\sikp_fix\resources\views/sikp/Mahasiswa/jadwalUjian.blade.php ENDPATH**/ ?>