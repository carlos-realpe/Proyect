/* VALIDADOR DE FORMULARIO DE LOGIN Y REGISTRO DE USUARIO */
const campos={
    nombre:true,
    apellido:true,
    correo:true,
    telf:true,
    cedula:true,
    ciudad:true,
    pw:true
   
  }
/* NOmbre */
var nombreE = document.getElementById('nombres');
nombreE.addEventListener('keyup',(e)=>{
  
    if(nombreE.value.length <=30){
     
        campos.nombre=true;
        mensaje3("nombres", nombreE);
    }else{
     
        campos.nombre=false;
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
/* Apellido */
    var apellidoE = document.getElementById('apellidos');
    apellidoE.addEventListener('keyup',(e)=>{
       
        if(apellidoE.value.length <=30){
         
            campos.apellido=true;
            mensaje3("apellidos", apellidoE);
        }else{
       
            campos.apellido=false;
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
    
/* Ciudad */

var ciudad = document.getElementById('ciudad');

ciudad.addEventListener('keyup', (e) => {

    if(ciudad.value.length <=25){
        
        campos.ciudad=true;
        mensaje3("ciudad", ciudad);
    }else{
       
        campos.ciudad=false;
        mensaje2("ciudad", ciudad);


    }



});




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
            campos.telf=true;    
            mensaje3("telf", document.getElementById("telf"));
        } else{
            campos.telf=false; 
            mensaje2("telf", document.getElementById("telf"));
        }
      
         
        });

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
        campos.cedula=true;
        mensaje3("cedula", document.getElementById("cedula"));
    } else {
        campos.cedula=false;
        mensaje2("cedula", document.getElementById("cedula"));
    }


});
});

/*contraseña */

document.getElementById("password").addEventListener('keyup',(e)=>{
     if (document.getElementById("password").value.length > 6) {
        campos.pw=true;
        mensaje3("password", document.getElementById("password"));
    } else{
        campos.pw=false;
        mensaje2("password", document.getElementById("password"));
    }
    contraseñacomparar();
});

document.getElementById("repassword").addEventListener('keyup',(e)=>{
   
    contraseñacomparar();
});

function contraseñacomparar() {
    if (document.getElementById("repassword").value == document.getElementById("password").value) {
        campos.pw=true;
        mensaje3("repassword", document.getElementById("repassword"));
    } else{
        campos.pw=false;

        mensaje2("repassword", document.getElementById("repassword"));
    }
  }


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
                campos.correo=false;
                           
                           mensaje2("correo", em);
                
            }else{
               
                campos.correo=true;
                mensaje3("correo", em);
               
            }
        }
    }

}


function validarRegistro(){

 
var resultado =true;

if(campos.apellido && campos.cedula && campos.ciudad && campos.correo && campos.nombre && campos.pw && campos.telf ){

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
