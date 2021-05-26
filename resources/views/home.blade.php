@extends('sikp.layout.mahasiswaLayout')
@section('konten')
<div class="container mt-5 mb-5 d-flex justify-content-center">
    <div class="card rounded">
        <div class=" d-block justify-content-center">
            <div class="area1 "> </div>
            <div class="area2 p- text-center">
<section class="content-header">
    <h3><b>Selamat Datang, Mahasiswa</b></h3>
    @if(auth()->user()->photo)
    <div class="image mr-3"> <img src="{{ auth()->user()->photo }}" alt="photo" height="150" width="150" class="rounded-circle">
    @endif
    <form method="post" action="#">
            <tbody>
                <tr>
                    <td><h4> {{ auth()->user()->name }}</h4> </td>
                </tr>
                @foreach($nim as $nim_mhs)
                <tr>
                    <td>{{$nim_mhs->nim}}</td>
                </tr>
                @endforeach
       <br>
    </div>
</div>
</div>
</section>
</div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection