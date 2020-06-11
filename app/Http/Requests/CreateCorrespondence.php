<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCorrespondence extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return false;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'recipient' => 'required|max:80',
      'street' => 'required|max:80',
      'number' => 'required',
      'neighborhood' => 'required|max:80',
      'cep' => 'required',
      'city' => 'required',
      'uf' => 'required|max:2',
      'status' => 'required|max:20',
      'cep' => 'required',
      'id_recipient' => 'required',
    ];
  }
}
