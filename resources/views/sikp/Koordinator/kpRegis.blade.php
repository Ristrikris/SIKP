@extends('sikp.layout.koorLayout')
@section('konten')
@if(session('sukses'))
<div class="alert alert-success" role="alert">
    {{session('sukses')}}
</div>
@elseif (session('gagal'))
<div class="alert alert-danger" role="alert">
    {{session('gagal')}}
</div>
@endif
<section class="content-header">
<div class="col-md">
      <div class="card-header bg-primary text-white">
    <h4><b><center>Daftar Registrasi KP Mahasiswa</center></b></h4>
</section>
<br>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h7><b>Nama Koordinator KP : </b></h7>
                {{auth()->user()->name}}<br>
                <h7><b>NIDN : </b></h7>
                @foreach($nidn as $nidn)
                {{$nidn->nidn}}
                @endforeach<br><br>
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
                        @foreach($data as $dataKp)
                        <form method="post" enctype="multipart/form-data" action="{{ URL::to('/') }}/sikp/setKp">
                            {{csrf_field()}}
                            <input type="hidden" name="idReg" value="{{ $dataKp->idReg }}">
                            <tr>
                                <td>
                                    <select class="custom-select" name="dosenUji">
                                        <option value="">Nama Dosen</option>
                                        @foreach ($nidnDosbim as $nidnDosbim)
                                        <option value="{{$nidnDosbim->nidn}}">{{$nidnDosbim->namaDosen}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>{{$dataKp->nim}}</td>
                                <td>{{$dataKp->namaMhs}}</td>
                                <td>{{$dataKp->judul}}</td>
                                <td>{{$dataKp->lembaga}}</td>
                                <td>
                                    <a href="/sikp/openkp/{{$dataKp->nim}}" target="_blank" class="btn btn-primary">
                                        View File 
                                    </a>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="hidden" name="idReg" value="{{$dataKp->idReg}}">
                                        <button type="submit" href="/sikp/setKp" name="terima" class="btn btn-success btn-sm" value="{{$dataKp->idReg}}"> Terima </button>

                                            <button type="submit" href="/sikp/setKp" name="tolak" class="btn btn-danger btn-sm" value="{{$dataKp->idReg}}"> Tolak </button>
                                    </div>
                                </td>
                            </tr>
                        </form>
                        @endforeach
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
                    @php
                    $no = 1;
                    @endphp
                    <tbody>
                        @foreach($dataStatus as $dataVer)
                        @if($dataVer->statusUjianKp == 1)
                        <tr>
                            <td>{{$dataVer->nim}}</td>
                            <td>{{$dataVer->namaMhs}}</td>
                            <td>{{$dataVer->judul}}</td>
                            <td>
                                <a href="/sikp/openkp/{{$dataVer->nim}}" target="_blank" class="btn btn-primary">
                                    View File 
                                </a>
                            </td>
                            <td>
                                <span  style="color:green"> Diterima
                            </td>
                        </tr>
                        @elseif($dataVer->statusUjianKp == 2)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$dataVer->nim}}</td>
                            <td>{{$dataVer->namaMhs}}</td>
                            <td>{{$dataVer->judul}}</td>
                            <td>
                                <a href="/sikp/openkp/{{$dataVer->nim}}" target="_blank" class="btn btn-primary">
                                    View File 
                                </a>
                            </td>
                            <td>
                                <span style="color:red"> Ditolak
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection