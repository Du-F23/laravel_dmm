<?php

namespace App\Http\Controllers;

// use App\Http\Requests\StoreStudentsRequest;
// use App\Http\Requests\UpdateStudentsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Students;
use App\Models\Group;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Students::all();
        $consult = DB::table('students')->get();
        $query = DB::select('SELECT * FROM students');

        return view('student.index')->with('students', $students)
                                    ->with('consult', $consult)
                                    ->with('query', $query);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::select('id_groups', 'name')->orderBy('name')->get();

        return view('student.add', compact('groups'));// 'groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'matricula' => 'required',
            'name' => 'required',
            'app' => 'required',
            'apm' => 'required',
            'fn' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($request->file('photo') != '') {
            $file = $request->file('photo');
            $foto = $file->getClientOriginalName();
            $date = date('Ymd_His_');
            $foto2 = $date . $foto;
            Storage::disk('local')->put($foto2, File::get($file));
        } else {
            $foto2 = "Red_Bull_2022.jpg";
        }

        $query = Students::create(array(
            'matricula' => $request->input('matricula'),
            'name' => $request->input('name'),
            'app' => $request->input('app'),
            'apm' => $request->input('apm'),
            'fn' => $request->input('fn'),
            'gen'=> $request->input('gen'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'photo'=> $foto2,
            'id_grupo'=> $request->input('id_grupo'),
        ));
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function show(Students $students)
    {
        $students = Students::all();
        return view('student.show')->with('students', $students);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Students::find($id);
        $groups = Group::all();
        return view('student.edit')
            ->with('student', $student)
            ->with('groups', $groups);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentsRequest  $request
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Students $student,$id)
    {
        $this->validate($request, [
            'matricula' => 'required',
            'name' => 'required',
            'app' => 'required',
            'apm' => 'required',
            'fn' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);


        if ($request->file('photo') != '') {
            $file = $request->file('photo');
            $foto = $file->getClientOriginalName();
            $date = date('Ymd_His_');
            $foto2 = $date . $foto;
            \Storage::disk('local')->put($foto2, \File::get($file));
        } else {
            $foto2 = "Red_Bull_2022.jpg";
        }
        //dd($request->all());

        $student=Students::findOrFail($id);
        $student->photo = $foto2;
        $student->save();
        //$student->update($request->all());    
        return redirect()->route('students.index',['id'=>$id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy(Students $id)
    {
        if($id->foto2!='uno.png'){
            Storage::disk('local')->delete($id->photo);
        }
        $id->delete();
        return redirect()->route('students.index');
    }
}
