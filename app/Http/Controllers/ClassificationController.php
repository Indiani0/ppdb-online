<?php

namespace App\Http\Controllers;

use Algorithm\C45;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Classification;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ClassificationController extends Controller
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
        // return view('classification');

        // Ambil data dari database
        $data = Student::all();

        // Konversi data ke format yang sesuai dengan C4.5
        $c45Data = $data->toArray();

        // Inisialisasi C4.5
        $c45 = new C45($c45Data, ['attribute1', 'attribute2'], 'class');
        $tree = $c45->buildTree();


        // Tentukan atribut target dan atribut lainnya
        $targetAttribute = 'status_kelulusan';
        $attributes = ['nilai_mtk', 'nilai_ipa', 'jenis_kelamin'];

        // Bangun pohon keputusan
        $tree = $c45->buildTree($targetAttribute, $attributes);

        // Lakukan klasifikasi pada data baru
        $newData = [
            'nilai_mtk' => 80,
            'nilai_mtk' => 87,
            'jenis_kelamin' => 'Laki-laki',
        ];
        $classification = $c45->classify($tree, $newData);

        return view('classification.result', ['classification' => $classification]);
    }
}
