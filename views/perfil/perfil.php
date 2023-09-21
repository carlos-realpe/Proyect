<?php require_once 'views/partials/encabezado.php'; ?>

<section>
  <div class="seccion-perfil-usuario">
    <div class="perfil-usuario-header">
      <div class="perfil-usuario-portada">
        <div class="perfil-usuario-avatar">

          <!-- <img src="https://cengage.force.com/resource/1607465003000/loginIcon" alt="img-avatar" /> -->
          <?php if ($resultados['foto_perfil'] != "") { ?>
            <img src="<?php echo $resultados['foto_perfil']; ?>" alt="img-avatar" />
          <?php } else { ?>
            <img src="<?php $_SESSION['url']; ?>" alt="img-avatar" />
          <?php } ?>
          <!-- <div class="boton-avatar" id="boton-avatar"> -->

          <!-- <button type="button" class="boton-avatar">
            <span class="material-symbols-outlined">
              add_a_photo
            </span>
          </button> -->


          <form action="index.php?c=Perfil&a=editarFotoPerfil" method="post" enctype="multipart/form-data">
            <label class="material-symbols-outlined boton-avatar" id="boton-avatar">
              <input type="file" id="btn_abrir_file" name="btn_abrir_file" accept="image/png, .jpeg, .jpg, image/gif"
                style="display:none;" onchange="subirimagen()">
              <span class="icon-subida-perfil" style="left: 10px;">add_a_photo</span>
            </label>
            <input type="submit" value="Submit" id="clic" hidden>
          </form>


          <!-- <script>
            const editarperfil= document.getElementById('btn_abrir_file')
            .addEventListener('change',(e)=>{
              const file=e.target.files[0].name;
            
            fetch('controllers/PerfilController.php', {
              headers: {
                'Content-type': 'application/json'
              },
              method: 'POST',
              body: JSON.stringify({ id: 11, name: 'Rodrigo Díaz de Vivar', username: 'El Cid'})
            })
         
              .then(function (json) {
                // Usamos la información recibida como necesitemos
             
              });
            });
          </script> -->

        </div>
      </div>
    </div>
    <div class="perfil-usuario-body">

      <div class="perfil-usuario-bio">

        <h3 class="titulo">
          <?php
          echo $resultados['nombre'] . " " . $resultados['Apellido']; ?>
        </h3>


        <?php if ($resultados['id_fk_prfesionuser'] == "") { ?>
          <span style="color:#ff6d6d;">No se ha seleccionado un <a href="#labor" class="laborCV">Oficio </a></span>
        <?php } ?>
        <!-- <p class="texto">
          Jugador de lol profesional , proximo a ser el mejor mid-laner de ISIRUS-GAMING, subo cuentas de elo bajo hasta
          oro,sed do
          eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p> -->
      </div>
    </div>

    <div class="perfil-usuario-detalleg">
      <div class="caja-detalleg">
        <h1 class="titulo-datos-generales">DATOS GENERALES</h1>
        <div class="caja-detalle-principal">
          <button onclick="fun('pr')" type="submit" id="share" class="share"><span
              class="material-symbols-outlined">edit_square</span></button>

          <div class="labelde"><span>Nombre:</span> <span class="label-perfil" id="nombre">
              <?php echo $resultados['nombre']; ?>
            </span></div>
          <div class="labelde"><span>Apellido:</span><span class="label-perfil" id="apellido">
              <?php echo $resultados['Apellido']; ?>
            </span></div>
          <div class="labelde"><span>E-mail: </span><span class="label-perfil" id="email">
              <?php echo $resultados['email']; ?>
            </span></div>
          <div class="labelde"><span>Teléfono Móvil: </span> <span class="label-perfil" id="telf">
              <?php echo "0" . $resultados['telefono']; ?>
            </span></div>

          <div class="labelde"> <span>Ciudad: </span> <span class="label-perfil" id="lugar">
              <?php echo $resultados['lugar']; ?>
            </span></div>
          <div class="labelde"> <span>Cédula: </span> <span class="label-perfil" id="lugar">
              <?php echo $resultados['cedula']; ?>
            </span></div>




        </div>
        <div class="caja-detalle-secundario" id="labor">

          <div class="caja-labor">
            <form id="formbtnselec" action="index.php?c=Registro&a=agregar_selec_profesion" method="post"
              onsubmit="return validarBtnSelec()">

              <span>Oficio: </span>
              <select name="select" id="selec-trabajo" disabled>





                <?php
                $flag = false;
                echo '<option value="0">-------</option>';
                foreach ($selec_profesion as $valores):
                  if ($resultados['id_fk_prfesionuser'] == $valores["id_profesion_user"] && $flag == false) {
                    $flag = true;
                    echo '<option value="' . $valores["id_profesion_user"] . '" selected>' . $valores["name_profesion_user"] . '</option>';

                  } else {
                    echo '<option value="' . $valores["id_profesion_user"] . '">' . $valores["name_profesion_user"] . '</option>';
                  }

                endforeach;
                ?>


                <!-- <option value="value2">gafitero</option>
              <option value="value3">panadero</option>
              <option value="value3">cuidador</option>
              <option value="value3">albanil</option> -->



              </select>

              <input type="submit" name="cambiolabor" id="cambiolabor" value="editar" />



              <div class="buscador-secu" style="list-style:none; background: red; width:50%; margin-left:120px;  ">

              </div>

            </form>

          </div>
          <div class="caja-cv">

            <form id="formbtnpw" action="index.php?c=Registro&a=agregar_pw" method="post"
              onsubmit="return funcioneditarbtn_pw()">
              <div class="labeltext-cambiar-pw">Cambiar contraseña</div>
              <div class="inputtext-cambiar-pw">
                <input type="password" value="password" name="password" id="password" disabled required />
                <input type="submit" name="cambio" id="cambiopw" value="editar" />
                <input type="button" name="cancelar_cambio" id="cancelar_cambiopw" value="X" style="display:none;">

                <div class="ocultar-confirma-pw" id="ocultar-confirma-pw" style=" visibility: hidden;">
                  <p style="font-size: 70%; color:gray; margin-bottom:0"> Mínimo 6 caracteres </p>
                  <span class="lbl-titulo-of" id="lbl-password"> La contraseña es muy corta</span>

                  <label for="cambiopw" style="display:block">confirmar contraseña</label>
                  <input type="password" value="" name="repassword" id="repassword" />
                  <span class="lbl-titulo-of" id="lbl-repassword"> La contraseña no coincide</span>
                </div>
              </div>

              <!-- <label class="form-label">Contraseña </label>
            <input type="password" name="password" id="password" class="form-control" required />
            

            <label class="form-label">Repetir Contraseña</label>
            <input type="password" name="repassword" id="repassword" class="form-control" required />
          
            -->
            </form>
          </div>
        </div>


      </div>

      <div class="caja-pw-maps">
        <h1 class="titulo-datos-generales">INFORMACIÓN PERSONAL</h1>
        <!-- *******ARCHIVO****** -->

        <form action="index.php?c=Perfil&a=ActualizarCv" method="post" enctype="multipart/form-data"
          onsubmit="return funcioneditarbtn_cv()">
          <div class="caja-imgmaps">
            <div style="margin:30px;">
              <?php if ($resultados["curriculum"] != "") { ?>
                <span>currículum: <a href="<?php echo $resultados['curriculum']; ?>" target="_BLANK">Abrir PDF</a></span>
              <?php } ?>

              <input type="file" accept="application/pdf" id="activador" name="activador" disabled>
            </div>
            <div class="botones_cv">
              <input type="button" name="cambiocv" id="cambiocv" value="editar" />
              <input type="button" name="cancelarcv" id="cancelarcv" value="cancelar" style="display:none;" />
            </div>
            <div class="previsualizado-cv"><img src="./assets/img/practica.jpg"
                alt="previsualización del currículum cargado" style="width:125px;height:125px;"></div>
          </div>

        </form>


      </div>

      <!-- *******eeste es el sombreado de fondo y el js donde se agrega el formulario****** -->
      <div class="overlai" id="overlai">
        <div class="view-emergente" id="view-emergente">
          <a href="#" id="btn-cerrar" class="btn-cerrar">
            <span class="material-symbols-outlined">disabled_by_default</span>
          </a>
          <h1>DATOS PERSONALES</h1>
          <form action="index.php?c=Perfil&a=editarPerfil" method="post" enctype="multipart/form-data">
            <div class="contenedor-input" id="contenedor-input">
              <div class="preview-imgperfil"></div>
              <!-- ******esto debe ser dinamico , decir no debe estar aqui****** -->
              <!-- <label for="lbl-nombreg">nombre</label><input type="text" placeholder="nombre">
                    <label for="lbl-apellidog">apellid</label><input type="email" placeholder="apellido">
                    <label for="lbl-correog">correo</label><input type="email" placeholder="correo">
                    <label for="lbl-telefonog">telefono</label><input type="email" placeholder="#telf"> -->
            </div>
            <input type="submit" class="btn-guard" name="btn-guard" id="btn-guard" value="Guardar">
          </form>

        </div>

      </div>


    </div>
  </div>
</section>

<script src="assets\jss\view-oculto.js"></script>
<?php require_once 'views/partials/piedepagina.php'; ?>