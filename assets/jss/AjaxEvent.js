



mostrarAjaxMisPostulacion(validador);
//mostrarAjaxRegistroPostulacion();


function CancelarAjaxMisPostulaciones(id){
    validador=true;
    var url="index.php?c=Postulacion&a=CancelarVisualizarP&postu="+id;
    var xmlh = new XMLHttpRequest();
    xmlh.open("GET", url, true);
    xmlh.send();
    xmlh.onreadystatechange = function(){
        if(xmlh.readyState === 4 && xmlh.status===200){
            mostrarAjaxMisPostulacion(validador);
        }
    }

}
function CancelarAjaxPublicacion(id){

    swal({
        title: "¿Está seguro de Eliminar el trabajo?",
        text: "",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        buttons: ["Cancelar", "Si"],
    })
        .then((willDelete) => {
            if (willDelete) {
                validador = false;
                var url = "index.php?c=Postulacion&a=EliminarVisualizarP&postu=" + id;
                var xmlh = new XMLHttpRequest();
                xmlh.open("GET", url, true);
                xmlh.send();
                xmlh.onreadystatechange = function () {
                    if (xmlh.readyState === 4 && xmlh.status === 200) {
                        mostrarAjaxMisPostulacion(validador);
                    }
                }
            }
        });
 
}




