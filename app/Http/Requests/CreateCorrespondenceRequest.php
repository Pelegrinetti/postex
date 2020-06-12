<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCorrespondenceRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
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
      'city' => 'required',
      'uf' => 'required|max:2',
      'status' => 'required|max:20',
      'cep' => 'required',
      'id_recipient' => 'required',
    ];
  }

  /**
   * Get the error messages for the defined validation rules.
   *
   * @return array
   */
  public function messages()
  {
    return [
      'recipient.required' => 'Destinatário é obrigatório.',
      'street.required'  => 'O logradouro é obrigatório.',
      'number.required'  => 'O número é obrigatório.',
      'neighborhood.required'  => 'Bairro é obrigatório.',
      'cep.required'  => 'CEP é obrigatório.',
      'city.required'  => 'Cidade é obrigatório.',
      'uf.required'  => 'UF é obrigatório.',
      'status.required'  => 'A situação é obrigatório.',
      'id_recipient.required'  => 'Identificação do destinatário é obrigatório.',
      'max' => 'Limite de caracteres foi ultrapassado.'
    ];
  }
}
