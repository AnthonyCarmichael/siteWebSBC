<?php

class certification {

    private $_id_certification;
    private $_nom;    
    private $_description;
    private $_lien;


    public function __construct($params = array()){
  
        foreach($params as $k => $v){

            $methodName = "set_" . $k;            
            if(method_exists($this, $methodName)) {
                $this->$methodName($v);
            }   
        }
    }

    /**
     * Get the value of _id_certification
     */ 
    public function get_id_certification()
    {
        return $this->_id_certification;
    }

    /**
     * Set the value of _id_certification
     *
     * @return  self
     */ 
    public function set_id_certification($_id_certification)
    {
        $this->_id_certification = $_id_certification;

        return $this;
    }

    /**
     * Get the value of _nom
     */ 
    public function get_nom()
    {
        return $this->_nom;
    }

    /**
     * Set the value of _nom
     *
     * @return  self
     */ 
    public function set_nom($_nom)
    {
        $this->_nom = $_nom;

        return $this;
    }

    /**
     * Get the value of _description
     */ 
    public function get_description()
    {
        return $this->_description;
    }

    /**
     * Set the value of _description
     *
     * @return  self
     */ 
    public function set_description($_description)
    {
        $this->_description = $_description;

        return $this;
    }

    /**
     * Get the value of _lien
     */ 
    public function get_lien()
    {
        return $this->_lien;
    }

    /**
     * Set the value of _lien
     *
     * @return  self
     */ 
    public function set_lien($_lien)
    {
        $this->_lien = $_lien;

        return $this;
    }
}

?>