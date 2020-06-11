<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Correspondence;

class CorrespondencesController extends Controller
{
    public function index(Request $req)
    {
        try {
            $correspondences = Correspondence::paginate();

            return view('correspondences', ["correspondences" => $correspondences]);
        } catch (\Exception $ex) {
            return view('correspondences', ['error' => true]);
        }
    }
}
