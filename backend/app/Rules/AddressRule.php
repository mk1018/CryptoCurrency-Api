<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AddressRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(string $blockchain_code)
    {
        $this->blockchain_code = $blockchain_code;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        switch($this->blockchain_code) {
            case 'btc':
                return (preg_match('/^[13][a-km-zA-HJ-NP-Z1-9]{25,34}$/', $value));
            case 'eth':
                return true;
            default :
                return false;
        }

        return false;
    }

    // BTC : https://paxful.com/support/ja/articles/360013076679-%E3%83%93%E3%83%83%E3%83%88%E3%82%B3%E3%82%A4%E3%83%B3%E3%82%A2%E3%83%89%E3%83%AC%E3%82%B9%E3%81%AE%E7%A8%AE%E9%A1%9E

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'アドレスの形式が間違っています';
    }
}
