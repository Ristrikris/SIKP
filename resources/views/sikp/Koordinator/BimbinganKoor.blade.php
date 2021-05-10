@extends('sikp.layout.koorLayout')
@section('konten')
    <section class="content-header">
    <div class="col-md-12 mt-5">
            <div class="card-header bg-success text-white">
        <h4><b>Daftar Bimbingan Kerja Praktik Mahasiswa</b></h4>
    </section>
    <br> 
    <div class="row">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h7><b>Nama Dosen : </b></h7>
                    {{auth()->user()->name}}<br>
                    <h7><b>NIDN : </b></h7>
                    @foreach($nidn as $nidnDosenLogin)
                    {{$nidnDosenLogin->nidn}}
                    @endforeach<br><br>  
                    <table class="table table-striped table-hover table-responsive">
                        <thead class="table-success">
                            <tr align="center">
                                <th scope="col">Pengajuan Ujian</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Lembaga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($nidn as $nidn_dosen)
                                @foreach($data as $bimbinganKp)
                                    @if($nidn_dosen->nidn == $bimbinganKp->nidn)
                                        @if($bimbinganKp->pengajuanUjian == '0')
                                            <tr>
                                                <td>
                                                    <form method="post" action="/sikp/{idKp}/{nim}/koorSetUjian">
                                                        {{csrf_field()}}
                                                        <a class="btn btn-success btn-sm" href="/sikp/{{$bimbinganKp->idKp}}/{{$bimbinganKp->nim}}/koorSetUjian">
                                                            Ajukan <span class="glyphicon glyphicon-ok"> 
                                                        </a>
                                                    </form>
                                                </td>
                                                <td>{{$bimbinganKp->nim}}</td>
                                                <td>{{$bimbinganKp->namaMhs}}</td>
                                                <td>{{$bimbinganKp->judul}}</td>
                                                <td>{{$bimbinganKp->lembaga}}</td>
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
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4><b>Daftar Status Pengajuan Ujian Mahasiswa</b></h4><br>
                    <table class="table table-striped table-hover table-responsive">
                        <thead class="table-success">
                            <tr align="center">
                                <th style="width: 10px">No</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Status Pengajuan Ujian</th>
                            </tr>
                        </thead>
                        @php
                            $no = 1;    
                        @endphp
                        <tbody>
                            @foreach($nidn as $nidn_dosen)
                                @foreach($dafPengajuan as $daftar)
                                    @if($daftar->nidn == $nidn_dosen->nidn)
                                        @if($daftar->pengajuanUjian == '1')
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$daftar->nim}}</td>
                                                <td>{{$daftar->namaMhs}}</td>
                                                <td>
                                                
                                                    <span class="glyphicon glyphicon-ok-sign" style="color:green"> Diterima 
                                                
                                                </td>
                                            </tr>
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            <div>
        </div>
    </div>
    </div>
    </div>
@endsection