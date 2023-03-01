@extends('layouts.panel')

@section('content')

<div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Modificar especialidad</h3>
            </div>
            <div class="col text-right">
              <a href="{{ url('/especialidades')}}" class="btn btn-sm btn-primary">
                <i class="fas fa-arrow-left"></i> Regresar
              </a>
            </div>
          </div>
        </div>

        <div class="card-body">
            <form action="{{ url('/especialidades/'.$specialty->id)}}" method="POST">
                @csrf
                @method('PUT')


                @if ($errors->any())
                  @foreach($errors->all() as $error)
                  <div class="alert alert-primary" role="alert">
                    <i class=" fas fa-excalamtion-triangle"></i>
                    <strong>Por favor </strong> {{ $error}}
                  </div>
                  @endforeach
                @endif
                <div class="form-group">
                    <label for="name">Nombre de la especialidad</label>
                    <input type="text" name="name" class="form-control" value="{{old('name', $specialty->name)}}" required>
                </div>
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <input type="text" name="description" class="form-control" value="{{old('description', $specialty->description)}}">
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
            </form>
        </div>
       
      </div>
@endsection