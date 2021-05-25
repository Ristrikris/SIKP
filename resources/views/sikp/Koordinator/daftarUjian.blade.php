@extends('sikp.layout.koorLayout')
@section('konten')
    <section class="content-header">
    <div class="col-md-12 mt-5">
            <div class="card-header bg-success text-white">
        <h4><b>Daftar Ujian Kerja Praktik</b></h4>
    </section>
    <br> 
    <div class="row">
        <div class="col-md">
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
                                <th style="width: 10px">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Jam</th>
                                <th scope="col">Ruangan</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Lembaga</th>
                                <th scope="col">Dosen Penguji</th>
                            </tr>
                        </thead>
                        @php
                            $no = 1;    
                        @endphp
                        <tbody>
                            @foreach($nidn as $nidnDosbing)
                                @foreach($dafUjian as $daftar)
                                    @if($nidnDosbing->nidn == $daftar->nidn)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$daftar->tglUjian}}</td>
                                            <td>{{$daftar->jamUjian}}</td>
                                            <td>{{$daftar->namaRuang}}</td>
                                            <td>{{$daftar->nim}}</td>
                                            <td>{{$daftar->namaMhs}}</td>
                                            <td>{{$daftar->judul}}</td>
                                            <td>{{$daftar->lembaga}}</td>
                                            <td>{{$daftar->namaDosen}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection