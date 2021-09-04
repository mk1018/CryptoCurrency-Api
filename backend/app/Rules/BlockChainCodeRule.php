<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Services\BlockChainService;

class BlockChainCodeRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->blockChainService = new BlockChainService;
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
        $codes = $this->blockChainService->pluck('code')->toArray();
        return in_array($value, $codes) ? true : false ;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'そのコードはありません。';
    }
}
