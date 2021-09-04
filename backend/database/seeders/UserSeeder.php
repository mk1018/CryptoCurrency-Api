<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->add('name1', 'name1@example.com', 'password', sha1(uniqid(bin2hex(random_bytes(1)))));
        $this->add('name2', 'name2@example.com', 'password', sha1(uniqid(bin2hex(random_bytes(2)))));
        $this->add('name3', 'name3@example.com', 'password', sha1(uniqid(bin2hex(random_bytes(3)))), 'nam33');
    }

    private function add($name, $email, $password, $user_code, $screen_name=null)
    {
        (new User([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'user_code' => $user_code,
            'screen_name' => $screen_name
        ]))->save();
    }
}
