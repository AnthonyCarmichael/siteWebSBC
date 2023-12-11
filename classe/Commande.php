<?php
class Commande
{
    private $_id_commande;
    private $_nbProduit;
    private $_prix;
    private $_date_commande;
    private $_id_client;
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
    public function set_tabSBC(array $_tabSBC)
    {
        $this->_tabSBC = $_tabSBC;

        return $this;
    }

    /**
     * Get the value of _id_client
     */ 
    public function get_id_client()
    {
        return $this->_id_client;
    }

    /**
     * Set the value of _id_client
     *
     * @return  self
     */ 
    public function set_id_client($_id_client)
    {
        $this->_id_client = $_id_client;

        return $this;
    }

    /**
     * Get the value of _date_commande
     */ 
    public function get_date_commande()
    {
        return $this->_date_commande;
    }

    /**
     * Set the value of _date_commande
     *
     * @return  self
     */ 
    public function set_date_commande($_date_commande)
    {
        $this->_date_commande = $_date_commande;

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
     * Get the value of _id_commande
     */ 
    public function get_id_commande()
    {
        return $this->_id_commande;
    }

    /**
     * Set the value of _id_commande
     *
     * @return  self
     */ 
    public function set_id_commande($_id_commande)
    {
        $this->_id_commande = $_id_commande;

        return $this;
    }
}

?>