@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ url('agendar/'.$entity.'/'.$cita.'/'.$company.'/'.$servicio.'/'.$sede.'/'.$profesional) }}"><- Regresar</a>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Registro</h4>
                </div>
                <div class="card-body">
                    <h5 class="text-center">Datos del paciente</h5>
                    <hr>
                    <div class="row justify-content-md-center">
                        
                        <div class="col-md-10">
                            <form method="post" action="{{ url('agendar/'.$entity.'/'.$cita.'/'.$company.'/'.$servicio.'/'.$sede.'/'.$profesional.'/'.$dni) }}">
                                @method('PUT')
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-5">
                                        <div class="form-group">
                                            <label for="dni">DNI</label>
                                            <input type="text" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni" value="{{ isset($dataPatient->dni)? $dataPatient->dni: old('dni') }}">
                                            @error('dni')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-7">
                                        <div class="form-group">
                                            <label for="fullname">NOMBRE COMPLETO</label>
                                            <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="fullname" name="fullname" value="{{ isset($dataPatient->fullname)? $dataPatient->fullname: old('fullname') }}">
                                            @error('fullname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-5">
                                        <div class="form-group">
                                            <label for="birthdate">FECHA DE NACIMIENTO</label>
                                            <input type="date" class="form-control @error('birthdate') is-invalid @enderror" id="birthdate" name="birthdate" value="{{ isset($dataPatient->birthdate)? $dataPatient->birthdate: old('birthdate') }}">
                                            @error('birthdate')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <small class="form-text text-muted">
                                                Si el paciente es menor de edad, en la siguiente pantalla debera registrar un responsable mayor de edad.
                                            </small>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-7">
                                        <div class="form-group">
                                            <label for="gender">GÉNERO</label>
                                            <select class="custom-select @error('phone') is-invalid @enderror" id="gender" name="gender">
                                                <option value="" {{ $dataPatient->gender == ''? 'selected' : '' }}>Seleccione</option>
                                                <option value="F" {{ $dataPatient->gender == 'F'? 'selected' : '' }}>Femenino</option>
                                                <option value="M" {{ $dataPatient->gender == 'M'? 'selected' : '' }}>Masculino</option>
                                            </select>
                                            @error('gender')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-5">
                                        <div class="form-group">
                                            <label for="phone">TELÉFONO</label>
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ isset($dataPatient->phone)? $dataPatient->phone: old('phone') }}">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-7">
                                        <div class="form-group">
                                            <label for="email">EMAIL</label>
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ isset($dataPatient->email)? $dataPatient->email: old('email') }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <div class="form-group">
                                            <label for="address">DIRECCIÓN</label>
                                            <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" rows="3">{{ isset($dataPatient->address)? $dataPatient->address: old('address') }}</textarea>
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="city">CIUDAD</label>
                                            <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ isset($dataPatient->city)? $dataPatient->city: old('city') }}">
                                            @error('city')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-warning mb-2">Agendar cita</button>
                                </div>
                            </form>
                        </div>
                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection