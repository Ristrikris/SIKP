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
<div class="col-md-12 mt-5">
      <div class="card-header bg-success text-white">
    <h4><b>Daftar Registrasi KP Mahasiswa</b></h4>
</section>
<br>
<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h7><b>Nama Koordinator KP : </b></h7>
                {{auth()->user()->name}}<br>
                <h7><b>NIDN : </b></h7>
                @foreach($nidn as $nidn)
                {{$nidn->nidn}}
                @endforeach<br><br>
                <table class="table table-striped table-hover table-responsive">
                    <thead class="table-success">
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
                                        @foreach ($nidnDosenBim as $nidnDosenBim)
                                        <option value="{{$nidnDosenBim->nidn}}">{{$nidnDosenBim->namaDosen}}</option>
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
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h4><b>Daftar Verifikasi Pengajuan KP Mahasiswa</b></h4><br>
                <table class="table table-striped table-hover table-responsive">
                    <thead class="table-success">
                        <tr align="center">
                            <th style="width: 10px">No</th>
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