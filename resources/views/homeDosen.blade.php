@extends('sikp.layout.dosenLayout')
@section('konten')
<div class="container mt-5 mb-5 d-flex justify-content-center">
    <div class="card rounded">
        <div class=" d-block justify-content-center">
            <div class="area1 "> </div>
            <div class="area2 p- text-center">
<section class="content-header">
    <h3><b>Selamat Datang, Dosen</b></h3>
                 @if(auth()->user()->photo)
                <br><img src="{{ auth()->user()->photo }}" alt="photo" height="150" width="150" class="rounded-circle"><br><br>
                @endif
                </div>
                <div class="d-flex justify-content-center">
                <form method="post" action="#">
                        <tbody>
                            <tr>
                                <td><h4> {{ auth()->user()->name }}</h4> </td>
                            </tr>
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