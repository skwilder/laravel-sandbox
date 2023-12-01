<?php
namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserProfileRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'required|numeric',
        ];
    }

    public function validationData()
    {
        return array_merge($this->request->all(), [
            'id' => $this->route('id'),
        ]);
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
?>