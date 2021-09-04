<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    // use HasFactory;

    /**
     * このポストの全コメント取得
     */
    public function getBlockChainInfo()
    {
        return $this->hasOne(BlockChain::class, 'code', 'blockchain_code');
    }
}
