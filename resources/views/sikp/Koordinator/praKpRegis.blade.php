@extends('sikp.layout.koorLayout')
@section('konten')
    <section class="content-header">
      <div class="card-header bg-primary text-white">
        <h4><b><center>Daftar Pengajuan Pra KP </center></b></h4>
    </section>
    <br> 
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
                        <table class="table table-bordered border-primary">
                            <thead class="table-primary">
                                <tr align="center">
                                    <th scope="col">NIM</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Lembaga</th>
                                    <th scope="col">Dokumen Pra KP</th>
                                    <th scope="col">Status Verifikasi</th>
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
        <div class="container">
            <div class="row d-flex justify-content-center mt-200"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">List Verifikasi Status Pra KP </button> </div> <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Daftar Verifikasi Pengajuan Pra KP Mahasiswan</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                          </div>
                          <div class="modal-body">
                            <div id="smartwizard">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4><b><center>Daftar Verifikasi Pengajuan Pra KP Mahasiswa</center></b></h4><br>
                        <table class="table table-bordered border-primar">
                            <thead class="table-primary">
                                <tr align="center">
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