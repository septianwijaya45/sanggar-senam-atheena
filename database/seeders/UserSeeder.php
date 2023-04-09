<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'role_id'   => 1,
                'name'      => 'Pemilik',
                'email'     => 'pemilik@gmail.com',
                'username'  => 'pemilik',
                'password'  => bcrypt('pemilik')
            ],
            [
                'role_id'   => 2,
                'name'      => 'Admin',
                'email'     => 'admin@gmail.com',
                'username'  => 'admin',
                'password'  => bcrypt('admin')
            ],
            [
                'role_id'   => 3,
                'name'      => 'Pelatih',
                'email'     => 'pelatih@gmail.com',
                'username'  => 'pelatih',
                'password'  => bcrypt('pelatih')
            ],
            [
                'role_id'   => 4,
                'name'      => 'Anggota',
                'email'     => 'anggota@gmail.com',
                'username'  => 'anggota',
                'password'  => bcrypt('anggota')
            ],
            [
                'role_id'   => 5,
                'name'      => 'Non-Anggota',
                'email'     => 'non-anggota@gmail.com',
                'username'  => 'non-anggota',
                'password'  => bcrypt('nonanggota')
            ],
        ]);
    }
}
