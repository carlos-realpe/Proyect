
mostrarTrabajos();
function mostrarTrabajos() {
    var url = "index.php?c=Admin&a=AjaxListaTrabajos";
    var xmlh = new XMLHttpRequest();
    xmlh.open("GET", url, true);
    xmlh.send();
    xmlh.onreadystatechange = function () {
        if (xmlh.readyState === 4 && xmlh.status === 200) {
            var respuesta = xmlh.responseText;
            var trabajos = JSON.parse(respuesta);
            var resultados = "";
            var contador = 0;
            for (var i = 0; i < trabajos.length; i++) {
                trabajo = trabajos[i];
                contador++;
                resultados += '<tr><td>' + contador + '</td>';
                resultados += '<td>' + trabajo.titulo + ' </td>';
                resultados += '<td>' + trabajo.detalle + ' </td>';
                resultados += '<td>' + trabajo.fecha + ' </td>';
                resultados += '<td><div class="btn-group btn-group-sm d-flex justify-content-center" role="group">';
                resultados += '<a href="#" onclick="EliminarTrabajo(' + trabajo.id_registro_trabajo + ')" class="btn btn-danger mx-1">Eliminar </a>';
                resultados += '<a href="index.php?c=Admin&a=mostrarEditarTrabajo&postu=' + trabajo.id_registro_trabajo +'" class="btn btn-primary mx-1">Modificar</a>';
                resultados += ' </div > </td></tr >';
            }

            document.getElementById('listaTrabajos').innerHTML = resultados;
        }
    }

}



function EliminarTrabajo(id) {
    swal({
        title: "¿Está seguro de Eliminar el trabajo del usuario",
        text: "",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        buttons: ["Cancelar", "Si"],
    })
        .then((willDelete) => {
            if (willDelete) {
                validador = false;
                var url = "index.php?c=Admin&a=AjaxEliminarTrabajo&idTrabajo=" + id;
                var xmlh = new XMLHttpRequest();
                xmlh.open("GET", url, true);
                xmlh.send();
                xmlh.onreadystatechange = function () {
                    if (xmlh.readyState === 4 && xmlh.status === 200) {
                        mostrarTrabajos();
                    }
                }
            }
        });
}


function buscarAjaxTrabajo() {
    var buscar = document.getElementById("buscarTrabajo").value;
    var selectBuscar = document.getElementById("selec-fecha").selectedIndex;
    
    var url = "index.php?c=Admin&a=buscarAjaxTrabajo&nom=" + buscar + "&busquedaFecha=" + selectBuscar;
    var xmlh = new XMLHttpRequest();
    xmlh.open("GET", url, true);
    xmlh.send();

    xmlh.onreadystatechange = function () {
        if (xmlh.readyState === 4 && xmlh.status === 200) {
            var respuesta = xmlh.responseText;
     
            var trabajos = JSON.parse(respuesta);
           
            resultados = '';
            var contador = 0;
            for (var i = 0; i < trabajos.length; i++) {
                trabajo = trabajos[i];
                contador++;
                resultados += '<tr><td>' + contador + '</td>';
                resultados += '<td>' + trabajo.titulo + ' </td>';
                resultados += '<td>' + trabajo.detalle + ' </td>';
                resultados += '<td>' + trabajo.fecha + ' </td>';
                resultados += '<td><div class="btn-group btn-group-sm d-flex justify-content-center" role="group">';
                resultados += '<a href="#" onclick="EliminarTrabajo(' + trabajo.id_registro_trabajo + ')" class="btn btn-danger mx-1">Eliminar </a>';
                resultados += '<a href="index.php?c=Admin&a=mostrarEditarTrabajo&postu=' + trabajo.id_registro_trabajo + '" class="btn btn-primary mx-1">Modificar</a>';
                resultados += ' </div > </td></tr >';

            }
            document.getElementById('listaTrabajos').innerHTML = resultados;
        }

    };
}
