@extends('sikp.layout.mahasiswaLayout')
@section('konten')
<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
<section class="content-header">
    <h3><b>Selamat Datang, Mahasiswa</b></h3>
                    @if(auth()->user()->photo)
                    <br><img src="{{ auth()->user()->photo }}" alt="photo" height="150" width="150" class="rounded-circle"><br><br>
                    @endif
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