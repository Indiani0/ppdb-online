<?php

namespace App\Http\Controllers;

use App\Models\Classification;
use App\Models\Student;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
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
        $students = Student::all(); // Mengambil semua data dari tabel students
        return view('student', compact('students'));
    }

    public function create()
    {
        $students = Student::all();
        return view('students.create', compact('students'));
    }

    public function edit($id)
    {
        $student = Student::find($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // Identitas Calon Siswa
            'nik' => 'required|integer',
            'nisn' => 'required|integer',
            'nama_siswa' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|string',
            'alamat_siswa' => 'required|string',
            'email' => 'required|string',
            'telepon' => 'required|numeric',

            // Sekolah Asal
            'nama_asal_sekolah' => 'required|string',
            'jenjang_sekolah' => 'required|string',
            'tahun_lulus' => 'required|integer',
            'alamat_sekolah' => 'required|string',

            // Identitas Orang Tua
            'nama_ayah' => 'required|string',
            'pekerjaan_ayah' => 'required|string',
            'alamat_ayah' => 'required|string',

            // Data Pendukung
            'minat_jurusan' => 'required|string',
            'foto_siswa' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Identitas Calon Siswa
        $student = Student::find($id);
        $student->nik = $request->nik;
        $student->nisn = $request->nisn;
        $student->nama_siswa = $request->nama_siswa;
        $student->jenis_kelamin = $request->jenis_kelamin;
        $student->tempat_lahir = $request->tempat_lahir;
        $student->tanggal_lahir = $request->tanggal_lahir;
        $student->agama = $request->agama;
        $student->alamat_siswa = $request->alamat_siswa;
        $student->email = $request->email;
        $student->telepon = $request->telepon;

        // Sekolah Asal
        $student->nama_asal_sekolah = $request->nama_asal_sekolah;
        $student->jenjang_sekolah = $request->jenjang_sekolah;
        $student->tahun_lulus = $request->tahun_lulus;
        $student->alamat_sekolah = $request->alamat_sekolah;

        // Identitas Orang Tua
        $student->nama_ayah = $request->nama_ayah;
        $student->pekerjaan_ayah = $request->pekerjaan_ayah;
        $student->alamat_ayah = $request->alamat_ayah;
        $student->nama_ibu = $request->nama_ibu;
        $student->pekerjaan_ibu = $request->pekerjaan_ibu;
        $student->alamat_ibu = $request->alamat_ibu;

        // Data Pendukung
        $student->minat_jurusan = $request->minat_jurusan;

        if ($request->hasFile('foto_siswa')) {
            $student->foto_siswa = $request->file('foto_siswa')->store('uploads', 'public');
        }

        $student->save();

        return redirect()->route('students.index')->with('success', 'Data siswa berhasil diperbarui');
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
            'minat_jurusan' => 'nullable|string',
            'foto_siswa' => 'required|file|mimes:jpg,jpeg,png|max:2048',

        ]);

        $validated['foto_siswa'] = $request->file('foto_siswa')->store('uploads', 'public');

        // Simpan data ke database
        $res = Student::create($validated);

        // Classification
        $classificationController = new ClassificationController();
        // $resClassify = $classificationController->getClassification($res);

        Classification::create([
            'student_id' => $res->id,
            // 'result' => $resClassify ?? '0',
            // 'result' => '0',
        ]);

        $user = Auth::user();

        if ($user->role_id === 1 || $user->role_id === 2) {
            return redirect()->route('students.index')->with('success', 'Data siswa berhasil ditambahkan!');
        } elseif ($user->role_id === 3) {
            $whatsappUrl = env('WHATSAPP_NUMBER');
            return redirect()->back()->with([
                'success' => 'Data siswa berhasil dikirim!',
                'whatsappUrl' => $whatsappUrl,
            ]);
        } else {
            return redirect()->route('home')->with('success', 'Data siswa berhasil dikirim!');
        }
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Data siswa berhasil dihapus.');
    }

    public function generatePDF(PDF $pdf)
    {
        $students = Student::all();

        $pdf = $pdf->loadView('students.pdf', compact('students'));

        return $pdf->download('laporan-siswa.pdf');
    }
}
