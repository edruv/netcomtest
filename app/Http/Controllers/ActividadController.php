<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Empresa;
use App\Models\User;
use App\Http\Requests\StoreActividadRequest;
use App\Http\Requests\UpdateActividadRequest;
use App\Http\Requests\AsignarActividadRequest;
use Carbon\Carbon;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
			$actividades = Actividad::where('estatus','!=',3)->get(['nombre','nombre_de_user','estatus','empresa']);
			// $actividades = Actividad::where('estatus','!=',3)->get();

			foreach ($actividades as $act) {
				$act->empresa = Empresa::find($act->empresa)->nombre;
			}

			$actividades = $actividades->groupBy('empresa');

			return $actividades;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreActividadRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreActividadRequest $request) {

			$empresa = Empresa::find($request->empresa);

			if (empty($empresa)) {
				return response()->json('empresa not found',404);
			}

			Actividad::create([
				'nombre' => $request->nombre,
				'descripcion' => $request->descripcion,
				'empresa' => $empresa->id
			]);

			return response()->json(null,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function show(Actividad $actividad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function edit(Actividad $actividad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateActividadRequest  $request
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateActividadRequest $request, Actividad $actividad) {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actividad $actividad)
    {
        //
    }


		public function asignar(AsignarActividadRequest $request) {

			$actividad = Actividad::findOrFail($request->actividad_id);

			if (!empty($actividad->user_id)) {
				return response()->json('already assigned user',405);
			}

			$user = User::findOrFail($request->user_id);

			$act_assig = Actividad::where('user_id',$user->id)->where('estatus','!=',3)->count();

			if ($act_assig >= 5) {
				return response()->json('user with maximum assigned activities',401);
			}

			$actividad->update([
				"user_id" => $user->id,
				"nombre_de_user" => $user->name,
				"estatus" => 2,
				"fecha_inicio" => Carbon::now()->format('Y-m-d'),
				"fecha_vencimiento" => Carbon::now()->addDays(6)->format('Y-m-d'),
			]);
			// $actividad->user_id = $user->id ;
			// $actividad->nombre_de_user = $user->name ;
			// $actividad->estatus = 2 ;
			// $actividad ->save();

			return response()->json('assigned activity',200);
		}

		public function updateStatus(UpdateStatusActividadRequest $request) {

			$actividad = Actividad::findOrFail($request->actividad_id);

			$actividad->update([
				"estatus" => $request->estatus,
			]);

			return response()->json('status updated',200);
		}
}
