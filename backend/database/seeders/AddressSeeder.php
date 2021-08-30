<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Address;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->add(1, 'btc', '16YkFPyaDCtF5jiWUsB31XV2DtY5boUdXS');
        $this->add(1, 'eth', '0x8fD4819eD56408a33eF6b0FE3d267579497FE011');
    }

    private function add($user_id, $blockchain_code, $address, $display=true){
        (new Address([
            'user_id' => $user_id,
            'blockchain_code' => $blockchain_code,
            'address' => $address,
            'display' => $display,
        ]))->save();
    }
}
