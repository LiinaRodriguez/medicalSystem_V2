@extends('layouts.panel')

@section('content')

<div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Nuevo centro médico</h3>
            </div>
            <div class="col text-right">
              <a href="{{ url('/centros')}}" class="btn btn-sm btn-primary">
                <i class="fas fa-arrow-left"></i> Regresar
              </a>
            </div>
          </div>
        </div>

        <div class="card-body">
            <form action="{{ url('/centros')}}" method="POST">
                @csrf

                @if ($errors->any())
                  @foreach($errors->all() as $error)
                  <div class="alert alert-primary" role="alert">
                    <i class=" fas fa-excalamtion-triangle"></i>
                    <strong>Por favor </strong> {{ $error}}
                  </div>
                  @endforeach
                @endif
                <div class="form-group">
                    <label for="name">Nombre del centro</label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}" required>
                </div>
                <div class="form-group">
                    <label for="description">Departamento</label>
                    <input type="text" name="description" class="form-control" value="{{old('description')}}">
                </div>
                <div class="form-group">
                    <label for="description">Ciudad</label>
                    <input type="text" name="description" class="form-control" value="{{old('description')}}">
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
            </form>
        </div>
       
      </div>
@endsection
