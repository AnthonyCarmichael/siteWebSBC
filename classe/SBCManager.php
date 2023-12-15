<?php
require_once 'SBC.php';

class SBCManager
{
    const SELECT_SBCs = "SELECT sbc.id_SBC, sbc.modele AS modeleSBC, garantie, RAM, longueur, largeur, prix, nbCoeur, m.nom AS marqueSBC, mp.nom AS marqueProcesseur, p.modele AS modeleProcesseur, c.nom AS certification
                            FROM sbc AS sbc
                            INNER JOIN processeur AS p ON sbc.id_processeur = p.id_processeur
                            INNER JOIN marque AS m on sbc.id_marque = m.id_marque
                            INNER JOIN marque AS mp on p.id_marque = mp.id_marque
                            INNER JOIN certification_SBC AS csbc on sbc.id_SBC = csbc.id_SBC
                            INNER JOIN certification AS c on csbc.id_certification = c.id_certification";

    const SELECT_SBC_BY_ID = "SELECT id_SBC, sbc.modele AS modeleSBC, garantie, RAM, longueur, largeur, prix, nbCoeur, m.nom AS marqueSBC, mp.nom AS marqueProcesseur, p.modele AS modeleProcesseur
                                FROM sbc AS sbc
                                INNER JOIN processeur AS p ON sbc.id_processeur = p.id_processeur
                                INNER JOIN marque AS m on sbc.id_marque = m.id_marque
                                INNER JOIN marque AS mp on p.id_marque = mp.id_marque
                                WHERE id_SBC = :id";
    
    const SELECT_ID_SBC = "SELECT id_SBC 
                            FROM SBC 
                            WHERE id_SBC = ";

    const SELECT_MARQUE = "SELECT id_marque 
                            FROM marque
                            WHERE nom LIKE CONCAT('%', :nom, '%')";

    const ADD_SBC = "INSERT INTO sbc (modele, garantie, RAM, longueur, largeur, prix, id_processeur, id_marque)
                        VALUES (:modele, :garantie, :RAM, :longueur, :largeur, :prix, :id_processeur, :id_marque)";

    const INSERT_MARQUE = "INSERT INTO marque (nom)
                            VALUES (:nom)"; 

    const SELECT_MODELE = "SELECT id_processeur 
                            FROM processeur
                            WHERE modele LIKE CONCAT('%', :modeleProcesseur, '%')";

    const INSERT_MODELE = "INSERT INTO processeur (nbCoeur, modele, id_marque)
                            VALUES (:nbCoeur, :modeleProcesseur, :id_marque)";    

    const INSERT_SBC = "INSERT INTO sbc (modele, garantie, RAM, longueur, largeur, prix, id_processeur, id_marque)
                    VALUES (:modele, :garantie, :RAM, :longueur, :largeur, :prix, :id_processeur, :id_marque)";

    const MARQUE_FILTER = "m.nom LIKE CONCAT('%', :marqueSBC, '%')";
    const MODELE_FILTER = "sbc.modele LIKE CONCAT('%', :modeleSBC, '%')";

    private $_bdd;

    public function __construct(PDO $bdd) { $this->_bdd = $bdd; }
    public function __destruct() { $this->_bdd = null; }

