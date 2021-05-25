@extends('sikp.layout.mahasiswaLayout')
@section('konten')
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-5">
          <div class="card-header bg-secondary text-white">
        <h4><center>Jadwal Ujian KP</center></h4>
        @foreach($namaMhs as $nama_mhs)
          <h4>Nama : {{$nama_mhs->namaMhs}} </h4>
        @endforeach
        @foreach($nim as $nim_mhs)
          <h4>NIM : {{$nim_mhs->nim}} </h4> 
        @endforeach
        <br><br><br>
        <table class="table table-bordered border-primary">
          <thead class="table table-success table-striped">
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