<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class MarkCreateAPIRequest extends FormRequest
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
        'student_id' => ['required', 'id'],
        'Myanmar' => ['required', 'integer'],
        'English' => ['required', 'integer'],
        'Mathematics' => ['required', 'integer'],
        'Chemistry' => ['required', 'integer'],
        'Physics' => ['required', 'integer'],
        'Biology' => ['required', 'integer'],
    ];
  }

  /**
   * This is to response JSON if fail validations.
   * @param Validator $validator
   * @return Response error json response
   */
  protected function failedValidation(Validator $validator)
  {
    $errors = $validator->errors();

    throw new HttpResponseException(
      response()->json(['errors' => $errors], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
    );
  }
}
