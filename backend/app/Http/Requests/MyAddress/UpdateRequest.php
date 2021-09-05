<?php

namespace App\Http\Requests\MyAddress;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\BlockChainCodeRule;
use App\Rules\AddressRule;

class UpdateRequest extends FormRequest
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
        $blockchain_code = $this->request->get('blockchain_code');

        return [
            'blockchain_code' => ['required', new BlockChainCodeRule],
            'address' => new AddressRule($blockchain_code),
            'note' => 'string'
        ];
    }
}
