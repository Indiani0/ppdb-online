<?php

namespace App\Http\Controllers;

use Algorithm\C45;
use App\Models\Classification;
use App\Models\Student;
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

        // Menambah variasi data dengan rentang yang lebih kecil dan jumlah yang lebih banyak
        $this->datasets = array_merge(
            $this->datasets,
            $this->getDummyDatasets(10, 0, 100),
            $this->getDummyDatasets(10, 0, 100),
            $this->getDummyDatasets(10, 0, 100),
            $this->getDummyDatasets(10, 0, 100)
        );
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $c45 = new C45();
        $input = new C45\DataInput;

        $data = DB::table('students')
            ->join('classifications', 'students.id', '=', 'classifications.student_id')
            ->select(
                'students.nilai_mtk',
                'students.nilai_ipa',
                'students.nilai_bhs_inggris',
                'students.nilai_bhs_indo',
                'classifications.result'
            )
            ->get()
            ->map(function ($item) {
                return [
                    "nilai_mtk" => $item->nilai_mtk,
                    "nilai_ipa" => $item->nilai_ipa,
                    "nilai_bhs_inggris" => $item->nilai_bhs_inggris,
                    "nilai_bhs_indo" => $item->nilai_bhs_indo,
                    "result" => $item->result ?? 'Tidak Diketahui'
                ];
            })
            ->toArray();

        // Initialize Data
        $input->setData($data);
        $input->setAttributes(['nilai_mtk', 'nilai_ipa', 'nilai_bhs_inggris', 'nilai_bhs_indo', 'result']);

        // Initialize C4.5
        $c45->c45 = $input;
        $c45->setTargetAttribute('result');
        $initialize = $c45->initialize();

        // Build Output
        $buildTree = $initialize->buildTree();
        $arrayTree = $buildTree->toArray();
        $stringTree = $buildTree->toString();

        $classifications = Classification::with('student')->get();

        return view('classification', [
            'classifications' => $classifications,
            'arrayTree' => $arrayTree,
            'stringTree' => $stringTree,
        ]);
    }

    public function getClassification(Student $request, bool $useDatasets = false)
    {
        $c45 = new C45();
        $input = new C45\DataInput;

        $data = DB::table('students')
            ->join('classifications', 'students.id', '=', 'classifications.student_id')
            ->select('students.nilai_mtk', 'students.nilai_ipa', 'students.nilai_bhs_inggris', 'students.nilai_bhs_indo', 'classifications.result')
            ->get()
            ->toArray();

        $newData = $useDatasets ? array_merge($data, $this->datasets) : $data;

        $input->setData($newData);
        $input->setAttributes(['nilai_mtk', 'nilai_ipa', 'nilai_bhs_inggris', 'nilai_bhs_indo', 'result']);

        $c45->c45 = $input;
        $c45->setTargetAttribute('result');
        $initialize = $c45->initialize();

        $buildTree = $initialize->buildTree();

        $payload = [
            'nilai_mtk' => $request->nilai_mtk,
            'nilai_ipa' => $request->nilai_ipa,
            'nilai_bhs_inggris' => $request->nilai_bhs_inggris,
            'nilai_bhs_indo' => $request->nilai_bhs_indo,
        ];

        // $classification = $c45->initialize()->buildTree()->classify($payload);

        $average = ($request->nilai_mtk + $request->nilai_ipa + $request->nilai_bhs_inggris + $request->nilai_bhs_indo) / 4;
        if (round($average) >= 70) {
            $classification = "Lolos";
        } else {
            $classification = "Tidak Lolos";
        }

        return $classification;
    }

    private function getDummyDatasets(int $length, int $min = 0, int $max = 100)
    {
        $datasets = [];

        for ($i = 0; $i < $length; $i++) {
            // $nilai_mtk = rand($min, $max);
            $nilai_mtk = rand(0, 1) ? 90 : 50;
            // $nilai_ipa = rand($min, $max);
            $nilai_ipa = rand(0, 1) ? 80 : 60;
            // $nilai_bhs_inggris = rand($min, $max);
            $nilai_bhs_inggris = rand(0, 1) ? 90 : 66;
            // $nilai_bhs_indo = rand($min, $max);
            $nilai_bhs_indo = rand(0, 1) ? 90 : 40;

            $average = ($nilai_mtk + $nilai_ipa + $nilai_bhs_inggris + $nilai_bhs_indo) / 4;
            if (round($average) >= 70) {
                $result = "Lolos";
            } else {
                $result = "Tidak Lolos";
            }

            $datasets[] = [
                "nilai_mtk" => $nilai_mtk,
                "nilai_ipa" => $nilai_ipa,
                "nilai_bhs_inggris" => $nilai_bhs_inggris,
                "nilai_bhs_indo" => $nilai_bhs_indo,
                "result" => $result
            ];
        }

        return $datasets;
    }

    public function calculateDominantPercentage($student)
    {
        // Hitung total nilai
        $totalMtkIpa = $student->nilai_mtk + $student->nilai_ipa;
        $totalBhs = $student->nilai_bhs_inggris + $student->nilai_bhs_indo;

        // Hitung persentase dominan
        $totalAll = $totalMtkIpa + $totalBhs;

        $persentaseMtkIpa = ($totalAll > 0) ? ($totalMtkIpa / $totalAll) * 100 : 0;
        $persentaseBhs = ($totalAll > 0) ? ($totalBhs / $totalAll) * 100 : 0;

        return [
            'persentase_mtk_ipa' => $persentaseMtkIpa,
            'persentase_bhs' => $persentaseBhs,
        ];
    }
}
