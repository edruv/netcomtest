<?php

namespace Database\Factories;

use App\Models\Actividad;
use App\Models\Empresa;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActividadFactory extends Factory
{
	protected $model = Actividad::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
			$empresas = Empresa::pluck('id')->toArray();
			// $asign = $this->faker->boolean(35);
			$asign = $this->faker->boolean();

			if ($asign) {
				$user = User::pluck('id')->toArray();
				$user = User::find($this->faker->randomElement($user));
			}

			$user_id = ($asign) ? $user->id : null ;
			$user_name = ($asign) ? $user->name : null ;
			// $preStatus = ($this->faker->boolean(75)) ? 2 : 3 ;
			$preStatus = ($this->faker->boolean()) ? 2 : 3 ;
			$status = ($asign) ? $preStatus : 1 ;

			return [
				'nombre' => $this->faker->sentence(3),
				'descripcion' => $this->faker->paragraph,
				'empresa' => $this->faker->randomElement($empresas),
				'user_id' => $user_id,
				'nombre_de_user' => $user_name,
				'estatus' => $status,
			];
    }
}
