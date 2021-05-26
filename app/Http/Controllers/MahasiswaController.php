<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use \App\rpl;
use Symfony\Component\Console\Input\Input;
use App\Post;

class MahasiswaController extends Controller
{
    // public function home()
    // {
    //     return view('sikp.mhs.home');
    // }

    

    //
    public function tambahSurat(Request $request)
    {
        $idPeriode = DB::table('periode')->select('idPeriode')
            ->where('semester', $request->semester)
            ->where('tahun', $request->tahun)
            ->get();

        $data = new rpl;
        if ($request->file('dokumenSurat')) {
            $file = $request->file('dokumenSurat');
            $nim = $request->nim;
            $ext = $file->getClientOriginalExtension();
            $nama_file = $request->nim . "." . $file->getClientOriginalExtension();
            $path = 'suratKeterangan';
            $file->getMimeType();
            $file->move($path, $nama_file);
            $data->file = $nama_file;
        }
        $id = DB::table('registrasi')->insertGetId(
            [
                'nim' => $request->nim,
                'idPeriode' => $idPeriode[0]->idPeriode,
                'semester' => $request->semester,
                'tahun' => $request->tahun
            ]
        );

        $surat = DB::table('surat')->insert(
            [
                'lembaga' => $request->lembaga,
                'idReg' => $id,
                'pimpinan' => $request->pimpinan,
                'noTelp' => $request->noTelp,
                'alamat' => $request->alamat,
                'fax' => $request->fax,
                'dokumenSurat' => $data->file
            ]
        );

        return redirect('sikp/suratKet')->with('sukses', 'Pengajuan surat berhasil ditambahkan!');
    }

    public function tambahPengajuanKp(Request $request)
    {
        $idPeriode = DB::table('periode')->select('idPeriode')
            ->where('semester', $request->semester)
            ->where('tahun', $request->tahun)
            ->get();

        //upload file
        $data = new rpl;
        if ($request->file('dokumenKp')) {
            $file = $request->file('dokumenKp');
            $nim = $request->nim;
            $ext = $file->getClientOriginalExtension();
            $filename = $request->nim . "." . $file->getClientOriginalExtension();
            $path = 'dokumenPengajuanKp';
            $file->move($path, $filename);
            $data->file = $filename;
        }

        // untuk mendapatkan idReg
        $idReg = DB::table('registrasi')->insertGetId([
            'nim' => $request->nim,
            'idPeriode' => $idPeriode[0]->idPeriode,
            'semester' => $request->semester,
            'tahun' => $request->tahun
        ]);

        // insert data ke table Kp
        DB::table('kp')->insert([
            'idReg' => $idReg,
            'judul' => $request->judul,
            'tools' => $request->tools,
            'spesifikasi' => $request->spesifikasi,
            'lembaga' => $request->lembaga,
            'pimpinan' => $request->pimpinan,
            'noTelp' => $request->noTelp,
            'alamat' => $request->alamat,
            'fax' => $request->fax,
            'dokumenKp' => $data->file
        ]);
        return redirect('/sikp/pengajuanKp')->with('sukses', 'Pengajuan KP berhasil ditambahkan!');
    }

    public function tambahPengajuanPraKp(Request $request)
    {
        $idPeriode = DB::table('periode')->select('idPeriode')
            ->where('semester', $request->semester)
            ->where('tahun', $request->tahun)
            ->get();

        $data = new rpl;
        if ($request->file('dokumenPraKp')) {
            $file = $request->file('dokumenPraKp');
            $nim = $request->nim;
            $ext = $file->getClientOriginalExtension();
            $nama_file = $request->nim . "." . $file->getClientOriginalExtension();
            $path = 'dokumenPraKp';
            $file->move($path, $nama_file);
            $data->file = $nama_file;
        }
        $id = DB::table('registrasi')->insertGetId(
            [
                'nim' => $request->nim,
                'idPeriode' => $idPeriode[0]->idPeriode,
                'semester' => $request->semester,
                'tahun' => $request->tahun
            ]
        );

        $prakp = DB::table('praKp')->insert(
            [
                'judul' => $request->judul,
                'idReg' => $id,
                'tools' => $request->tools,
                'spesifikasi' => $request->spesifikasi,
                'lembaga' => $request->lembaga,
                'pimpinan' => $request->pimpinan,
                'noTelp' => $request->noTelp,
                'alamat' => $request->alamat,
                'fax' => $request->fax,
                'dokumenPraKp' => $data->file
            ]
        );
        return redirect('sikp/pengajuanPraKp')->with('sukses', 'Pengajuan berhasil ditambahkan!');
    }
    //