    public function selectAllSBC() : array{
        return $this->_bdd->query(self::SELECT_SBCs)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSBCs(){
        $bddResults = $this->_bdd->query(self::SELECT_SBCs);

        $SBCs = array();

        while($fetchData = $bddResults->fetch()){
            array_push($SBCs, new SBC($fetchData));
        }

        return $SBCs;
    }

    public function getSBCId($id) {
        return $this->_bdd->query(self::SELECT_ID_SBC . $id)->fetch();
    }

    public function selectSBCs(array $formArray) : array {
        $SBCObjArray = array();
    
        $whereClause = '';
       
       if (isset($formArray['marqueSBC']) && !empty($formArray['marqueSBC'])) {
        if(!empty($whereClause)){
            $whereClause .= " AND ";
        }
        $whereClause .= self::MARQUE_FILTER;
        $bindArray[":marqueSBC"] = $formArray['marqueSBC'];
      }
       
      if (isset($formArray['modeleSBC']) && !empty($formArray['modeleSBC'])) {
       if(!empty($whereClause)){
           $whereClause .= " AND ";
       }
       $whereClause .= self::MODELE_FILTER;
       $bindArray[":modeleSBC"] = $formArray['modeleSBC'];
       }
    
    
        if (empty($whereClause))
            $dbResult = $this->_bdd->query(self::SELECT_SBCs)->fetchAll();

        else {
            $query = $this->_bdd->prepare(self::SELECT_SBCs . ' WHERE ' . $whereClause);

            $query->execute($bindArray);

            $dbResult = $query->fetchAll();
        }

        foreach ($dbResult as $row)
            array_push($SBCObjArray, new SBC($row));

        return $SBCObjArray;
    }

    public function getSBCById($idSBC) {
        //print_r($idSBC);
        $query = $this->_bdd->prepare(self::SELECT_SBC_BY_ID);
        $query->execute(array(':id' => $idSBC)); 
        $dbResult = $query->fetch();
        assert(!empty($dbResult), 'Le ou les identifiant(s) fourni(s) n\'a pas ou n\'ont pas été trouvé(s) dans la base de données.');

        return new SBC($dbResult);
    }

    public function selectMarqueByName(string $marque) : string {
        $query = $this->_bdd->prepare(self::SELECT_MARQUE);
        $query->bindParam(':nom', $marque);
        $query->execute();

        return $query->fetchColumn();
    }

    public function insertMarque(string $marque) : int {
        $query = $this->_bdd->prepare(self::INSERT_MARQUE);
        $query->bindParam(':nom', $marque);

        assert($query->execute(),
              'L\'insertion de la marque dans la base de données n\'a pas fonctionné.');

        return $this->_bdd->lastInsertId();
    }

    public function selectModeleByName(string $modele) : string {
        $query = $this->_bdd->prepare(self::SELECT_MODELE);
        $query->bindParam(':modeleProcesseur', $modele);
        $query->execute();

        return $query->fetchColumn();
    }

    public function insertmodele(int $nbCoeur, string $modele, int $idMarque) : int {
        $query = $this->_bdd->prepare(self::INSERT_MODELE);
        $bindParamArray = array(
                                ':nbCoeur' => $nbCoeur,
                                ':modeleProcesseur' => $modele,
                                ':id_marque' => $idMarque);

        assert($query->execute($bindParamArray),
              'L\'insertion du modele dans la base de données n\'a pas fonctionné.');

        return $this->_bdd->lastInsertId();
    }

    public function addSBC(SBC $SBCObj) : int {
        $marqueSBC = $SBCObj->get_marqueSBC();
        $idMarqueSBC = $this->selectMarqueByName($marqueSBC);
        
        $marqueProcesseur = $SBCObj->get_marqueProcesseur();
        $idProcesseur = $this->selectMarqueByName($marqueProcesseur);

        $modele = $SBCObj->get_modeleProcesseur();
        $idModele = $this->selectModeleByName($modele);

        if(empty($idMarqueSBC))
            $idMarqueSBC = $this->insertMarque($marqueSBC);

        if(empty($idProcesseur))
            $idProcesseur = $this->insertMarque($marqueProcesseur);

        if(empty($idModele))
            $idModele = $this->insertModele($SBCObj->get_nbCoeur(), $modele, $idProcesseur);

        $query = $this->_bdd->prepare(self::ADD_SBC);
        
        $bindParamArray = array(
            ':modele' => $SBCObj->get_modeleSBC(),
            ':garantie' => $SBCObj->get_garantie(),
            ':RAM' => $SBCObj->get_RAM(),
            ':longueur' => $SBCObj->get_longueur(),
            ':largeur' => $SBCObj->get_largeur(),
            ':prix' => $SBCObj->get_prix(),
            ':id_processeur' => $idModele,
            ':id_marque' => $idMarqueSBC 
        );
    
        if(empty($this->selectSBCs($_REQUEST))){

            assert($query->execute($bindParamArray),
                'L\'insertion du SBC dans la base de données n\'a pas fonctionné.');

        }
        else{
            echo"Ce produit existe déjà dans notre base de données";
        }

        return $this->_bdd->lastInsertId();
    }
}
?>