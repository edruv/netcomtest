<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			DB::table('estatuses')->insert([
				'estatus' => 'Creada',
			]);
			DB::table('estatuses')->insert([
				'estatus' => 'Asignada',
			]);
			DB::table('estatuses')->insert([
				'estatus' => 'Completada',
			]);
    }
}
