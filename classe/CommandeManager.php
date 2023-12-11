<?php
    class CommandeManager {
        private $_db;
        
        const GET_COMMANDE_BY_CLIENT = "SELECT * FROM commande co
            INNER JOIN commande_sbc cs ON cs.id_commande = co.id_commande
            INNER JOIN sbc s ON cs.id_sbc = s.id_sbc
            WHERE id_client = :id_client"; // TESTÉ
        const GET_SBC_PRIX_BY_ID = "SELECT prix FROM sbc WHERE id_SBC = :idSBC";
        const ADD_COMMANDE = "INSERT INTO commande (nbProduit, prix, date_commande, id_client) VALUES (:nbProduit, :prix, CURRENT_DATE(), :idClient)"; // TESTÉ
        const ADD_COMMANDE_SBC = "INSERT INTO commande_SBC (id_commande, id_SBC) VALUES (:id_commande, :id_SBC)"; // TESTÉ
        const DEL_COMMANDE = "DELETE FROM commande WHERE id_commande = :idcommande AND id_client = :idClient"; // À TESTER
        const DEL_COMMANDE_SBC = "DELETE FROM commande_SBC WHERE id_commande = :idcommande"; // À TESTER

        private function set_db($db) {
            assert(is_a($db, 'PDO'), 'La classe "CommandeManager" doit recevoir une instance (un objet) de la classe "PDO" lors de l\'appel à son constructeur.');
    
            $this->_db = $db;
        }

        public function __construct($db) { $this->set_db($db); }

        public function addCommande($idClient, $commandeObj) {
            $query = $this->_db->prepare(self::ADD_COMMANDE);
            $tabSBC = $commandeObj->get_tabSBC();
            $total =0;

            foreach ($tabSBC as $sbc) {
                $total += $sbc->get_prix();
            }

            $ReservationArray = array(
                                  ':nbProduit' => $idClient,
                                  ':prix' => $total,
                                  ':idClient' => $idClient
                                );
            
            assert($query->execute($ReservationArray), 'La commande n\'a pas pu être insérée dans la table "commande".'); 
      
            $idCommande = $this->_db->lastInsertId();

            //Besoin d'ajouter les SBC associer a cette commande dans la table commande_sbc

            foreach ($tabSBC  as $sbc) {
                $query = $this->_db->prepare(self::ADD_COMMANDE_SBC);
                assert($query->execute(array(':id_commande' => $idCommande,':id_SBC' => $sbc->get_id_SBC())), 'La commande n\'a pas pu être insérée dans la table "commande_sbc".');
            }
            return  $idCommande;
        }
      
        public function delCommande($idClient, $idCommande) {
            $query = $this->_db->prepare(self::DEL_COMMANDE);
            assert($query->execute(array(':idCommande' => $idCommande,':idClient' => $idClient)), 'La commande n\'a pas pu être supprimée dans la table "commande".'); 

            //Besoin de delete les entrées associer a cette commande dans la table commande_sbc
            $query = $this->_db->prepare(self::DEL_COMMANDE_SBC);
            assert($query->execute(array(':idCommande' => $idCommande)), 'La commande n\'a pas pu être supprimée dans la table "commande_sbc".');
            return $query->rowCount(); // retourne le nb de ligne affecté
        }

        public function getCommandeClient($idClient) {
            $query = $this->_db->prepare(self::GET_COMMANDE_BY_CLIENT);
            $query->execute(array(':idClient' => $idClient));
      
            $arrCommande = array();
      
            while($bddResult = $query->fetch()){

              //Get l'objet SBC selon son id pour l'ajouter dans la commande. 
              $cm = new SBCManager($this->_db);
              $bddResult['SBC'] = $cm->getSBCById($bddResult['id_sbc']);
      
              array_push($arrCommande, new  Commande($bddResult));
            }
      
            return $arrCommande;
        } // À TESTER ****
    };
?>