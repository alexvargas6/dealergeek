<div class="modal fade" id="permisosID" tabindex="-1" role="dialog" aria-labelledby="permisosID" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Agregar Permiso</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('permisos.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nombre_modulo">Nombre del Módulo</label>
                                        <input type="text" class="form-control" id="nombre_modulo" name="module_name" placeholder="Nombre del módulo" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nombre_ruta">Nombre de la Ruta</label>
                                        <input type="text" class="form-control" id="nombre_ruta" name="module_route" placeholder="Nombre de la ruta" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nombre_permiso">Nombre del Permiso</label>
                                        <input type="text" class="form-control" id="nombre_permiso" name="nombre_permiso" placeholder="Nombre del permiso" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="clave_permiso">Clave del Permiso</label>
                                        <input type="text" class="form-control" id="clave_permiso" name="clave_permiso" placeholder="Clave del permiso" required>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
