@extends('sikp.layout.koorLayout')
@section('konten')
    <section class="content-header">
    <div class="card-header bg-success text-white">
        <h4><b>Daftar Pengajuan Surat Keterangan KP Mahasiswa</b></h4>
    </section>
    <br> 
    <div class="row">
        <div class="col-md-6">
            <form method="post" enctype="multipart/form-data" action="{{ URL::to('/') }}/sikp/setSurat">
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
                                    <th scope="col">Lembaga</th>
                                    <th scope="col">Dokumen Surat</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($surat as $dataSurat)
                            <input type="hidden" name="idReg" value="{{ $dataSurat->idReg }}">
                                <tr>
                                    <td>
                                        <input type="hidden" name="idReg" value="{{$dataSurat->idReg}}">
                                        <div class="form-group">
                                            <button type="submit" href="/sikp/setSurat" name="terima" class="btn btn-success btn-sm" value="{{$dataSurat->idReg}}">Setuju</button>
                                           
                                            
                                            <button type="submit" href="/sikp/setSurat" name="tolak" class="btn btn-danger btn-sm" value="{{$dataSurat->idReg}}">Tolak</button>
                                            
                                        </div>
                                    </td>
                                    <td>{{$dataSurat->nim}}</td>
                                    <td>{{$dataSurat->namaMhs}}</td>
                                    <td>{{$dataSurat->lembaga}}</td>
                                    <td>
                                        <a href="/sikp/opensurat/{{$dataSurat->nim}}" target="_blank" class="btn btn-primary">
                                            View File 
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
                    <h4><b>Daftar Verifikasi Pengajuan Surat Keterangan KP</b></h4><br>
                    <table class="table table-striped table-hover table-responsive">
                        <thead class="table-success">
                            <tr align="center">
                                <th style="width: 10px">No</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Lembaga</th>
                                <th scope="col">Dokumen Surat</th>
                                <th scope="col">Status Verifikasi</th>
                            </tr>
                        </thead>
                        @php
                            $no = 1;    
                        @endphp
                        <tbody>
                            @foreach($dataStatus as $dataVer)
                                @if($dataVer->statusSurat == 1)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$dataVer->nim}}</td>
                                        <td>{{$dataVer->namaMhs}}</td>
                                        <td>{{$dataVer->lembaga}}</td>
                                        <td>
                                            <a href="/sikp/opensurat/{{$dataVer->nim}}" target="_blank" class="btn btn-primary">
                                                View File 
                                            </a>
                                        </td>
                                        <td>
                                            <span  style="color:green"> Diterima
                                        </td>
                                    </tr>
                                     @elseif($dataVer->statusSurat == 2)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$dataVer->nim}}</td>
                                        <td>{{$dataVer->namaMhs}}</td>
                                        <td>{{$dataVer->lembaga}}</td>
                                        <td>
                                            <a href="/sikp/opensurat/{{$dataVer->nim}}" target="_blank" class="btn btn-primary">
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