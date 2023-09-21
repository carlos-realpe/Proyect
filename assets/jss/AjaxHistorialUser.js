
mostrarHistorial();

var valorLectura = [];
var identificador = [];

function mostrarHistorial() {
    
    var url = "index.php?c=Busqueda&a=HistorialUser&idUser="+document.getElementById("idUser").value;
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
                resultados += '<div style="font-size:25px;color: white;margin:200px; display:flex;justify-content: center;">ESTE USUARIO NO CUENTA CON TRABAJOS CALIFICADOS</div> ';
            } else {
                resultados += '<div class="nav nav-tabs justify-content-center" id="nav-tab" style="margin-top:15px;">';
                resultados += '<button disabled style="color:black;" class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"  role="tab" aria-controls="nav-home" aria-selected="true">Historial de Trabajos realizados</button></div>';

                resultados += '<div class="card" style="padding:20px;"><p class="m-0"><b>Nota:</b> La calificación con estrellas <label for="radio" style="color: #e0bc48; font-size:22px;">★</label> se asigna según la siguiente escala de ponderación:';
                resultados += '<ul style="margin: 0 auto; list-style: none;" class="list-inline"><li class="list-inline-item"><label for="radio" style="color: #e0bc48; font-size:22px;">★</label>5=excelentente</li>';
                resultados += '<li class="list-inline-item"><label for="radio" style="color: #e0bc48; font-size:22px;">★</label>4=Bueno</li>';
                resultados += '<li class="list-inline-item"><label for="radio" style="color: #e0bc48; font-size:22px;">★</label>3=Regular</li> ';
                resultados += '<li class="list-inline-item"><label for="radio" style="color: #e0bc48; font-size:22px;">★</label>2=Malo</li> ';
                resultados += '<li class="list-inline-item"><label for="radio" style="color: #e0bc48; font-size:22px;">★</label>1=Pésimo</li> </ul></div> ';


                for (var i = 0; i < facturas.length; i++) {
                    factura = facturas[i];

                    resultados += '<div class="card">';
                    resultados += '<div class="card-body">';
                    resultados += '<div class="row">';
                    resultados += '<div class="col-md-auto"';
                    resultados += 'style="text-align:center; width: 260px; height: 145px; overflow: hidden; white-space: normal;">';
                    resultados += '<img src="' + factura.foto_perfil + '" alt="Avatar Logo" style="width:140px; height :140px;">';

                    resultados += '</div>';
                    resultados += '<div class="col" style="display:flex; align-items: center;">';
                    resultados += '<h6 class="card-title mb-3" >El empleador <b>' + factura.Nombre + '</b> calificó con: ';


                    resultados += '';

                    resultados += '<div class="valoracion" style="margin: 0 auto; height: 20px;">';

                    resultados += '<div>';

                    var valor = 6;
                    for (var j = 1; j <= 5; j++) {
                        valor--;
                        resultados += '<input  id="radio' + factura.id_rating + '" type="radio" name="estrellas' + factura.id_rating + '" value="' + valor + '" disabled>';
                        resultados += '<label for="radio' + factura.id_rating + '">★</label>';

                    }
                    valorLectura.push(factura.CalificacionPostulante);
                    identificador.push(factura.id_rating);
                    resultados += '</div>';
                    if (factura.titulo==null){
                        resultados += '</div>';
                    }else{
                    resultados += '</div> para el trabajo de <b>"'+factura.titulo+'"</b>';
                    }

                    resultados += '</h6>';


                    

                    // resultados += '<button class="btn btn-primary" onclick="CancelarAjaxSolicitud(' + factura.id_reg_trabajo +","+factura.UserCalificado+');" > Cancelar</button > ';

                    resultados += '</div></div> </div> </div></div>';





                }
            }

            document.getElementById('historialUser').innerHTML = resultados;
            for (let i = 0; i < indice; i++) {
                if (valorLectura[i] != 0) {

                    document.querySelector('input[type=radio][id="radio' + identificador[i] + '"][value="' + valorLectura[i] + '"]').checked = true;
                }
            }

        }

    }

}
