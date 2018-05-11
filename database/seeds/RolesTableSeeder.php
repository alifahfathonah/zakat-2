<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Administrator',
            'deskripsi' => 'Pengelola Website/Webmaster'
            ],[
            'name' => 'Petugas',
            'deskripsi' => 'Petugas pengelola zakat'
            ]
        );
    }
}
