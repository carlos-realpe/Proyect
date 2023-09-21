
var contador = "";
var celiminado = "";
var vuelta = "";
var url = "index.php?c=Notificar&a=NotificarPostulante";
var xmlh = new XMLHttpRequest();
xmlh.open("GET", url, true);
xmlh.send();
xmlh.onreadystatechange = function () {
    if (xmlh.readyState === 4 && xmlh.status === 200) {
        var respuesta = xmlh.responseText;
        var notificaciones = JSON.parse(respuesta);
        var respuesta = '';


        for (var j = 0; j < notificaciones.length; j++) {
            notificar = notificaciones[j];


            if (notificar.estado_solicitud == 1) {
                if (notificar.leido == 0) {
                    respuesta += '<li><a style="background: #d5e0e1e8; display: -webkit-box; white-space: initial; backgraund:#d5e0e1e8;" class="dropdown-item" href="index.php?c=Vista&a=verVistaBusqueda&var=' + notificar.id_fk_registro_trabajo + '&par=mis&estado=1"> <img src="' + notificar.foto_trabajo + '" alt="Avatar Logo" style="width:75px; height :70px;" class="rounded-pill"><div class="textoNotificaciones" > <b>Fuiste Aceptado para el trabajo: ' + notificar.titulo + '</b></div></a></li>'
                    contador++;
                } else {
                    respuesta += '<li><a style="display: -webkit-box; white-space: initial;" class="dropdown-item" href="index.php?c=Vista&a=verVistaBusqueda&var=' + notificar.id_fk_registro_trabajo + '&par=mis&estado=1"> <img src="' + notificar.foto_trabajo + '" alt="Avatar Logo" style="width:75px; height :70px;" class="rounded-pill"><div class="textoNotificaciones" >Fuiste Aceptado para el trabajo: ' + notificar.titulo + '</div></a></li>'
                }
            }

            if (notificar.estado_solicitud == 2) {
                // if (notificar.leido == 0) { contador++; }
                // respuesta += '<li><a  style="display: -webkit-box; white-space: initial;" class="dropdown-item" href="index.php?c=Vista&a=verVistaBusqueda&var=' + notificar.id_fk_registro_trabajo + '&par=vd>"><img src="' + notificar.foto_trabajo + '" alt="Avatar Logo" style="width:75px; height :70px;" class="rounded-pill"><div class="textoNotificaciones">Fuiste Rechazado para el trabajo: ' + notificar.titulo + '</div></a></li>'
                if (notificar.leido == 0) {
                    if (j == 0) {
                        respuesta += '<li><a  style="display: -webkit-box; white-space: initial; backgraund:#d5e0e1e8; color:red;" class="dropdown-item" href="index.php?c=Vista&a=verVistaBusqueda&var=' + notificar.id_fk_registro_trabajo + '&par=mis&estado=2"><img src="' + notificar.foto_trabajo + '" alt="Avatar Logo" style="width:75px; height :70px;" class="rounded-pill"><div class="textoNotificaciones">Fuiste Rechazado para el trabajo: ' + notificar.titulo + '</div></a></li>'
                        contador++;
                    }
                } else {
                    respuesta += '<li><a  style="color:red; display: -webkit-box; white-space: initial;"  class="dropdown-item" href="index.php?c=Vista&a=verVistaBusqueda&var=' + notificar.id_fk_registro_trabajo + '&par=mis&estado=2"><img src="' + notificar.foto_trabajo + '" alt="Avatar Logo" style="width:75px; height :70px;" class="rounded-pill"><div class="textoNotificaciones">Fuiste Rechazado para el trabajo: ' + notificar.titulo + '</div></a></li>'
                }
            }

            if (notificar.estado_solicitud == 3 || notificar.estado_solicitud == 0) {
                if (notificar.leido == 0 || notificar.leido == 1) {
                    celiminado++;

                }
            }

        }
        // console.log(celiminado);
        // // console.log(celiminado2);
        // console.log(notificaciones.length);
        if (notificaciones.length == '0' || celiminado == notificaciones.length) {
            respuesta = '<li><div class="textoNotificaciones" style="height: 20px;">No hay notificaciones</div></li>';
        }


    }
    document.getElementById('contador').innerHTML = contador;
    document.getElementById('listaNotificaciones').innerHTML = respuesta;

}





function notificarLeido() {
    var url = "index.php?c=Notificar&a=NotificarLeido";
    var xmlh = new XMLHttpRequest();
    xmlh.open("GET", url, true);
    xmlh.send();
    document.getElementById('contador').innerHTML = "";
}
