@extends('layouts.panel')

@section('content')

<div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Centros médicos</h3>
            </div>
            <div class="col text-right">
              <a href="{{ url('/centros/create')}}" class="btn btn-sm btn-primary">Nuevo Centro</a>
            </div>
          </div>
        </div>
        <div class="card-body">
            @if(session('notification'))
            <div class="alert alert-default" role="alert">
            {{session('notification')}}
            </div>

            @endif
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Departamento</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Opciones</th>
              </tr>
            </thead>
            <tbody>
               @foreach($medicalcenters as $medcenter)
              <tr>
                <th scope="row">
                  {{$medcenter->name}}
                </th>
                <td>
                  <!--{{$medcenter->department}}-->
                </td>
                <td>
                   <!--{{$medcenter->city}}-->
                </td>
                <td>
                    <form action="{{ url('/centros/'.$medcenter->id)}}" method="POST">
                      @csrf 
                      @method('DELETE')
                      
                      <a href="{{ url('/centros/'.$medcenter->id.'/edit')}}" class="btn btn-sm btn-primary">  Editar</a>
                      <button type = "submit" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                    
                </td>
              </tr>
             @endforeach
            </tbody>
          </table>
        </div>
      </div>
@endsection
