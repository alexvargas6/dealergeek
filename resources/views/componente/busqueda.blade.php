@extends('index')
@section('scrpts')
    <!--<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>-->
@endsection
@section('estilo')
    <style>
        /* Estilo para el contenedor principal del formulario */
        form {
            background-color: black;
            /* Fondo negro */
            padding: 20px;
            /* Espaciado interior */
            border-radius: 10px;
            /* Bordes redondeados */
        }

        /* Estilo para el texto "RASTREE SU ENVÍO" */
        legend {
            color: white;
            /* Color del texto */
            font-weight: bold;
            /* Texto en negrita */
        }

        /* Estilo para el input de búsqueda */
        .form-control {
            width: 80%;
            /* Ancho del input */
            padding: 10px;
            /* Espaciado interior */
            border: none;
            /* Sin borde */
            background-color: #333;
            /* Color de fondo oscuro */
            color: white;
            /* Color del texto */
        }

        /* Estilo para el botón de búsqueda */
        .btn-search {
            padding: 10px 20px;
            /* Espaciado interior */
            border: none;
            /* Sin borde */
            background-color: #555;
            /* Color de fondo oscuro */
            color: white;
            /* Color del texto */
            cursor: pointer;
            /* Cambio de cursor al pasar el ratón */
        }

        /* Estilo para el icono dentro del botón de búsqueda */
        .btn-search svg {
            fill: white;
            /* Color del icono */
        }

        /* Alinear el icono en el centro del botón */
        .btn-search svg {
            vertical-align: middle;
        }
    </style>
@endsection

@section('content')
    @if (\Session::has('ERROR'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong> {!! \Session::get('ERROR') !!}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="s005">
        <form action="{{ route('seguimientoPost') }}" method="POST">
            <!-- Modificado para usar form action -->
            @csrf <!-- Agrega el token CSRF -->
            <fieldset>
                <legend>RASTREE SU ENVÍO</legend>
                <div class="inner-form">
                    <div class="input-field">
                        <input class="form-control" name="id" type="text" placeholder="Su clave de rastreo aquí..."
                            required />
                        <!-- Modificado para incluir un name -->
                        <button class="btn-search" type="submit"> <!-- Modificado para usar submit -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path
                                    d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
            </fieldset>
        </form>

    </div>


    <!--<script src="{{ asset('assets/js/extention/choices.js') }}"></script>-->
@endsection
