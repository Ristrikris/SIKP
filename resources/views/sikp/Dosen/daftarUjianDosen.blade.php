@extends('sikp.layout.dosenLayout')
@section('konten')
    <section class="content-header">
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
                    <table class="table table-bordered border-primary">
                        <thead class="table-primary">
                            <tr align="center">
                                <th style="width: 10px">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Jam</th>
                                <th scope="col">Ruangan</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Judul</th>
                            </tr>
                        </thead>
                        @php
                            $no = 1;    
                        @endphp
                        <tbody>
                            @foreach($nidn as $nidnDosBim)
                                @foreach($dafUjian as $daftar)
                                    @if($nidnDosBim->nidn == $daftar->nidn)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$daftar->tglUjian}}</td>
                                            <td>{{$daftar->jamUjian}}</td>
                                            <td>{{$daftar->namaRuang}}</td>
                                            <td>{{$daftar->nim}}</td>
                                            <td>{{$daftar->namaMhs}}</td>
                                            <td>{{$daftar->judul}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                    <h5><b></b></h5>
                    <table class="table table-bordered border-primary">
                        <thead class="table-primary">
                            <tr align="center">
                                <th style="width: 10px">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Jam</th>
                                <th scope="col">Ruangan</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Judul</th>
                            </tr>
                        </thead>
                        @php
                            $no = 1;    
                        @endphp
                        <tbody>
                            @foreach($nidn as $nidnPenguji)
                                @foreach($dafPenguji as $daftarPenguji)
                                    @if($nidnPenguji->nidn == $daftarPenguji->nidn)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$daftarPenguji->tglUjian}}</td>
                                            <td>{{$daftarPenguji->jamUjian}}</td>
                                            <td>{{$daftarPenguji->namaRuang}}</td>
                                            <td>{{$daftarPenguji->nim}}</td>
                                            <td>{{$daftarPenguji->nama}}</td>
                                            <td>{{$daftarPenguji->judul}}</td>
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