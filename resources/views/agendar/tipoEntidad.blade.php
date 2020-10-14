@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ url('agendar/'.$entity) }}"><- Regresar</a>
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">{{ Str::upper($entity) }}</h4>
                </div>

                <div class="card-body">
                    <div class="row row-cols-1 row-cols-md-6">
                        @foreach($companies as $company)
                            <div class="col mb-4">
                                <a href="{{ url('agendar/'.$entity.'/'.$cita.'/'.$company->slug) }}" class="card">
                                    <img src="{{ $company->image }}" class="img-thumbnail card-img-top" alt="...">
                                </a>
                            </div>
                        @endforeach
                    </div>
                    {{ $companies->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection