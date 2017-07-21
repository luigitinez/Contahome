<?php
function conectar(){
    //@$connect = new mysqli("mysql.hostinger.es","u102448472_autom","raybanlm","u102448472_autom");
    $connect = new mysqli("localhost","root","","contahome");
    if($connect->connect_errno){
       printf("<h1><span>LA CONEXIÓN CON LA BASE DE DATOS HA FALLADO: %s\n".$connect->connect_error."</span></h1>");
       exit();
    }else{
        return $connect;//devolvemos el objeto conexion para poder trabajar posteriormente con el
    }
}

function usrexists ($mail){
    $enlace = conectar();
    //generamos una consulta para enviar a la bbdd
    //    SELECT `mail`, `pass`,`name`,`surname`,`admin`,`pic`, `nombre_profesion` FROM `usr` INNER JOIN `profesion` WHERE usr.FK_id_prof = profesion.id_prof AND usr.mail = 'lmgspain@hotmail.com'
  $query = "SELECT * FROM `usuarios`  WHERE  nick =  '".$mail."'";
  //$query="SELECT * FROM `usr` WHERE `mail` = '".$mail."'";

  if(!$result =$enlace->query($query)){
   //la consulta no se ha realizado con exito
   $enlace->close();
   return false;

  }else {
        if ($result->num_rows === 0) {
            $enlace->close();
            return false;//la consulta ha devuelto 0 filas, no existe el usuario
        }else{
            $enlace->close();
            return $result;//usuario existe
        }
    }
}

function insert ($sql){
$mysqli = conectar();
$result = $mysqli->query($sql);
/* close connection */
$mysqli->close();

return $result;
}

function get_seguros(){
    $mysqli = conectar();
    $sql = "SELECT * FROM seguros";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $seguros = array();
        while($row = $result->fetch_assoc()) {
            $seg_tmp = array(
                'elemento'  =>   $row['elemento'],
                'seguro'    =>   $row['seguro'],
                'banco'     =>   $row['banco'],
                'poliza'    =>   $row['poliza'],
                'precio'    =>   $row['precio'],
                'fecha'     =>   $row['fecha'],
                'id'        =>   $row['id'],
            );
            array_push($seguros,$seg_tmp);
        }
    } else {
        return 0;
    }
    $mysqli->close();
    return $seguros;

}

function update_login($id){
    $mysql = conectar();
    $mysql->query('UPDATE `usuarios` SET `fecha`= now() WHERE `id` = '.$id);
    $mysql->close();
}

function get_veh(){
    $mysqli = conectar();
    $sql = "SELECT * FROM vehiculos";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $vehiculos = array();
        while($row = $result->fetch_assoc()) {
            $veh_tmp = array(
                'marca'     =>   $row['marca'],
                'modelo'    =>   $row['modelo'],
                'matricula' =>   $row['matricula'],
                'fecha'     =>   $row['fecha'],
                'id'        =>   $row['id'],
            );
            array_push($vehiculos,$veh_tmp);
        }
    } else {
        return 0;
    }
    $mysqli->close();
    return $vehiculos;

}

function del_row($id,$table){
    $sql = "DELETE FROM $table WHERE id = $id";
    $conn = conectar();
    if (mysqli_query($conn, $sql)) {
          mysqli_close($conn);
          return true;
    } else {
         mysqli_close($conn);
         return false;
    }

  
}
?>