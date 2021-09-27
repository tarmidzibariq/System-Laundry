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
        // Outlets
        DB::table('outlets')->insert([
            'nama' => 'candika',
            'alamat' => 'depok',
            'tlp' => '123123',
        ]);
        DB::table('outlets')->insert([
            'nama' => 'berkahmatahari',
            'alamat' => 'Bekasi',
            'tlp' => '188382384',
        ]);

        // users
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

        // pakets
        DB::table('pakets')->insert([
            'id_outlet' => '1',
            'jenis' => 'kiloan',
            'nama_paket' => 'Jas',
            'harga' => '10000',
        ]);
        DB::table('pakets')->insert([
            'id_outlet' => '1',
            'jenis' => 'lebar',
            'nama_paket' => 'Spring Bad',
            'harga' => '10000',
        ]);
        DB::table('pakets')->insert([
            'id_outlet' => '1',
            'jenis' => 'kiloan',
            'nama_paket' => 'Springbad',
            'harga' => '15000',
        ]);

        // members
        DB::table('members')->insert([
            'nama' => 'Adil Farizky',
            'alamat' => 'Pekapuran Jl Berada',
            'jenis_kelamin' => 'Laki - Laki',
            'tlp' => '089511447564',
        ]);

        // transaksi
        DB::table('transaksis')->insert([
            'id_outlet' => '1',
            'id_paket' => '1',
            'id_member' => '4',
            'tgl' => '2021-09-25',
            'batas_waktu'=> '2021-09-30',
            'tgl_bayar'=> '2021-09-30',
            'biaya'=> '11000',
            'diskon'=> '10',
            'pajak'=> '2000',
            'status'=> 'baru',
            'dibayar'=> 'belum_dibayar',
            'id_user' => '1',
        ]);

    }
}
