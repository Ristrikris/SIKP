<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Symfony\Component\Console\Input\Input;
use App\Post;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $emailGoogle = auth()->user()->email;
        $nim = DB::table('mahasiswa')->select('nim')
            ->where('emailMhs', $emailGoogle)
            ->get();
        $nidn = DB::table('dosen')->select('nidn')
            ->where('emailDosen', $emailGoogle)
            ->get();
        $users = DB::table('dosen')->where('emailDosen', $emailGoogle)->value('status');
        $email = DB::table('mahasiswa')->where('emailMhs', $emailGoogle)->value('emailMhs');

        if ($contains = Str::contains($emailGoogle, 'si.ukdw.ac.id') && $email == "") {
            return view('sikp.Mahasiswa.registrasi');
        } else if ($contains = Str::contains($emailGoogle, 'si.ukdw.ac.id') && $email != "") {
            return view('home', ['nim' => $nim]);
        } else if ($contains = Str::contains($emailGoogle, 'gmail.com') && $users== "0") {
            return view('homeDosen', ['nidn' => $nidn]);
        } else if ($contains = Str::contains($emailGoogle, 'gmail.com')&& $users== "1" ) {
            return view('homeKoordinator', ['nidn' => $nidn]);
        } 
    }


    public function setNim(Request $request)
    {
        $emailMhs = auth()->user()->email;
        $namaMhs = auth()->user()->name;
        DB::table('mahasiswa')->insert([
            'nim' => $request->nim,
            'namaMhs' => $namaMhs,
            'emailMhs' => $emailMhs
        ]);
        return redirect()->route('home');
    }

    public function index_dosen()
    {
        $emailGoogle = auth()->user()->email;
        $nidn = DB::table('dosen')->select('nidn')
            ->where('emailDosen', $emailGoogle)
            ->get();
        return view('homeDosen', ['nidn' => $nidn]);
    }

    public function index_koor()
    {
        $emailGoogle = auth()->user()->email;
        $nidn = DB::table('dosen')->select('nidn')
            ->where('emailDosen', $emailGoogle)
            ->get();
        return view('homeKoordinator', ['nidn' => $nidn]);
    }

    public function log()
    {
        return view('login');
    }
}
