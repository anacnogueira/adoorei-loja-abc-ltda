<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreSaleRequest extends FormRequest
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
            'items' => ['present', 'array'],
            'items.*.product_id' => ['required','integer'],
            'items.*.amount' => ['required','integer'],
        ];
    }

    public function messages()
    {
        return [
            'items.present' => 'Informe o(s) produto(s)',
            'items.array' => 'Produto(s) deve ser um array',
            'items.*.product_id.required' => 'Informe o ID do produto',
            'items.*.product_id.integer' => 'O ID do produto dever um número inteiro',
            'items.*.amount.required' => 'Informe a quantia do produto',
            'items.*.amount.integer' => 'A quantia do produto deve ser número inteiro',
        ];
    }

    /**
     * Transform the error messages into JSON
     *
     * @param array $errors
     * @return \Illuminate\Http\JsonResponse
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
