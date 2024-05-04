<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ChildRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'children' => 'required|string', 
            'nappinghours' => 'required', 
            'food' => 'required|string', 
            'extrainfo' => 'required|string', 
            'behavior' => 'required|string', 
            'playinglocation' => 'required|string|min:5', 
            'vaccine' => 'required|string'
        ];
    }


    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'message' => 'The given data is invalid.',
                'errors' => $validator->errors(),
            ], 422)
        );
    }
}
