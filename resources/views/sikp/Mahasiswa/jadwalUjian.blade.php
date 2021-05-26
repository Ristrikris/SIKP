@extends('sikp.layout.mahasiswaLayout')
@section('konten')
<h4><center>Jadwal Ujian KP</center></h4>
<div class="container mt-5 mb-5 d-flex justify-content-center">
  <div class="card rounded">
      <div class=" d-block justify-content-center">
          <div class="area1 "> </div>
          <div class="area2 p-">
        @foreach($namaMhs as $nama_mhs)
          <h4>{{$nama_mhs->namaMhs}} </h4>
        @endforeach
        @foreach($nim as $nim_mhs)
          <h4>{{$nim_mhs->nim}} </h4> 
        @endforeach
        <br><br><br>
        <table class="table table-bordered border-primary">
          <thead class="table table-primary table-striped">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Jam</th>
              <th scope="col">Ruang</th>
              <th scope="col">Judul</th>
              <th scope="col">Dosen Pembimbing</th>
              <th scope="col">Dosen Penguji</th>
            </tr>
          </thead>
          @php
            $no = 1;
          @endphp
          <tbody>
            @foreach($ujian as $u)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$u->tglUjian}}</td>
              <td>{{$u->jamUjian}}</td>
              <td>{{$u->namaRuang}}</td>
              @foreach($dosenPembimbing as $dosen)
                <td>{{$dosen->judul}}</td>
                <td>{{$dosen->namaDosen}}</td>
              @endforeach
              <td>{{$u->namaDosen}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection