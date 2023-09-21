
var idActual = document.getElementById("cons").value;
var valorLectura =[];
var identificador =[];
mostrarCalificacion();
var indice = 0;


function valorarUsuario(idUser,idRegistro,UsuarioACalificar,valor){
    
    var url = "index.php?c=Calificar&a=valorarUsuario&idUser=" + idUser + "&idRegistro=" + idRegistro + "&UsuarioACalificar=" + UsuarioACalificar+"&valor="+valor;
    var xmlh = new XMLHttpRequest();
    xmlh.open("GET",url,true);
    xmlh.send();
    xmlh.onreadystatechange = function (){
        if(xmlh.readyState === 4 && xmlh.status ===200){

        }
    }

}
// ******************* boton cancelar por si acaso se tiene que poner*************************
// function CancelarAjaxSolicitud(idFactura, idUsuario) {
//     swal({
//         title: "¿Esta seguro de cancelar al usuario?",
//         text: "si cancela el usuario, la calificion establecida se eliminara",
//         icon: "warning",
//         buttons: true,
//         dangerMode: true,
//         buttons: ["Cancelar", "Si"],
//     })
//         .then((willDelete) => {
//             if (willDelete) {
//                 var url = "index.php?c=Vista&a=CancelarAjaxSolicitud&idFactura=" + idFactura + "&idUsuario=" + idUsuario + "&cancelar=Cancel";
//                 var xmlh = new XMLHttpRequest();
//                 xmlh.open("GET", url, true);
//                 xmlh.send();
//                 xmlh.onreadystatechange = function () {
//                     if (xmlh.readyState === 4 && xmlh.status === 200) {
//                         mostrarCalificacion();

//                         for (j = 0; j < valorLectura.length; j++) {
//                             valorLectura.splice(j, valorLectura.length);
//                             identificador.splice(j, identificador.length);
//                         }

//                     }
//                 }
//             } 
//         });
    
 



// }

function FinalizarTrabajo(idFactura, idUsuario,idRating) {
    if (document.querySelector('input[name=estrellas'+idRating+']:checked')) {
    var url = "index.php?c=Calificar&a=FinalizarTrabajo&idFactura=" + idFactura + "&idUsuario=" + idUsuario;
    var xmlh = new XMLHttpRequest();
    xmlh.open("GET", url, true);
    xmlh.send();
    xmlh.onreadystatechange = function () {
        if (xmlh.readyState === 4 && xmlh.status === 200) {
            mostrarCalificacion();

            for (j = 0; j < valorLectura.length; j++) {
                valorLectura.splice(j, valorLectura.length);
                identificador.splice(j, identificador.length);
            }

        }
    }
}else{
        swal("Debe Calificar al Usuario Primero");
//confirm("Debe Calificar al Usuario Primero");
}

}

function mostrarCalificacion() {
   
  var url = "index.php?c=Calificar&a=calificarAjaxMostrar";
    var xmlh = new XMLHttpRequest();
    xmlh.open("GET", url, true);
    xmlh.send();
    xmlh.onreadystatechange = function () {
        if (xmlh.readyState === 4 && xmlh.status === 200) {
            var respuesta = xmlh.responseText;
            var facturas = JSON.parse(respuesta);
            var resultados = "";
            indice = facturas.length;
       
            if (facturas.length == 0){
                resultados += '<div style="font-size:25px;color: white;margin:200px; display:flex;justify-content: center;">NO HAY USUARIOS A CALIFICAR</div> ';
            }else{
          
            for (var i = 0; i < facturas.length; i++) {
                factura = facturas[i];
               
                resultados += '<div class="card">';
                resultados += '<div class="card-body">';
                resultados += '<div class="row">';
                resultados += '<div class="col-md-auto"';
                resultados += 'style="text-align:center; width: 260px; height: 190px; overflow: hidden; white-space: normal;">';
                resultados += '<img src="' + factura.foto_perfil + '" alt="Avatar Logo" style="width:140px; height :140px;">';
                resultados += '<div>' + factura.nombre + " " + factura.Apellido + '</div>';
                resultados += '</div>';
                resultados += '<div class="col">';
                resultados += '<h5 class="card-title">Postuló para el trabajo: ' + factura.titulo + '</h5>';
                resultados += '<h6 style="font-size:12px; color:grey;"></h6>';
            
                resultados += '<form>';
              
                resultados += '<div class="valoracion" style="margin: 0 auto;">';
                resultados += '<div class="container text-center"><div class="row row-cols-auto"> ';
               
                resultados += ' <div class="col p-0"><h6 style="font-size:10px; color:grey; grey; ">Calificar</h6></div>';
                resultados += ' <div class="col p-0"><button style="background-color: transparent; border: none;" class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Calificar valoración del 1-5 estrellas." disabled> <span class="material-symbols-outlined">      info</span ></button></div> ';
                resultados += '</div></div>';
                resultados += '<div style="margin-top: -12px;">';
                var valor = 6;
                for (var j = 1; j <= 5; j++) {
                    valor--;
                    resultados += '<input id="radio' + factura.id_rating + valor + '" type="radio" name="estrellas'+factura.id_rating+'" value="' + valor + '" onclick="valorarUsuario(' + idActual + ',' + factura.id_reg_trabajo + ',' + factura.UserCalificado + ','+valor+')">';
                    resultados += '<label for="radio' + factura.id_rating + valor + '">★</label>';
                
                }
                valorLectura.push(factura.CalificacionPostulante);
                identificador.push(factura.id_rating);
                resultados += '</div>';
                resultados += '</div>';
                resultados += '</form>';


                resultados += '<div class="textT">';
                resultados += '<p class="card-text">Teléfono Móvil: 0' + factura.telefono+'</p>';
                resultados += '<p class="card-text">Correo Electrónico: ' + factura.email + '</p>';
                resultados += '</div>';

                // resultados += '<button class="btn btn-primary" onclick="CancelarAjaxSolicitud(' + factura.id_reg_trabajo +","+factura.UserCalificado+');" > Cancelar</button > ';
                resultados += '<div class="btn-toolbar"><button class="card-link btn btn-primary mx-2" onclick="FinalizarTrabajo(' + factura.id_reg_trabajo + "," + factura.UserCalificado + "," + factura.id_rating+');">Enviar Calificación</button>';
                idEncriptada2 = btoa(factura["id-usuario"]);
                resultados += '<a class="card-link btn btn-primary mx-2" class="dropdown-item" href="index.php?c=Chat&a=ChatMsg&i=' + idEncriptada2 + '">Enviar Mensaje</a>';
                resultados += '</div></div> </div> </div></div>';





            }
            }
           
            document.getElementById('ListaCalificaciones').innerHTML = resultados;
            const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
            const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
            for (let i = 0; i < indice;i++){
            if (valorLectura[i] != 0) {
                         document.querySelector('input[type=radio][id="radio' + identificador[i] + valorLectura[i] + '"][value="' + valorLectura[i] + '"]').checked = true;
            }
            }
            
        }

    }

}


