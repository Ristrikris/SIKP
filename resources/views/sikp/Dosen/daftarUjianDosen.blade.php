@extends('sikp.layout.dosenLayout')
@section('konten')
    <section class="content-header">
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
                    <h5><b></b></h5>
                    <h4><b><center>Daftar Ujian Kerja Praktik</center></b></h4>
                    <table class="table table-bordered border-primary">
                        <thead class="table-primary">
                            <tr align="center">
                                <th style="width: 10px">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Jam</th>
                                <th scope="col">Ruangan</th>
                                <th scope="col">NIM</th>
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