
// document.write (" <script src='assets/jss/view-oculto-postulant.js'></script>");

mostrarAjaxSolicitud();
const arri = [];
const arri2 = [];
const arri3 = [];
const texto = "";

var iteradorDeActive = 0;
var eliminar = 0;
var evento = 0;
var even2 = 0;
var val1 = [];
var val2 = [];
var val = 6;



/*-CONTADOR*/

function Derecha(i) {



}

function Izquierda(i) {


}

/*-FIN CONTADOR*/
function AceptarAjaxSolicitud(idFactura, idUsuario) {
 
  if (document.getElementById("numVacante").innerText == "VACANTES: 0"){
    swal({
      title: "Llego al límite de Vacantes",
      text: "En caso de añadir más, proceder a editar la postulación",
      icon: "error",
      button: true,
    });
  }else{
  swal({
    title: "Cargando...",
    text: "Espere por favor, se esta notificando...",
    icon: "info",
    button: false,
    closeOnClickOutside: false
  });
 
  var email = document.getElementById("email" + idUsuario).value;
  var numero = document.getElementById("telf" + idUsuario).value;
  var nombre = document.getElementById("nombre" + idUsuario).value.trim();
  var titulo = document.getElementById("tituloTrabajo").innerText;
  var telfUser = document.getElementById("telfUser").value;
  //console.log("NOmbre "+nombre," Email" + email, "numeroPerson" + numero, "tituo" + titulo, "telfUsuario"+telfUser);
  validador = false;
  
  var url = "index.php?c=Vista&a=AceptarAjaxSolicitud&idFactura=" + idFactura + "&idUsuario=" + idUsuario + "&email=" + email + "&titulo=" + titulo + "&numero=" + numero + "&telfUser=" + telfUser + "&nombre=" + nombre;
  var xmlh = new XMLHttpRequest();
  xmlh.open("GET", url, true);
  xmlh.send();
  vacante(idFactura);
  xmlh.onreadystatechange = function () {
    if (xmlh.readyState === 4 && xmlh.status === 200) { 
      var respuesta = xmlh.responseText;
      var alerta = JSON.parse(respuesta);
      var cambioBoton = document.getElementById('botonV' + idUsuario + '');
      eliminar = 2;
      console.log(alerta);
      if (alerta == "0") {
        
      swal.close();
       
        swal({
          title: "Éxito",
          text: "Se añadió el Usuario, para ser calificado y fue notificado, en caso de no recibir respuestas contactarse con él",
          icon: "success",
          button: true,
        
        });
      }else{
        swal.close();
        swal({
          title: "Error",
          text: "Se añadió el Usuario, para ser calificado sin embargo hubo un error al notificar, por favor contactarse con él ",
          icon: "error",
          button: true,
          });
      }
      mostrarAjaxSolicitud();
    }
    
  }
  
  }
}



