<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\mhs;
use DB;
use Session;
use Symfony\Component\Console\Input\Input;
use App\Post;
use Carbon;

class KoorController extends Controller
{
    
    public function pengajuanUjian($idKp, $nim){
        $id = DB::table('ujian')->insertGetId([
            'idKp' => $idKp,
            'nim' => $nim
        ]);
        $pengajuan = DB::table('kp')
            ->where('idKp', $idKp)
            ->update(['pengajuanUjian' => 1]);
        return redirect('/sikp/BimbinganKoor');
    }

    public function setUjian(Request $request)
    {
        //Simpan Jadwal Ujian
        $idUjian = $request->input;
        $ruang = $request->ruang;
        $nidn = $request->nidn;
        $tgl = $request->tglUjian;
        $jam = $request->jamUjian;

        $ujian = DB::table('ujian')
            ->where('idUjian', $idUjian)
            ->update(
                [
                    'idRuang' => $ruang,
                    'nidn' => $nidn,
                    'tglUjian' => $tgl,
                    'jamUjian' => $jam
                ]
            );
        return redirect('/sikp/set_ujian')->with(['sukses' => 'Selamat, Data Ujian Berhasil Disimpan!']);
    }

    //
    public function getRegisPraKpKoor()
    {
        $emailGoogle = auth()->user()->email;
        $namaDosen = DB::table('dosen')->select('namaDosen')
            ->where('emailDosen', $emailGoogle)
            ->get();
        $nidn = DB::table('dosen')->select('nidn')
            ->where('emailDosen', $emailGoogle)
            ->get();

        $nidnDosBim = DB::table('dosen')->select('nidn', 'namaDosen')->get();

    
        $data = DB::table('registrasi')
            ->join('mahasiswa', 'mahasiswa.nim', '=', 'registrasi.nim')
            ->join('kp', 'kp.idReg', '=', 'registrasi.idReg')
            ->join('periode', 'periode.idPeriode', '=', 'registrasi.idPeriode')
            ->select(
                'registrasi.idReg',
                'registrasi.nim',
                'mahasiswa.namaMhs',
                'kp.idKp',
                'kp.judul',
                'kp.lembaga',
                'periode.aktif'
            )
            ->where([
                ['kp.statusUjianKp', '=', '0'],
                ['periode.aktif', '=', '1']
            ])
            ->get();

        $perAktif = DB::table('periode')
            ->select('tahun', 'semester')
            ->where('aktif', '1')
            ->get();

        $dataStatus = DB::table('registrasi')
            ->join('mahasiswa', 'mahasiswa.nim', '=', 'registrasi.nim')
            ->join('kp', 'kp.idReg', '=', 'registrasi.idReg')
            ->join('periode', 'periode.idPeriode', '=', 'registrasi.idPeriode')
            ->select('registrasi.nim', 'mahasiswa.namaMhs', 'kp.judul', 'kp.statusUjianKp', 'periode.aktif')
            ->where([
                ['kp.statusUjianKp', '=', '1'],
                ['periode.aktif', '=', '1']
            ])
            ->orWhere([
                ['kp.statusUjianKp', '=', '2'],
                ['periode.aktif', '=', '1']
            ])
            ->get();

        return view('sikp.Koordinator.kpRegis', ['nidn' => $nidn, 'namaDosen' => $namaDosen, 'nidnDosbim' => $nidnDosBim, 'data' => $data, 'dataStatus' => $dataStatus]);
    }

    public function getBimbinganKpKoor()
    {
        //Melihat Daftar Bimbingan dan Pengajuan
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
        return view('sikp.Koordinator.BimbinganKoor', [
            'nidn' => $nidn, 'namaDosen' => $namaDosen,
            'data' => $data, 'dafPengajuan' => $dafPengajuan, 'ujian' => $ujian
        ]);
    }


    public function getUjianKoor()
    {
        //Lihat Daftar Ujian KP
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
        return view('sikp.Koordinator.daftarUjian', ['nidn' => $nidn, 'namaDosen' => $namaDosen, 'dafUjian' => $dafUjian, 'dafPenguji' => $dafPenguji]);
    }

