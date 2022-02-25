@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel CRUD</title>
    <script src="{{ asset('/js/jquery-3.6.0.min.js') }}"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
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
</head>

<body>
        <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Añadir alumno</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <div class="container">
        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

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
                    value="{{ old('matricula') }}" placeholder="222010043"  autocomplete="off">
                <div class="form-text">
                @if($errors->first('matricula'))<i class="alert-danger">{{$errors->first('matricula')}}</i>@endif
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Nombre(s):</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                    placeholder="Nombre (s)"  autocomplete="off">
                <div class="form-text">
                @if($errors->first('name'))<i class="alert-danger">{{$errors->first('name')}}</i>@endif
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Apellido paterno:</label>
                <input type="text" class="form-control" name="app" value="{{ old('app') }}"
                    placeholder="Apellido Paterno"  autocomplete="off">
                <div class="form-text">
                @if($errors->first('app'))<i class="alert-danger">{{$errors->first('app')}}</i>@endif
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Apellido materno:</label>
                <input type="text" class="form-control" name="apm" value="{{ old('apm') }}"
                    placeholder="Apellido Materno"  autocomplete="off">
                <div class="form-text">
                @if($errors->first('apm'))<i class="alert-danger">{{$errors->first('apm')}}</i>@endif
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha de nacimiento:</label>
                <input type="date" class="form-control" name="fn" value="{{ old('fn') }}">
                <div class="form-text">
                @if($errors->first('fn'))<i class="alert-danger">{{$errors->first('fn')}}</i>@endif
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Género</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="gen" value="Masculino" checked>
                    <label class="form-cheked-label">Masculino</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="gen" value="Femenino">
                    <label class="form-cheked-label">Femenino</label>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Foto:</label>
                <input type="file" class="form-control" name="photo">
            </div>
            <div class="col-sm-7">
            <label class="form-label">Grupo:</label>
                        <select class="form-group bmd-form-group" name="id_grupo">
                            @foreach($groups as $group)
                            <option value="{!! $group->id_groups !!}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>
            <div class="mb-3">
                <label class="form-label">Correo eléctronico:</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                    placeholder="example@example.com"  autocomplete="off">
                <div class="form-text">
                @if($errors->first('email'))<i class="alert-danger">{{$errors->first('email')}}</i>@endif
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña:</label>
                <input type="password" class="form-control" name="password"  autocomplete="off" placeholder="**********">
                <div class="form-text">
                @if($errors->first('pass'))<i class="alert-danger">{{$errors->first('pass')}}</i>@endif
                </div>
            </div>
            <div class="d-grid gap-2">
                <input type="submit" value="Guardar" class="btn btn-primary" />
                <a href="{{ route('students.index') }}" class="btn btn-danger"
                    style="width: 50%;">Cancelar</a>
            </div>
        </form>
    </div>

    <script>
    $(document).ready(function () {
        $(.ir-arriba).click(function () {
            $('body, html').animate({
                scrollTop: '0px'
            }, 300);
        });

        $(window).scroll(function(){
            if ($(this).scrollTop() > 0{
                $('.ir-arriba').slideDown(300);
            } else {
                $('.ir-arriba').slideUp(300);
            }
            );
        });
    });
</script>  
</body>

 

</html>
@endsection