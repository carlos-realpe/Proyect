

document.getElementById("reporteSelect").onchange = function () {
    var reporteSelect = document.getElementById("reporteSelect");
    if (reporteSelect.value==7){
       
        document.getElementById("otro").style.display = "block";
    }else{
        document.getElementById("otro").style.display = "none";
        document.getElementById("reporte").value = "";
    }
}

function Reporte(nombre, titulo) {

    var mensaje = ""; 
    var reporteSelect = document.getElementById("reporteSelect");
    if (reporteSelect.value == 7){
        var reporte = document.getElementById("reporte");
        mensaje = reporte.value;

    }else{
        mensaje = reporteSelect.value;
    }

if (mensaje != ""){
    
    swal({
        title: "Cargando...",
        text: "Espere por favor, se esta notificando el reporte...",
        icon: "info",
        button: false,
        closeOnClickOutside: false
    });
    var url = "index.php?c=Vista&a=Reporte&nombre=" + nombre + "&titulo=" + titulo + "&reporte=" + mensaje;
    var xmlh = new XMLHttpRequest();
    xmlh.open("GET", url, true);
    xmlh.send();
    xmlh.onreadystatechange = function () {
        if (xmlh.readyState === 4 && xmlh.status === 200) {
            var respuesta = xmlh.responseText;
            var alerta = JSON.parse(respuesta);
            if (alerta == "0") {
                swal.close();
            swal({
                    title: "Éxito",
                    text: "Se reportó con exito la publicación, el administrador requerirá una revisión",
                    icon: "success",
                    button: true,
                });

            } else {
                swal.close();
                swal({
                    title: "Error",
                    text: "Hubo un error al notificar.Por favor, envié personalmente un mensaje al correo workanimus.org@gmail.com",
                    icon: "error",
                    button: true,
                });
            }
        }
        if (alerta == "0") {
        document.getElementById("reporte").value = "";
            document.getElementById("cerrar").click();
        }
    }



}else{
    swal({
        title: "Por favor, ingrese la razón del reporte",
        icon: "warning",
        button: true,
    });
}
}