    public function getRegisKp()
    {
        //Lihat Regis Pra KP + Validasi
        $emailGoogle = auth()->user()->email;
        $namaDosen = DB::table('dosen')->select('namaDosen')
            ->where('emailDosen', $emailGoogle)
            ->get();
        $nidn = DB::table('dosen')->select('nidn')
            ->where('emailDosen', $emailGoogle)
            ->get();

      
        $data = DB::table('registrasi')
            ->join('mahasiswa', 'mahasiswa.nim', '=', 'registrasi.nim')
            ->join('prakp', 'prakp.idReg', '=', 'registrasi.idReg')
            ->join('periode', 'periode.idPeriode', '=', 'registrasi.idPeriode')
            ->select(
                'registrasi.idReg',
                'registrasi.nim',
                'registrasi.idPeriode',
                'mahasiswa.namaMhs',
                'prakp.idPraKp',
                'prakp.judul',
                'prakp.lembaga',
                'prakp.dokumenPraKp',
                'periode.aktif'
            )
            ->where([
                ['prakp.statusPraKp', '=', '0'],
                ['periode.aktif', '=', '1']
            ])
            ->get();

        $dataStatus = DB::table('registrasi')
            ->join('mahasiswa', 'mahasiswa.nim', '=', 'registrasi.nim')
            ->join('prakp', 'prakp.idReg', '=', 'registrasi.idReg')
            ->join('periode', 'periode.idPeriode', '=', 'registrasi.idPeriode')
            ->select(
                'registrasi.nim',
                'mahasiswa.namaMhs',
                'prakp.judul',
                'prakp.statusPraKp',
                'prakp.dokumenPraKp',
                'periode.aktif'
            )
            ->where([
                ['prakp.statusPraKp', '=', '1'],
                ['periode.aktif', '=', '1']
            ])
            ->orWhere([
                ['prakp.statusPraKp', '=', '2'],
                ['periode.aktif', '=', '1']
            ])
            ->get();

        return view('sikp.Koordinator.praKpRegis', ['nidn' => $nidn, 'namaDosen' => $namaDosen, 'data' => $data, 'dataStatus' => $dataStatus]);
    }

    public function getSetUjianKoor()
    {
        //Atur Jadwal Ujian
        $emailGoogle = auth()->user()->email;
        $namaDosen = DB::table('dosen')->select('namaDosen')
            ->where('emailDosen', $emailGoogle)
            ->get();
        $nidn = DB::table('dosen')->select('nidn')
            ->where('emailDosen', $emailGoogle)
            ->get();
        $dosenPenguji = DB::table('dosen')
            ->select(DB::raw('nidn,namaDosen'))
            ->get()->toArray();
        $dataRuangan = DB::table('ruang')
            ->select(DB::raw('idRuang,namaRuang'))
            ->get()->toArray();
      
        $data = DB::table('ujian')
            ->join('kp', 'ujian.idKp', '=', 'kp.idKp')
            ->join('registrasi', 'kp.idReg', '=', 'registrasi.idReg')
            ->join('mahasiswa', 'registrasi.nim', '=', 'mahasiswa.nim')
            ->join('dosen', 'kp.nidn', '=', 'dosen.nidn')
            ->select(DB::raw('ujian.idUjian, mahasiswa.nim, mahasiswa.namaMhs, kp.judul, dosen.namaDosen, ujian.nidn'))
          
            ->get();
        return view('sikp.Koordinator.setUjian', ['nidn' => $nidn, 'namaDosen' => $namaDosen, 'data' => $data, 'dosenPenguji' => $dosenPenguji, 'dataRuangan' => $dataRuangan]);
    }

    public function getBatasKpKoor()
    {
        //Atur Batas KP
        $emailGoogle = auth()->user()->email;
        $namaDosen = DB::table('dosen')->select('namaDosen')
            ->where('emailDosen', $emailGoogle)
            ->get();
        $nidn = DB::table('dosen')->select('nidn')
            ->where('emailDosen', $emailGoogle)
            ->get();
        $aktif = DB::table('periode')
            ->select('semester', 'tahun', 'mulaiKp', 'akhirKp', 'aktif')
            ->get();
        return view('sikp.Koordinator.batasKp', ['nidn' => $nidn, 'namaDosen' => $namaDosen, 'aktif' => $aktif]);
    }

