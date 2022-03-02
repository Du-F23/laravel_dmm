@extends('layouts.app')
@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Lista</h6>
                        <div class="float-end">
                            <a href="/students/create">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Agregar">
                                    <i class="fas fa-plus-circle"></i>
                                </button>
                            </a>
                        </div>
                    
                    </div>
                </div>
                <form action="{{ route('students.index') }}" name="filtros" method="get"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <!-- token  -->
                        <div class="mb-3">
                            <label class="form-label">Buscar</label>
                            <input type="text" class="form-control" name="buscar" placeholder="Buscar...">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Grupo </label>
                            <select class="form-control" name="id_grupos">
                                <option value="0">Selecciona un grupo</option>
                                @foreach ($groups as $grupo)
                                <option value="{{ $grupo->id_groups }}">{{ $grupo->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-grip gap-2">
                            <input type="submit" value="Buscar" class="btn btn-primary">
                        </div>
                    </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Genero</th>
                            <th>Fecha Nacimiento</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $studentss)
                            <tr>
                                <td>{{ $studentss->id_student }}</td>
                                <!-- Mostrar la imagen desde el controller-->
                                <td> <img src="{{ url('archive/' . $studentss->photo) }}"
                                        alt="Imagen de perfil Usuario" width="50px"></td>
                                <td>{{ $studentss->app . ' ' . $studentss->apm . ', ' . $studentss->name .'  '. $studentss->matricula }}
                                </td>
                                </td>
                                <td>{{ $studentss->gen }}</td>
                                <td>{{ $studentss->fn }}</td>
                                <td>
                                    <a href="{{ route('students.show') }}"><button type='button'
                                            class="btn btn-primary"><i class="far fa-eye"></i></button></a>
                                    <a type='button' href="/students/{{ $studentss->id_student }}/edit"><button
                                            type='button' class="btn btn-success"><i
                                                class="fas fa-pen-square"></i></button></a>
                                    <form
                                        action="{{ route('students.destroy', $studentss->id_student) }}"
                                        method="POST">

                                        @method('DELETE')
                                        @csrf
                                        <button type='submit' class="btn btn-sm btn-danger"
                                            onClick="return confirm('estas seguro  a eliminar el registro?')">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="float-end">
                    {{ $students->links() }}
                </div>        
            </div>
        </div>
        @endsection
