
var nombre = document.getElementById('nombre').textContent.trim();;
apellido = document.getElementById('apellido').textContent.trim();;
telf=document.getElementById('telf').textContent;
lugar=document.getElementById('lugar').textContent;
trabajo=document.getElementById('selec-trabajo');
contrasena=document.getElementById('password');
 contrasena_oculto= document.querySelector('.ocultar-confirma-pw');
 contrasena_oculto_valid= document.getElementById('repassword');
 cancelar_cambiopw= document.getElementById('cancelar_cambiopw');
 cambio_pw=document.getElementById('cambiopw');
 cancelar_cv=document.getElementById('cancelarcv');

const button_editar= document.getElementById('cambiolabor');


var btnabrir=document.getElementById('share'),  
btnabrir2=document.getElementById('share2'),
btnabrir3=document.getElementById('share3'),
btnabrirperfil=document.getElementById('boton-avatar'),
btnsubir_imagen=document.getElementById('btn_abrir_file');


// btneditar_trabajo=document.getElementById('cambiolabor');


 overly=document.getElementById('overlai'),
 view_emer=document.getElementById('view-emergente'),
 btn_close=document.getElementById('btn-cerrar'),

 contenedor_input=document.getElementById('contenedor-input');

 btnabrir.addEventListener('click',funcionviewaparecer);
//  btnabrirperfil.addEventListener('click',funcionviewaparecerperfil);


/// esto esta cogiendo la ruta de la foto.
cancelar_cambiopw.addEventListener('click',(e)=>{

   // contrasena.removeAttribute('required','');
   contrasena.value='contra';
   contrasena.setAttribute('disabled','');
   contrasena_oculto.setAttribute('style', 'visibility: hidden;');
   cancelar_cambiopw.setAttribute('style', 'display:none;');
   contrasena_oculto_valid.removeAttribute('required','');
   cambio_pw.value="editar";
   
});

btn_close.addEventListener('click',funcionviewocultar);   
btnsubir_imagen.addEventListener('change',(e)=>{
const file=e.target.files[0];
});


 function subirimagen(){
document.getElementById("clic").click();
}


// const data = new FormData();
// data.append(file);


// // console.log(file.name);
// fetch('controllers/PerfilController.php',{
//    method: "POST",
//    headers: {
//        "Content-Type": "application/json"
//    },
//    body: data
// });


function validarBtnSelec(){
   var valid=trabajo.hasAttribute('disabled');
   if(valid){
   trabajo.removeAttribute('disabled');
   button_editar.value="guardar";
   return false;
      
   }else{
         //////////// SE DEBE ENVIAR///////////////
      

      return true;
   }
}

// function funcioneditarbtn_trabajo(){
 
// }
function funcioneditarbtn_pw(){
   var valid = contrasena.hasAttribute('disabled');
   var flag=false;
   
  
   if(valid){

      contrasena.removeAttribute('disabled');
      contrasena_oculto.setAttribute('style', 'visibility: block;');
      cancelar_cambiopw.setAttribute('style', 'display: inline-block;padding: 0px 10px; font-weight:bold;');
      contrasena_oculto_valid.setAttribute('required','');
      contrasena.setAttribute('required','');
      cambio_pw.value="Guardar";
      contrasena.value="";
      return false;
   }else{
   
      if(document.getElementById("password").value!="" && document.getElementById("repassword").value!=""){
         if(document.getElementById("password").value.length > 6 && document.getElementById("repassword").value == document.getElementById("password").value){
            flag=true;
         }
      }else{
         flag=false;
      }
      return flag;

   //    if (document.getElementById("password").value.length > 6 ||document.getElementById("password").value=="" ) {
                 
   //       flag= true;
         
   //       // quita el msj
   //   } else{
   //    flag= false;
         
   //   }
   
   //    if (document.getElementById("repassword").value == document.getElementById("password").value ||document.getElementById("repassword").value=="" ) {
        
   //       flag= true;
   // } else{
   
   //    flag= false;
   // }
      // return flag;
       
      
     
   }
  
}
function funcioneditarbtn_cv(){

//   var flag;
  clicEditar();
  return flag;

  
}



 function funcionviewocultar(){
   
    overly.classList.remove('actives');
  
    

 }
