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
        $this->add('btc', 'Bitcoin', 'BTC');
        $this->add('eth', 'Ethereum', 'ETH');
    }

    private function add($code, $name, $symbol){
        (new BlockChain([
            'code' => $code,
            'name' => $name,
            'symbol' => $symbol
        ]))->save();
    }
}
