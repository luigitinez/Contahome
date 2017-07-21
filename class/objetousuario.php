<?php
/**
*Clase Usuario
*/
class user {

    public $name;
    public $nick;
    public $id;
    public $fecha;

    //geters
    function get_name(){
        return $this-> name;
    }

    function get_nick(){
        return $this-> nick;
    }
    
    function get_id(){
        return $this-> id; 
    }

    function get_fecha(){
        return $this-> fecha;
    }

    //setters

    function set_name($name){
           $this -> name = $name;
    }

    function set_nick($nick){
           $this -> nick = $nick;
    }
    
    function set_id($id){
           $this -> id = $id;
    }

    function set_fecha($fecha){
        $this-> fecha = $fecha;
    }

}

