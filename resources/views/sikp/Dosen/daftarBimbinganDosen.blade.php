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
                    <h4><b><center>Daftar Bimbingan Kerja Praktik Mahasiswa</center></b></h4>
                    <table class="table table-bordered border-primary">
                        <thead class="table-primary">
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
                                                    <form method="post" action="/sikp/{idKp}/{nim}/setUjian">
                                                        {{csrf_field()}}
                                                        <a class="btn btn-success btn-sm" href="/sikp/{{$bimbinganKp->idKp}}/{{$bimbinganKp->nim}}/setUjian">
                                                            Ajukan Ujian <span class="glyphicon glyphicon-ok"> 
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
        </div>
        <div class="container">
            <div class="row d-flex justify-content-center mt-200"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Daftar Pengajuan Surat Ujian</button> </div> <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Daftar Pengajuan Ujia</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                          </div>
                          <div class="modal-body">
                            <div id="smartwizard">
                    <h4><b>Daftar Pengajuan Ujian Mahasiswa</b></h4><br>
                    <table class="table table-bordered border-primary">
                        <thead class="table-primary">
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