<?php require_once 'views/partials/encabezado.php'; ?>

<section >

<?php 
        
        if(isset($_GET["mg"])){
  $msjex = $_GET["mg"];
  if($msjex==1){   echo('<script language="javascript">swal("REGISTRO CON ÉXITO");</script>');}
  else{ echo('<script language="javascript">swal("No se pudo realizar el registro");</script>');}
    }  
      ?>
      
<div id="contenedor">
          <div >
      
               <div class="formularios">
               <div > <h2 style="text-align:center;">Iniciar Sesión</h2> </div>
               <hr  id="barraform">
                  <form  action="index.php?c=Login&a=usuario" method="post" id="formContacto" >
                        <div class="row cajas_iniyreg">
                            <div class=" col-md-6 col1_cajas">
                                  <h4  >INGRESE CON SU CUENTA</h4>
                                   <hr  id="barraform">
                                   <div>  
                                <label  class="form-label" >Correo Electrónico</label> <br>
                                <input type="email" name="correo" id="correo" class="form-control"/>
                                   </div>
                                <div style="margin-top: 5%;">

                                <label  class="form-label" >Contraseña</label> 
                                <input type="password" name="password" id="password" class="form-control" />
                               
                               </div>
                                                             
                       <div style="text-align: center; margin-top: 5%"> 
                      
                       <input type="submit" class="btn btn-primary" value="Ingresar"> 
                 
                       </div>
                           <div style="text-align: center; margin-top: 5%">    <a href="index.php?c=Login&a=recoveryLogin" style="text-decoration: none;">¿Has olvidado la contraseña?</a> </div>
                            </div>
                       
                                <div class=" col-md-6 col1_cajas">
                                    <h3>NO ESTOY REGISTRADO</h3><br>
                                   <p>Con una cuenta podrás postularte y realizar reclutamientos a trabajos, la creación de la 
                                    cuenta no dispone de ningún costo.</p>
                                <div style="text-align: center; margin-top: 6.5%;"> 
                                    <a href="index.php?c=Registro&a=Registro&p=registro" class="btn btn-primary" > Registrarse </a> 
                                </div>
                                 </div> 
                                
                            </div>
                      
                    </form>

                </div>
            </div> 
            
      </div>
</section>

<?php require_once 'views/partials/piedepagina.php'; ?>