function RechazarAjaxSolicitud(idFactura, idUsuario, nombre,titulo,email) {
  //identificador = identificador.filter(idU => idU != idUsuario);

  swal({
    title: "¿Está seguro de Rechazar la Solicitud?",
    text: "",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    buttons: ["Cancelar", "Si"],
  })
    .then((willDelete) => {
      if (willDelete) {
        swal({
          title: "Cargando...",
          text: "Espere por favor, se esta notificando...",
          icon: "info",
          button: false,
          closeOnClickOutside: false
        });


    var url = "index.php?c=Vista&a=RechazarAjaxSolicitud&idFactura=" + idFactura + "&idUsuario=" + idUsuario + "&nombre=" + nombre + "&titulo=" + titulo + "&email=" + email;
    var xmlh = new XMLHttpRequest();
    xmlh.open("GET", url, true);
    xmlh.send();


    xmlh.onreadystatechange = function () {
      if (xmlh.readyState === 4 && xmlh.status === 200) {
        var respuesta = xmlh.responseText;
        var alerta = JSON.parse(respuesta);
             eliminar = 2;
        if (alerta == "0") {

          swal.close();
          swal({
            title: "Éxito",
            text: "Se notificó al usuario el respectivo Rechazo",
            icon: "success",
            button: true,

          });
        } else {
          swal.close();
          swal({
            title: "Error",
            text: "Hubo un error al notificar al usuario",
            icon: "error",
            button: true,
          });
        }
        // identificador.splice(i, identificador.length);
        // for (var i = 0; i < identificador.length; i++) { identificador.splice(i, identificador.length); }
        mostrarAjaxSolicitud();
        for (j = 0; j < arri.length; j++) {
          arri.splice(j, arri.length);
          arri2.splice(j, arri2.length);
          arri3.splice(j, arri3.length);

        }


      }
    }
   
      }
    });

}
function valorarPorcentaje(xmlhPorcentaje) {
 
  xmlhPorcentaje.onreadystatechange = function () {
    if (xmlhPorcentaje.readyState === 4 && xmlhPorcentaje.status === 200) {

      var respuestap = xmlhPorcentaje.responseText;
      var porcentaje = JSON.parse(respuestap);
      porcen = porcentaje[0]
    
      if (porcen.usuarioCalificado != null) {    
         
        document.getElementById("pro" + porcen.usuarioCalificado + "").style.width = porcen.Porcentaje + "%";
        document.getElementById("pro" + porcen.usuarioCalificado + "").innerHTML = porcen.Porcentaje + "%";
        document.getElementById("textP" + porcen.usuarioCalificado + "").innerHTML = "Personas que calificaron: " + porcen.CantidadResenas;
       // document.getElementById("pro2" + porcen.usuarioCalificado + "").style.width = porcen.Porcentaje + "%";
     }
     

    }
  }

}

