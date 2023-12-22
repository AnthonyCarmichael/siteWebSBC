<?php
class CommandeManager
{
    private $_db;

    const GET_COMMANDE_BY_CLIENT = "SELECT * FROM commande co
            INNER JOIN commande_sbc cs ON cs.id_commande = co.id_commande
            INNER JOIN sbc s ON cs.id_sbc = s.id_sbc
            WHERE co.id_client = :id_client"; // TESTÉ

    const GET_COMMANDE_BY_ID = "SELECT * FROM commande 
            WHERE id_commande = :id_commande"; // TESTÉ

    const GET_SBC_PRIX_BY_ID = "SELECT prix FROM sbc WHERE id_SBC = :idSBC";
    const ADD_COMMANDE = "INSERT INTO commande (nbProduit, prix, date_commande, id_client) VALUES (:nbProduit, :prix, CURRENT_DATE(), :idClient)"; // TESTÉ
    const ADD_COMMANDE_SBC = "INSERT INTO commande_sbc (id_commande, id_SBC) VALUES (:id_commande, :id_SBC)"; // TESTÉ
    const DEL_COMMANDE = "DELETE FROM commande WHERE id_commande = :id_commande AND id_client = :id_client"; // À TESTER
    const DEL_COMMANDE_SBC = "DELETE FROM commande_sbc WHERE id_commande = :id_commande"; // À TESTER

    private function set_db($db)
    {
        assert(is_a($db, 'PDO'), 'La classe "CommandeManager" doit recevoir une instance (un objet) de la classe "PDO" lors de l\'appel à son constructeur.');

        $this->_db = $db;
    }

    public function __construct($db)
    {
        $this->set_db($db);
    }

    public function addCommande($idClient)
    {
        $query = $this->_db->prepare(self::ADD_COMMANDE);
        $bdd = PDOFactory::getMySQLConnection();
        $sm = new SBCManager($bdd);
        $tabSBC = array();
        $total = 0;
        $nbProduit = 0;

        $panier = $_COOKIE;
        $i = 0;
        foreach ($panier as $sbc) {
            if (isset($_COOKIE["panier$i"])) {
                $sm->getSBCById($_COOKIE["panier$i"]);
                $j = $sm->getSBCById($_COOKIE["panier$i"])->get_id_SBC();
                $tabSBC[] = $j;


                $total += ($sm->getSBCById($_COOKIE["panier$i"])->get_prix() * $_COOKIE["calcul$j"]);
                $nbProduit += $_COOKIE["calcul$j"];
                setcookie("panier$i");
                setcookie("calcul$j");
            }

            $i++;
        }

        $ReservationArray = array(
            ':nbProduit' => $nbProduit,
            ':prix' => $total,
            ':idClient' => $idClient
        );

        assert($query->execute($ReservationArray), 'La commande n\'a pas pu être insérée dans la table "commande".');

        $idCommande = $this->_db->lastInsertId();

        //Besoin d'ajouter les SBC associer a cette commande dans la table commande_sbc

        foreach ($tabSBC as $sbc) {
            $query = $this->_db->prepare(self::ADD_COMMANDE_SBC);
            assert($query->execute(array(':id_commande' => $idCommande, ':id_SBC' => $sbc)), 'La commande n\'a pas pu être insérée dans la table "commande_sbc".');
        }
        return $idCommande;
    }

    public function delCommande($idClient, $idCommande)
    {

        //Besoin de delete les entrées associer a cette commande dans la table commande_sbc
        $query = $this->_db->prepare(self::DEL_COMMANDE_SBC);
        assert($query->execute(array(':id_commande' => $idCommande)), 'La commande n\'a pas pu être supprimée dans la table "commande_sbc".');


        $query = $this->_db->prepare(self::DEL_COMMANDE);
        assert($query->execute(array(':id_commande' => $idCommande, ':id_client' => $idClient)), 'La commande n\'a pas pu être supprimée dans la table "commande".');
        return $query->rowCount(); // retourne le nb de ligne affecté
    }

    public function getCommandeById(int $idCommande)
    {
        $query = $this->_db->prepare(self::GET_COMMANDE_BY_ID);
        $query->execute(array(':id_commande' => $idCommande));
        $bddResult = $query->fetch();

        assert(!empty($bddResult), 'Le ou les identifiant(s) fourni(s) n\'a pas ou n\'ont pas été trouvé(s) dans la base de données.');
        $commande = new Commande($bddResult);
        return $commande;
    }

    public function getCommandeClient(int $idClient)
    {
        $query = $this->_db->prepare(self::GET_COMMANDE_BY_CLIENT);
        $query->execute(array(':id_client' => $idClient));

        $arrSBC = array();
        $arrCommande = array();
        $tempIdCommande = 0;
        $bddResult = array();
        $sbcManager = new SBCManager($this->_db);
        $first = true;

        while ($bddResult = $query->fetch()) {
            //Get l'objet SBC selon son id pour l'ajouter dans la commande. 
            if ($first == true) {
                $tempIdCommande = $bddResult['id_commande'];
                $commande = $this->getCommandeById($tempIdCommande);
                //print_r($commande);
                $first = false;
            }

            if ($bddResult['id_commande'] != $tempIdCommande) {
                $commande->set_tabSBC($arrSBC);
                array_push($arrCommande, $commande);
                $arrSBC = array();
                $tempIdCommande = $bddResult['id_commande'];
                $commande = $this->getCommandeById($tempIdCommande);
                $sbc = $sbcManager->getSBCById($bddResult['id_SBC']);
                array_push($arrSBC, $sbc);
            } else {
                $sbc = $sbcManager->getSBCById($bddResult['id_SBC']);
                array_push($arrSBC, $sbc);
            }

        }
        //gestion de la derniere commande
        if ($tempIdCommande != 0) {
            $commande->set_tabSBC($arrSBC);
            array_push($arrCommande, $commande);
            $arrSBC = array();
        }
        //$tempIdCommande = $bddResult['id_commande'];

        //print_r($arrCommande);
        return $arrCommande;
    } // TESTÉ
}
;
?>