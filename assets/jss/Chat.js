
function enviarMsg(event){
    event.preventDefault(); 
    form = document.getElementById('enviarMsg');
        id = atob(document.getElementById('id').value);
        var url = "index.php?c=Chat&a=EnviarMsg&idUserReceptor=" + id + "&mensaje=" + document.getElementById('msg').value;
        var xmlh = new XMLHttpRequest();
        xmlh.open("GET", url, true);
        xmlh.send();
        form.reset();
        xmlh.onreadystatechange = function () {
            if (xmlh.readyState === 4 && xmlh.status === 200) {
                mostrarMsg();    
            }
        }
}
mostrarMsg();
setInterval(mostrarMsg, 500);
  
function mostrarMsg(){
   // id = atob(document.getElementById('id').value);
   


    var url1 = "index.php?c=Chat&a=mostrarMsg";
    var xmlh3 = new XMLHttpRequest();
    xmlh3.open("GET", url1, true);
    xmlh3.send();
    xmlh3.onreadystatechange = function () {
        if (xmlh3.readyState === 4 && xmlh3.status === 200) {
            
            var msg = xmlh3.responseText;
            var chatMsg = JSON.parse(msg);
            var msg = '';
                 for (var k = 0; k < chatMsg.length; k++) {
                msgMuestra = chatMsg[k];
                if (msgMuestra.bandera == 1){
                msg += '   <div class="contenedor_derecha">';
                msg += '      <div class="chat_1">';
                msg += '           <span>' + msgMuestra.mensaje+'</span>';
                msg += '   </div>  </div>  ';
                }
                if (msgMuestra.bandera ==0){
                    msg += ' <div class="contenedor_isquierda">';
                    msg += '  <div class="chat_2">';
                    msg += '     <span>' + msgMuestra.mensaje +'</span>';
                    msg += ' </div>';
                    msg += '</div>';
             }
            }
            var contendorElement = document.getElementById('contendor');
            if (contendorElement !== null) {
                document.getElementById('contendor').innerHTML = msg;

                var contenedor = document.getElementById("cont_chat");
                contenedor.scrollTop = contenedor.scrollHeight;
            }



        }
    }
   
}