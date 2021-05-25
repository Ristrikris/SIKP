@extends('sikp.layout.mahasiswaLayout')
@section('konten')
@if(session('sukses'))
        <div class="alert alert-success" role="alert">
            {{session('sukses')}}
        </div>
    @endif
<div class="container">
  <div class="row">
    <div class="col-md-12 mt-5">
      <div class="card-header bg-primary text-white">
        <h4 align=center>Daftar Pengajuan KP</h4>
      </div>
  <div class="box-body no-padding">
    <table class="table table-bordered border-primary">
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
      @php
          $no = 1;    
      @endphp
      <tbody>
        @foreach($nim_login as $nim_log)
          @foreach ($kp as $daftarPengajuanKp)
            @if($daftarPengajuanKp->aktif == '1')
              @if($nim_log->nim == $daftarPengajuanKp->nim)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $daftarPengajuanKp->nim }}</td>
                  <td>{{ $daftarPengajuanKp->judul }}</td>
                  <td>{{ $daftarPengajuanKp->lembaga }}</td>
                  <td>
                  @foreach($dosenPembimbing as $d)
                    @if($daftarPengajuanKp->statusUjianKp == '0')
                      
                    @elseif($daftarPengajuanKp->statusUjianKp == '1')
                      @if($d->nidn == $daftarPengajuanKp->nidn)
                        {{$d->namaDosen}}
                      @endif
                    @elseif($daftarPengajuanKp->statusUjianKp == '2')
                      
                    @endif
                  @endforeach
                  </td>
                  <td>
                    @if($daftarPengajuanKp->statusUjianKp == '0')
                      <b>Belum Diverifikasi</b>
                    @endif

                    @if($daftarPengajuanKp->statusUjianKp == '1')
                    <button type="button" class="btn btn-primary" disabled data-bs-toggle="button" autocomplete="off">Diterima</button>
                    @endif

                    @if($daftarPengajuanKp->statusUjianKp == '2')
                      <span class="glyphicon glyphicon-remove-sign" style="color:red"> Ditolak 
                    @endif
                  </td>
                </tr>
              @endif
            @endif
          @endforeach
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<div class="container">
  <div class="row d-flex justify-content-center mt-200"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Pengajuan KP </button> </div> <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pengajuan KP</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body">
                  <div id="smartwizard">
    <form action="/sikp/insertPengajuanKp" method="POST" enctype="multipart/form-data">
      {{csrf_field()}}
      
      @foreach($nim_login as $nim_mhs)
        <div class="form-group">
          <label for="exampleInputEmail1">NIM :</label>
          <input name="nim" type="text" class="form-control" id="nim" required="required" style="width: 50%"
            value="{{$nim_mhs->nim}}" readonly>
        </div>
      @endforeach

      @foreach($perAktif as $aktif)
      <div class="form-row">
        <div class="form-group col-sm">
          <label for="exampleFormControlSelect1">Semester : </label>
          <input type="text" class="form-control" name="semester" style="width: 50%" required="required"
            value="{{$aktif->semester}}" readonly>
        </div>
        <div class="form-group col-sm">
          <label for="exampleFormControlInput1">Tahun : </label>
          <input type="number" class="form-control" name="tahun" style="width: 50%" required="required"
            value="{{$aktif->tahun}}" readonly>
        </div>
      </div>
      @endforeach

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
        <input name="noTelp" type="number" class="form-control" id="noTelp" required="required">
      </div>

      <div class="form-group">
        <label for="exampleFormControlTextarea1">Alamat Lembaga :</label>
        <textarea class="form-control" id="alamat" name="alamat" rows="3" required="required"></textarea>
      </div>
    
      <div class="form-group">
        <label for="exampleFormControlFile1">Dokumen Pengajuan KP :</label>
        <input type="file" class="form-control-file" id="dokumenKp" name="dokumenKp" required="required">
        <i style="color:#db1a1a">document bertipe PDF</b></i>
      </div>

        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
            <b>Anda telah menyetujui data anda untuk disimpan dan dikelola</b>
          </label>
          </div>
          <i style="color:#fa2525">wajib di centang</i>
          <br>
      <button type="submit" class="btn btn-primary" name="Submit">Submit</button>
    </form>
  </div>
</div>
@endsection