<?php require_once 'views/partials/encabezado.php'; ?>



<style>
    /* .container_chat {
        display: grid;
        grid-template-columns: 1fr 2fr;
        gap: 1px;
        max-width: 800px;
        margin: 0 auto;
    }

    .caja {
        background-color: #f1f1f1;
        padding: 20px;
    }

    .caja_de_contacto {
      
        padding: 400px 10px;
    }

    .caja_de_chat {
        display: flex;
        flex-direction: column;
        background-color: #f1f1f1;
        padding: 20px;
    }

    .mensaje {
        
        padding: 10px;
        margin-bottom: 10px;
    }

    input[type="text"] {
        width: 80%;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="button"] {
        padding: 5px 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    } */
    .container_chat {
        display: grid;
        grid-template-columns: 1fr 2fr;
        gap: 1px;
        /* height: 80%; */
        /* max-width: 800px; */
        margin: 1% 100px;
    }

@media(max-width:990px){
.container_chat {
           display: block;
    /* grid-template-columns: 1fr 2fr; */
    gap: 1px;
    height: auto;
    max-width: 800px;
    margin: auto;
    }

}

    .caja2 {
        background-color: #f1f1f1;
        padding: 10px;
    }



    .caja_de_chat {
        display: flex;
        flex-direction: column;
        background-color: #f1f1f1;
        padding: 20px;
    }

    .mensaje {
        background-color: yellow;
        padding: 10px;
        margin-bottom: 10px;
    }

    input[type="text"] {
        width: 99%;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="button"] {
        padding: 5px 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .contenedor_derecha {
        text-align: -webkit-right;
        padding-right: 10px;
    }

    .contenedor_isquierda {
        padding-left: 10px;
    }

    .chat_1,
    .chat_2 {
        border-radius: 10px;
        border: 1px solid black;
        padding: 4px;
        color: white;
        margin: 15px 0;
        font-weight: bold;
        width: 150px;

    }

    .chat_1 {

        background-color: #0f0d979e;


    }

    .chat_2 {

        background-color: gray;
        align-items: center;

    }

    .input_mensajes {
        display: flex;
        flex-direction: row;
        margin-top: auto;
        width: 100%;
        margin-top: 5px;
    }

    .contenedor_chat {

        height: 300px;
        width: 100%;

        /* background: #efefef; */
        background: #adb5bd;
        border-top: 1px solid #d9d9d9;
        border-radius: 3px 3px 5px 5px;

        overflow-y: auto;
    }

    .txt_box {
        width: 100%;
    }

    .caja_perfil {
        display: flex;
        flex-direction: row;
    }

    .gnrl_perfil {
        display: flex;
        flex-direction: column;
        line-height: 0.5px;
        margin-left: 10px;

    }

    .border_reci {
        border: 1px solid gray;
        background-color: whitesmoke;
    }

    @media (max-width: 600px) {
        .container {
            grid-template-columns: 1fr;
        }

        .caja_de_contacto {
            margin-bottom: 20px;
        }

        .caja_de_chat {
            padding: 10px;
        }

        input[type="text"] {
            width: 100%;
        }
    }
</style>

<body>
    <div class="container_chat chatgrid">

        <div class="caja2">
            <H1 style="text-align: center;"> CONTACTOS</H1>
            <hr>
            <div class="caja_de_contacto ">

                <!-- <P>eddy ramirez</P>
                <P>edwin chilan</P>
                <P>logan paul</P> -->

               <!--   <nav class="navbar navbar-light bg-light ms-2 me-2">
                    <div class="container-fluid ">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit"><span
                                    class="material-icons">search</span></button>
                        </form>
                    </div>
                </nav>-->

                <p class="titulos_msg">Lista de Trabajos</p>
                <div class="mt-2 border_reci2">
                    <div id="listaChat2"></div>

                </div>
                <p class="titulos_msg">Lista de Empleados</p>
                <div class="mt-2 border_reci2">
                    <div id="listaChatMiPublicacion2"></div>

                </div>






            </div>
        </div>
        <div class="caja_de_chat">
            <div class="caja_perfil">
                <div> <img src="<?php echo $user['foto_perfil'] ?>" alt="" width="30px" class="rounded-pill" srcset="">
                </div>
                <div class="gnrl_perfil">
                    <div>
                        <h4>
                            <?php echo $user['nombre'] . " " . $user['Apellido'] ?>
                        </h4>

                    </div>
                    <div>

                      
                    </div>
                </div>

            </div>




            <div class="contenedor_chat" id="cont_chat">
                <div id="contendor"> </div>





            </div>
            <form id="enviarMsg" onsubmit="enviarMsg(event)">
                <div class="input_mensajes">
                    <div class="txt_box"> <input type="text" name="msg" id="msg" value=""></div>
                    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">

                    <div class="btn_box"> <input type="submit" value="Enviar"></div>
                </div>
            </form>
        </div>

    </div>

</body>


<script src="assets\jss\Chat.js"></script>
<?php require_once 'views/partials/piedepagina.php'; ?>