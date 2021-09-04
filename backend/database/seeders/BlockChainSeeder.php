<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlockChain;

class BlockChainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->add('btc', 'Bitcoin', 'BTC', 'bitcoin.png');
        $this->add('eth', 'Ethereum', 'ETH', 'ethereum.png');
    }

    private function add($code, $name, $symbol, $image){
        (new BlockChain([
            'code' => $code,
            'name' => $name,
            'symbol' => $symbol,
            'image' => $image
        ]))->save();
    }
}
