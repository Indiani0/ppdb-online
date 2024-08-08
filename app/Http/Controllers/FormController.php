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
            'namalengkap' => 'required|string|max:255',
            'jeniskelamin' => 'required|string',
            'tempatlahir' => 'required|string|max:255',
            'tanggallahir' => 'required|date',
            'agama' => 'required|string',
            'alamat' => 'required|string',
            'email' => 'required|email',
            'telepon' => 'required|string',
            'sekolah' => 'required|string|max:255',
            'jenjang' => 'required|string|max:255',
            'tahunlulus' => 'required|numeric',
            'alamatsekolah' => 'required|string',
            'ayah' => 'required|string|max:255',
            'pekerjaanayah' => 'required|string|max:255',
            'alamatayah' => 'required|string',
            'ibu' => 'required|string|max:255',
            'pekerjaanibu' => 'required|string|max:255',
            'alamatibu' => 'required|string',
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
