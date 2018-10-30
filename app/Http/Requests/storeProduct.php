<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeProduct extends FormRequest
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
            'name' => 'required|unique:products',
            'price' => 'required|numeric',
            'weight' => 'numeric|nullable'
        ];
    }
    public function checkImpoliteExp($validator)
    {
        $data = $validator->getData();
        extract($data);
        if(strpos($name,"$") !== false)
            return true;
        else
            return false;
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->checkImpoliteExp($validator)) {
                $validator->errors()->add('field', 'dollar sign is illegal character');
            }
        });
    }
    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'please fill name field',
            'name.unique' => 'product name must be unique, :attribute is already taken',
            'price.required' => 'please fill price field',
            'price.numeric' => 'price field must be numeric',
            'weight.numeric' => 'weight field must be numeric'
        ];
    }

}
