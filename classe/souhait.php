<?php
class souhait{
    public function __construct(){
        if(!isset($_SESSION)){
            session_start();
        }
        if(!isset($_SESSION['souhait'])){
            $_SESSION['souhait'] = array();
        }
    }

    public function add($SBC_id){
        $_SESSION['souhait'][$SBC_id] = 1;
    }
}