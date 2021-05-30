@extends('sikp.layout.koorLayout')
@section('konten')
    <section class="content-header">
    <div class="card-header bg-primary text-white">
        <h4><b><center>Daftar Pengajuan Surat Keterangan KP Mahasiswa</center></b></h4>
    </section>
    <br> 
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
                        <table class="table table-bordered border-primary">
                            <thead class="table-primary">
                                <tr align="center">
                                    <th scope="col">NIM</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Lembaga</th>
                                    <th scope="col">Dokumen Surat</th>
                                    <th scope="col">Status Verifikasi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($surat as $dataSurat)
                            <input type="hidden" name="idReg" value="{{ $dataSurat->idReg }}">
                                <tr>
                                    <td>{{$dataSurat->nim}}</td>
                                    <td>{{$dataSurat->namaMhs}}</td>
                                    <td>{{$dataSurat->lembaga}}</td>
                                    <td>
                                        <a href="/sikp/opensurat/{{$dataSurat->nim}}" target="_blank" class="btn btn-primary">
                                            View File 
                                        </a>
                                        <td>
                                            <input type="hidden" name="idReg" value="{{$dataSurat->idReg}}">
                                            <div class="form-group">
                                                <button type="submit" href="/sikp/setSurat" name="terima" class="btn btn-success btn-sm" value="{{$dataSurat->idReg}}">Setuju</button>
                                                <button type="submit" href="/sikp/setSurat" name="tolak" class="btn btn-danger btn-sm" value="{{$dataSurat->idReg}}">Tolak</button>
                                                
                                            </div>
                                        </td>
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
    <div class="container">
        <div class="row d-flex justify-content-center mt-200"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">List Verifikasi Status Surat</button> </div> <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Daftar Verifikasi Status Surat Keterangan</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                      </div>
                      <div class="modal-body">
                        <div id="smartwizard">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4><b><center>Daftar Verifikasi Pengajuan Surat Keterangan KP</center></b></h4><br>
                    <table class="table table-bordered border-primary">
                        <thead class="table-primary">
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
                                            <span  style="color:green"><h4><center>Diterima</center></h4>
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