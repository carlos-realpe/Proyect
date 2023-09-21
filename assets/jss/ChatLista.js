
var enlace = "index.php?c=Chat&a=MostrarListaChat";
var xmlh1 = new XMLHttpRequest();
xmlh1.open("GET", enlace, true);
xmlh1.send();
xmlh1.onreadystatechange = function () {
        var res = xmlh1.responseText;
        var chatU = JSON.parse(res);
        var res = '';
        // res += '<h6>Lista de Trabajos</h6>'
        
   for (var j = 0; j < chatU.length; j++) {
             chat = chatU[j];
     
           idEncriptada2 = btoa(chat.idPerfil);
          
            res += '<a class="dropdown-item" href="index.php?c=Chat&a=ChatMsg&i=' + idEncriptada2 +'">';
            res += '<div class="card-msg ">';
            res += ' <div><img src="'+chat.foto_perfil+'"     alt = "" srcset = "" width = "30px" class="rounded-pill";> ';
            res += '</div>';
            res += '<div>' + chat.nombre + " " + chat.Apellido +'</div>';

       if (chat.contadorLeido == 0) {
           chat.contadorLeido = "";
       }
      
       res += '     <span class="position-absolute top-10 start-105 translate-middle badge rounded-pill bg-danger">'+chat.contadorLeido+'</span > ';

            res += '<div></div>';
            res += '</div>';
            res += '</a>';
        // res += '<div>holaaaa</div>';
          }
     
 
    var listaChat = document.getElementById('listaChat');
    var listaChat2 = document.getElementById('listaChat2');
    
      if (chatU.length== 0) {
        res ='<div class="noexist_empleado"> No existen trabajos disponibles</div>';
        listaChat.innerHTML =res ;
        listaChat2.innerHTML =res;

    }else{
    if (listaChat2 !== null) {
        listaChat2.innerHTML = res;
        listaChat2.style.height="90px";
        listaChat2.style.overflow="auto";
    }

    if (listaChat !== null) {
        listaChat.innerHTML = res;
        listaChat.style.height="90px";
        listaChat.style.overflow="auto";
    }
}
    
   
    
}


var enlace2 = "index.php?c=Chat&a=MostrasListaChatMiPublicacion";
var xmlh2 = new XMLHttpRequest();
xmlh2.open("GET", enlace2, true);
xmlh2.send();
xmlh2.onreadystatechange = function () {
    var res1 = xmlh2.responseText;
    var chatUP = JSON.parse(res1);
    
    var res1 = '';
    // res1 += '<h6>Lista de Postulantes</h6>'
 
    for (var k = 0; k < chatUP.length; k++) {
      
        chat1 = chatUP[k];
        // chat1.idPerfil
          
        idEncriptada = btoa(chat1.idPerfil);
        
        res1 += '<a class="dropdown-item" href="index.php?c=Chat&a=ChatMsg&i=' + idEncriptada + '">';
        res1 += '<div class="card-msg ">';
        res1 += ' <div><img src="' + chat1.foto_perfil + '"     alt = "" srcset = "" width = "30px" class="rounded-pill";> ';
        res1 += '</div>';
        res1 += '<div>' + chat1.nombre + " " + chat1.Apellido + '</div>';
        if (chat1.contadorLeido == 0){
            chat1.contadorLeido="";
        }

        res1 += '     <span class="position-absolute top-10 start-105 translate-middle badge rounded-pill bg-danger">' + chat1.contadorLeido + '</span > ';


        res1 += '<div></div>';
        res1 += '</div>';
        res1 += '</a>';

    }
    var listaChatMiPublicacion = document.getElementById('listaChatMiPublicacion');
    var listaChatMiPublicacion1 = document.getElementById('listaChatMiPublicacion2');
    
    if (chatUP == 0) {
        res1 ='<div class="noexist_empleado"> No existen empleados disponibles</div>';
        listaChatMiPublicacion.innerHTML =res1 ;
        listaChatMiPublicacion1.innerHTML =res1 ;

    }else{
     if (listaChatMiPublicacion !== null) {
        listaChatMiPublicacion.innerHTML = res1;
        listaChatMiPublicacion.style.height="90px";
        listaChatMiPublicacion.style.overflow="auto";
    }
   
    
    if (listaChatMiPublicacion1 !== null) {
        listaChatMiPublicacion1.innerHTML = res1;
        listaChatMiPublicacion1.style.height="90px";
        listaChatMiPublicacion1.style.overflow="auto";
        
    }
}
}





