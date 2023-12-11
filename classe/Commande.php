<?php
class Commande
{
    private $_idCommande;
    private $_nbProduit;
    private $_prix;
    private $_dateCommande;
    private $_idClient;
    private $_tabSBC = array();

    public function __construct($params = array()){
        foreach($params as $k => $v){

            $methodName = "set_" . $k;            
            if(method_exists($this, $methodName)) {
                $this->$methodName($v);
            }   
        }
    }

    public function addCommande($commande) {
        array_push($this->_tabSBC, $commande);
    }



    /**
     * Get the value of _tabSBC
     */ 
    public function get_tabSBC()
    {
        return $this->_tabSBC;
    }

    /**
     * Set the value of _tabSBC
     *
     * @return  self
     */ 
    public function set_tabSBC($_tabSBC)
    {
        $this->_tabSBC = $_tabSBC;

        return $this;
    }

    /**
     * Get the value of _idClient
     */ 
    public function get_idClient()
    {
        return $this->_idClient;
    }

    /**
     * Set the value of _idClient
     *
     * @return  self
     */ 
    public function set_idClient($_idClient)
    {
        $this->_idClient = $_idClient;

        return $this;
    }

    /**
     * Get the value of _dateCommande
     */ 
    public function get_dateCommande()
    {
        return $this->_dateCommande;
    }

    /**
     * Set the value of _dateCommande
     *
     * @return  self
     */ 
    public function set_dateCommande($_dateCommande)
    {
        $this->_dateCommande = $_dateCommande;

        return $this;
    }

    /**
     * Get the value of _prix
     */ 
    public function get_prix()
    {
        return $this->_prix;
    }

    /**
     * Set the value of _prix
     *
     * @return  self
     */ 
    public function set_prix($_prix)
    {
        $this->_prix = $_prix;

        return $this;
    }

    /**
     * Get the value of _nbProduit
     */ 
    public function get_nbProduit()
    {
        return $this->_nbProduit;
    }

    /**
     * Set the value of _nbProduit
     *
     * @return  self
     */ 
    public function set_nbProduit($_nbProduit)
    {
        $this->_nbProduit = $_nbProduit;

        return $this;
    }

    /**
     * Get the value of _idCommande
     */ 
    public function get_idCommande()
    {
        return $this->_idCommande;
    }

    /**
     * Set the value of _idCommande
     *
     * @return  self
     */ 
    public function set_idCommande($_idCommande)
    {
        $this->_idCommande = $_idCommande;

        return $this;
    }
}

?>