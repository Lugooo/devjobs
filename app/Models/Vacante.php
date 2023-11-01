<?php

namespace App\Models;

use App\Models\Salario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacante extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'salario_id',
        'categoria_id',
        'empresa',
        'ultimo_dia',
        'descripcion',
        'imagen',
        'publicado',
        'user_id',
    ];    

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function salario(){
        return $this->belongsTo(Salario::class);
    }

    public function candidatos(){
        return $this->hasMany(Candidato::class)->orderBy("created_at", "DESC");
    }

    public function reclutador(){
        return $this->belongsTo(User::class, "user_id");
    }
}