    public function koor_regis_kp()
    {
        //Lihat Regis KP + Validasi
        $emailGoogle = auth()->user()->email;
        $namaDosen = DB::table('dosen')->select('namaDosen')
            ->where('emailDosen', $emailGoogle)
            ->get();
        $nidn = DB::table('dosen')->select('nidn')
            ->where('emailDosen', $emailGoogle)
            ->get();

        $nidnDosenBim = DB::table('dosen')->select('nidn', 'namaDosen')->get();

     
        $data = DB::table('registrasi')
            ->join('mahasiswa', 'mahasiswa.nim', '=', 'registrasi.nim')
            ->join('kp', 'kp.idReg', '=', 'registrasi.idReg')
            ->join('periode', 'periode.idPeriode', '=', 'registrasi.idPeriode')
            ->select(
                'registrasi.idReg',
                'registrasi.nim',
                'mahasiswa.namaMhs',
                'kp.idKp',
                'kp.judul',
                'kp.lembaga',
                'periode.aktif'
            )
            ->where([
                ['kp.statusUjianKp', '=', '0'],
                ['periode.aktif', '=', '1']
            ])
            ->get();

        $perAktif = DB::table('periode')
            ->select('tahun', 'semester')
            ->where('aktif', '1')
            ->get();

        $dataStatus = DB::table('registrasi')
            ->join('mahasiswa', 'mahasiswa.nim', '=', 'registrasi.nim')
            ->join('kp', 'kp.idReg', '=', 'registrasi.idReg')
            ->join('periode', 'periode.idPeriode', '=', 'registrasi.idPeriode')
            ->select('registrasi.nim', 'mahasiswa.namaMhs', 'kp.judul', 'kp.statusUjianKp', 'periode.aktif')
            ->where([
                ['kp.statusUjianKp', '=', '1'],
                ['periode.aktif', '=', '1']
            ])
            ->orWhere([
                ['kp.statusUjianKp', '=', '2'],
                ['periode.aktif', '=', '1']
            ])
            ->get();

        return view('sikp.Koordinator.kpRegis', ['nidn' => $nidn, 'namaDosen' => $namaDosen, 'nidnDosenBim' => $nidnDosenBim, 'data' => $data, 'dataStatus' => $dataStatus]);
    }

    public function getSuratKeteranganKoor()
    {
        //Lihat SK + Validasi
        $emailGoogle = auth()->user()->email;
        $namaDosen = DB::table('dosen')->select('namaDosen')
            ->where('emailDosen', $emailGoogle)
            ->get();
        $nidn = DB::table('dosen')->select('nidn')
            ->where('emailDosen', $emailGoogle)
            ->get();

  
        $surat = DB::table('registrasi')
            ->join('mahasiswa', 'mahasiswa.nim', '=', 'registrasi.nim')
            ->join('surat', 'surat.idReg', '=', 'registrasi.idReg')
            ->join('periode', 'periode.idPeriode', '=', 'registrasi.idPeriode')
            ->select(
                'registrasi.idReg',
                'registrasi.nim',
                'registrasi.idPeriode',
                'mahasiswa.namaMhs',
                'surat.idSurat',
                'surat.lembaga',
                'surat.dokumenSurat',
                'periode.aktif'
            )
            ->where([
                ['surat.statusSurat', '=', '0'],
                ['periode.aktif', '=', '1']
            ])
            ->get();

        $dataStatus = DB::table('registrasi')
            ->join('mahasiswa', 'mahasiswa.nim', '=', 'registrasi.nim')
            ->join('surat', 'surat.idReg', '=', 'registrasi.idReg')
            ->join('periode', 'periode.idPeriode', '=', 'registrasi.idPeriode')
            ->select(
                'registrasi.nim',
                'mahasiswa.namaMhs',
                'surat.lembaga',
                'surat.dokumenSurat',
                'surat.statusSurat',
                'periode.aktif'
            )
            ->where([
                ['surat.statusSurat', '=', '1'],
                ['periode.aktif', '=', '1']
            ])
            ->orWhere([
                ['surat.statusSurat', '=', '2'],
                ['periode.aktif', '=', '1']
            ])
            ->get();

        return view('sikp.Koordinator.suratKeterangan', [
            'nidn' => $nidn, 'namaDosen' => $namaDosen,
            'surat' => $surat, 'dataStatus' => $dataStatus
        ]);
    }
    //

   
    //
    public function fileKp($nim)
    {
        $path = public_path('dokumenPengajuanKp/' . $nim . '.pdf');
        header("Content-type: application/pdf");
        header("Content-Length: " . filesize($path));
        readfile($path);
    }

