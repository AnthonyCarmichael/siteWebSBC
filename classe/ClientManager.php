<?php
class ClientManager
{
    private $_db;
    
    const CLIENT_EXISTE = "SELECT id_client , nom, prenom FROM client WHERE nom_utilisateur = :username AND mdp = :mdp"; //TESTÉ

    const PAYS_EXISTE = "SELECT id_pays FROM pays WHERE nom = :nomPays"; //TESTÉ
    const INSERT_PAYS = "INSERT INTO pays (nom) 
        VALUES (:nomPays)"; // TESTÉ

    const PROVINCE_EXISTE = "SELECT id_province FROM province WHERE nom = :nomProvince"; //TESTÉ
    const INSERT_PROVINCE = "INSERT INTO province (nom) 
        VALUES (:nomProvince)"; //TESTÉ

    const VILLE_EXISTE = "SELECT id_ville FROM ville WHERE nom = :nomVille";
    const INSERT_VILLE = "INSERT INTO ville (nom) 
        VALUES (:ville)"; //TESTÉ

    const INSERT_CLIENT = "INSERT INTO client (prenom, nom, tel, courriel, nom_utilisateur, mdp, adresse, id_ville, id_province, id_pays)
        VALUES (:prenom, 
                :nom,
                :tel,
                :courriel, 
                :nom_utilisateur,
                :mdp,
                :adresse, 
                (SELECT id_ville FROM ville WHERE nom = :nomVille),
                (SELECT id_province FROM province WHERE nom = :nomProvince),
                (SELECT id_pays FROM pays WHERE nom = :nomPays))"; //TESTÉ

    private function set_db($db) {
        assert(is_a($db, 'PDO'), 'La classe "CLIENTManager" doit recevoir une instance (un objet) de la classe "PDO" lors de l\'appel à son constructeur.');

        $this->_db = $db;
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Vérification si le pays, la province ou la ville existe dans la BD
    private function paysExiste(string $nomPays) { // À TESTER
        $query = $this->_db->prepare(self::PAYS_EXISTE);
        $query->execute(array(':nomPays' => $nomPays));
  
        return $query->fetchColumn();
    }

    
    private function provinceExiste(string $nomProvince) { // À TESTER
        $query = $this->_db->prepare(self::PROVINCE_EXISTE);
        $query->execute(array(':nomProvince' => $nomProvince));
  
        return $query->fetchColumn();
    }

    private function villeExiste(string $nomVille) { // À TESTER
        $query = $this->_db->prepare(self::VILLE_EXISTE);
        $query->execute(array(':nomVille' => $nomVille));
  
        return $query->fetchColumn();
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Ajouter un pays, province ou une ville dans la BD
    private function addPays($clientObj) { // À TESTER
        $idPays = $this->paysExiste($clientObj->get_pays());
  
        if ($idPays)
          return $idPays;

        else {        
          $query = $this->_db->prepare(self::INSERT_PAYS);
          assert($query->execute(array(':nomPays' => $clientObj->get_pays())), 'Le pays n\'a pas pu être insérée dans la table "tblAdresse".'); 
  
          return $this->_db->lastInsertId();
        }
    }
    
    private function addProvince($clientObj) { // À TESTER
        $idProvince = $this->provinceExiste($clientObj->get_province());
  
        if ($idProvince)
          return $idProvince;

        else {        
          $query = $this->_db->prepare(self::INSERT_PROVINCE);
          assert($query->execute(array(':nomProvince' => $clientObj->get_province())), 'La province n\'a pas pu être insérée dans la table "tblAdresse".'); 
  
          return $this->_db->lastInsertId();
        }
    }

    private function addVille($clientObj) { // À TESTER
        $idVille = $this->paysExiste($clientObj->get_ville());
  
        if ($idVille)
          return $idVille;

        else {        
          $query = $this->_db->prepare(self::INSERT_VILLE);
          assert($query->execute(array(':nomVILLE' => $clientObj->get_ville())), 'L\'adresse n\'a pas pu être insérée dans la table "tblAdresse".'); 
  
          return $this->_db->lastInsertId();
        }
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Fonction public
    public function __construct($db) { $this->set_db($db); }

    public function clientExiste(string $username, string $motPasse) {
        $query = $this->_db->prepare(self::CLIENT_EXISTE);
  
        $loginArray = array(
                            ':username' => $username,
                            ':mdp' => $motPasse
                           );
  
        $query->execute($loginArray);
  
        if($bddResult = $query->fetch()){
          return new Client($bddResult);
        } else {
          return null;
        }
    }

    public function addClient($clientObj) {
        assert(is_a($clientObj, 'Client'), 'La classe "ClientManager" doit recevoir une instance (un objet) de la classe "Client" pour qu\'un nouveau client soit ajouté à la base de données.');
        
        assert(!$this->clientExiste($clientObj->get_courriel(), $clientObj->get_mdp()), 'L\'utilisateur existe déjà dans la base de données. L\'inscription a donc été abandonnée.');
  
        $query = $this->_db->prepare(self::INSERT_CLIENT);
        
        $clientArray = array(
                                ':prenom' => $clientObj->get_prenom(),
                                ':nom' => $clientObj->get_nom(),
                                ':tel' => $clientObj->get_tel(),
                                ':courriel;' => $clientObj->get_courriel(),
                                ':nom_utilisateur' => $clientObj->get_nomUtilisateur(),
                                ':mdp' => $clientObj->get_mdp(),
                                ':adresse' => $clientObj->get_adresse(),
                                ':id_ville' => $this->addVille($clientObj),
                                ':id_province' => $this->addProvince($clientObj),
                                ':id_pays' => $this->addPays($clientObj)
                                );
        
        assert($query->execute($clientArray), 'Le client n\'a pas pu être inséré dans la table "tblClient".');
  
        return $this->_db->lastInsertId();
      }
  
};
?>