var enlace3 = "index.php?c=Chat&a=ChatLeido";
var xmlhChat = new XMLHttpRequest();
xmlhChat.open("GET", enlace3, true);
xmlhChat.send();
xmlhChat.onreadystatechange = function () {
    var respuesta = xmlhChat.responseText;
    var chatLeido = JSON.parse(respuesta);
    var respuesta = '';
    // res += '<h6>Lista de Trabajos</h6>'
    var num =0;
    for (var j = 0; j < chatLeido.length; j++) {
        chatLe = chatLeido[j];
        num= parseInt(chatLe.contador);
         respuesta += num;
        
 
    }
    if (respuesta == 0){
        document.getElementById('contadorChat').innerHTML = "";
    }else{
        document.getElementById('contadorChat').innerHTML = respuesta;
    }
    
    
      
}



function porcentaje() {
    var url = "index.php?c=Login&a=porcentaje";
    var xmlh = new XMLHttpRequest();
    xmlh.open("GET", url, true);
    xmlh.send();

}
/*
function listaChat(){
    var enlace = "index.php?c=Chat&a=MostrarListaChat";
    var xmlh1 = new XMLHttpRequest();
    xmlh1.open("GET", enlace, true);
    xmlh1.send();
    xmlh1.onreadystatechange = function () {
        if (xmlh.readyState === 4 && xmlh1.status === 200) {

            var res = xmlh1.responseText;
            var chatU = JSON.parse(res);

            var res = '';
            for (var j = 0; j < chatU.length; j++) {
                chat = chatU[j];
                idEncriptada2 = btoa(chat.idPerfil);


            }
        }

}
}*/


// function enviarMsg(event){
//     event.preventDefault(); 
//     form = document.getElementById('enviarMsg');
//         id = atob(document.getElementById('id').value);
//         var url = "index.php?c=Chat&a=EnviarMsg&idUserReceptor=" + id + "&mensaje=" + document.getElementById('msg').value;
//         var xmlh = new XMLHttpRequest();
//         xmlh.open("GET", url, true);
//         xmlh.send();
//         form.reset();
//         xmlh.onreadystatechange = function () {
//             if (xmlh.readyState === 4 && xmlh.status === 200) {
//                 mostrarMsg();    
//             }
//         }
// }

// mostrarMsg();
// setInterval(mostrarMsg, 500);
// function mostrarMsg(){
//    // id = atob(document.getElementById('id').value);
//     var url1 = "index.php?c=Chat&a=mostrarMsg";
//     var xmlh3 = new XMLHttpRequest();
//     xmlh3.open("GET", url1, true);
//     xmlh3.send();
//     xmlh3.onreadystatechange = function () {
//         if (xmlh3.readyState === 4 && xmlh3.status === 200) {
            
//             var msg = xmlh3.responseText;
//             var chatMsg = JSON.parse(msg);
//             var msg = '';
//                  for (var k = 0; k < chatMsg.length; k++) {
//                 msgMuestra = chatMsg[k];
//                 if (msgMuestra.bandera == 1){
//                 msg += '   <div class="contenedor_derecha">';
//                 msg += '      <div class="chat_1">';
//                 msg += '           <span>' + msgMuestra.mensaje+'</span>';
//                 msg += '   </div>  </div>  ';
//                 }
//                 if (msgMuestra.bandera ==0){
//                     msg += ' <div class="contenedor_isquierda">';
//                     msg += '  <div class="chat_2">';
//                     msg += '     <span>' + msgMuestra.mensaje +'</span>';
//                     msg += ' </div>';
//                     msg += '</div>';
//              }
//             }
//             var contendorElement = document.getElementById('contendor');
//             if (contendorElement !== null) {
//                 document.getElementById('contendor').innerHTML = msg;

//                 var contenedor = document.getElementById("cont_chat");
//                 contenedor.scrollTop = contenedor.scrollHeight;
//             }



//         }
//     }
   
// }


