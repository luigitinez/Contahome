<?php
include_once ("../db/DataSource.php");

if($_POST['id']){
    $id         =   $_POST['id'];
    $table      =   $_POST['table'];
    $result     =   del_row($id,$table);
    
if($result == true){
    echo 'exito';  
}else {
    echo 'error';  
}   
    



}