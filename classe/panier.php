<?php
class panier{
    public function __construct(){
        if(!isset($_SESSION)){
            session_start();
        }
        if(!isset($_SESSION['panier'])){
            $_SESSION['panier'] = array();
        }
    }

    public function add($SBC_id){
        if(isset($_SESSION['panier'][$SBC_id]))
            $_SESSION['panier'][$SBC_id]++;
        else
            $_SESSION['panier'][$SBC_id] = 1;
    }
}