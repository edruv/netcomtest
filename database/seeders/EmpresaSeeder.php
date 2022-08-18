<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
				$faker = \Faker\Factory::create();

				for ($i=0; $i < 5 ; $i++) {
				DB::table('empresas')->insert([
					'nombre' => $faker->name,
				]);
			}
    }
}
