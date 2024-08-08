<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class FormController extends Controller
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
        return view('form');
    }

    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            // Identitas Calon Siswa
            'nik' => 'required|numeric',
            'nisn' => 'required|numeric',
            'nama_siswa' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|string',
            'alamat_siswa' => 'required|string',
            'email' => 'required|email',
            'telepon' => 'required|string',

            // Sekolah Asal
            'nama_asal_sekolah' => 'required|string|max:255',
            'jenjang_sekolah' => 'required|string|max:255',
            'tahun_lulus' => 'required|numeric',
            'alamat_sekolah' => 'required|string',

            // Identitas Orang Tua
            'nama_ayah' => 'required|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:255',
            'alamat_ayah' => 'required|string',
            'nama_ibu' => 'required|string|max:255',
            'pekerjaan_ibu' => 'required|string|max:255',
            'alamat_ibu' => 'required|string',

            // Data Pendukung
            'nilai_mtk' => 'required|numeric',
            'nilai_ipa' => 'required|numeric',
            'nilai_bhs_inggris' => 'required|numeric',
            'nilai_bhs_indo' => 'required|numeric',
            'minat_jurusan' => 'required|string',

            // Dokumen Pendukung
            'scan_kk' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'scan_akta' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'scan_ktp_wali' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'foto_siswa' => 'required|file|mimes:jpg,jpeg,png|max:2048',
            'scan_surat_lulus' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $validated['scan_kk'] = $request->file('scan_kk')->store('uploads', 'public');
        $validated['scan_akta'] = $request->file('scan_akta')->store('uploads', 'public');
        $validated['scan_ktp_wali'] = $request->file('scan_ktp_wali')->store('uploads', 'public');
        $validated['foto_siswa'] = $request->file('foto_siswa')->store('uploads', 'public');
        $validated['scan_surat_lulus'] = $request->file('scan_surat_lulus')->store('uploads', 'public');

        // Simpan data ke database
        Student::create($validated);

        return redirect()->back()->with('success', 'Data berhasil dikirim!');
    }
}
