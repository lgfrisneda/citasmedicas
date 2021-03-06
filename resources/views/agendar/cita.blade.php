@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ url('agendar') }}"><- Regresar</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Tipo de cita</h4>
                    <h6 class="text-center">Tipo de entidad: {{ $entity }}</h6>
                </div>

                <div class="card-body">
                    <div class="row row-cols-1 row-cols-md-3">
                        @foreach($appointments as $appointment)
                            <div class="col mb-4">
                                <div class="card">
                                    <div class="hovereffect">
                                        <img src="{{ $appointment->image }}" class="card-img-top" alt="...">
                                        <div class="overlay">
                                            <a href="{{ url('agendar/'.$entity.'/'.$appointment->slug) }}" class="btn btn-sm btn-secondary info">{{ $appointment->title }}</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text" style="font-size: 0.7rem;">{{ $appointment->description }}</p>
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