//  function funcionviewocultar2(){
//  }
//  function funcionviewocultar3(){
//  }


 function funcionviewaparecer(){
  
    overly.classList.add('actives');
    contenedor_input.innerHTML=
    " <label for=lbl-nombreg>Nombre</label><input type=text name='nombre' id='nombre' value='"+nombre+"'>"+
    "<label for=lbl-apellidog>Apellido</label><input type=text  name='apellido' id='apellido' value='"+apellido+"'>"+
   
    "<label for=lbl-telefonog>Teléfono Móvil</label><input type=text name='telf' id='telf' value="+telf+">"+
    "<label for=lbl-lugar>Ciudad</label><input type=text name='lugar' id='lugar' value="+lugar+">"; 
 }

//  function funcionviewaparecerperfil(){
//    overly.classList.add('actives');
//    // contenedor_input.innerHTML=
//    // " <label for=lbl-nombreg>nombre</label><input type=text name='nombre' id='nombre' value='HOLAAAAA QUE TAL'>";

//  }

 /*contraseña */


document.getElementById("password").addEventListener('keyup',(e)=>{
   validarpw();
});

document.getElementById("repassword").addEventListener('keyup',(e)=>{
   validarpw();

});
function validarpw(){
   
  
   if (document.getElementById("password").value.length > 6 ||document.getElementById("password").value=="") {
                 
      mensaje3("password", document.getElementById("repassword"));
      mensaje3("password", document.getElementById("password"));
      
      
      // quita el msj
  } else{
      mensaje2("password", document.getElementById("password"));
      
  }

   if (document.getElementById("repassword").value == document.getElementById("password").value ||document.getElementById("repassword").value=="" ) {
      mensaje3("repassword", document.getElementById("repassword")); // quita el msj
     
} else{
   mensaje2("repassword", document.getElementById("repassword"));
 
}

}


function mensaje3 (cadenaM, elemento){
   document.getElementById(`lbl-${cadenaM}`).classList.remove('lbl');
  document.getElementById(`lbl-${cadenaM}`).classList.add('lbl-titulo-of');
  }
  function mensaje2 (cadenaM, elemento){
      document.getElementById(`lbl-${cadenaM}`).classList.remove('lbl-titulo-of');
      document.getElementById(`lbl-${cadenaM}`).classList.add('lbl');
  }


/***********************************************************************CARLOS REALPE  */
let activador= document.getElementById("activador");
let botoEdit = document.getElementById("cambiocv");
botoEdit.addEventListener('click',clicEditar);
cancelar_cv.addEventListener('click', function(){
   activador.setAttribute('disabled','');

   cancelar_cv.setAttribute('style','display:none;');
   botoEdit.value="editar";
   botoEdit.setAttribute("type","button");
   botoEdit.removeAttribute('disabled','');

});


function clicEditar(){
   
if (botoEdit.value == "editar") {
     activador.disabled=false;
    botoEdit.value="guardar";
    if(activador.files.length==0){
      flag=false;
      console.log("no se coloco archivo");
      botoEdit.disabled=true;
   }
    activador.addEventListener('change',function(){
      if(activador.files.length!=0){
         flag=true;
         console.log(" se coloco archivo");
         botoEdit.disabled=false;
      }
   });
   cancelar_cv.setAttribute('style', 'display:inline-block;');

   }   else { 
      if(flag){
      botoEdit.setAttribute("type","submit");
      botoEdit.value="Editar"; 
       
      }
         // flag=false;
    }
    
}
/*
function abrirPDF(cv){
   window.open(cv);
}

*/





