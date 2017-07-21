<?php
include_once "db/DataSource.php";

function geturl($navdir=""){
	if($navdir=="")
		$dir=$_SERVER['PHP_SELF'];
	else
		$dir=$navdir;
	$pos=strrpos($dir,"/");
	$pos=$pos+1;
	$web=substr($dir, $pos);
	return $web;
}

function insertar_seguro(){
	$vacios = array();
	foreach ($_POST as $key => $value) {
		if(empty($value)){
			array_push($vacios,$key);
		}
		if(count($vacios)>0){
			return $vacios;
		}
	}
		$sql= "INSERT INTO `seguros`(`elemento`, `banco`, `poliza`, `precio`, `fecha`,`seguro`) 
		VALUES ('".$_POST['name']."','".$_POST['banco']."','".$_POST['poliza']."','".$_POST['price']."','".$_POST['date']."','".$_POST['seguro']."')";
		insert($sql);
}

function insertar_veh(){
	$vacios = array();
	foreach ($_POST as $key => $value) {
		if(empty($value)){
			array_push($vacios,$key);
		}
		if(count($vacios)>0){
			return $vacios;
		}
	}
		$sql= "INSERT INTO `vehiculos`(`marca`, `modelo`, `matricula`, `fecha`) 
		VALUES ('".$_POST['marca']."','".$_POST['modelo']."','".$_POST['matricula']."','".$_POST['date']."')";
		$ins =insert($sql);
		if($ins){
			return true;
		}else{
			return false;
		}
		
}
?>