<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Correspondence;
use App\Http\Requests\CreateCorrespondenceRequest;
use Illuminate\Support\Facades\Log;

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

  public function create(CreateCorrespondenceRequest $req)
  {
    $req->validate();

    try {
      $correspondence = new Correspondence();

      $correspondence->recipient = $req->input('recipient');
      $correspondence->street = $req->input('street');
      $correspondence->number = $req->input('number');
      $correspondence->neighborhood = $req->input('neighborhood');
      $correspondence->cep = $req->input('cep');
      $correspondence->city = $req->input('city');
      $correspondence->uf = $req->input('uf');
      $correspondence->status = $req->input('status');
      $correspondence->cep = $req->input('cep');
      $correspondence->id_recipient = $req->input('id_recipient');

      $correspondence->save();

      return redirect()->back()->with('status', ['created' => true]);
    } catch (\Exception $ex) {
      Log::error($ex->getMessage());
      return redirect()->back()->with('status', ['created' => false]);
    }
  }
}
