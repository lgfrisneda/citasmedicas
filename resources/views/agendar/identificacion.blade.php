@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ url('agendar/'.$entity.'/'.$cita.'/'.$company.'/'.$servicio.'/'.$sede) }}"><- Regresar</a>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Identificación</h4>
                </div>
                <div class="card-body">
                    <div class="row justify-content-md-center">
                        
                        <div class="col-md-4">
                            <form method="post" action="{{ url('agendar/'.$entity.'/'.$cita.'/'.$company.'/'.$servicio.'/'.$sede.'/'.$profesional) }}">
                                @csrf
                                <div class="form-group">
                                    <label for="dni">DNI</label>
                                    <input type="text" class="form-control" id="dni" name="dni">
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-warning mb-2">Siguiente pantalla</button>
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