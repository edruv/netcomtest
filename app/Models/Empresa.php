<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

		public $timestamps = false;

		protected $fillable = [
				'nombre',
		];

		public function actividades() {
			return $this->hasMany(Actividad::class,'empresa');
		}
}
