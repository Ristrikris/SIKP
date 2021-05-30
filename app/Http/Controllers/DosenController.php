<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\mhs;
use DB;
use Session;
use Symfony\Component\Console\Input\Input;
use App\Post;

class DosenController extends Controller
{
    //
    public function getBimbinganKp()
    {
        $emailGoogle = auth()->user()->email;
        $nama_login = auth()->user()->name;
        $namaDosen = DB::table('dosen')->select('namaDosen')
            ->where('emailDosen', $emailGoogle)
            ->get();
        $nidn = DB::table('dosen')->select('nidn')
            ->where('emailDosen', $emailGoogle)
            ->orWhere('namaDosen', $nama_login)
            ->get();
        $ujian = DB::table('ujian')
            ->leftJoin('kp', 'ujian.idKp', '=', 'kp.idKp')
            ->get();
        $data = DB::table('registrasi')
            ->join('mahasiswa', 'mahasiswa.nim', '=', 'registrasi.nim')
            ->join('kp', 'registrasi.idReg', '=', 'kp.idReg')
            ->select(DB::raw('registrasi.nim,mahasiswa.namaMhs,registrasi.idReg,
            kp.judul,kp.lembaga,kp.nidn,kp.idKp,kp.pengajuanUjian'))
            ->get();
        $dafPengajuan = DB::table('ujian')
            ->join('kp', 'ujian.idKp', '=', 'kp.idKp')
            ->join('mahasiswa', 'ujian.nim', '=', 'mahasiswa.nim')
            ->select(DB::raw('ujian.idKp,ujian.nim,mahasiswa.namaMhs,kp.nidn,kp.pengajuanUjian'))
            ->get();
        return view('sikp.Dosen.daftarBimbinganDosen', [
            'nidn' => $nidn, 'namaDosen' => $namaDosen,
            'data' => $data, 'dafPengajuan' => $dafPengajuan, 'ujian' => $ujian
        ]);
    }

    public function getDataUjianKp()
    {
        //"Ini Untuk Dosen Hanya Melihat Daftar Ujian KP yang Dia Uji";
        $emailGoogle = auth()->user()->email;
        $namaDosen = DB::table('dosen')->select('namaDosen')
            ->where('emailDosen', $emailGoogle)
            ->get();
        $nidn = DB::table('dosen')->select('nidn')
            ->where('emailDosen', $emailGoogle)
            ->get();
        $dafUjian = DB::table('ujian')
            ->join('kp', 'ujian.idKp', '=', 'kp.idKp')
            ->join('mahasiswa', 'ujian.nim', '=', 'mahasiswa.nim')
            ->join('dosen', 'ujian.nidn', '=', 'dosen.nidn')
            ->join('ruang', 'ujian.idRuang', '=', 'ruang.idRuang')
            ->select(DB::raw('ujian.idKp,ujian.nim,ujian.idRuang,kp.nidn,
                ruang.namaRuang,dosen.namaDosen,ujian.tglUjian,ujian.jamUjian,
                mahasiswa.namaMhs,kp.judul,kp.lembaga'))
            ->get();
        $dafPenguji = DB::table('ujian')
            ->join('kp', 'ujian.idKp', '=', 'kp.idKp')
            ->join('mahasiswa', 'ujian.nim', '=', 'mahasiswa.nim')
            ->join('dosen', 'kp.nidn', '=', 'dosen.nidn')
            ->join('ruang', 'ujian.idRuang', '=', 'ruang.idRuang')
            ->select(DB::raw('ujian.idKp, ujian.nim, ujian.idRuang, ujian.nidn,
                ruang.namaRuang, dosen.namaDosen, ujian.tglUjian, ujian.jamUjian,
                mahasiswa.namaMhs,kp.judul,kp.lembaga'))
            ->get();
        return view('sikp.Dosen.daftarUjianDosen', ['nidn' => $nidn, 'namaDosen' => $namaDosen, 'dafUjian' => $dafUjian, 'dafPenguji' => $dafPenguji]);
    }
    //

    //
    public function setUjian($idKp, $nim)
    {
        $id = DB::table('ujian')->insertGetId([
            'idKp' => $idKp,
            'nim' => $nim
        ]);
        $pengajuan = DB::table('kp')
            ->where('idKp', $idKp)
            ->update(['pengajuanUjian' => 1]);
        return redirect('/menu/bimbingan_kp');
    }
    //
    
}
