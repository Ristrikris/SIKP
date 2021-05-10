@extends('sikp.layout.koorLayout')
@section('konten')
    <section class="content-header">
    <div class="col-md-12 mt-5">
      <div class="card-header bg-success text-white">
        <h4><b>Daftar Pengajuan Pra KP </b></h4>
    </section>
    <br> 
    <div class="row">
        <div class="col-md-6">
            <form method="post" enctype="multipart/form-data" action="{{ URL::to('/') }}/sikp/setPraKp">
                {{csrf_field()}}
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
                                    <th scope="col">Status Verifikasi</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Lembaga</th>
                                    <th scope="col">Dokumen Pra KP</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $dataPraKp)
                                <input type="hidden" name="idReg" value="{{ $dataPraKp->idReg }}">
                                    <tr>
                                        <td>
                                            <input type="hidden" name="idReg" value="{{$dataPraKp->idReg}}">
                                            <div class="form-group">
                                                <button type="submit" href="/sikp/setPraKp" name="terima" class="btn btn-success btn-sm" value="{{$dataPraKp->idReg}}"> Terima </button>
                                            
                                                <button type="submit" href="/sikp/setPraKp" name="tolak" class="btn btn-danger btn-sm" value="{{$dataPraKp->idReg}}"> Tolak </button>
                                            </div>
                                        </td>
                                        <td>{{$dataPraKp->nim}}</td>
                                        <td>{{$dataPraKp->namaMhs}}</td>
                                        <td>{{$dataPraKp->judul}}</td>
                                        <td>{{$dataPraKp->lembaga}}</td>
                                        <td>
                                            <a href="/sikp/openprakp/{{$dataPraKp->nim}}" target="_blank" class="btn btn-primary">
                                               View File <span class="glyphicon glyphicon-eye-open">
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
        </div>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4><b>Daftar Verifikasi Pengajuan Pra KP Mahasiswa</b></h4><br>
                        <table class="table table-striped table-hover table-responsive">
                            <thead class="table-success">
                                <tr align="center">
                                    <th style="width: 10px">No</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Dokumen Pra KP</th>
                                    <th scope="col">Status Verifikasi</th>
                                </tr>
                            </thead>
                            @php
                                $no = 1;    
                            @endphp
                            <tbody>
                                @foreach($dataStatus as $dataVer)
                                    @if($dataVer->statusPraKp == 1)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$dataVer->nim}}</td>
                                            <td>{{$dataVer->namaMhs}}</td>
                                            <td>{{$dataVer->judul}}</td>
                                            <td>
                                                <a href="/sikp/openprakp/{{$dataVer->nim}}" target="_blank" class="btn btn-primary">
                                                    View File <span class="glyphicon glyphicon-eye-open">
                                                </a>
                                            </td>
                                            <td>
                                                <span class="glyphicon glyphicon-ok-sign" style="color:green"> Diterima
                                            </td>
                                        </tr>
                                    @elseif($dataVer->statusPraKp == 2)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$dataVer->nim}}</td>
                                        <td>{{$dataVer->namMhs}}</td>
                                        <td>{{$dataVer->judul}}</td>
                                        <td>
                                            <a href="/sikp/openprakp/{{$dataVer->nim}}" target="_blank" class="btn btn-primary">
                                                View File <span class="glyphicon glyphicon-eye-open">
                                            </a>
                                        </td>
                                        <td>
                                            <span class="glyphicon glyphicon-remove-sign" style="color:red"> Ditolak
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
    </div>
@endsection