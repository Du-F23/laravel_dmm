@extends('layouts.app')

@section('content')


<style>
        input[type=text],
        input[type=email],
        input[type=date],
        input[type=file],
        input[type=password],
        input[type=submit],
        button,
        .alert-danger,
        .form-floating {
            width: 50%;
        }

        .ir-arriba {
            display: none;
            padding: 5px;
            background: #024959;
            font-size: 25px;
            color: #fff;
            cursor: pointer;
            position: fixed;
            bottom: 20px;
            right: 20px;
            border-radius: 10px 10px 0px 0px;
        }

        .alert-danger {
            border-radius: 3px;
            border: 1px solid #C00;
            margin: 10px;
        }

    </style>
<div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Editar Categoria</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <div class="container">
                                <form action="{{route('students.update', ['id'=>$student->id_student])}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    @if(count($errors)>0)
                <div class="alert alert-danger d-flex">
                    <div>
                        <h3>Campos en error: </h3>
                        @foreach($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                </div>
            @endif
                                    <div class="mb-3">
                <label class="form-label">Matricula:</label>
                <input type="text" class="form-control" name="matricula"
                value="{{$student->matricula}}" placeholder="222010043"  autocomplete="off">
                <div class="form-text">
                @if($errors->first('matricula'))<i class="alert-danger">{{$errors->first('matricula')}}</i>@endif
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Nombre(s):</label>
                <input type="text" class="form-control" name="name" value="{{$student->name}}"
                    placeholder="Nombre (s)"  autocomplete="off">
                <div class="form-text">
                @if($errors->first('name'))<i class="alert-danger">{{$errors->first('name')}}</i>@endif
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Apellido paterno:</label>
                <input type="text" class="form-control" name="app" value="{{$student->app}}"
                    placeholder="Apellido Paterno"  autocomplete="off">
                <div class="form-text">
                @if($errors->first('app'))<i class="alert-danger">{{$errors->first('app')}}</i>@endif
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Apellido materno:</label>
                <input type="text" class="form-control" name="apm" value="{{$student->apm}}"
                    placeholder="Apellido Materno"  autocomplete="off">
                <div class="form-text">
                @if($errors->first('apm'))<i class="alert-danger">{{$errors->first('apm')}}</i>@endif
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha de nacimiento:</label>
                <input type="date" class="form-control" name="fn" value="{{$student->fn}}">
                <div class="form-text">
                @if($errors->first('fn'))<i class="alert-danger">{{$errors->first('fn')}}</i>@endif
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Género</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="gen" value="Masculino" {{$student->gen == "Masculino"?'checked':'';}}>
                    <label class="form-cheked-label">Masculino</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="gen" value="Femenino" {{$student->gen == "Femenino"?'checked':'';}}>
                    <label class="form-cheked-label">Femenino</label>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Foto:</label>
                <input type="file" class="form-control" name="photo1">
                <br/>
                <label>Foto actual:</label>
                <span class="" type="text" placeholder="disabled input" aria-label="disabled input example" disabled name=""> {{$student->photo}} </span>
            </div>
            <div class="col-sm-7">
            <label class="form-label">Grupo:</label>
                        <select class="form-select" name="id_grupo">
                            @foreach($groups as $group)
                            @if($student->id_grupo == $group->id_groups)
                            <option value="{{ $group->id_groups }}">-- {{ $group->name }} --</option>
                            @endif
                            @endforeach
                            @foreach($groups as $group)
                            @if($student->id_grupo != $group->id_groups)
                            <option value="{{ $group->id_groups }}">{{ $group->name }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
            <div class="mb-3">
                <label class="form-label">Correo eléctronico:</label>
                <input type="email" class="form-control" name="email" 
                    placeholder="example@example.com"  autocomplete="off" value="{{$student->email}}">
                <div class="form-text">
                @if($errors->first('email'))<i class="alert-danger">{{$errors->first('email')}}</i>@endif
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña:</label>
                <input type="password" class="form-control" name="password"  autocomplete="off" placeholder="**********" value="{{$student->password}}">
                <div class="form-text">
                @if($errors->first('pass'))<i class="alert-danger">{{$errors->first('pass')}}</i>@endif
                </div>
            </div>

                <button type="submit" value="Guardar" class="btn btn-primary">Guardar</button>
                <a href="{{ route('students.index') }}" class="btn btn-danger"
                    >
                    Cancelar
                    </a>

        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>

@endsection