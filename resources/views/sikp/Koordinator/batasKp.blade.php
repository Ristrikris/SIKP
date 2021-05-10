@extends('sikp.layout.koorLayout')
@section('konten')
    <section class="content-header">
        <h4><b>Pengaturan Batas Pelaksanaan Kerja Praktik</b></h4>
    </section>
    <br> 
    <div class="row">
        <div class="col-md-6">
            <h7><b>Nama Koordinator KP : </b></h7>
            {{auth()->user()->name}}<br>
            <h7><b>NIDN : </b></h7>
            @foreach($nidn as $nidn)
            {{$nidn->nidn}}
            @endforeach<br><br>
            <form method="post" action="{{ URL::to('/') }}/sikp/setBatas">
                {{csrf_field()}}
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
                    <div class="form-group">
                        <label for="exampleFormControlInput1"></label>  
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="aktif" value="1" checked>
                            <label class="form-check-label" for="inlineRadio1">Aktifkan</label>
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
        <div class="col-md-12 mt-5">
            <div class="card-header bg-success text-white">
          <h4>Batas Periode Pelaksanaan KP</h4>
            </div>
            <hr />         
            <table class="table table-striped table-hover table-responsive">
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
        <div>
    </div>
@endsection