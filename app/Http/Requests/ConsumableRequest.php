<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ConsumableRequest extends FormRequest
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
            'fingerpaint' => 'string|required', 
            'paper' => 'required|string', 
            'cleaningsupplies' => 'required|string', 
            'sippycubs' => 'required', 
            'spoons' => 'required', 
            'crayons' => 'required', 
            'garbagebag' => 'required', 
            'diabers' => 'required', 
            'forks' => 'required', 
            'penciles' => 'required', 
            'bowls' => 'required', 
            'babywipes' => 'required'
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