    //
    public function getPengajuanKp()
    {
        $emailGoogle = auth()->user()->email;
        $namaMhs = auth()->user()->name;
        $nim_login = DB::table('mahasiswa')->select('nim')
            ->where('namaMhs', $namaMhs)
            ->orWhere('emailMhs', $emailGoogle)
            ->get();
        $dosenPembimbing = DB::table('dosen')
            ->join('kp', 'kp.nidn', '=', 'dosen.nidn')
            ->select(DB::raw('dosen.namaDosen, dosen.nidn'))
            ->distinct()
            ->get();
        $perAktif = DB::table('periode')
            ->select('tahun', 'semester', 'aktif')
            ->where('aktif', '1')
            ->get();
        $kp = DB::table('registrasi')
            ->join('kp', 'kp.idReg', '=', 'registrasi.idReg')
            ->join('periode', 'periode.idPeriode', '=', 'registrasi.idPeriode')
            ->select(DB::raw('registrasi.nim, kp.lembaga, kp.judul, kp.statusUjianKp, 
                kp.nidn,registrasi.idPeriode,periode.aktif,registrasi.idReg'))
            ->orderBy('registrasi.idReg')
            ->get();
        return view('sikp.Mahasiswa.pengajuanKP', [
            'kp' => $kp, 'nim_login' => $nim_login,
            'dosenPembimbing' => $dosenPembimbing, 'perAktif' => $perAktif
        ]);
    }

    public function getJadwal()
    {
        $emailGoogle = auth()->user()->email;
        $namaMhs = DB::table('mahasiswa')->select('namaMhs')
            ->where('emailMhs', $emailGoogle)
            ->get();
        $nim = DB::table('mahasiswa')->select('nim')
            ->where('emailMhs', $emailGoogle)
            ->get();
        $ujian = DB::table('ujian')
            ->join('ruang', 'ujian.idRuang', '=', 'ruang.idRuang')
            ->join('dosen', 'ujian.nidn', '=', 'dosen.nidn')
            ->select(DB::raw('ujian.idUjian, ujian.idRuang, ujian.nidn, ruang.namaRuang, dosen.namaDosen,
                ujian.jamUjian, ujian.tglUjian'))
            ->orderBy('ujian.tglUjian')
            ->get();
        $dosenPembimbing = DB::table('kp')
            ->join('dosen', 'dosen.nidn', '=', 'kp.nidn')
            ->join('ujian', 'ujian.idKp', '=', 'kp.idKp')
            ->select(DB::raw('kp.idKp, kp.nidn, kp.judul, dosen.namaDosen'))
            ->get();
        return view('sikp.Mahasiswa.jadwalUjian', ['nim' => $nim, 'namaMhs' => $namaMhs, 'ujian' => $ujian, 
            'dosenPembimbing' => $dosenPembimbing]);
    }

    public function getSurat()
    {
        $emailGoogle = auth()->user()->email;
        $namaMhs = auth()->user()->name;
        $nim_login = DB::table('mahasiswa')->select('nim')
            ->where('namaMhs', $namaMhs)
            ->orWhere('emailMhs', $emailGoogle)
            ->get();
        $dosenPembimbing = DB::table('dosen')
            ->join('kp', 'kp.nidn', '=', 'dosen.nidn')
            ->select(DB::raw('dosen.namaDosen, dosen.nidn'))
            ->get();
        $perAktif = DB::table('periode')
            ->select('tahun', 'semester', 'aktif')
            ->where('aktif', '1')
            ->get();
        $data = DB::table('registrasi')
            ->join('surat', 'surat.idReg', '=', 'registrasi.idReg')
            ->join('periode', 'periode.idPeriode', '=', 'registrasi.idPeriode')
            ->select(DB::raw('registrasi.idReg, registrasi.idPeriode,periode.aktif,
                registrasi.nim, registrasi.semester, surat.lembaga, surat.statusSurat, surat.alamat'))
            ->orderBy('registrasi.idReg')
            ->get();
        return view('sikp.Mahasiswa.suratKeteranganMhs', [
            'data' => $data, 'nim_login' => $nim_login,
            'dosenPembimbing' => $dosenPembimbing, 'perAktif' => $perAktif
        ]);
    }

   
    public function getPengajuanPraKp()
    {
        $emailGoogle = auth()->user()->email;
        $namaMhs = auth()->user()->name;
        $nim_login = DB::table('mahasiswa')->select('nim')
            ->where('namaMhs', $namaMhs)
            ->orWhere('emailMhs', $emailGoogle)
            ->get();
        $dosenPembimbing = DB::table('dosen')
            ->join('kp', 'kp.nidn', '=', 'dosen.nidn')
            ->select(DB::raw('dosen.namaDosen, dosen.nidn'))
            ->get();
        $perAktif = DB::table('periode')
            ->select('tahun', 'semester', 'aktif')
            ->where('aktif', '1')
            ->get();
        $data = DB::table('registrasi')
            ->join('praKp', 'praKp.idReg', '=', 'registrasi.idReg')
            ->join('periode', 'periode.idPeriode', '=', 'registrasi.idPeriode')
            ->select(DB::raw('registrasi.nim, praKp.judul, praKp.lembaga, praKp.alamat,praKp.noTelp,praKp.statusPraKp,
                registrasi.idPeriode,periode.aktif,registrasi.idReg'))
            ->orderBy('registrasi.idReg')
            ->get();
        return view('sikp.Mahasiswa.pengajuanPraKp', [
            'data' => $data, 'nim_login' => $nim_login,
            'dosenPembimbing' => $dosenPembimbing, 'perAktif' => $perAktif
        ]);
    }

    
}
