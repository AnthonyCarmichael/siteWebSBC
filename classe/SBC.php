<?php
    class SBC{
        private $_id_SBC;
        private $_modele;
        private $_garantie;
        private $_RAM;
        private $_longueur;
        private $_largeur;
        private $_prix;
        private $_id_processeur;
        private $_id_marque;

        //Constructeur
        public function __construct($params = array()) {
            foreach($params as $k => $v) {               
                $methodName = "set_" . $k; 

                if(method_exists($this, $methodName)) {
                        $this->$methodName($v);
                }
            }
        }
        
        /**
         * Get the value of _id_SBC
         */ 
        public function get_id_SBC()
        {
                return $this->_id_SBC;
        }

        /**
         * Set the value of _id_SBC
         *
         * @return  self
         */ 
        public function set_id_SBC($_id_SBC)
        {
                $this->_id_SBC = $_id_SBC;

                return $this;
        }

        /**
         * Get the value of _modele
         */ 
        public function get_modele()
        {
                return $this->_modele;
        }

        /**
         * Set the value of _modele
         *
         * @return  self
         */ 
        public function set_modele($_modele)
        {
                $this->_modele = $_modele;

                return $this;
        }

        /**
         * Get the value of _garantie
         */ 
        public function get_garantie()
        {
                return $this->_garantie;
        }

        /**
         * Set the value of _garantie
         *
         * @return  self
         */ 
        public function set_garantie($_garantie)
        {
                $this->_garantie = $_garantie;

                return $this;
        }

        /**
         * Get the value of _RAM
         */ 
        public function get_RAM()
        {
                return $this->_RAM;
        }

        /**
         * Set the value of _RAM
         *
         * @return  self
         */ 
        public function set_RAM($_RAM)
        {
                $this->_RAM = $_RAM;

                return $this;
        }

        /**
         * Get the value of _longueur
         */ 
        public function get_longueur()
        {
                return $this->_longueur;
        }

        /**
         * Set the value of _longueur
         *
         * @return  self
         */ 
        public function set_longueur($_longueur)
        {
                $this->_longueur = $_longueur;

                return $this;
        }

        /**
         * Get the value of _largeur
         */ 
        public function get_largeur()
        {
                return $this->_largeur;
        }

        /**
         * Set the value of _largeur
         *
         * @return  self
         */ 
        public function set_largeur($_largeur)
        {
                $this->_largeur = $_largeur;

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
         * Get the value of _id_processeur
         */ 
        public function get_id_processeur()
        {
                return $this->_id_processeur;
        }

        /**
         * Set the value of _id_processeur
         *
         * @return  self
         */ 
        public function set_id_processeur($_id_processeur)
        {
                $this->_id_processeur = $_id_processeur;

                return $this;
        }

        /**
         * Get the value of _id_marque
         */ 
        public function get_id_marque()
        {
                return $this->_id_marque;
        }

        /**
         * Set the value of _id_marque
         *
         * @return  self
         */ 
        public function set_id_marque($_id_marque)
        {
                $this->_id_marque = $_id_marque;

                return $this;
        }
    };
?>