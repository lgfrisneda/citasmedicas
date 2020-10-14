@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ url('agendar/'.$entity.'/'.$cita.'/'.$company.'/'.$servicio) }}"><- Regresar</a>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Profesionales, fecha y hora de la cita</h4>
                </div>
                <div class="card-body">
                    <!--<div class="row justify-content-md-center">
                        TODO 
                            Calendario horizontal con peticiones a api/profesional/fecha para mostrar los profesionales disponibles
                        
                        
                        <div class="col-md-6">
                            <draggable-cal @selectedDate="doSomething($event)"></draggable-cal>
                        </div>
                        
                    </div>-->
                    <p class="text-muted">Segun la entidad, el tipo de cita, la empresa (en caso de las opciones EPS y PREPAGA) y el servicio seleccionado, se mostraran los profesionales y horarios disponibles dentro de 4 días a partir de la fecha actual.</p>
                    <h5 class="text-center">Profesionales disponibles para -> {{ $date }}</h5>
                    <hr>

                    <div class="row mb-2">
                        @foreach($professionals as $professional)

                            <div class="col-md-6">
                                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                    <div class="col-auto d-none d-lg-block">
                                        <img class="bd-placeholder-img" width="200" height="250" src="{{ $professional->professional->photo }}">
                                    </div>
                                    <div class="col p-4 d-flex flex-column position-static">
                                        <h5 class="font-italic"><u>Nombre:</u> {{ $professional->professional->name }}</h5>
                                        <div class="mb-1 text-muted"><u>Especialidad:</u> {{ $professional->professional->speciality }}</div>
                                        <p class="card-text mb-auto"><u>Descripción:</u> {{ $professional->professional->description }}</p>
                                        <strong class="d-inline-block mb-2 text-primary"><u>Hora:</u> {{ $professional->time }}</strong>
                                        <a class="btn btn-primary" href="{{ url('agendar/'.$entity.'/'.$cita.'/'.$company.'/'.$servicio.'/'.$sede.'/'.$professional->id) }}">Seleccionar</a>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection