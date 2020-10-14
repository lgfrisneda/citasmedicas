@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ url('agendar/'.$entity.'/'.$cita.'/'.$company) }}"><- Regresar</a>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Sede</h4>
                </div>
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-md-4">
                        @foreach($sedes as $sede)
                            <div class="col mb-4">
                                <div class="card">
                                    <div class="card-footer">
                                        <a href="{{ url('agendar/'.$entity.'/'.$cita.'/'.$company.'/'.$servicio.'/'.$sede->slug) }}" class="btn btn-block btn-primary">{{ $sede->name }}</a>
                                    </div>
                                    <div class="card-body p-2">
                                        <p class="card-text" style="font-size: 0.7rem;">{{ $sede->address }}</p>
                                        <p class="card-text" style="font-size: 0.7rem;">{{ $sede->city }}</p>
                                        <p class="card-text" style="font-size: 0.7rem;">{{ $sede->phone }}</p>
                                        <p class="card-text" style="font-size: 0.7rem;">{{ $sede->email }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $sedes->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection