<?php

namespace Database\Factories;

use App\Models\Actividad;
use App\Models\Empresa;
use App\Models\User;
use Carbon\Carbon;
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

			if ($asign) {
				$daysAsig = $this->faker->numberBetween(0, 4);
				$daysVenc = $this->faker->randomDigit();

				$fecha_inicio =	Carbon::now()->subDays($daysAsig)->format('Y-m-d');
				$fecha_vencimiento =	Carbon::now()->addDays($daysVenc)->format('Y-m-d');
			}else {
				$fecha_inicio = null;
				$fecha_vencimiento = null;
			}

			return [
				'nombre' => $this->faker->sentence(3),
				'descripcion' => $this->faker->paragraph,
				'empresa' => $this->faker->randomElement($empresas),
				'user_id' => $user_id,
				'nombre_de_user' => $user_name,
				'estatus' => $status,
				'fecha_inicio' => $fecha_inicio,
				'fecha_vencimiento' => $fecha_vencimiento,
			];
    }
}
