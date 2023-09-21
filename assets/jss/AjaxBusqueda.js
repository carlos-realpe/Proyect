
function reconocimientoVoz(){

  let rec;
    if (!("webkitSpeechRecognition" in window)) {
    	alert("No se puedes usar la API");
    } else {
    	rec = new webkitSpeechRecognition();
    	rec.lang = "es-Es";
    	rec.continuous = true;
    	rec.interim = true;
    	rec.addEventListener("result",iniciar);
    }
function iniciar(event){
	for (let i = event.resultIndex; i < event.results.length; i++){
         
         document.getElementById('Buscar').value = event.results[i][0].transcript;        
         
	}
    buscarAjaxPublicacion();
}
rec.start();
}


function buscarAjaxPublicacion(){
    var buscar = document.getElementById("Buscar").value;
  
     var selectBuscar = document.getElementById("selec-gentrabajo").selectedIndex;
    var url = "index.php?c=Busqueda&a=buscarAjaxPublicacionn&nom=" + buscar + "&busquedaTipo=" + selectBuscar;
    var xmlh = new XMLHttpRequest();
    xmlh.open("GET", url, true);
    xmlh.send();
 
       xmlh.onreadystatechange = function(){
        if(xmlh.readyState === 4 && xmlh.status===200){
            var respuesta = xmlh.responseText;
             var postul = JSON.parse(respuesta);
                         resultados = '';
                       
            for (var i = 0; i < postul.length; i++) {
                postulacion = postul[i];
      
                    resultados += '<a href="index.php?c=Vista&a=verVistaBusqueda&var=+'+postulacion.id_registro_trabajo+'&par=vd>" style="text-decoration:none;">';
                    resultados += '<div class="contenedor-cartas-m">';
                    resultados += '<div class="contenedor-cartext">';
                resultados += '<h3 style="font-size:20px; text-align: center;  text-overflow: ellipsis;overflow: hidden;  display: -webkit-box; -webkit-line-clamp: 2;  -webkit-box-orient: vertical;">' + postulacion.titulo +'</h3><div class="textT"> ';
                    resultados += ' <p>Oficio: '+postulacion.name_profesion_user+'</p>';
                    resultados += ' <p>Ciudad: '+ postulacion.lugarT + '</p>';
                    resultados += ' <p>Detalle: '+postulacion.detalle+'   </p> </div></div>';
                    resultados += ' <div class="contenedor-imgm">';
                    resultados += '<img      src="'+postulacion.foto_trabajo+'"      alt="imagen de mision"   />';
                    resultados += '</div></div></a>';
                    resultados += '';
                         
               }
                document.getElementById('contenedor-resul').innerHTML = resultados;} 
              
        };
}