function mostrarAjaxSolicitud() {
 
  var idUs = document.getElementById("cons").value; 
  //console.log(document.getElementById("numVacante")); 
  
  //console.log(telfUser);
  var url = "index.php?c=Vista&a=verAjaxVistaSolicitud";
  //  var ocultar ="";

  var xmlh = new XMLHttpRequest();
  xmlh.open("GET", url, true);
  xmlh.send();
  xmlh.onreadystatechange = function () {

    if (xmlh.readyState === 4 && xmlh.status === 200) {
      var respuesta = xmlh.responseText;
     
      var facturas = JSON.parse(respuesta);
        //actualizar cierta parte de la pagina

      // actualizar cierta parte de la pagina

      resultados = '';
      if (facturas.length != 0) {
        ind = '';
        ind2 = '';
        ind3 = '';

        resultados += '<hr id="barraform">';
        resultados += '  <h2 class="titulo">SOLICITUDES</h2>';



        resultados += '   <div id="carouselExampleControls" class="carousel slide" data-bs-wrap="false" data-bs-interval="false">';
        resultados += '  <div class="carousel-inner">';

        for (var i = 0; i < facturas.length; i++) {
          factura = facturas[i];


          var variable = "";

          // if (i == 0){ ocultar="none"; }
          if (i == 0) { variable = "active"; } else { }

          //  console.log(facturas[i]);


          var urlP = "index.php?c=Vista&a=Porcentaje&idUserC=" + factura.id_fk_usuario;
          var xmlhPorcentaje = new XMLHttpRequest();
          xmlhPorcentaje.open("GET", urlP, true);
          xmlhPorcentaje.send();


          valorarPorcentaje(xmlhPorcentaje);

          

          ///--------------------------*PAR*------------------------

          if (i % 2 == 0) {

            resultados += '   <div class="carousel-item">';


            resultados += '    <div class="cards-wrapper">';

            resultados += '     <div class="card">';
            resultados += '<img src="' + factura.foto_perfil + '" class="card-img-top rounded" style="margin:0 auto; width:150px; heigth:400px;" alt="...">';
            resultados += '            <div class="card-body">';

            /*****************VALoracion ****************************************************************************************/

           
            
            var nombre = factura.nombre + " " + factura.Apellido;
         

            /**************FIN */
           
            resultados += '<div class="progress"> <div id="pro' + factura.id_fk_usuario + '" class="progress-bar" role="progressbar" style="width:0" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><p></p></div>  </div> <p id="textP' + factura.id_fk_usuario + '" style="font-size: 70%; color:gray; text-align:center;">Personas que calificaron: 0</p>';
            resultados += '       <h5 id="nombre" class="card-title">' + nombre + '</h5>';
            resultados += '<p class="card-text">Oficio: ' + factura.name_profesion_user + '</p>      ';
            resultados += '<p class="card-text">Ciudad: ' + factura.lugar + '</p>      ';
            resultados += '<p  style="visibility:hidden; display:contents" class="indice" id="indice"> ' + i + '</p>';
            resultados += '<input type="hidden" id="email' + factura.id_fk_usuario + '" value=' + factura.email + '><input type="hidden" id="telf' + factura.id_fk_usuario + '"value=' + factura.telefono + '><input type="hidden" id="nombre' + factura.id_fk_usuario + '" value="' + nombre + '">';
            ind = '<p>Email: ' + factura.email + '</p> <p>Teléfono Móvil: ' +0+ factura.telefono + '</p> <p>Ciudad: ' + factura.lugar + '</p> <p>Cédula: ' + factura.cedula + '</p>'; 
            if (factura.curriculum==""){
              curri = "<p>Currículum:</p><p></p>El usuario no ha subido su Currículum"
            }else{
              curri = '<p>Currículum: <a href="' + factura.curriculum + '" target="_blank"><img style="width: 80px; height: 80px;"src="https://www.tipos.co/wp-content/uploads/2014/12/archivo-e1418047657309.jpg" alt=""></a></p>';
            }
            ind2 = '<p>Oficio: ' + factura.name_profesion_user + '</p>'+curri;
            ind3 = '<a style="display: flex; width: 120px;" class="btn btn-primary" href="index.php?c=Busqueda&a=HistorialUserMostrar&idUser=' + factura.id_fk_usuario +'" target="_blank">Ver Historial</a><img src="' + factura.foto_perfil + '" class="rounded-pill" style="width:100px; height:100px; " alt="..."><h4>' + factura.nombre + ' ' + factura.Apellido + '</h4><div class="progress"> <div id="pro2' + factura.id_fk_usuario + '" class="progress-bar" role="progressbar" style="width:" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><p></p></div>  </div> <p id="textP2'+factura.id_fk_usuario+'" style="font-size: 70%; color:gray; text-align:center;">Personas que calificaron: 0</p>';
            arri.push(ind);
            arri2.push(ind2);
            arri3.push(ind3); 
       
           
            //  resultados += '   <input type="button" class="btn btn-primary vermas-soli" id="vermas-soli" value="somewhere"> </div>  </div> ';
            /*------------------------------ VALIDADOR--------------------*/

            resultados += '<div class="boton_acep_rech_vmas"> <button id="botonV' + factura.id_fk_usuario + '" class="btn btn-primary" onclick="AceptarAjaxSolicitud(' + factura.id_registro_trabajo + "," + factura.id_fk_usuario + ');">Aceptar</button>';

            /*------------------------------ FINVALIDADOR--------------------*/
         
            resultados += ' <button class=" btn btn-danger" onclick="RechazarAjaxSolicitud(' + factura.id_registro_trabajo + "," + factura.id_fk_usuario + ",'" + nombre + "','" + factura.titulo + "'" + ",'" + factura.email + "'" +');" >Rechazar</button>';
            resultados += '<button type="button" id="verperfilpostu" class=" btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="mostrarperfilindice(' + i + "," + factura.id_fk_usuario + ')">Ver Más>> </button>  </div> </div> </div>';

          } else {
            ///--------------------------* IMPAR*---

            resultados += '     <div class="card">';
            resultados += '<img src="' + factura.foto_perfil + '" class="card-img-top rounded" style="margin:0 auto; width:150px; heigth:400px;" alt="...">';
            /*****************VALoracion *******************************************************************************/



            /**************FIN */





          nombre = factura.nombre + " " + factura.Apellido;

           

            resultados += '            <div class="card-body">';

            //resultados += '<div class="progress"> <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">50%</div>  </div> <p style="font-size: 70%; color:gray; text-align:center;">Recomendacion</p>';
            resultados += '<div class="progress"> <div id="pro' + factura.id_fk_usuario + '" class="progress-bar" role="progressbar" style="width:0" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><p></p></div>  </div> <p id="textP' + factura.id_fk_usuario + '" style="font-size: 70%; color:gray; text-align:center;">Personas que calificaron:0</p>';
            resultados += '       <h5 class="card-title">' + nombre + '</h5>';
            resultados += '<p class="card-text">Labor: ' + factura.name_profesion_user + '</p>      ';
            resultados += '<p class="card-text">Ciudad: ' + factura.lugar + '</p>      ';
            resultados += '<p  style="visibility:hidden; display:contents" class="indice" id="indice"> ' + i + '</p>';

            resultados += '<input type="hidden" id="email' + factura.id_fk_usuario + '" value=' + factura.email + '><input type="hidden" id="telf' + factura.id_fk_usuario + '"value=' + factura.telefono + '><input type="hidden" id="nombre' + factura.id_fk_usuario + '"value="' + nombre + '">';
            ind = '<p>Email: ' + factura.email + '</p> <p>Teléfono: ' +0+ factura.telefono + '</p> <p>Ciudad: ' + factura.lugar + '</p> <p>Cédula: ' + factura.cedula + '</p> ';
            if (factura.curriculum == "") {
              curri = "<p>Currículum:</p><p></p>El usuario no ha subido su Currículum"
            } else {
              curri = '<p>Currículum: <a href="' + factura.curriculum + '" target="_blank"><img style="width: 80px; height: 80px;"src="https://www.tipos.co/wp-content/uploads/2014/12/archivo-e1418047657309.jpg" alt=""></a></p>';
            }
            ind2 = '<p>Oficio: ' + factura.name_profesion_user + '</p>'+curri;
            ind3 = '<a style="display: flex; width: 120px;" class="btn btn-primary" href="index.php?c=Busqueda&a=HistorialUserMostrar&idUser=' + factura.id_fk_usuario +'" target="_blank">Ver Historial</a><img src="' + factura.foto_perfil + '" class="rounded-pill" style="width:100px; height:100px; " alt="..."><h4>' + factura.nombre + ' ' + factura.Apellido + '</h4> <div class="progress"> <div id="pro2' + factura.id_fk_usuario + '" class="progress-bar" role="progressbar" style="width:0" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><p></p></div>  </div> <p id="textP2'+factura.id_fk_usuario+'" style="font-size: 70%; color:gray; text-align:center;">Personas que calificaron: 0</p>';
            arri.push(ind);
            arri2.push(ind2);
            arri3.push(ind3);

            /*------------------------------ VALIDADOR--------------------*/


            resultados += '<div class="boton_acep_rech_vmas"> <button id="botonV' + factura.id_fk_usuario + '" class="btn btn-primary" onclick="AceptarAjaxSolicitud(' + factura.id_registro_trabajo + "," + factura.id_fk_usuario + ');">Aceptar</button>';

            /*------------------------------ FINVALIDADOR--------------------*/

           
            resultados += ' <button class=" btn btn-danger" onclick="RechazarAjaxSolicitud(' + factura.id_registro_trabajo + "," + factura.id_fk_usuario + ",'" + nombre + "','" + factura.titulo + "'" +');" >Rechazar</button>';
            resultados += '<button type="button" id="verperfilpostu" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="mostrarperfilindice(' + i + "," + factura.id_fk_usuario + ')">Ver Más>> </button> </div>  </div> </div>  ';

          }
          resultados += '</div>  ';

        }



        resultados += ' </div>   ';

        resultados += '  <button  id="anterior" class="carousel-control-prev d-none" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="prev" >    <span class="carousel-control-prev-icon" aria-hidden="true"  onclick="Izquierda(' + facturas.length + ');"></span>            <span class="visually-hidden">Previous</span> </button>    ';





        resultados += '  <button id="siguiente" class="carousel-control-next d-none" type="button" data-bs-target="#carouselExampleControls"    data-bs-slide="next" >       <span class="carousel-control-next-icon" aria-hidden="true" onclick="Derecha(' + facturas.length + ');"></span>                      <span class="visually-hidden">Next</span> </button>';
        resultados += '   </div>    </div>';



      }

      document.getElementById('contenedorSoli').innerHTML = resultados;


      /* ------JAVA PARA OCULTAR BOTON */
      var carouselLength = document.getElementsByClassName('carousel-item').length - 1;
      var axuliar = carouselLength;
      const myCarousel = document.getElementById('carouselExampleControls');
      var list = document.getElementsByClassName('carousel-control-prev');
      var list2 = document.getElementsByClassName('carousel-control-next');
      var carrusel = document.getElementsByClassName('carousel-item');
      var card = document.getElementsByClassName('card');

      if (eliminar == 0) {
        if (carouselLength) {
          for (index = 0; index < list.length; ++index) {
            list2[index].setAttribute("class", 'carousel-control-next');
            carrusel[0].setAttribute("class", 'carousel-item active');
          }
        }
      }


      if (eliminar == 2) {
        if (evento == 0 && carouselLength > 0) {
          for (index = 0; index < list.length; ++index) {
            list[index].setAttribute("class", 'carousel-control-prev d-none');
            list2[index].setAttribute("class", 'carousel-control-next');
          }
        } else if (evento == carouselLength) {
          for (index = 0; index < list.length; ++index) {
            list2[index].setAttribute("class", 'carousel-control-next d-none');
            list[index].setAttribute("class", 'carousel-control-prev');
          }
        } else {
          for (index = 0; index < list.length; ++index) {
            list2[index].setAttribute("class", 'carousel-control-next');
            list[index].setAttribute("class", 'carousel-control-prev');
          }
        }
        if (evento == carouselLength && facturas.length % 2 == 1) {
          for (index = 0; index < list.length; ++index) {
            list2[index].setAttribute("class", 'carousel-control-next d-none');
            list[index].setAttribute("class", 'carousel-control-prev');
          }
        }
        if (evento == 0 && carouselLength == 0) {
          for (index = 0; index < list.length; ++index) {
            list2[index].setAttribute("class", 'carousel-control-next d-none');
            list[index].setAttribute("class", 'carousel-control-prev d-none');
          }
        }


      }


      myCarousel.addEventListener('slide.bs.carousel', event => {


        if (event.to == 0) {
          evento = event.to;
          for (index = 0; index < list.length; ++index) {
            list[index].setAttribute("class", 'carousel-control-prev d-none');
            list2[index].setAttribute("class", 'carousel-control-next');
          }
        } else if (event.to == carouselLength) {
          evento = event.to;
          for (index = 0; index < list.length; ++index) {
            list2[index].setAttribute("class", 'carousel-control-next d-none');
            list[index].setAttribute("class", 'carousel-control-prev');
          }
        } else {
          evento = event.to;
          for (index = 0; index < list.length; ++index) {
            list2[index].setAttribute("class", 'carousel-control-next');
            list[index].setAttribute("class", 'carousel-control-prev');
          }
        }
      })



      if (card.length % 2 == 0 && axuliar == evento - 1 && carouselLength != 0) {
        carrusel[evento - 1].setAttribute("class", 'carousel-item active');
        for (index = 0; index < list.length; ++index) {
          list2[index].setAttribute("class", 'carousel-control-next d-none');
          list[index].setAttribute("class", 'carousel-control-prev');
        }
      } else if (carouselLength == 0) {
        for (index = 0; index < list.length; ++index) {
          list2[index].setAttribute("class", 'carousel-control-next d-none');
          list[index].setAttribute("class", 'carousel-control-prev  d-none');
          carrusel[0].setAttribute("class", 'carousel-item active');
        }
      } else {
        carrusel[evento].setAttribute("class", 'carousel-item active');
      }



      //console.log(carouselLength);
      //console.log(evento);




    }


  };

}



function vacante(idFactura){
  var url = "index.php?c=Vista&a=Vacante&idFactura=" + idFactura;
  var xmlh = new XMLHttpRequest();
  xmlh.open("GET", url, true);
  xmlh.send();
  
  xmlh.onreadystatechange = function () {
    if (xmlh.readyState === 4 && xmlh.status === 200) {
      var respuesta = xmlh.responseText;
      var vacante = JSON.parse(respuesta);
      var resultado = "";
      for (var i = 0; i < vacante.length; i++) {
       var vac = vacante[i];
        resultado += "VACANTE: "+vac.vacante;
  }
  }
   document.getElementById("numVacante").innerHTML = resultado;
}
}