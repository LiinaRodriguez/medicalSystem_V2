<div>
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
                <label >Departamento</label>
                    <select class="form-control" 
                      id="department_id"
                      wire:model="selectedDepartment">
                      @foreach($departments as $department)
                      <option value="{{ $department->id}}">{{$department->name}}</option>
                      @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="city_id">Ciudad</label>
                    <select class="form-control" name="city_id" 
                    wire:model="City"> 
                         @foreach($cities as $city)
                            <option value="{{ $city->id}}">{{$city->name}}</option>
                         @endforeach
                     
                    </select>
                </div>
                
                <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
            </form>
</div>
