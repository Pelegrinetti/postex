<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Correspondence;
use Illuminate\Support\Facades\Log;

class CorrespondencesController extends Controller
{
  public function index(Request $req)
  {
    try {
      $correspondences = Correspondence::paginate(5);

      return view('correspondences', ["correspondences" => $correspondences]);
    } catch (\Exception $ex) {
      return view('correspondences', ['error' => true]);
    }
  }

  public function create()
  {
    $uf_list =  [
      "AC", "AL", "AM", "AP", "BA", "CE", "DF", "ES", "GO", "MA", "MT", "MS", "MG", "PA", "PB", "PR", "PE", "PI", "RJ", "RN", "RO", "RS", "RR", "SC", "SE", "SP", "TO"
    ];

    return view('correspondence.create', ["uf_list" => $uf_list]);
  }

  public function save(Request $req)
  {
    try {
      $correspondence = new Correspondence();

      $correspondence->recipient = $req->input('recipient');
      $correspondence->street = $req->input('street');
      $correspondence->number = $req->input('number');
      $correspondence->neighborhood = $req->input('neighborhood');
      $correspondence->cep = $req->input('cep');
      $correspondence->city = $req->input('city');
      $correspondence->uf = $req->input('uf');
      $correspondence->status = "pendente";
      $correspondence->id_recipient = $req->input('id_recipient');

      $correspondence->save();

      return redirect()->back()->with('status', ['created' => true]);
    } catch (\Exception $ex) {
      Log::error($ex->getMessage());
      return redirect()->back()->with('status', ['created' => false]);
    }
  }

  public function search(Request $req)
  {
    try {
      $query = $req->get('query');
      $result = Correspondence::where('recipient', 'like', '%' . $query . '%')->paginate(10);
      return $result;
    } catch (\Exception $ex) {
      Log::error($ex->getMessage());
      return ['error' => true];
    }
  }

  public function delete(Request $req)
  {
    try {
      $correspondence = Correspondence::find($req->id);

      $correspondence->delete();

      return redirect()->back()->with('status', ['deleted' => true]);
    } catch (\Exception $ex) {
      Log::error($ex->getMessage());

      return redirect()->back()->with('status', ['deleted' => false]);
    }
  }
}
