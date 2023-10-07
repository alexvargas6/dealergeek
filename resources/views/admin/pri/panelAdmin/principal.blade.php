@extends('admin.nav.all')
@section('cont')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Panel administrador</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#permisosID">
                                    añadir modulo
                                </button>
                                ||
                                <button type="button" class="btn btn-secondary mb-1" data-toggle="modal"
                                    data-target="#addUs">
                                    Añadir usuario
                                </button>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.pri.panelAdmin.permisos')
    @include('admin.pri.panelAdmin.agregarUs')
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">

                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif
                @if (\Session::has('ERROR'))
                    <div class="alert alert-warning">
                        <ul>
                            <li>{!! \Session::get('ERROR') !!}</li>
                        </ul>
                    </div>
                @endif

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Usuarios</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Clave de rastreo</th>
                                        <th>Descripción</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuarios as $us)
                                        <tr>
                                            <td>{{ $us->name }}</td>
                                            <td>{{ $us->email }}</td>

                                            <td> <button type="button" onclick="mostrarModal('{{ $us->id }}')"
                                                    class="btn btn-warning btn-lg">permisos</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalAsignacionPermisos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scr')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/js/init/datatables-init.js') }}"></script>


    <script type="text/javascript" src="{{ asset('assets/js/select/municipios.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/select/select_estados.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


    <script>
        function mostrarModal(userId) {
            var id = userId;
            var url = "{{ route('obternerpermisos.usuario', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    // Llenar el modal con la información de los permisos
                    document.getElementById('staticBackdropLabel').innerText = 'Usuario ' + userId;

                    // Obtén el modal-body
                    var modalBody = $('#modalAsignacionPermisos .modal-body');

                    // Limpia cualquier contenido previo en el modal-body
                    modalBody.empty();

                    // Itera sobre los resultados y agrega etiquetas con botones de cierre
                    response.forEach(function(item) {
                        // Crea una etiqueta span con el permiso y un botón de cierre
                        var tag = $('<span class="badge bg-primary"></span>').text(item.permiso_id);
                        var closeButton = $(
                            '<button type="button" class="btn-close" aria-label="Close"></button>');

                        // Agrega un listener para eliminar la etiqueta al hacer clic en el botón de cierre
                        closeButton.click(function() {
                            $(this).prev().remove(); // Elimina la etiqueta
                            $(this).remove(); // Elimina el botón de cierre
                        });

                        // Agrega la etiqueta y el botón al modal-body
                        modalBody.append(tag).append(closeButton);
                    });

                    // Muestra el modal
                    var myModal = new bootstrap.Modal(document.getElementById('modalAsignacionPermisos'));
                    myModal.show();
                },

                error: function(error) {
                    console.error('Error al obtener los permisos: ', error);
                }
            });

        }
    </script>
@endsection
