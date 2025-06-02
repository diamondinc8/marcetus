<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'status' => 'string',
            'user_id' => 'integer',
            'adress' => 'nullable|string',
            //как правильно передать массив
            'product_id' => 'array',
            'product_id.*' => 'integer|distinct|exists:products,id'
            // product_id.* — каждый элемент массива должен быть integer, уникальным и существовать в таблице products по id
        ];
    }
}
