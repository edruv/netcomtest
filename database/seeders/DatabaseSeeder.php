<?php

namespace Database\Seeders;

use App\Models\Actividad;
use App\Models\Empresa;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
			$this->call(EstatusSeeder::class);
			User::factory(15)->create();
			$this->call(EmpresaSeeder::class);
			// Empresa::factory(5)->create();
			Actividad::factory(40)->create();
			// $this->call(AsignarEmpresaSeeder::class);
    }
}
