<?php 
include_once "../db/DataSource.php";
include_once "../class/objetousuario.php";
session_start();
/*realizar comprobaciones si el usuario existe*/
/*si el usuario no es encontrado en la bbdd devolverlo de la página que viene*/


   $usr     =   $_POST['user'];
   $pass    =  $_POST['pass'];
   $enlace = conectar();//mysqli_connect("127.0.0.1", "root", "", "curriculum");

if (!$enlace) {
  //escribir los errores en el archivo .log
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}else{
    if($result = usrexists($usr)){
      $linea =$result->fetch_assoc();
      if (strcmp($linea['pass'],$pass)==0){//comparas los str para saber si la contraseña esta bn

 /*----------------------------creamos el objeto usuario y lo almacenamos en la sesion usr-----------------------------*/
            $_SESSION['usr']=new user();
            $_SESSION['usr']->set_id($linea['id']);            
            $_SESSION['usr']->set_nick($linea['nick']);
            $_SESSION['usr']->set_fecha($linea['fecha']);
            //$_SESSION['usr']->setpic('media/usrimg/'.$linea['pic']);
            $_SESSION['usr']->set_name($linea['name']);
            update_login($_SESSION['usr']->get_id());//actualizamos la fecha de último inicio de sesión 
        /*---------------------------------------------------------*/
      header('Location: http://' . $_SERVER['HTTP_HOST']); 
      }else{
        //ha sido todo un fracaso
        header('Location: http://' . $_SERVER['HTTP_HOST'] . "?pass=false"); 
      
      }
      

    }else{
        header('Location: http://' . $_SERVER['HTTP_HOST'] . "?login=false"); 
    }
  }

//}
/*
echo "Éxito: Se realizó una conexión apropiada a MySQL! La base de datos mi_bd es genial." . PHP_EOL;
echo "Información del host: " . mysqli_get_host_info($enlace) . PHP_EOL;
*/
mysqli_close($enlace);

?>
