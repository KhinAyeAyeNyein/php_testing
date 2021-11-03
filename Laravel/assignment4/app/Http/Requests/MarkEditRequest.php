<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class MarkEditRequest extends FormRequest
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
    }
?>