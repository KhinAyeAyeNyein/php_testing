<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentEditRequest extends FormRequest
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
      'name' => ['required', 'string', 'max:255'],
      'roll_Number' => ['required', 'string', 'max:255', Rule::unique('students')->ignore($this->route('studentsId'))],
      'class' => ['required', 'string', 'max:255'],
      'dob' => []
    ];
  }
}
