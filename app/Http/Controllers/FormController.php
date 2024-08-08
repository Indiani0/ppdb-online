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
            'nama_asal_sekolah' => 'required|string|max:255',
            'jenjang_sekolah' => 'required|string|max:255',
            'tahun_lulus' => 'required|numeric',
            'alamat_sekolah' => 'required|string',
            'nama_ayah' => 'required|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:255',
            'alamat_ayah' => 'required|string',
            'nama_ibu' => 'required|string|max:255',
            'pekerjaan_ibu' => 'required|string|max:255',
            'alamat_ibu' => 'required|string',
            'kartu_keluarga' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'akta_lahir' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'ktp' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'foto_siswa' => 'required|file|mimes:jpg,jpeg,png|max:2048',
            'surat_lulus' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $validated['kartu_keluarga'] = $request->file('kartu_keluarga')->store('uploads', 'public');
        $validated['akta_lahir'] = $request->file('akta_lahir')->store('uploads', 'public');
        $validated['ktp'] = $request->file('ktp')->store('uploads', 'public');
        $validated['foto_siswa'] = $request->file('foto_siswa')->store('uploads', 'public');
        $validated['surat_lulus'] = $request->file('surat_lulus')->store('uploads', 'public');

        // Simpan data ke database
        Student::create($validated);

        return redirect()->back()->with('success', 'Data berhasil dikirim!');
    }
}
