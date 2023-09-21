  // verperfil= document.getElementById("verperfilpostu");
// card

var contenedor_perfilpostu=document.getElementById("perfilpostu"),
contenedor_perfilpostu2=document.getElementById("perfilpostu2"),
contenedor_perfilpostu3=document.getElementById("perfilpostu3");
// nombre= document.getElementById("nombre").textContent;


  

function mostrarperfilindice(indice,idUser){

  contenedor_perfilpostu.innerHTML=(arri[indice] );
  contenedor_perfilpostu2.innerHTML=(arri2[indice]);
  contenedor_perfilpostu3.innerHTML=(arri3[indice] );
  var valor = document.getElementById("pro"+idUser).innerHTML;
  var cantidadUser = document.getElementById("textP"+idUser).innerHTML;


  document.getElementById("pro2"+idUser).style.width = valor;
  document.getElementById("pro2" + idUser).innerHTML = valor;
  document.getElementById("textP2" + idUser).innerHTML = cantidadUser;

}





