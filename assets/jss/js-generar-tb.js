const nombre_generar_tb= document.getElementById("detalle-titulo"); 
const detalle_generar_tb= document.getElementById("detalle-det"); 

const form_generar_tb= document.getElementById("form"); 
const listaform_generar_tb= document.querySelectorAll("#form input"); 
const longitud=document.getElementById("longitud");
const latitud=document.getElementById("latitud");

  document.getElementById('imgTrabajo').onchange=function(e){
      let reader=new FileReader();
      reader.readAsDataURL(e.target.files[0]);
      reader.onload=function(){
                document.getElementById('cargarImg').src = reader.result;
      }
   }
 


// document.getElementById('imgTrabajo').addEventListener('change', function(event) {
//   // El evento 'change' proporciona el objeto event que contiene información sobre el archivo seleccionado
//   alert("se cambio");
//   if (event.target.files && event.target.files[0]) {
//     const selectedFile = event.target.files[0];
//     console.log('Archivo seleccionado: ', event.target.files[0]);
//   }

//   // Hacemos algo con el archivo seleccionado, como mostrar su nombre en la consola
//   console.log('Archivo seleccionado: ', selectedFile.name);
// });




const expresiones ={
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,70}$/, // Letras y espacios, pueden llevar acentos.
    detalle:/^(\S+\s*){0,50}$/,  //Letras y espacios, pueden llevar acentos, de 0 a 60 digitos.
    lugar:/^(?:[a-zA-ZÀ-ÿ0-9]+\s*){0,10}$/,  

    // /^[a-zA-ZÀ-ÿ0-9\s]{0,10}$/,
  

}

const campos={
  titulo:true,
  det:true,
  lugar:true,
  habilit:true,
  longitud:true
 
  // nombre:false,
  // nombre:false,
  // nombre:false,
}



// document.getElementById("detalle-det").addEventListener("keypress", myFunction2);
// function myFunction2(e) {

//     // comprovamos con una expresion regular que el caracter pulsado sea

//     if (e.key.match(detalle) === null) {

//         // Si la tecla pulsada no es la correcta, eliminado la pulsación
//         e.preventDefault();
//     }
// }
detalle_generar_tb.addEventListener("keyup", function(event) {
  // Aquí puedes realizar acciones cuando se presione una tecla dentro del textarea
  // console.log("Se presionó una tecla en el textarea.");
  // console.log("presion");
  if(expresiones.detalle.test(detalle_generar_tb.value)){
 
       campos.det=true;
    document.getElementById("lbl-det").classList.remove('lbl');
    document.getElementById("lbl-det").classList.add('lbl-titulo-of');
    // console.log("entro");

  }else{
     campos.det=false;
  
    // document.getElementById('lbl-titulo').innerHTML="Error Titulo";
    document.getElementById("lbl-det").classList.remove('lbl-titulo-of');
    document.getElementById("lbl-det").classList.add('lbl');
   

  } 
  // validarcampos(expresiones.detalle, detalle_generar_tb,'det');
 

});



const validarformulario = (e) =>{
 switch (e.target.name){
  case 'detalle-titulo':
    validarcampos(expresiones.nombre, e.target,'titulo');
  break;

  case "detalle-lugar":
     validarcampos(expresiones.lugar, e.target,'lugar');
    
    
    
  break;
  
  // case "habilitar-time":
    

  //   break;
 
  }

}

const validarcampos =(expres,inpt,campo)=>{
    // console.log(inpt.value);
  if(expres.test(inpt.value)){
    
    campos[campo]=true;
   
    document.getElementById(`lbl-${campo}`).classList.remove('lbl');
    document.getElementById(`lbl-${campo}`).classList.add('lbl-titulo-of');
  }else{
    // document.getElementById('lbl-titulo').innerHTML="Error Titulo";
    document.getElementById(`lbl-${campo}`).classList.remove('lbl-titulo-of');
    document.getElementById(`lbl-${campo}`).classList.add('lbl');
    campos[campo]=false;

  } 


}



const validarcheck =(e)=>{
  const habilitar = document.getElementById("habilitar-time").checked;

  var options = document.querySelectorAll('#selec option');
  // var number = document.querySelectorAll('#quantity-tiempos');




  if (habilitar) {
    // if(selec=='h'){
    //   document.getElementById("label-sicheked").innerHTML = 'hora!';
    // }
    // document.getElementById("quantity-tiempos").valie

    document.getElementById("quantity-tiempos").setAttribute('required', '');
    document.getElementById("selec").setAttribute('required', '');
    document.getElementById("habilitar-deshablitar").style.display = "block";
    document.getElementById("selec").setAttribute('required', '');




  } else {
    document.getElementById("sueldo").innerText = "Sueldo por Mes";
    selec.setAttribute('value', '');
    for (var i = 0, l = options.length; i < l; i++) {
      options[i].selected = options[i].default;
    }
    document.getElementById("quantity-tiempos").value = "";
    document.getElementById("selec").value = "";
    // document.getElementById("selec").setAttribute('required','');
    document.getElementById("habilitar-deshablitar").style.display = "none";
    document.getElementById("quantity-tiempos").removeAttribute('required', '');
    document.getElementById("selec").removeAttribute('required', '');
  }

}






//// aqui entra a un evento (soltar la tecla )y ejecuta la funcion , para todos los input
listaform_generar_tb.forEach((input)=>{
    input.addEventListener('keyup', validarformulario);
    input.addEventListener('change',validarcheck);
  
  
    

});


form_generar_tb.addEventListener("submit",(e)=>{
// e.preventDefault();

validargeneraroferta();
// var resultado=false;








});



function validargeneraroferta(){


  var resultado;
  if (longitud.value!=0 && latitud.value!=0){
    campos.longitud=true;
    document.getElementById("lbl-longitud").classList.remove("lbl");
    document.getElementById("lbl-longitud").classList.add("lbl-titulo-of");
       }else{
    campos.longitud = false;
          document.getElementById("lbl-longitud").classList.remove("lbl-titulo-of");
        document.getElementById("lbl-longitud").classList.add("lbl");
      }
  
  if(campos.titulo && campos.lugar && campos.longitud && campos.det){
    // form_generar_tb.reset();
    resultado=true;
    selectiempo=document.querySelector("#selec").setAttribute('required','');
    document.getElementById("formulario__mensaje-exito").classList.add("formulario__mensaje-exito-on");
    setTimeout(()=>{
      document.getElementById("formulario__mensaje-exito").classList.remove("formulario__mensaje-exito-on");
    },1500);
  
  
  
  }else{
    // e.preventDefault();
    resultado=false;
    document.getElementById("formulario__mensaje").classList.remove("formulario__mensaje-off");
    document.getElementById("formulario__mensaje").classList.add("formulario__mensaje-on");
    setTimeout(()=>{
      document.getElementById("formulario__mensaje").classList.add("formulario__mensaje-off");
    },2500);
   
  }
  
  return resultado;

}


//  document.getElementById('imgTrabajo').onchange=function(e){
//     let reader=new FileReader();
//     reader.readAsDataURL(e.target.files[0]);
//     reader.onload=function(){
//               document.getElementById('cargarImg').src = reader.result;
//     }
//  }
 