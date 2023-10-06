<div class="modal fade" id="modalEstados-{{ $pro->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <h1>Estados</h1>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-{{ $pro->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-{{ $pro->id }}">{{ $pro->descripcion }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body card-block">
                        <div class="row form-group">
                            <input value="{{ $pro->id }}" type="hidden" name="id">
                            <div class="col-md-3"><label for="text-input" class="form-control-label">Clave
                                    rastreo</label></div>
                            <div class="col-md-9"><input readonly value="{{ $pro->clave_rastreo }}" type="text"
                                    id="text-input" name="DESCRIPCION" placeholder="Descripción" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-3"><label for="text-input" class="form-control-label">Descripción</label>
                            </div>
                            <div class="col-md-9"><input readonly value="{{ $pro->descripcion }}" type="text"
                                    id="text-input" class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-3"><label for="text-input" class="form-control-label">Correo</label>
                            </div>
                            <div class="col-md-9"><input readonly value="{{ $pro->correo_recibe }}" id="text-input"
                                    class="form-control"></div>
                        </div>
                        <!-- Nombre de la persona que recibe -->
                        <div class="row form-group">
                            <div class="col-md-3"><label for="nombre_recibe" class="form-control-label">Nombre de quien
                                    recibe</label></div>
                            <div class="col-md-9"><input readonly type="text" id="nombre_recibe"
                                    value="{{ $pro->nombre_recibe }}" class="form-control"></div>
                        </div>

                        <!-- Domicilio con ciudad -->
                        <div class="row form-group">
                            <div class="col-md-3"><label for="domicilio_recibe" class="form-control-label">Domicilio de
                                    quien recibe</label></div>
                            <div class="col-md-9">
                                <input readonly type="text" id="domicilio_recibe"
                                    value="{{ $pro->domicilio_recibe }}, {{ $pro->ciudad }}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <!-- Medidas de largo, alto y ancho -->
                    <div class="row form-group">
                        <div class="col-md-3"><label for="largo" class="form-control-label">Largo (cm)</label></div>
                        <div class="col-md-3"><input readonly type="number" step="0.01" min="0"
                                value="{{ $pro->largo_cm }}" class="form-control"></div>
                        <div class="col-md-3"><label for="ancho" class="form-control-label">Ancho (cm)</label></div>
                        <div class="col-md-3"><input readonly type="number" step="0.01" min="0"
                                value="{{ $pro->ancho_cm }}" class="form-control"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3"><label for="altura" class="form-control-label">Altura (cm)</label></div>
                        <div class="col-md-3"><input readonly type="number" step="0.01" min="0"
                                value="{{ $pro->altura_cm }}" class="form-control"></div>
                    </div>
                </div>
                <!-- Agrega esto donde quieras que aparezca el botón -->
                <button type="button" class="btn btn-primary" onclick="hideFirstModalAndShowSecond({{ $pro->id }})">
                    Validar estado
                </button>
        </div>
        </form>
    </div>
</div>
</div>
