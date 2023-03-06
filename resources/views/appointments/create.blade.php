<?php
  use Illuminate\Support\Str; 
?>

@extends('layouts.panel')

@section('content')

<div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Nueva cita</h3>
            </div>
            <div class="col text-right">
              <a href="{{ url('/pacientes')}}" class="btn btn-sm btn-primary">
                <i class="fas fa-arrow-left"></i> Regresar
              </a>
            </div>
          </div>
        </div>

        <div class="card-body">
            <form action="{{ url('/pacientes')}}" method="POST">
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
                    <label for="name">Especialidad</label>
                    <select name="" id="" class="form-control">
                        @foreach($specialties as $specialty)
                            <option value="{{ $specialty->id}}"> {{$specialty->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Médico</label>
                    <select name="" id="" class="form-control"></select>
                </div>
                <div class="form-group">
                    <label for="cedula">Fecha</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                        </div>
                        <input class="form-control datepicker" placeholder="Seleccionar fecha" type="text" 
                        value="{{ date('Y-m-d')}}" data-date-format="yyyy-mm-dd"
                        data-date-start-date="{{ date('Y-m-d')}}" data-date-end-date="+16d">
                    </div>
                </div>
                <div class="form-group">
                    <label for="address">Hora de atención </label>
                    <input type="text" name="address" class="form-control" value="{{old('address')}}">
                </div>
                <div class="form-group">
                    <label for="phone">Tipo de consulta</label>
                    <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
            </form>
        </div>
       
      </div>
@endsection

@section('scripts')
<script src="{{ asset('js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
@endsection