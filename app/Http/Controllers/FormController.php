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
            'kartukeluarga' => 'required|file',
            'aktalahir' => 'required|file',
            'ktp' => 'required|file',
            'fotosiswa' => 'required|file',
            'suratlulus' => 'required|file',
        ]);

        $validated['kartukeluarga'] = $request->file('kartukeluarga')->store('uploads', 'public');
        $validated['aktalahir'] = $request->file('aktalahir')->store('uploads', 'public');
        $validated['ktp'] = $request->file('ktp')->store('uploads', 'public');
        $validated['fotosiswa'] = $request->file('fotosiswa')->store('uploads', 'public');
        $validated['suratlulus'] = $request->file('suratlulus')->store('uploads', 'public');

        // Simpan data ke database
        Student::create($validated);

        return redirect()->back()->with('success', 'Data berhasil dikirim!');
    }
}
