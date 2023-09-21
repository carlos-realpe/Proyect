/* VALIDADOR DE FORMULARIO DE LOGIN Y REGISTRO DE USUARIO */
const camposV={
    nombre:false,
    apellido:false,
    correo:false,
    telf:false,
    cedula:false,
    ciudad:false,
    pw:false
   
  }
/* NOmbre */

var nombreE = document.getElementById('nombres');
nombreE.addEventListener('keyup',(e)=>{
  
    if(nombreE.value.length <=30){
     
        camposV.nombre=true;
        mensaje3("nombres", nombreE);
    }else{
     
        camposV.nombre=false;
        mensaje2("nombres", nombreE);


    }
});
nombreE.addEventListener('keypress',(e)=>{
    const key = e.key;
    const letra =  /[^A-Za-z\s]$/.test(key);
    
   
    if (letra) {
        e.preventDefault();
    } 
 
    });

// var nombreE = document.getElementById('nombres');
// nombreE.addEventListener('keyup',(e)=>{
//     var letra = /^[a-zA-ZÀ-ÿ\s]{1,70}$/;
//     if (letra.test(nombreE.value)) {
//         // resultado = false;
//         camposV.nombre=true; 
//         mensaje3("nombres", nombreE);
//     } else{
        
//         mensaje2("nombres", nombreE);
//     }
  
//     });


/* Apellido */


var apellidoE = document.getElementById('apellidos');
apellidoE.addEventListener('keyup',(e)=>{
  
    if(apellidoE.value.length <=30){
     
        camposV.apellido=true;
        mensaje3("apellidos", apellidoE);
    }else{
   
        camposV.apellido=false;
        mensaje2("apellidos", apellidoE);


    }
});


apellidoE.addEventListener('keypress',(e)=>{

    const key = e.key;
    const letra =  /[^A-Za-z\s]$/.test(key);
   
    if (letra) {
        e.preventDefault();
    } 

  
    });


    // var apellidoE = document.getElementById('apellidos');

    // apellidoE.addEventListener('keyup',(e)=>{
    //     var letra = /^[a-zA-ZÀ-ÿ\s]{1,70}$/;
    //     if (letra.test(apellidoE.value)) {
    //         // resultado = false;
    //         camposV.apellido=true; 
    //         mensaje3("apellidos", apellidoE);
    //     } else{
            
    //         mensaje2("apellidos", apellidoE);
    //     }
      
         
    //     });
    
/* Ciudad */
var ciudad = document.getElementById('ciudad');

ciudad.addEventListener('keyup', (e) => {

    if(ciudad.value.length <=25){
        
        camposV.ciudad=true;
        mensaje3("ciudad", ciudad);
    }else{
       
        camposV.ciudad=false;
        mensaje2("ciudad", ciudad);


    }



});




// var ciudad = document.getElementById('ciudad');

// ciudad.addEventListener('keyup', (e) => {
//     var letra = /^[a-zA-ZÀ-ÿ\s]{1,70}$/;
//     if (letra.test(ciudad.value)) {
//         // resultado = false;
//         camposV.ciudad=true;
//         mensaje3("ciudad", ciudad);
//     } else {
        
//         mensaje2("ciudad", ciudad);
//     }


// });




/* Telefono */

    // var num = /^\d{10}$/; 
 
     document.getElementById("telf").addEventListener("keypress", myFunction2);
    function myFunction2(e) {
            // comprovamos con una expresion regular que el caracter pulsado sea
            const key = e.key;
            const isDigit = /^\d$/.test(key);
            if(!isDigit){
                e.preventDefault();
            }

    //     if (e.key.match(num) ) {
    //        // Si la tecla pulsada no es la correcta, eliminado la pulsación
    //         // e.preventDefault();
    //    }


    document.getElementById("telf").addEventListener('keyup',(e)=>{
     
         if (document.getElementById("telf").value.length>=10) {
             camposV.telf=true;    
             mensaje3("telf", document.getElementById("telf"));
         } else{
             camposV.telf=false; 
             mensaje2("telf", document.getElementById("telf"));
         }
       
          
         });
 


    //    document.getElementById("telf").addEventListener('keyup',(e)=>{
       
    //     if (num.test(document.getElementById("telf").value)) {
    //         camposV.telf=true;           
    //         mensaje3("telf", document.getElementById("telf"));
    //     } else{
           
    //         mensaje2("telf", document.getElementById("telf"));
    //     }
      
         
    //     });

       }

