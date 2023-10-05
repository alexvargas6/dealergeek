<div class="modal fade" id="modal-" tabindex="-1" role="dialog" aria-labelledby="modal-" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body card-block">
                        <div class="row form-group">
                            <input value="" type="hidden" name="id">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Descripción</label></div>
                            <div class="col-12 col-md-9"><input maxlength="60" value="" type="text" id="text-input" name="DESCRIPCION" placeholder="Descripción" class="form-control"><small class="form-text text-muted">Añade una Descripción</small></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Unidad de medida</label></div>
                            <div class="col-12 col-md-9"><input maxlength="10" value="" type="text" id="text-input" name="UNIDADMEDIDA" placeholder="Unidad de medida" class="form-control"><small class="form-text text-muted">Añade la Unidad de medida</small></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Precio</label></div>
                            <div class="col-12 col-md-9"><input type="number" value="" onKeyPress="if(this.value.length==10) return false;" id="text-input" name="PRECIO1" placeholder="precio del producto" class="form-control"><small class="form-text text-muted">Añade el precio del producto</small></div>
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
