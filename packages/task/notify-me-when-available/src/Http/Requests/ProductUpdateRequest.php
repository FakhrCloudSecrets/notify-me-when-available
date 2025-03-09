<?php

namespace Task\NotifyMeWhenAvailable\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'product_id'    => 'required|exists:products,id',
            'price'         => 'required|integer',
            'quantity'      => 'required|integer'
        ];
    }
}
