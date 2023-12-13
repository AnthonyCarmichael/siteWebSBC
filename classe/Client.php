<?php
class Client
{
    private $_id_client;
    private $_prenom;    
    private $_nom;
    private $_tel;
    private $_courriel;
    private $_nom_utilisateur;
    private $_mdp;
    private $_adresse;
    private $_ville;
    private $_province;
    private $_pays;

    public function __construct($params = array()){
  
        foreach($params as $k => $v){

            $methodName = "set_" . $k;            
            if(method_exists($this, $methodName)) {
                $this->$methodName($v);
            }   
        }
    }

    
    public function __serialize(){
        return [
            "id_client" => $this->_id_client,
            "prenom" => $this->_prenom,
            "nom" => $this->_nom,
            "courriel" => $this->_courriel,
            "mdp" => $this->_mdp,
            "pays" => $this->_pays,
            "adresse" => $this->_adresse,
            "ville" => $this->_ville,
            "province" => $this->_province,
            "nom_utilisateur" => $this->_nom_utilisateur,
            "tel" => $this->_tel
        ];
    }

    public function __unserialize($data){
        $this->_id_client = $data["id_client"];
        $this->_prenom = $data["prenom"];
        $this->_nom = $data["nom"];
        $this->_courriel = $data["courriel"];
        $this->_mdp = $data["mdp"];
        $this->_pays = $data["pays"];
        $this->_adresse = $data["adresse"];
        $this->_ville = $data["ville"];
        $this->_province = $data["province"];
        $this->_tel = $data["tel"];
        $this->_nom_utilisateur = $data["nom_utilisateur"];

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
     * Get the value of _prenom
     */ 
    public function get_prenom()
    {
        return $this->_prenom;
    }

    /**
     * Set the value of _prenom
     *
     * @return  self
     */ 
    public function set_prenom($_prenom)
    {
        $this->_prenom = $_prenom;

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
     * Get the value of _tel
     */ 
    public function get_tel()
    {
        return $this->_tel;
    }

    /**
     * Set the value of _tel
     *
     * @return  self
     */ 
    public function set_tel($_tel)
    {
        $this->_tel = $_tel;

        return $this;
    }

    /**
     * Get the value of _courriel
     */ 
    public function get_courriel()
    {
        return $this->_courriel;
    }

    /**
     * Set the value of _courriel
     *
     * @return  self
     */ 
    public function set_courriel($_courriel)
    {
        $this->_courriel = $_courriel;

        return $this;
    }

    /**
     * Get the value of _nom_utilisateur
     */ 
    public function get_nom_utilisateur()
    {
        return $this->_nom_utilisateur;
    }

    /**
     * Set the value of _nom_utilisateur
     *
     * @return  self
     */ 
    public function set_nom_utilisateur($_nom_utilisateur)
    {
        $this->_nom_utilisateur = $_nom_utilisateur;

        return $this;
    }

    /**
     * Get the value of _mdp
     */ 
    public function get_mdp()
    {
        return $this->_mdp;
    }

    /**
     * Set the value of _mdp
     *
     * @return  self
     */ 
    public function set_mdp($_mdp)
    {
        $this->_mdp = $_mdp;

        return $this;
    }

    /**
     * Get the value of _adresse
     */ 
    public function get_adresse()
    {
        return $this->_adresse;
    }

    /**
     * Set the value of _adresse
     *
     * @return  self
     */ 
    public function set_adresse($_adresse)
    {
        $this->_adresse = $_adresse;

        return $this;
    }

    /**
     * Get the value of _ville
     */ 
    public function get_ville()
    {
        return $this->_ville;
    }

    /**
     * Set the value of _ville
     *
     * @return  self
     */ 
    public function set_ville($_ville)
    {
        $this->_ville = $_ville;

        return $this;
    }

    /**
     * Get the value of _province
     */ 
    public function get_province()
    {
        return $this->_province;
    }

    /**
     * Set the value of _province
     *
     * @return  self
     */ 
    public function set_province($_province)
    {
        $this->_province = $_province;

        return $this;
    }

    /**
     * Get the value of _pays
     */ 
    public function get_pays()
    {
        return $this->_pays;
    }

    /**
     * Set the value of _pays
     *
     * @return  self
     */ 
    public function set_pays($_pays)
    {
        $this->_pays = $_pays;

        return $this;
    }
}

?>