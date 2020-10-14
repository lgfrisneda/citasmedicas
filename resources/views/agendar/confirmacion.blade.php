@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ url('agendar/'.$entity.'/'.$cita.'/'.$company.'/'.$servicio.'/'.$sede.'/'.$profesional.'/'.$dni.'/'.$representante) }}"><- Regresar</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h5 class="text-center">Datos del Representante</h5>
                <div class="card mb-3">
                    <h4 class="card-header text-white bg-info text-center">Cita preliminar</h4>
                    <div class="card-body">
                        <form method="post" action="{{ url('agendar/guardar') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-2">
                                    <p class="card-title font-weight-bold text-primary">Entidad</p>
                                </div>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" id="entity" name="entity" value="{{ $entity->title }}" readonly>
                                </div>
                                <div class="col-md-2">
                                    <p class="card-title font-weight-bold text-primary">Cita</p>
                                </div>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" id="cita" name="cita" value="{{ $cita->title }}" readonly>
                                </div>
                            </div>
                            @if(isset($company->title))
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="card-title font-weight-bold text-primary">Empresa o particular</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" id="company" name="company" value="{{ $company->title }}" readonly>
                                    </div>
                                </div>
                            @else
                                <input class="form-control" type="hidden" id="company" name="company" value="n-a" readonly>
                            @endif
                            <hr>
                            <div class="row">
                                <div class="col-md-2">
                                    <p class="card-title font-weight-bold text-primary">Servicio</p>
                                </div>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" id="servicio" name="servicio" value="{{ $servicio->title }}" readonly>
                                </div>
                                <div class="col-md-2">
                                    <p class="card-title font-weight-bold text-primary">Profesional</p>
                                </div>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" id="profesional" name="profesional" value="{{ $profesional->speciality }} {{ $profesional->name }}" readonly>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="card-title font-weight-bold text-primary">Fecha y hora</p>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" id="datetime" name="datetime" value="{{ $datetime->date }} . {{ $datetime->time }}" readonly>
                                </div>
                            </div>
                            @if(isset($sede->address))
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="card-title font-weight-bold text-primary">Dirección</p>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" id="sede" name="sede" value="{{ $sede->address }}" readonly>
                                </div>
                            </div>
                            @else
                                <input class="form-control" type="hidden" id="sede" name="sede" value="n-a" readonly>
                            @endif  
                            <hr>
                            <div class="row">
                                <div class="col-md-2">
                                    <p class="card-title font-weight-bold text-primary">Paciente</p>
                                </div>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" id="paciente" name="paciente" value="{{ $paciente->dni }} - {{ $paciente->fullname }}" readonly>
                                </div>
                                @if(isset($pacienteRep->dni))
                                <div class="col-md-2">
                                    <p class="card-title font-weight-bold text-primary">Responsable</p>
                                </div>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" id="pacienteRep" name="pacienteRep" value="{{ $pacienteRep->dni }} - {{ $pacienteRep->fullname }}" readonly>
                                </div>
                                @else
                                <input class="form-control" type="hidden" id="pacienteRep" name="pacienteRep" value="n-a" readonly>
                                @endif    
                            </div>
                            <hr>
                            <p class="text-muted text-center">Luego de verificar los datos de su cita presione el boton de Solicitar</p>
                            <hr>
                            <button type="submit" class="btn btn-block btn-success">Solicitar</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection