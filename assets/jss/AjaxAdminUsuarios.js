
mostrarUsuarios();

function mostrarUsuarios() {
    var url = "index.php?c=Admin&a=AjaxListaUsuarios";
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
                users = usuarios[i];
                contador++;
                resultados += '<tr><td>' + contador +'</td>';
                resultados += '<td>' + users.Nombre +' </td>';
                resultados += '<td>' + users.email + ' </td>';
                resultados += '<td>' + users.cedula + ' </td>';          
                resultados += '<td><div class="btn-group btn-group-sm d-flex justify-content-center" role="group">';
                resultados += '<a href="#" onclick="EliminarUsuario(' + users.IdUser +')" class="btn btn-danger mx-1">Eliminar </a>';
                resultados += '<a href="index.php?c=Admin&a=seleccionUsuario&user=' + users.IdUser +'" class="btn btn-primary mx-1">Modificar</a>';
                resultados += ' </div > </td></tr >';    
                }

            
            document.getElementById('listaUsuarios').innerHTML = resultados;
         }
    }

}



function EliminarUsuario(id) {
    swal({
        title: "¿Está seguro de Eliminar al Usuario?",
        text: "",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        buttons: ["Cancelar", "Si"],
    })
        .then((willDelete) => {
            if (willDelete) {
                validador = false;
                var url = "index.php?c=Admin&a=AjaxEliminarUsuario&idUser=" + id;
                var xmlh = new XMLHttpRequest();
                xmlh.open("GET", url, true);
                xmlh.send();
                xmlh.onreadystatechange = function () {
                    if (xmlh.readyState === 4 && xmlh.status === 200) {
                        mostrarUsuarios();
                    }
                }
            }
        });

    


}


function buscarAjaxUsuarios() {
    var buscar = document.getElementById("BuscarUsuario").value;
   
    var url = "index.php?c=Admin&a=buscarAjaxUsuarios&nom=" + buscar;
    var xmlh = new XMLHttpRequest();
    xmlh.open("GET", url, true);
    xmlh.send();

    xmlh.onreadystatechange = function () {
        if (xmlh.readyState === 4 && xmlh.status === 200) {
            var respuesta = xmlh.responseText;
            var usuarios = JSON.parse(respuesta);
           
            resultados = '';
            var contador=0;
            for (var i = 0; i < usuarios.length; i++) {
                users = usuarios[i];
        if(users.rol != "admin"){
                contador++;
                resultados += '<tr><td>' + contador + '</td>';
                resultados += '<td>' + users.Nombre + ' </td>';
                resultados += '<td>' + users.email + ' </td>';
                resultados += '<td>' + users.cedula + ' </td>';
                resultados += '<td><div class="btn-group btn-group-sm d-flex justify-content-center" role="group">';
                resultados += '<a href="#" onclick="EliminarUsuario(' + users.IdUser + ')" class="btn btn-danger mx-1">Eliminar </a>';
                resultados += '<a href="index.php?c=Admin&a=seleccionUsuario&user=' + users.IdUser + '" class="btn btn-primary mx-1">Modificar</a>';
                resultados += ' </div > </td></tr >';    
        }
            }
            document.getElementById('listaUsuarios').innerHTML = resultados;
        }

    };
    
}