/* cedula */ 
document.getElementById("cedula").addEventListener("keypress", (e) => {
    const key = e.key;
    const isDigit = /^\d$/.test(key);
    if(!isDigit){
        e.preventDefault();
    }
//        if (e.key.match(num) === null) {
//     // Si la tecla pulsada no es la correcta, eliminado la pulsación
//     e.preventDefault();
// }
document.getElementById("cedula").addEventListener('keyup', (e) => {
    if (document.getElementById("cedula").value.length>=10) {
        camposV.cedula=true;
        mensaje3("cedula", document.getElementById("cedula"));
    } else {
        camposV.cedula=false;
        mensaje2("cedula", document.getElementById("cedula"));
    }


});
});
/*contraseña */

document.getElementById("password").addEventListener('keyup',(e)=>{
    if (document.getElementById("password").value.length > 6) {
       camposV.pw=true;
       mensaje3("password", document.getElementById("password"));
   } else{
       camposV.pw=false;
       mensaje2("password", document.getElementById("password"));
   }
   contraseñacomparar();
});

document.getElementById("repassword").addEventListener('keyup',(e)=>{
  
   contraseñacomparar();
});

function contraseñacomparar() {
   if (document.getElementById("repassword").value == document.getElementById("password").value) {
       camposV.pw=true;
       mensaje3("repassword", document.getElementById("repassword"));
   } else{
       camposV.pw=false;

       mensaje2("repassword", document.getElementById("repassword"));
   }
 }

// document.getElementById("password").addEventListener('keyup',(e)=>{
//      if (document.getElementById("password").value.length > 6) {
//         camposV.pw=true; 
//         mensaje3("password", document.getElementById("password"));
//     } else{
//         camposV.pw=false;
//         mensaje2("password", document.getElementById("password"));
//     }
// });

// document.getElementById("repassword").addEventListener('keyup',(e)=>{
//     console.log(e.target.value.length);
//     if (document.getElementById("repassword").value == document.getElementById("password").value) {
                   
//         mensaje3("repassword", document.getElementById("repassword"));
//     } else{
      
//         mensaje2("repassword", document.getElementById("repassword"));
//     }
// });


// CORREO
function correoExistente() {
    var em = document.getElementById("correo");
    var url = "index.php?c=Registro&a=consultarCorreo&email="+em.value;
    var xmlh = new XMLHttpRequest();
    xmlh.open("GET", url, true);
    xmlh.send();

    xmlh.onreadystatechange = function () {
       
        if (xmlh.readyState === 4 && xmlh.status === 200) {
            var respuesta = xmlh.responseText;
            var validador = JSON.parse(respuesta);
            if (validador != null){
                camposV.correo=false;
                           mensaje2("correo", em);
                
            }else{
                camposV.correo=true;
                mensaje3("correo", em);
               
            }
        }
    }

}


function validarRegistro(){

var resultado =true;
if(camposV.apellido && camposV.cedula && camposV.ciudad && camposV.correo && camposV.nombre && camposV.pw && camposV.telf ){

 resultado=true;
}else{
   
     resultado=false;
}
return resultado;
limpiarMensajes();


}




function mensaje(cadenaM, elemento){
elemento.focus();
var nodoP = elemento.parentNode;
var nodoM = document.createElement("span");
nodoM.innerHTML = cadenaM;
nodoM.style.color="red";
nodoM.style.fontSize ="80%";
nodoM.style.fontWeight = "bold";
       
nodoM.display = "block";
nodoM.setAttribute("class", "mensaje");
nodoP.appendChild(nodoM);
}
function mensaje3 (cadenaM, elemento){
 document.getElementById(`lbl-${cadenaM}`).classList.remove('lbl');
document.getElementById(`lbl-${cadenaM}`).classList.add('lbl-titulo-of');
}
function mensaje2 (cadenaM, elemento){
    document.getElementById(`lbl-${cadenaM}`).classList.remove('lbl-titulo-of');
    document.getElementById(`lbl-${cadenaM}`).classList.add('lbl');
}



function limpiarMensajes() {
    var mensajes = document.querySelectorAll(".mensaje");
    for (let i = 0; i < mensajes.length; i++) {
        mensajes[i].remove();// remueve o elimina un elemento de mi doc html
    }
}




