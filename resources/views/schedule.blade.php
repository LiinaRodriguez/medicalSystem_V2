@extends('layouts.panel')

@section('content')
  <form action="{{url('/horario ')}}" method="POST">
  @csrf
  <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Gestionar Horario</h3>
            </div>
            <div class="col text-right">
              <button type="submit" class="btn btn-sm btn-primary">Guardar cambios</button>
            </div>
          </div>
        </div>  
        <div class="card-body">
            @if(session('notification'))
            <div class="alert alert-default" role="alert">
            {{session('notification')}}
            </div>
            @endif
            @if(session('errors'))
            <div class="alert alert-info" role="alert">
              Los cambios se han guardado, pero se encontraron las siguientes novedades
              <ul>
                @foreach(session('errors') as $error)
                  <li>{{$error}}</li>
                @endforeach
              </ul>
            
            </div>
            @endif
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Día</th>
                <th scope="col">Activo</th>
                <th scope="col">Turno Manaña</th>
                <th scope="col">Turno tarde</th>
              </tr>
            </thead>
            <tbody>
               @foreach($schedules as $key => $schedule)
                <tr>
                  <th>{{$days[$key]}}</th>
                  <td>
                    <label class="custom-toggle">
                      <input type="checkbox" name="active[]" value="{{ $key }}"
                      @if($schedule->active) checked @endif >

                      <span class="custom-toggle-slider rounded-circle"></span>
                    </label>
                  </td>
                  <td>
                    <div class="row">
                      <div class="col">
                        <select class="form-control" name="morning_start[]" id="schedule">
                          @for($i=8; $i<=11; $i++)
                            <option value="{{($i<10 ? '0': '') . $i}}:00"
                            @if($i.':00 AM' == $schedule->morning_start) selected @endif>
                            {{$i}}:00 AM</option>
                            <option value="{{($i<10 ? '0': '') . $i}}:30" 
                            @if($i.':30 AM' == $schedule->morning_start) selected @endif>
                            {{$i}}:30 AM</option>
                          @endfor
                        </select>
                      </div>
                      <div class="col">
                        <select class="form-control" name="morning_end[]" id="schedule">
                          @for($i=8; $i<=11; $i++)
                            <option value="{{ ($i<10 ? '0': '') . $i}}:00"
                            @if($i.':00 AM' == $schedule->morning_end) selected @endif>
                            {{$i}}:00 AM</option>
                            <option value="{{ ($i<10 ? '0': '') . $i}}:30"
                            @if($i.':30 AM' == $schedule->morning_end) selected @endif>
                            {{$i}}:30 AM</option>
                          @endfor
                        </select>
                      </div>
                    </div>
                  </td>
                  <td>
                  <div class="row">
                      <div class="col">
                        <select class="form-control" name="afternoon_start[]" id="schedule">
                          @for($i=2; $i<=5; $i++)
                            <option value="{{$i+12}}:00"
                            @if($i.':00 PM' == $schedule->afternoon_start) selected @endif>
                            {{$i}}:00 PM</option>
                            <option value="{{$i+12}}:30"
                            @if($i.':30 PM' == $schedule->afternoon_start) selected @endif>
                            {{$i}}:30 PM</option>
                          @endfor
                        </select>
                      </div>
                      <div class="col">
                        <select class="form-control" name="afternoon_end[]" id="schedule">
                          @for($i=2; $i<=5; $i++)
                            <option value="{{$i+12}}:00"
                            @if($i.':00 PM' == $schedule->afternoon_end) selected @endif>
                            {{$i}}:00 PM</option>
                            <option value="{{$i+12}}:30"
                            @if($i.':30 PM' == $schedule->afternoon_end) selected @endif>
                            {{$i}}:30 PM</option>
                          @endfor
                        </select>
                      </div>
                    </div>
                  </td>
                </tr>

               @endforeach
            </tbody>
          </table>
        </div>

      </div>
  </form>
@endsection
