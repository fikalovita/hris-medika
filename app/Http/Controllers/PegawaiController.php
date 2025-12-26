<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use DateTime;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataPegawai = Pegawai::all();

        return DataTables::of($dataPegawai)->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nrp' => 'required|unique:pegawai,nrp|max:255',
            'nm_pegawai' => 'required',
            'nm_pegawai_tmb' => 'required',
            'pekerja_aktif' => 'required',
            'jk' => 'required',
            'negara_kelahiran' => 'required',
            'kota_kelahiran' => 'required',
            'tgl_lahir' => 'required',
            'usia' => 'required',
            'kelompok_umur' => 'required',
            'alamat_utama' => 'required',
            'alamat_kedua' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'kode_pos' => 'required',
            'no_telepon_utama' => 'required',
            'no_telepon_kedua' => 'required',
            'email_utama' => 'required',
            'email_kedua' => 'required',
            'tmt' => 'required',
            'stts_menikah' => 'required',
            'ptkp_status_anak' => 'required',
            'perusahaan' => 'required',
            'bidang' => 'required',
            'tgl_pengangkatan' => 'required',
            'posisi' => 'required',
            'lvl_manager' => 'required',
            'gol_pekerjaan' => 'required',
            'kelompok_gol_pekerjaan' => 'required',
            'jns_pekerjaan' => 'required',
            'jns_karyawan' => 'required',
            'manager' => 'required',
            'no_ktp' => 'required|max:16',
            'passport' => 'required',
            'bpjs_ket' => 'required',
            'nm_ibu' => 'required',
            'kontak_darurat' => 'required',
        ]);
        $date = DateTime::createFromFormat('d/m/Y', $validate['tgl_lahir']);
        $date2 = DateTime::createFromFormat('d/m/Y', $validate['tgl_pengangkatan']);
        $date3 = DateTime::createFromFormat('d/m/Y', $validate['tmt']);
        $tgl_lahir = $date->format('Y-m-d');
        $tgl_pengangkatan = $date2->format('Y-m-d');
        $tmt = $date3->format('Y-m-d');
        Pegawai::create([
            'id' => Str::uuid(),
            'nrp' => $validate['nrp'],
            'nm_pegawai' => $validate['nm_pegawai'],
            'nm_pegawai_tmb' => $validate['nm_pegawai_tmb'],
            'pekerja_aktif' => $validate['pekerja_aktif'],
            'jk' => $validate['jk'],
            'negara_kelahiran' => $validate['negara_kelahiran'],
            'kota_kelahiran' => $validate['kota_kelahiran'],
            'tgl_lahir' => $tgl_lahir,
            'usia' => $validate['usia'],
            'kd_kelompok_umur' => $validate['kelompok_umur'],
            'alamat_utama' => $validate['alamat_utama'],
            'alamat_kedua' => $validate['alamat_kedua'],
            'kd_kelurahan' => $validate['kelurahan'],
            'kd_kecamatan' => $validate['kecamatan'],
            'kd_kabupaten' => $validate['kabupaten'],
            'kd_provinsi' => $validate['provinsi'],
            'kode_pos' => $validate['kode_pos'],
            'no_telepon_utama' => $validate['no_telepon_utama'],
            'no_telepon_kedua' => $validate['no_telepon_kedua'],
            'email_utama' => $validate['email_utama'],
            'email_kedua' => $validate['email_kedua'],
            'tmt' => $tmt,
            'stts_menikah' => $validate['stts_menikah'],
            'kd_ptkp_status_anak' => $validate['ptkp_status_anak'],
            'kd_perusahaan' => $validate['perusahaan'],
            'kd_bidang' => $validate['bidang'],
            'tgl_pengangkatan' => $tgl_pengangkatan,
            'kd_posisi' => $validate['posisi'],
            'kd_lvl_manager' => $validate['lvl_manager'],
            'kd_gol_pekerjaan' => $validate['gol_pekerjaan'],
            'kd_kelompok_gol_pekerjaan' => $validate['kelompok_gol_pekerjaan'],
            'kd_jns_pekerjaan' => $validate['jns_pekerjaan'],
            'kd_jns_karyawan' => $validate['jns_karyawan'],
            'kd_manager' => $validate['manager'],
            'no_ktp' => $validate['no_ktp'],
            'passport' => $validate['passport'],
            'bpjs_ket' => $validate['bpjs_ket'],
            'nm_ibu' => $validate['nm_ibu'],
            'kontak_darurat' => $validate['kontak_darurat'],
        ]);

        return response()->json(['message' => 'data berhasil dibuat'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $id = $request->id;
        $pegawai = Pegawai::with(['provinsi', 'kabupaten', 'kelurahan', 'kecamatan', 'pegawai_bidang', 'pegawai_posisi', 'pegawai_bidang', 'perusahaan', 'ptkp_stts_anak', 'pegawai_jns_karyawan', 'pegawai_jns_pekerjaan', 'pegawai_kel_gol_pekerjaan', 'pegawai_lvl', 'pegawai_gol_pekerjaan', 'kelompok_umur'])->find($id);
        if (!$pegawai) {
            return response()->json(['message' => 'data tidak ditemukan'], 404);
        }

        return response()->json($pegawai, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $pegawai = Pegawai::find($id);
        $validate = $request->validate([
            'nrp' => 'required',
            'nm_pegawai' => 'required',
            'nm_pegawai_tmb' => 'required',
            'pekerja_aktif' => 'required',
            'jk' => 'required',
            'negara_kelahiran' => 'required',
            'kota_kelahiran' => 'required',
            'tgl_lahir' => 'required',
            'usia' => 'required',
            'kelompok_umur' => 'required',
            'alamat_utama' => 'required',
            'alamat_kedua' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'kode_pos' => 'required',
            'no_telepon_utama' => 'required',
            'no_telepon_kedua' => 'required',
            'email_utama' => 'required',
            'email_kedua' => 'required',
            'tmt' => 'required',
            'stts_menikah' => 'required',
            'ptkp_status_anak' => 'required',
            'perusahaan' => 'required',
            'bidang' => 'required',
            'tgl_pengangkatan' => 'required',
            'posisi' => 'required',
            'lvl_manager' => 'required',
            'gol_pekerjaan' => 'required',
            'kelompok_gol_pekerjaan' => 'required',
            'jns_pekerjaan' => 'required',
            'jns_karyawan' => 'required',
            'manager' => 'required',
            'no_ktp' => 'required|max:16',
            'passport' => 'required',
            'bpjs_ket' => 'required',
            'nm_ibu' => 'required',
            'kontak_darurat' => 'required',
        ]);
        if (!$pegawai) {
            return response()->json(['message' => 'data tidak ditemukan'], 404);
        }
        $pegawai->update([
            'nrp' => $validate['nrp'],
            'nm_pegawai' => $validate['nm_pegawai'],
            'nm_pegawai_tmb' => $validate['nm_pegawai_tmb'],
            'pekerja_aktif' => $validate['pekerja_aktif'],
            'jk' => $validate['jk'],
            'negara_kelahiran' => $validate['negara_kelahiran'],
            'kota_kelahiran' => $validate['kota_kelahiran'],
            'tgl_lahir' => $validate['tgl_lahir'],
            'usia' => $validate['usia'],
            'kd_kelompok_umur' => $validate['kelompok_umur'],
            'alamat_utama' => $validate['alamat_utama'],
            'alamat_kedua' => $validate['alamat_kedua'],
            'kd_kelurahan' => $validate['kelurahan'],
            'kd_kecamatan' => $validate['kecamatan'],
            'kd_kabupaten' => $validate['kabupaten'],
            'kd_provinsi' => $validate['provinsi'],
            'kode_pos' => $validate['kode_pos'],
            'no_telepon_utama' => $validate['no_telepon_utama'],
            'no_telepon_kedua' => $validate['no_telepon_kedua'],
            'email_utama' => $validate['email_utama'],
            'email_kedua' => $validate['email_kedua'],
            'tmt' => $validate['tmt'],
            'stts_menikah' => $validate['stts_menikah'],
            'kd_ptkp_status_anak' => $validate['ptkp_status_anak'],
            'kd_perusahaan' => $validate['perusahaan'],
            'kd_bidang' => $validate['bidang'],
            'tgl_pengangkatan' => $validate['tgl_pengangkatan'],
            'kd_posisi' => $validate['posisi'],
            'kd_lvl_manager' => $validate['lvl_manager'],
            'kd_gol_pekerjaan' => $validate['gol_pekerjaan'],
            'kd_kelompok_gol_pekerjaan' => $validate['kelompok_gol_pekerjaan'],
            'kd_jns_pekerjaan' => $validate['jns_pekerjaan'],
            'kd_jns_karyawan' => $validate['jns_karyawan'],
            'kd_manager' => $validate['manager'],
            'no_ktp' => $validate['no_ktp'],
            'passport' => $validate['passport'],
            'bpjs_ket' => $validate['bpjs_ket'],
            'nm_ibu' => $validate['nm_ibu'],
            'kontak_darurat' => $validate['kontak_darurat'],
        ]);
        return response()->json(['message' => 'data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $pegawai = Pegawai::find($id);
        if (!$pegawai) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        $pegawai->delete();
        return response()->json(['message' => 'data berhasil dihapus']);
    }
}
