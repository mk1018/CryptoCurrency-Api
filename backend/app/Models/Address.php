<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'blockchain_code',
        'address',
        'display'
    ];

    /**
     * ブロックチェーンの情報取得
     */
    public function getBlockChainInfo()
    {
        return $this->hasOne(BlockChain::class, 'code', 'blockchain_code');
    }

    /**
     * ユーザーの情報取得
     */
    public function getUserInfo()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
