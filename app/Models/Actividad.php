<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;
		
		public $timestamps = false;

		protected $fillable = [
			'nombre','descripcion','user_id','nombre_de_user','estatus','inicio','vencimiento','empresa',
		];

		public function empresa() {
			return $this->belongsTo(Empresa::class,'empresa','id');
		}

		public function usuario() {
			return $this->belongsTo(User::class,'user_id','id');
		}
}
