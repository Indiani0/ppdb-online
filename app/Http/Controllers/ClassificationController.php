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
        $this->datasets = [
            // Teknik Pembuatan Kain
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ],
            [ //9
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ], //11
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ], //27
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Belum Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ],

            // Teknik Elektro Industri
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ], //40
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ], //41
            [
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ], //42
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ], //44
            [
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ], //61
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ], //63
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ], //67
            [
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ], //68
            [
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ],

            // Layanan Perbankan Syariah
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ], //83
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ], //85
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ],

            //Additional data (Teknik Pembuatan Kain)
            [
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Belum Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Belum Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Belum Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Belum Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Tidak Lolos"
            ],

            //Additional data (Teknik Elektro Industri)
            [
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Belum Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Belum Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Belum Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Belum Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Belum Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ],

            //Additional data (Layanan Perbankan Syariah)
            [
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Belum Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Belum Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Belum Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Belum Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Belum Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Tidak Lolos"
            ],
            [
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Tidak Lolos"
            ],
        ];
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

        $dataArray = array(
            // Teknik Pembuatan Kain
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ), //9
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ), //11
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ), //27
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Belum Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Lolos"
            ),

            // Teknik Elektro Industri
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ), //40
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ), //41
            array(
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ), //42
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ), //44
            array(
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ), //61
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ), //63
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ), //67
            array(
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ), //68
            array(
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Lolos"
            ),

            // Layanan Perbankan Syariah
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ), //83
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ), //85
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Lolos"
            ),

            //Additional data (Teknik Pembuatan Kain)
            array(
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Belum Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Belum Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Belum Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Belum Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Pembuatan Kain",
                "result" => "Tidak Lolos"
            ),

            //Additional data (Teknik Elektro Industri)
            array(
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Belum Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Belum Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Belum Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Belum Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Belum Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Teknik Elektro Industri",
                "result" => "Tidak Lolos"
            ),

            //Additional data (Layanan Perbankan Syariah)
            array(
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Belum Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Kompeten",
                "test_psikotes" => "Belum Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Cukup Kompeten",
                "test_psikotes" => "Belum Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Belum Kompeten",
                "test_numerik" => "Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Belum Kompeten",
                "test_numerik" => "Cukup Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Tidak Lolos"
            ),
            array(
                "test_minat_bakat" => "Belum Kompeten",
                "test_psikotes" => "Cukup Kompeten",
                "test_numerik" => "Belum Kompeten",
                "minat_jurusan" => "Layanan Perbankan Syariah",
                "result" => "Tidak Lolos"
            ),
        );

        // Initialize Data
        $input->setData($dataArray);
        $input->setAttributes(['test_minat_bakat', 'test_psikotes', 'test_numerik', 'minat_jurusan', 'result']);

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
            'students' => $students,
        ]);
    }

    public function getClassification(Student $request, bool $useDatasets = false)
    {
        $c45 = new C45();
        $input = new C45\DataInput;

        $data = DB::table('students')
            ->join('classifications', 'students.id', '=', 'classifications.student_id')
            ->select(
                'classifications.test_minat_bakat',
                'classifications.test_psikotes',
                'classifications.test_numerik',
                'students.minat_jurusan',
                'classifications.result'
            )
            ->get()
            ->toArray();

        $newData = $useDatasets ? array_merge($data, $this->datasets) : $data;

        $input->setData($newData);
        $input->setAttributes(['test_minat_bakat', 'test_psikotes', 'test_numerik', 'minat_jurusan', 'result']);

        $c45->c45 = $input;
        $c45->setTargetAttribute('result');
        $initialize = $c45->initialize();

        $buildTree = $initialize->buildTree();

        $payload = [
            'test_minat_bakat' => $request->test_minat_bakat,
            'test_psikotes' => $request->test_psikotes,
            'test_numerik' => $request->test_numerik,
            'minat_jurusan' => $request->minat_jurusan,
        ];

        $classification = $buildTree->classify($payload);

        return $classification;
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
