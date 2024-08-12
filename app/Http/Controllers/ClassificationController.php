<?php

namespace App\Http\Controllers;

use Algorithm\C45;
use App\Models\Classification;

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
        $c45 = new C45();
        $input = new C45\DataInput;

        // Data set ini nanti nya bisa diubah menjadi hasil query dari database
        $data = array(
            array(
                "MTK" => 4,
                "IPA" => 5,
                "INDO" => 5,
                "RESULT" => "No"
            ),
            array(
                "MTK" => 8,
                "IPA" => 8,
                "INDO" => 9,
                "RESULT" => "Yes"
            ),
            array(
                "MTK" => 9,
                "IPA" => 8,
                "INDO" => 9,
                "RESULT" => "Yes"
            ),
            array(
                "MTK" => 9,
                "IPA" => 9,
                "INDO" => 9,
                "RESULT" => "Yes"
            ),
            array(
                "MTK" => 6,
                "IPA" => 8,
                "INDO" => 9,
                "RESULT" => "Yes"
            ),
            array(
                "MTK" => 5,
                "IPA" => 4,
                "INDO" => 4,
                "RESULT" => "No"
            ),
            array(
                "MTK" => 5,
                "IPA" => 3,
                "INDO" => 4,
                "RESULT" => "No"
            ),
        );

        // Initialize Data
        $input->setData($data); // Set data from array
        $input->setAttributes(array('MTK', 'IPA', 'INDO', 'RESULT')); // Set attributes of data

        // Initialize C4.5
        $c45->c45 = $input; // Set input data
        $c45->setTargetAttribute('RESULT'); // Set target attribute
        $initialize = $c45->initialize(); // initialize

        // Build Output
        $buildTree = $initialize->buildTree(); // Build tree
        $arrayTree = $buildTree->toArray(); // Set to array
        $stringTree = $buildTree->toString(); // Set to string

        $new_data = array(
            'MTK' => 9,
            'IPA' => 8,
            'INDO' => 8
        );
        $classification = $c45->initialize()->buildTree()->classify($new_data);


        // Print result on terminal, too lazy to create a view :)
        // echo "<script>console.log(`buildTree Result: " . $stringTree . "`);</script>";
        // echo "<script>console.log('Classification Result: " . $classification . "' );</script>";

        $classifications = Classification::with('student')->get();

        return view('classification', [
            'classifications' => $classifications,
            'classification' => $classification,
            'arrayTree' => $arrayTree,
            'stringTree' => $stringTree,
        ]);
    }
}