function mostrarAjaxMisPostulacion(validador){
    
    var estado;
    color="grey";
    textoDeMalaBD = "-usuario";
     var url="index.php?c=Postulacion&a=MisPostulacionAjax";
    var xmlh = new XMLHttpRequest();
    xmlh.open("GET", url, true);
    xmlh.send();
    xmlh.onreadystatechange = function(){
        if(xmlh.readyState === 4 && xmlh.status===200){
            var respuesta = xmlh.responseText;
             var facturas = JSON.parse(respuesta);
          
             //actualizar cierta parte de la pagina
             // console.log(facturas);
            // actualizar cierta parte de la pagina
  
                       resultados = ' ';
                       resultados += '<nav >';
                       resultados += '<div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist" style="margin-top:15px;">';
if(validador==true ){
     
    resultados += '  <button style="color:black;" class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Mis Postulaciones</button>';
    resultados += '  <button style="color:black;" class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Mis Publicaciones</button>';
}else{
    resultados += '  <button style="color:black;" class="nav-link " id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="false">Mis Postulaciones</button>';
    resultados += '  <button style="color:black;" class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="true">Mis Publicaciones</button>';
}
                      
                     
                       resultados += '  </div>';
                       resultados += ' </nav>';
                       resultados += '<div class="tab-content" id="nav-tabContent"  > ';   
                       if(validador==true){
                       resultados += '<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0"> ';  
                       }else {  resultados += '<div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0"> ';   }
            
            if(facturas.length!=0){
                       for (var i = 0; i < facturas.length; i++) {
                factura = facturas[i];
                ///--------------------------* MIS POSTULACIONES*------------------------
            
            
             if (factura.estado_solicitud == 0){
                estado ="EN PROGRESO";
                color="black";
             }
              if (factura.estado_solicitud == 1){
                estado ="ACEPTADO";   
                color="green";  
             }
              if (factura.estado_solicitud == 2){
                estado ="RECHAZADO";     
                color="red";
             } 
              if(factura.estado_solicitud == 3) {
                    estado = "TRABAJO CULMINADO";
                    color = "orange";
                }
              
               

                resultados += '<div class="card"> ';   
                resultados += '<div class="card-body"> ';   
                resultados += ' <div class="row"> ';   
                resultados += '<div class="col-md-auto" style="text-align:center; width: 260px; height: 190px; overflow: hidden; white-space: normal;">  ';   
                resultados += ' <img src="'+factura.foto_perfil+'" alt="Avatar Logo" style="width:140px; height :140px;">';   
                resultados += '<div>' + factura.nombre +" " +factura.Apellido+ ' </div>      ';   
                resultados += '</div> ';   
                resultados += '   <div class="col">';   
                resultados += '<h5 class="card-title"> '+factura.titulo+'   </h5> ';   
                resultados += '   <h6 class="card-subtitle mb-2 text-muted" style="color:'+color+'!important"> '+estado+'</h6> ';
                resultados += '';
                resultados += '<div class="textT">  <p class="card-text"><h6>Detalle del anuncio </h6> '+factura.detalle+' </p> </div> ';   
                           resultados += '<div class="btn-toolbar"><a href="index.php?c=Vista&a=verVistaBusqueda&var=' + factura.id_registro_trabajo + '&par=mis&estado='+factura.estado_solicitud +'" class="card-link btn btn-primary">Ver Más</a> ';   
            //    resultados += '  <a href="index.php?c=Postulacion&a=CancelarVisualizarP&postu='+factura.id_registro_trabajo+'" class="card-link btn btn-primary">Cancelar Postulacion</a> ';  
            
                if (factura.estado_solicitud == 0 || factura.estado_solicitud == 2){
                resultados += ' <button class="card-link btn btn-primary" onclick="CancelarAjaxMisPostulaciones('+factura.id_registro_trabajo+');">Cancelar Postulación</button>';
                } if (factura.estado_solicitud == 3){                 
                    resultados += ' <button class="card-link btn btn-primary" onclick="CancelarAjaxMisPostulaciones(' + factura.id_registro_trabajo + ');">Culminar Postulación</button>';    
                }




                resultados += '</div></div>            </div></div>     </div>         '; 
                //// -------------------------------* GENERAR TRABAJOS POSTULACIONES*--------------------
                                 
           }
        }else{

      
            resultados += '<div style="font-size:25px;color: white;margin:200px; display:flex;justify-content: center;">NO SE ENCUENTRA REGISTRADO NINGUNA POSTULACIÓN</div> ';   
        }
           if(validador==true){
            resultados += '</div>   <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0"> ' ;
           }else{   resultados += '</div>   <div class="tab-pane fade  show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0"> ' ; }
            var url="index.php?c=Postulacion&a=PostulacionAjax";
            xmlh.open("GET", url, true);
            xmlh.send();
            xmlh.onreadystatechange = function(){
                if(xmlh.readyState === 4 && xmlh.status===200){
                    var respuesta = xmlh.responseText;
                     var facturas = JSON.parse(respuesta);

                        if(facturas.length!=0){

                     for (var i = 0; i < facturas.length; i++) {
                        factura = facturas[i];
                   
                        value_de_tiempo();
                resultados += '<div class="card"> ';
           resultados += '<div class="card-body"> ';
           resultados += '<div class="row">                ';
           resultados += ' <div class="col-md-auto" style="text-align:center;">';

           

           resultados += ' <img src="'+factura.foto_trabajo+'" alt="Avatar Logo" style="width:140px; height :140px;">';


           resultados += ' <div class="iconos-tempypost-postulacion"> ';
           resultados += ' <div class="iconos-tempypost-postulacion"></div>';
           resultados += '  <span class="material-symbols-outlined icono-viewgenelab">timer';
           resultados += '</span> <span>Duración del trabajo: '+factura.cntd_tiempo+filaresult+'</span></div> ';
           resultados += ' <div class="iconos-tempypost-postulacion">';
           resultados += '<span class="material-symbols-outlined icono-viewgenelab">work</span>';
           resultados += '  <span>Cantidad de Postulantes: '+factura.cantidad_postulantes+'</span> </div></div>';
           resultados += '<div class="col"> ';
           resultados += '<h5 class="card-title"> '+factura.titulo+' </h5> ';
           if(factura.labor_trabajo==''){
            resultados += '<h5 class="card-title" style="color:red; font-size:13px"> Hubo un cambio en el trabajo, ingrese nuevo trabajo  </h5> ';
           }
                         resultados += '<div class="textT">  <p  class="card-text"><h6>Detalle del anuncio </h6> '+factura.detalle+' </p> </div> ';
                         resultados += '<div class="btn-toolbar"><a href="index.php?c=Vista&a=verVistaBusqueda&var=' + factura.id_registro_trabajo +'&par=elp" class="card-link btn btn-primary mx-1">Ver Más</a> ';
                         resultados += '<a href="index.php?c=Registro&a=mostrarEditar&postu=' + factura.id_registro_trabajo +'" class="card-link btn btn-primary mx-1">Editar</a> ';
         //  resultados += ' <a href="index.php?c=Postulacion&a=Eliminar&postu=" class="card-link btn btn-primary">Eliminar Postulacion</a> ';
                         resultados += '  <button class="card-link btn btn-danger mx-1" onclick="CancelarAjaxPublicacion('+factura.id_registro_trabajo+');">Eliminar Trabajo</button>';     resultados += ' </div></div> </div></div></div>';
                     }
                    }else{
                         
                        resultados += '<h1  style="font-size:25px;color: white;margin:200px; display:flex;justify-content: center;">NO SE HA GENERADO NINGÚN TRABAJO</h1> ';
                    }
                     resultados += '</div></div> ' ;
                     
           document.getElementById('GenTrabajo').innerHTML = resultados;     
                }
            }
     }
 
} ;

}
var filaresult;
  function value_de_tiempo(){
    filaresult="";
    switch(factura.lbl_tiempo){
                    
        case 'h':  
            if(factura.cntd_tiempo>1&&factura.cntd_tiempo){
            filaresult=" horas";}else{   filaresult=" hora";}
                
            break;
            case 'm':  
                if(factura.cntd_tiempo>1&&factura.cntd_tiempo){
                    filaresult=" meses";}else{   filaresult=" mes";}
                break;
                case 'a':  
                    if(factura.cntd_tiempo>1&&factura.cntd_tiempo){
                        filaresult=" años";}else{   filaresult=" año";}
                    break;
                    case '':  
                       factura.cntd_tiempo="---";
                       filaresult="";
                        break;
    }
}































