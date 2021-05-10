@extends('sikp.layout.koorLayout')
@section('konten')
<section class="content-header">
    <h4><b>Pengaturan Ujian Kerja Praktik</b></h4>
</section>
<br>
<div class="row">
    <div class="col-md">
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
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Dosen Pembimbing</th>
                            <th scope="col">Dosen Penguji</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Jam</th>
                            <th scope="col">Ruangan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach($data as $dataUjian)
                            @if($dataUjian->nidn == null)
                            <form method="post" id="masuk" enctype="multipart/form-data" action="{{ URL::to('/') }}/sikp/setUjian">
                                {{csrf_field()}}
                                <fieldset disabled>
                                    <div class="form-row">
                                        <div class="col-7">
                                            <?php
                                            $idUjian = $dataUjian->idUjian;
                                            ?>
                                            <input type="hidden" name="idUjian" value="{{$idUjian}}">
                                            <td><input type="text" name="nim" value="{{$dataUjian->nim}}" class="form-control" readonly></td>
                                            <td><input type="text" name="nama" value="{{$dataUjian->namaMhs}}" class="form-control" disabled></td>
                                            <td><input type="text" name="judul" value="{{$dataUjian->judul}}" class="form-control" disabled></td>
                                            <td><input type="text" name="namaDosen" value="{{$dataUjian->namaDosen}}" class="form-control" disabled></td>
                                        </div>
                                    </div>
                                </fieldset>
                                <td>
                                    <select class="custom-select-lg" name="nidn" required>
                                        @foreach($dosenPenguji as $dosen)
                                        <option value="{{$dosen->nidn}}">{{$dosen->namaDosen}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="date" class="form-control" name="tglUjian" required="required">
                                </td>
                                <td>
                                    <input type="time" class="form-control" name="jamUjian" required="required">
                                </td>
                                <td>
                                    <select class="custom-select-lg" name="ruang" id="ruangan" required>
                                        @foreach($dataRuangan as $ruang)
                                        @php $idRuang = $ruang->idRuang @endphp
                                        <option value="{{$idRuang}}">{{$ruang->namaRuang}}</option>
                                        @endforeach
                                    </select>

                                </td>
                                <td>
                                    <button type="submit" href="/sikp/setSurat" name="input" class="btn btn-primary btn-sm" value="{{$idUjian}}">
                                        <span>Submit</span>
                                </td>
                        </tr>
                        </form>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection