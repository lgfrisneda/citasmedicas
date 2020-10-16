@extends('layouts.app')

@section('content')
@if(SESSION('info'))
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success" role="alert">
                    {{ SESSION('info') }}
                </div>
            </div>
        </div>
    </div>
@endif
<div class="container">
    <a href="{{ url('agendar/'.$entity.'/'.$cita.'/'.$company.'/'.$servicio.'/'.$sede.'/'.$profesional) }}"><- Regresar</a>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Registro</h4>
                </div>
                <div class="card-body">
                    <h5 class="text-center">Datos del Representante</h5>
                    <hr>
                    <div class="row justify-content-md-center">
                        
                        <div class="col-md-10">
                            <form method="post" action="{{ url('agendar/'.$entity.'/'.$cita.'/'.$company.'/'.$servicio.'/'.$sede.'/'.$profesional.'/'.$dni.'/'.$representante) }}">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="patient_id" id="patient_id" value="{{ $dataRep->patient_id}}">
                                 <div class="form-row">
                                    <div class="form-group col-md-5">
                                        <div class="form-group">
                                            <label for="dni">DNI</label>
                                            <input type="text" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni" value="{{ isset($dataRep->dni)? $dataRep->dni: old('dni') }}">
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
                                            <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="fullname" name="fullname" value="{{ isset($dataRep->fullname)? $dataRep->fullname: old('fullname') }}">
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
                                            <input type="date" class="form-control @error('birthdate') is-invalid @enderror" id="birthdate" name="birthdate" value="{{ isset($dataRep->birthdate)? $dataRep->birthdate: old('birthdate') }}">
                                            @error('birthdate')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-7">
                                        <div class="form-group">
                                            <label for="relationship">PARENTESCO</label>
                                            <input type="text" class="form-control @error('relationship') is-invalid @enderror" id="relationship" name="relationship" value="{{ isset($dataRep->relationship)? $dataRep->relationship: old('relationship') }}">
                                            @error('relationship')
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
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ isset($dataRep->phone)? $dataRep->phone: old('phone') }}">
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
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ isset($dataRep->email)? $dataRep->email: old('email') }}">
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
                                            <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" rows="3">{{ isset($dataRep->address)? $dataRep->address: old('address') }}</textarea>
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
                                            <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ isset($dataRep->city)? $dataRep->city: old('city') }}">
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