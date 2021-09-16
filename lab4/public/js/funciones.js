$(document).ready(function () {
	$("#txt_busq").keyup(function(event) {
		cargarProductos($(this).val());
	});
});

function cargarProductos(parametro) {
	$.ajax({
		type: 'GET',
		url: 'mostrar',
		data: {datobusqueda: parametro}
	}).done(function(datos) {
		var json = JSON.parse(datos);

		$("#grid").html("<thead><tr><th>Codigo</th><th>Nombre</th><th>Precio</th><th>Cantidad</th></tr></thead><tbody>");
		$.each(json, function(k, v){
			var fila = "<tr><td>" + v.codigo + "</td><td>" + v.nombre + "</td><td>" + v.precio + "</td><td>" + v.cantidad + "</td></tr>"

			$("#grid").append(fila);
		});
	}).fail(function(jqXHR, textStatus, errorThrow) {
		$("#msjbox").html(textStatus + ": Recurso " + errorThrow);
	});
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});