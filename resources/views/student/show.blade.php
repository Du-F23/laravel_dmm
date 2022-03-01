@extends('layouts.app')
@section('content')

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Lista De Productos</h6>
                <div class="float-end">
                <a href="/students/add">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-toggle="tooltip" data-bs-placement="top" title="Agregar">
                      <i class="fas fa-plus-circle"></i>
                    </button>
                </a>
                </div>
              </div>
            </div>

        <table class="table">
            <thead>
                <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Genero</th>
                <th>Grupo</th>
                <th>Fecha Nacimiento</th>
                <th>Email</th>
                <th>Password</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $studentss)
                <tr>
                    <td>{{$studentss->id_student}}</td>
                    <td>{{$studentss->app . ' ' . $studentss->apm . ', ' . $studentss->name}}</td>
                    <td>{{$studentss->gen}}</td>
                    <td>{{$studentss->id_group}}</td>
                    <td>{{$studentss->fn}}</td>
                    <td>{{$studentss->email}}</td>
                    <td>{{$studentss->password}}</td>
                </tr>
                @endforeach
            </tbody>

        </table>
        
    </div>
</div>
@endsection