@extends('sikp.layout.koorLayout')
@section('konten')
    <section class="content-header">
        <h4><b><center>Pengaturan Set Batas Pelaksanaan KP</center></b></h4>
    </section>
    <br> 
    <div class="row">
        <div class="col-md">
            <h7><b>Nama Koordinator KP : </b></h7>
            {{auth()->user()->name}}<br>
            <h7><b>NIDN : </b></h7>
            @foreach($nidn as $nidn)
            {{$nidn->nidn}}
            @endforeach<br><br>
            <form method="post" action="{{ URL::to('/') }}/sikp/setBatas">
                {{csrf_field()}}
                <div class="col-md-12 mt-5">
                    <div class="card-header bg-primary text-white">
                  <h4><center>Batas Periode Pelaksanaan KP</center></h4>
                    </div>
                    <hr />         
                    <table class="table table-bordered border-primary">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Semester</th>
                                <th>Tahun</th>
                                <th>Tanggal Mulai Pelaksanaan KP</th>
                                <th>Tanggal Batas Pelaksanaan KP</th>
                                <th style="width: 100px">Status</th>
                            </tr>
                        </thead>
                        @php
                            $no = 1;    
                        @endphp
                        <tbody>
                            @foreach($aktif as $batas_aktif)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $batas_aktif->semester }}</td>
                                <td>{{ $batas_aktif->tahun }}</td>
                                <td>{{ $batas_aktif->mulaiKp }}</td>
                                <td>{{ $batas_aktif->akhirKp }}</td>
                                <td>
                                @if($batas_aktif->aktif == '0')
                                    <span class="glyphicon glyphicon-remove-sign" style="color:red"> Non-Aktif 
                                @endif
        
                                @if($batas_aktif->aktif == '1')
                                    <span class="glyphicon glyphicon-ok-sign" style="color:green"> Aktif 
                                @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="container">
                        <div class="row d-flex justify-content-center mt-200"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Aktifkan Status</button> </div> <!-- Modal -->
                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Pengajuan Aktivasi Surat Keterangan KP</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                      </div>
                                      <div class="modal-body">
                                        <div id="smartwizard">
                <div class="box-body">
                    <div class="form-row">
                        <div class="form-group col-sm">
                            <label for="exampleFormControlSelect1">Semester : </label>
                            <select class="form-control" name="semester" style="width: 50%">
                            <option value="Gasal">Gasal</option>
                            <option value="Genap">Genap</option>
                            </select>
                        </div>
                        <div class="form-group col-sm">
                            <label for="exampleFormControlInput1">Tahun : </label>
                            <input type="text" class="form-control" name="tahun" style="width: 50%" placeholder="yyyy">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Tanggal Batas Pelaksanaan KP : </label>
                        <input type="date" class="form-control" name="akhirKp"style="width: 25%">
                    </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">
                            Submit 
                        </button>
                    </div>
                </div>
            </form>
        </div>
        
        <div>
    </div>
@endsection