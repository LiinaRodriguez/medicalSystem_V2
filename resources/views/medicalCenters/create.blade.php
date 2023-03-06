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
           @livewire('medical-center')
        </div>
       
      </div>
@endsection
