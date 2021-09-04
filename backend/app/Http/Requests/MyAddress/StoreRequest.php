<?php

namespace App\Http\Requests\MyAddress;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\BlockChainCodeRule;
use App\Rules\AddressRule;

class StoreRequest extends FormRequest
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
            'blockchain_code' => ['required', new BlockChainCodeRule],
            'address' => ['required', new AddressRule],
        ];
    }
}
