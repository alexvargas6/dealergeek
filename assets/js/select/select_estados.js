$(document).ready(function(){
    // Cargamos los estados
    var estados = "<option value='' disabled selected>Selecciona el estado</option>";

    for (var key in municipios) {
        if (municipios.hasOwnProperty(key)) {
            estados = estados + "<option value='" + key + "'>" + key + "</option>";
        }
    }

    $("[name='estSal']").html(estados);

    // Al detectar
    $("[name='estSal']" ).change(function() {
        var html = "<option value='' disabled selected>Selecciona el municipio</option>";
        $( "[name='estSal'] option:selected" ).each(function() {
            var estado = $(this).text();
            if(estado != "Selecciona el estado"){
                var municipio = municipios[estado];
                for (var i = 0; i < municipio.length; i++)
                    html += "<option value='" + municipio[i] + "'>" + municipio[i] + "</option>";
            }
        });
        $("[name='MunSal__']").html(html);
        $('select').material_select('update');
    })
    .trigger( "change" );
});