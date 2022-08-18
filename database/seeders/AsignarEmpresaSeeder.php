<?php

namespace Database\Seeders;

use App\Models\Actividad;
use App\Models\Empresa;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AsignarEmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
			$empresas = Empresa::pluck('id')->toArray();
			$actividades = Actividad::all();
			$faker = \Faker\Factory::create();


			foreach ($actividades as $act) {
				DB::table('empresa_actividad')->insert([
					'empresa' => $faker->randomElement($empresas),
					'actividad' => $act->id,
				]);
			}
    }
}
