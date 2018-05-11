<?php

use Illuminate\Database\Seeder;
use App\JenisZakat;

class JenisZakatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisZakat::create([
            'jenis' => '0',
            'nominal' =>'0'
        ]);
    }
}
