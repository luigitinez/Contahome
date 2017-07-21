<?php 
    include_once ("includes.php");
    session_start();
?>
<!DOCTYPE html>
<html>
<?php include "modules/head.php";?>
<link rel="stylesheet"  type="text/css" href="css/login.css">
<body>
<?php menu();?>
<?php if(!isset($_SESSION['usr'])){ ?>
<div class="container">
<?php if(isset($_GET['login'])){?>
<div class="alert alert-danger"> 
Credenciales incorrectas, el usuario no existe, vuelva a intentar...
</div>
<?php } 
if (isset($_GET['pass'])){?>
<div class="alert alert-warning">
CONTRASEÑA INCORRECTA
</div>
<?php }?>
</div>
    <div class="login">
        <h1>Inicia Sesión</h1>
        <form method="POST" action="php/login.php">
            <input type="text" name="user" placeholder="Usuario" required="required" />
            <input type="password" name="pass" placeholder="Contraseña" required="required" />
            <button type="submit" class="btn btn-primary btn-block btn-large">Entrar</button>
        </form>
        <br>

    <style>
        
body { 
    width: 100%;
	height:100%;
	font-family: 'Open Sans', sans-serif;
	background: #092756;
	background: -moz-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%),-moz-linear-gradient(top,  rgba(57,173,219,.25) 0%, rgba(42,60,87,.4) 100%), -moz-linear-gradient(-45deg,  #670d10 0%, #092756 100%);
	background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -webkit-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -webkit-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
	background: -o-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -o-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -o-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
	background: -ms-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -ms-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -ms-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
	background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), linear-gradient(to bottom,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), linear-gradient(135deg,  #670d10 0%,#092756 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3E1D6D', endColorstr='#092756',GradientType=1 );
}

    </style>
</div>
<?php  }else{?>
<style>
h2, h3 {
    color: black !important;
}
</style>
    <div class="container">
        <div class="alert alert-success">
            <h2 class="text-center text-muted">Bienvenido 
                <?=  $_SESSION['usr']->get_name();?>
                <i class="glyphicon glyphicon-arrow-right"></i> Alias: (<?=$_SESSION['usr']->get_nick();?>)
            </h2>
        </div>
        <div class="alert alert-info">
            <h3 class="text-center"> Tu último inicio de sessión fue en la fecha: <?=$_SESSION['usr']->get_fecha(); ?></h3>
        </div>
    </div>
<?php }?>
</body>
</html>