/*
   resultados += '<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0"> ' ;

                resultados += '<div class="card"> ';
                resultados += '<div class="card-body"> ';
                resultados += '<div class="row">                ';
                resultados += ' <div class="col-md-auto" style="text-align:center;">';
                resultados += ' <img src="assets/img/perfilBase/perfilBase.jpg" alt="Avatar Logo" style="width:140px; height :140px;">';
                resultados += ' <div class="iconos-tempypost-postulacion"> ';
                resultados += ' <div class="iconos-tempypost-postulacion"></div>';
                resultados += '  <span class="material-symbols-outlined icono-viewgenelab">timer';
                resultados += '</span> <span>Tiempo Estimado: <?php echo $fila["cntd_tiempo"]." ".$fila["lbl_tiempo"];?></span></div> ';
                resultados += ' <div class="iconos-tempypost-postulacion">';
                resultados += '<span class="material-symbols-outlined icono-viewgenelab">work</span>';
                resultados += '  <span>Postulante: <?php echo $fila["vacante"];?> disponible</span> </div></div>';
                resultados += '<div class="col"> ';
                resultados += '<h5 class="card-title"> <?php echo $fila["titulo"];?>  </h5> ';
                resultados += '<div class="textT">  <p  class="card-text"><?php echo $fila["detalle"];?> </p> </div> ';
                resultados += ' <a href="index.php?c=Vista&a=verVistaBusqueda&var=&par=elp" class="card-link btn btn-primary">Ver Mas</a> ';
                resultados += '<a href="#" class="card-link btn btn-primary">Editar</a> ';
                resultados += ' <a href="index.php?c=Postulacion&a=Eliminar&postu=<?php echo $fila["id_registro_trabajo"] ?>" class="card-link btn btn-primary">Eliminar Postulacion</a> ';

                resultados += ' </div> </div></div></div></div></div>';
                resultados += ' ';

*/















