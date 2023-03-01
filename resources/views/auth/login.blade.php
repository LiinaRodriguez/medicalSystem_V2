@extends('layouts.form')

@section('content')

<section class="vh-100" style="background-color: #e5e8fd;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">

                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src=" {{asset('img/brand/log-in.jpg')}}" alt="login form" class="img-fluid"
                                    style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 text-black">

                                    <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                        <div class="d-flex align-items-center mb-2 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">Medical System </span>
                                        </div>
                                        
                                        <div class="form-outline mb-2">
                                        @if ($errors->any())
                                        
                                            <div class="alert alert-default mb-2" role="alert">           
                                                {{ $errors->first() }} 
                                            </div>

                                        @else
                                            <div class="text-center  text-muted mb-4">
                                                <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Inicia Sesion</h5>
                                            </div>
                    
                                        @endif
                                        
                                    </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="email">Correo electrónico</label>
                                            <input type="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="password">Contraseña</label>
                                            <input type="password" id="password" class="form-control form-control-lg" name="password" required autocomplete="current-password" />
                                        </div>
                                        <div class="custom-control custom-control-alternative custom-checkbox">
                                          <input name="remeber" class="custom-control-input" id=" remeber" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                           <label class="custom-control-label" for=" remeber">
                                              <span class="text-muted">Recordar datos</span>
                                           </label>
                                        </div>                                 
                                        <div class="pt-1 mb-4 ">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit">Acceder</button>
                                        </div>
                                          </form>

                                          <div class="row mt-3">
                                         <div class="col-6">
                                             <a href="{{ route('password.request') }}" class="text-light"><small>Olvidaste tu contraseña?</small></a>
                                         </div>
                                         <div class="col-6 text-right">
                                              <a href="{{route('register')}}" class="text-light"><small>Crea cuenta</small></a>
                                          </div>
                                         </div>       
                                </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
@endsection
