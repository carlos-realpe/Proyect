
mostrarCalificacion();

var valorLectura = [];
var identificador = [];

function mostrarCalificacion() {

    var url = "index.php?c=Busqueda&a=HistorialVacantes";
    var xmlh = new XMLHttpRequest();
    xmlh.open("GET", url, true);
    xmlh.send();
    xmlh.onreadystatechange = function () {
        if (xmlh.readyState === 4 && xmlh.status === 200) {
            var respuesta = xmlh.responseText;
            var facturas = JSON.parse(respuesta);
            var resultados = "";
            indice = facturas.length;

            if (facturas.length == 0) {
                resultados += '<div style="font-size:25px;color: white;margin:200px; display:flex;justify-content: center;">NO HAY USUARIOS EN EL HISTORIAL DE VACANTES</div> ';
            } else {
                resultados += '<div class="nav nav-tabs justify-content-center" id="nav-tab" style="margin-top:15px;">';
                resultados += '<button disabled style="color:black;" class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"  role="tab" aria-controls="nav-home" aria-selected="true">Historial de Vacantes</button></div>';
               
                resultados += '<div class="card" style="padding:20px;"><p class="m-0"><b>Nota:</b> La calificación con estrellas <label for="radio" style="color: #e0bc48; font-size:22px;">★</label> se asigna según la siguiente escala de ponderación:';
                resultados += '<ul style="margin: 0 auto; list-style: none;" class="list-inline"><li class="list-inline-item"><label for="radio" style="color: #e0bc48; font-size:22px;">★</label>5=excelentente</li>';
                resultados += '<li class="list-inline-item"><label for="radio" style="color: #e0bc48; font-size:22px;">★</label>4=Bueno</li>';
                resultados += '<li class="list-inline-item"><label for="radio" style="color: #e0bc48; font-size:22px;">★</label>3=Regular</li> ';
                resultados += '<li class="list-inline-item"><label for="radio" style="color: #e0bc48; font-size:22px;">★</label>2=Malo</li> ';
                resultados += '<li class="list-inline-item"><label for="radio" style="color: #e0bc48; font-size:22px;">★</label>1=Pésimo</li> </ul></div> ';
             
             
                for (var i = 0; i < facturas.length; i++) {
                    factura = facturas[i];

                    resultados += '<div class="card">';
                    resultados += '<div class="card-body" >';
                    resultados += '<div class="row">';
                    resultados += '<div class="col-md-auto"';
                    resultados += 'style="text-align:center; width: 260px; height: 145px; overflow: hidden; white-space: normal;">';
                    resultados += '<img src="' + factura.foto_perfil + '" alt="Avatar Logo" style="width:140px; height :140px;">';
                   
                    resultados += '</div>';
                    resultados += '<div class="col">';
                    resultados += '<h6 class="card-title mb-3" >El vacante <b>' + factura.Nombre + '</b> que postuló para el trabajo <b>"' + factura.titulo +'"</b> se lo calificó con: ';
                 

                    resultados += '';

                    resultados += '<div class="valoracion" style="margin: 0 auto; height: 20px;">';
                   
                    resultados += '<div>';

                    var valor = 6;
                    for (var j = 1; j <= 5; j++) {
                        valor--;
                        resultados += '<input  id="radio' + factura.id_rating  + '" type="radio" name="estrellas' + factura.id_rating + '" value="' + valor + '" disabled>';
                        resultados += '<label for="radio' + factura.id_rating  + '">★</label>';

                    }
                    valorLectura.push(factura.CalificacionPostulante);
                    identificador.push(factura.id_rating);
                    resultados += '</div>';
                    resultados += '</div>';
                    resultados += '</h6>';


                    resultados += '<div style="color: grey; font-size:12px;" class="textT">';
                    resultados += '<h6 class="card-text m-0" >Información del usuario</h6>';
                    resultados += '<p class="card-text m-0">Teléfono Móvil: 0' + factura.telefono + '</p>';
                    resultados += '<p class="card-text m-0">Correo Electrónico: ' + factura.email + '</p>';
                    resultados += '</div>';

                    // resultados += '<button class="btn btn-primary" onclick="CancelarAjaxSolicitud(' + factura.id_reg_trabajo +","+factura.UserCalificado+');" > Cancelar</button > ';
                                 
                    resultados += '</div></div> </div> </div></div>';





                }
            }

            document.getElementById('historialVacante').innerHTML = resultados;
              for (let i = 0; i < indice; i++) {
                if (valorLectura[i] != 0) {
                    
                    document.querySelector('input[type=radio][id="radio' + identificador[i] +'"][value="' + valorLectura[i] + '"]').checked = true;
                }
            }

        }

    }

}
