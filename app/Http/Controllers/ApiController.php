<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Students;
use App\Models\Group;


class ApiController extends Controller
{
    // Retornara una vista de la lista de estudiantes
    public function lista0(Request $request)
    {

        if($request->buscar != ''){
            $students= Students::Buscar($request)
            ->orderBy('id_student')
            ->paginate(10);
        }else{
            if($request->id_grupo > '0'){
                $students= Students::Grupo($request)
                ->orderBy('id_grupo')
                ->paginate(10);
            }
            else{
                $students= Students::paginate(10);
            }
            if($request->gen > 'Masculino'){
                $students= Students::Genero($request)
                ->orderBy('id_student')
                ->paginate(10);
            }
        }
        $groups = Group::all();    


        return view('student.index')->with('students', $students)
                                    ->with('groups', $groups);
    }

    //Retornara los datos en formato json
    public function lista1(){
        $query=Students::all();
        return response()->json($query, 200); //El numero 200 es numero de respuesta
    }

    //Retornara los datos
    public function lista2(){
        return Students::all();
    }

    //Retornara los datos en formato json a travez de una consulta
    public function lista3(){
        $query=DB::select('select * from students');
        return response()->json($query, 200); //El numero 200 es numero de respuesta
    }


    //Retornara los datos de un solo estudiante a travez de su id a una vista
    public function detalle0($id){
        $query=Students::find($id);
        $students = Students::all();
        $groups = Group::all();
        return view('student.show')->with('students', $students)
                                      ->with('groups', $groups);
        
    }

    //Retornara los datos en formato json de un solo estudiante a travez de su id
    public function detalle1($id){
        $query=Students::find($id);
        return response()->json($query, 200); //El numero 200 es numero de respuesta
    }

    //Retornara los datos de un solo estudiante a travez de su id
    public function detalle2($id){
        return Students::find($id);
    }

    //Retornara los datos de un solo estudiante a travez de una consulta a travez de su id
    public function detalle3($id){
        $query=DB::select('select * from students where id_student='.$id);
        return response()->json($query, 200); //El numero 200 es numero de respuesta
    }
}
