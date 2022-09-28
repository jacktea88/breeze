<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class YumFormValidation extends FormRequest
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
   * @return array<string, mixed>
   */
  public function rules()
  {
    return [
      'user_name' => 'required',
      'user_email' => 'required|email',
      'user_password' => 'required',
      'user_sex' => 'required',
      'user_bio' => 'required',
      'user_position' => 'required|not_in:0',
      'dislike' => 'required_without_all|max:3|min:1',
    ];
  }
}
