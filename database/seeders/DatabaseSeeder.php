<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('outlets')->insert([
            'nama' => 'candika',
            'alamat' => 'depok',
            'tlp' => '123123',
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'role'=> 'admin',
            // 'id_outlet'=> '1',
        ]);

        DB::table('users')->insert([
            'name' => 'kasir',
            'email' => 'kasir@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'kasir',
            'id_outlet' => '1',
        ]);

        DB::table('users')->insert([
            'name' => 'owner',
            'email' => 'owner@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'owner',
            'id_outlet' => '1',
        ]);

        DB::table('users')->insert([
            'name' => 'member',
            'email' => 'member@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'member',
        ]);
    }
}
