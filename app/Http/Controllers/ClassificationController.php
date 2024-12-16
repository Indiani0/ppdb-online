<?php

namespace App\Http\Controllers;

use Algorithm\C45;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Classification;
use Illuminate\Support\Facades\DB;

class ClassificationController extends Controller
{
    private $datasets = [];

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
        $students = Student::leftJoin('classifications', 'students.id', '=', 'classifications.student_id')
            ->select(
                'students.id',
                'students.nama_siswa',
                'students.jenis_kelamin',
                'classifications.test_minat_bakat',
                'classifications.test_psikotes',
                'classifications.test_numerik',
                'students.minat_jurusan',
                'classifications.result'
            )->orderBy('id', 'asc')
            ->get();

        return view('classification', [
            'students' => $students,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_siswa' => 'required|exists:students,id',
            'test_minat_bakat' => 'required|string',
            'test_psikotes' => 'required|string',
            'test_numerik' => 'required|string',
        ]);

        $student = Student::findOrFail($validatedData['nama_siswa']);

        $existingClassification = Classification::where('student_id', $validatedData['nama_siswa'])->first();

        if ($existingClassification) {
            return redirect()->back()->withErrors(['duplicate' => 'Data klasifikasi untuk siswa ini sudah ada!']);
        }

        $classification = Classification::create([
            'student_id' => $student->id,
            'test_minat_bakat' => $validatedData['test_minat_bakat'],
            'test_psikotes' => $validatedData['test_psikotes'],
            'test_numerik' => $validatedData['test_numerik'],
            'result' => 'Belum Diproses', // Default hasil klasifikasi
        ]);

        return redirect()->route('classifications.index')->with('success', 'Data klasifikasi berhasil disimpan.');
    }
}
