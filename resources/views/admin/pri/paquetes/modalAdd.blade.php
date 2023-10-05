<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{route('paquetes.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Nuevo paquete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Descripción</label></div>
                            <div class="col-12 col-md-9"><input maxlength="60" type="text" name="descripcion" placeholder="Descripción" class="form-control"><small class="form-text text-muted">Añade una Descripción</small></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="largo" class="form-control-label">Largo (cm)</label></div>
                            <div class="col-12 col-md-9"><input type="number" step="0.01" min="0" name="largo_cm" placeholder="Largo (cm)" class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="ancho" class="form-control-label">Ancho (cm)</label></div>
                            <div class="col-12 col-md-9"><input type="number" step="0.01" min="0" name="ancho_cm" placeholder="Ancho (cm)" class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="altura" class="form-control-label">Altura (cm)</label></div>
                            <div class="col-12 col-md-9"><input type="number" step="0.01" min="0" name="altura_cm" placeholder="Altura (cm)" class="form-control"></div>
                        </div>
                        <div class="row form-group">
                        @include('componente.selectLocalizacion')
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
