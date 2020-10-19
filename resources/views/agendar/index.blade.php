@extends('layouts.app')

@section('content')
@if(SESSION('info'))
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-primary" role="alert">
                    {{ SESSION('info') }}
                    <a href="{{ route('comprobantePDF') }}" class="btn btn-sm btn-success float-right">Descargar comprobante</a>
                </div>
            </div>
        </div>
    </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4 class="text-center">Agenda tu cita</h4></div>

                <div class="card-body">
                    <div class="row row-cols-1 row-cols-md-3">
                        @foreach($entities as $entity)
                            <div class="col mb-4">
                                <div class="card hovereffect">
                                    <img src="{{ $entity->image }}" class="card-img-top" alt="...">
                                    <div class="overlay">
                                        <a href="{{ url('agendar/'.$entity->slug) }}" class="btn btn-sm btn-primary info">{{ $entity->title }}</a>
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