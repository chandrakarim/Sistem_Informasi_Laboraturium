<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
        	'id_admin' => '1',
        	'username' => 'admin',
        	'password' => md5('admin'),
        	'nama_admin' => 'admin',
            'email' => 'admin@gmail.com',
            'no_telp' => '081393942041'
        ]);
    }
}
