
    var url = "index.php?c=Admin&a=AjaxListaProfesiones";
    mostrarProfesion();
    function mostrarProfesion(){
    var xmlh = new XMLHttpRequest();
    xmlh.open("GET", url, true);
    xmlh.send();
    xmlh.onreadystatechange = function () {
        if (xmlh.readyState === 4 && xmlh.status === 200) {
            var respuesta = xmlh.responseText;
            var usuarios = JSON.parse(respuesta);
            var resultados = "";
            var contador =0;
            for (var i = 0; i < usuarios.length; i++) {
                profesion = usuarios[i];
                contador++;
                resultados += '<tr><td>' + contador +'</td>';
                // resultados += '<td>' + profesion.img_profesionuser +' </td>';
                resultados += '<td><img src="'+ profesion.img_profesionuser +'" alt="" width="100px" height="100px"> </td>';
                resultados += '<td>' + profesion.name_profesion_user+ ' </td>';
                resultados += '<td><div class="btn-group btn-group-sm d-flex justify-content-center" role="group">';
                resultados += '<a href="#" onclick="EliminarUsuario(' + profesion.id_profesion_user +')" class="btn btn-danger mx-1">Eliminar </a>';
                resultados += '<a href="index.php?c=Admin&a=mostrarEditarProfesion&profs=' + profesion.	id_profesion_user +'" class="btn btn-primary mx-1">Modificar</a>';
                resultados += ' </div > </td></tr >';    
                }

            
            document.getElementById('listaProfesiones').innerHTML = resultados;
         }
    }
}
    function EliminarUsuario(id) {
        swal({
            title: "¿Está seguro de Eliminar este tipo de trabajo?",
            text: "",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            buttons: ["Cancelar", "Si"],
        })
            .then((willDelete) => {
                if (willDelete) {
                    validador = false;
                    var url = "index.php?c=Admin&a=AjaxEliminarProfesion&idProf=" + id;
                    var xmlh = new XMLHttpRequest();
                    xmlh.open("GET", url, true);
                    xmlh.send();
                    xmlh.onreadystatechange = function () {
                        if (xmlh.readyState === 4 && xmlh.status === 200) {
                            mostrarProfesion();
                        }
                    }
                }
            });
    
    
    }
 