    public function filePraKp($nim)
    {
        $path = public_path('dokumenPraKp/' . $nim . '.pdf');
        header("Content-type: application/pdf");
        header("Content-Length: " . filesize($path));
        readfile($path);
    }

    public function fileSurat($nim)
    {
        $path = public_path('suratKeterangan/' . $nim . '.pdf');
        header("Content-type: application/pdf");
        header("Content-Length: " . filesize($path));
        readfile($path);
    }
    //
  
    //
    public function setBatas(Request $request)
    {
        $affected = DB::table('periode')
            ->where('aktif', 1)
            ->update(['aktif' => 0]);
      
        $tanggalSekarang = Carbon\Carbon::now();
        DB::table('periode')->insert([
            'semester' => $request->semester,
            'tahun' => $request->tahun,
            'mulaiKp' => $tanggalSekarang,
            'akhirKp' => $request->akhirKp,
            'aktif' => '1'
        ]); 
        return redirect('/sikp/batas_kp')->with(['success' => 'Batas Pelaksanaan Kerja Praktik Berhasil Diaktifkan']);
        
    }

    public function setSurat(Request $request)
    {
        //Simpan SK
        $terima = $request->terima;
        $tolak = $request->tolak;

        if ($terima) {
            $status = DB::table('surat')
                ->where('idReg', $terima)
                ->update([
                    'statusSurat' => 1
                ]);
        } else if ($tolak) {
            $status = DB::table('surat')
                ->where('idReg', $tolak)
                ->update([
                    'statusSurat' => 2
                ]);
        }
        return redirect('/sikp/surat_ket')->with('sukses', 'Status Verifikasi Berhasil Diubah!');
    }

    public function setPraKp(Request $request)
    {
        //Simpan Validasi
        $terima = $request->terima;
        $tolak = $request->tolak;

        if ($terima) {
            $status = DB::table('prakp')
                ->where('idReg', $terima)
                ->update([
                    'statusPraKp' => 1
                ]);
        } else if ($tolak) {
            $status = DB::table('prakp')
                ->where('idReg', $tolak)
                ->update([
                    'statusPraKp' => 2
                ]);
        }
        return redirect('/sikp/regis_pra_kp')->with('sukses', 'Status Verifikasi Berhasil Diubah');
    }

    public function setKp(Request $request)
    {
        $terima = $request->terima;
        $tolak = $request->tolak;
        if ($terima) {
            if (isset($request->dosenUji)) {
                $status = DB::table('kp')
                    ->where('idReg', $terima)
                    ->update([
                        'statusUjianKp' => 1,
                        'nidn' => $request->dosenUji
                    ]);
                return redirect('/sikp/regis_kp')->with('sukses', 'Status KP Berhasil Diubah!');
            }
            return redirect('/sikp/regis_kp')->with('warning', 'Dosen Pembimbing Tidak Boleh Kosong');
        } else if ($tolak) {
            $status = DB::table('kp')
                ->where('idReg', $tolak)
                ->update([
                    'statusUjianKp' => 2
                ]);
        }

        return redirect('/sikp/regis_kp')->with('sukses', 'Status Verifikasi Berhasil Diubah!');
    }
    //
}
