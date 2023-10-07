@extends('index')
@section('estilo')
    <link rel="stylesheet" href="{{ asset('assets/css/tracking.css') }}">
@endsection
@section('content')
    <div class="container-track">
        <article class="card">
            <header class="card-header"> Mi orden</header>
            <div class="card-body">
                <h6>Order ID: {{ $paquete->clave_rastreo }}</h6>
                <article class="card">
                    <div class="card-body row">
                        <div class="col"> <strong>Fecha estimada de entrega:</strong> <br>{{ $paquete->fecha_estimada_llegada }} </div>
                        <div class="col"> <strong>Status:</strong> <br> {{ $evento->first()->descripcion_evento }} </div>

                    </div>
                </article>
                <div class="track">
                   
                    @foreach ($eventosPred as $ep)
                    
                        @php
                            // Buscar el evento correspondiente al número de evento actual
                            $eventoInfo = $evento->where('numero_evento', $ep->id)->first();
                            $isActive = ($ep->id <= $evento->max('numero_evento'));
                        @endphp
                        <div class="step {{ $isActive ? 'active' : '' }}">
                            <span class="icon">
                                <i class="{{ $ep->icono }}"></i>
                            </span>
                            <span class="text">
                                {{ $ep->nombre_evento }}
                                @if($eventoInfo)
                                    <br>en {{ $eventoInfo->localizacion_evento }}
                                    <br>A las {{ date('Y-m-d H:i:s', $eventoInfo->unixtime) }}
                                @endif
                            </span>
                        </div>
                    @endforeach
                </div>
                

                <hr>
                <ul class="row">

                </ul>
                <hr>

            </div>
        </article>
    </div>
@endsection
@section('js')
@endsection
