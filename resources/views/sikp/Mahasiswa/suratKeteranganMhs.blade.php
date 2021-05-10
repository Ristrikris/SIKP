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
      <div class="card-header bg-success text-white">
    <h4>Data Pengajuan Surat Keterangan</h4>
      </div>
    <form action="/mhs/insertSuratKet" method="POST" enctype="multipart/form-data">
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
          </select>
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

      <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Nama Lembaga :</label>
        <input type="lembaga" class="form-control" id="lembaga" name="lembaga" required="required">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Nama Pimpinan :</label>
        <input name="pimpinan" type="text" class="form-control" id="pimpinan" required="required">
      </div>

      <div class="form-group">
        <label for="exampleFormControlTextarea1">Alamat :</label>
        <textarea class="form-control" id="alamat" name="alamat" rows="3" required="required"></textarea>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">No. Telp :</label>
        <input name="noTelp" type="text" class="form-control" id="noTelp" required="required">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Fax :</label>
        <input name="fax" type="text" class="form-control" id="fax" aria-describedby="emailHelp" required="required">
      </div>

      <div class="form-group">
        <label for="exampleFormControlFile1">Dokumen Pengajuan Surat Keterangan :</label>
        <input type="file" class="form-control-file" id="dokumenSurat" name="dokumenSurat" required="required">
        <i style="color:#db1a1a">File <b>Harus</b> bertipe <b>.PDF</b></i>
      </div>

      <button type="submit" class="btn btn-primary btn-round" name="Submit">Submit</button>
    </form>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-12 mt-5">
        <div class="card-header bg-success text-white">
      <h4>Daftar Pengajuan Surat Keterangan</h4>
        </div>
    <div class="box-body no-padding">
      <table class="table table-striped">
        <thead>
          <tr>
            <th style="width: 10px">NO</th>
            <th>NIM</th>
            <th>Lembaga</th>
            <th style="width: 10px">Status</th>
          </tr>
        </thead>
        @php
            $no = 1;    
        @endphp
        <tbody>
          @foreach($nim_login as $nim_log)
            @foreach($data as $data_surat)
              @if($data_surat->aktif == '1')
                @if($nim_log->nim == $data_surat->nim)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{$data_surat->nim}}</td>
                    <td>{{$data_surat->lembaga}}</td>
                    <td>
                      @if($data_surat->statusSurat == '0')
                        <b>Belum Diverifikasi</b>
                      @endif

                      @if($data_surat->statusSurat == '1')
                        <span class="glyphicon glyphicon-ok-sign" style="color:green"> Diterima 
                      @endif

                      @if($data_surat->statusSurat == '2')
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
</div>
@endsection