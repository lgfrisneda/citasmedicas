@extends('layouts.app')

@section('content')
<div class="container">
    @if($entity == "particular")
    <a href="{{ url('agendar/'.$entity) }}"><- Regresar</a>
    @else
    <a href="{{ url('agendar/'.$entity.'/'.$cita.'/') }}"><- Regresar</a>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Servicios</h4>
                </div>
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-md-4">
                        @foreach($services as $service)
                            <div class="col mb-4">
                                <div class="card">
                                    <a href="{{ url('agendar/'.$entity.'/'.$cita.'/'.$company.'/'.$service->slug) }}">
                                        <img src="{{ $service->image }}" class="card-img-top" alt="...">
                                        <div class="div-encima">
                                            <p>{{ $service->title }}</p>
                                        </div>
                                    </a>
                                    
                                    <div class="card-body p-2">
                                        <p class="card-text" style="font-size: 0.7rem;">{{ $service->description }}</p>
                                    </div>
                                    @if($entity == 'particular')
                                        <div class="card-footer">
                                            <p class="text-center">{{ $service->price }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $services->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection