<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Students extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $primaryKey = 'id_student';
    protected $fillable = [
        'matricula',
        'name',
        'app',
        'apm',
        'gen',
        'email',
        'password',
        'fn',
        'photo',
        'id_grupo',
    ];


    //Funcion para obtener el nombre del grupo
    public function scopeBuscar($query, $request){
        if($request->buscar && $request->id_grupo){
            $query->where(DB::raw("CONCAT(app, ' ', apm, ' ', name)"), "LIKE", '%'.$request->buscar. '%')
            ->where('id_grupo', $request->id_grupo);
            }
            else{
            $query->where(DB::raw("CONCAT(app, ' ', apm, ' ', name)"), "LIKE", '%'.$request->buscar. '%');
                }
    }

    public function scopeGrupo($query, $request){
        if($request->id_grupos){
            $query->where('id_grupo', $request->id_grupos);
        }
    }

    
}




 