<?php
require_once 'SBC.php';

class SBCManager
{
    const SELECT_SBCs = "SELECT id_SBC, sbc.modele AS modeleSBC, garantie, RAM, longueur, largeur, prix, nbCoeur, m.nom AS marqueSBC, mp.nom AS marqueProcesseur, p.modele AS modeleProcesseur
                            FROM sbc AS sbc
                            INNER JOIN processeur AS p ON sbc.id_processeur = p.id_processeur
                            INNER JOIN marque AS m on sbc.id_marque = m.id_marque
                            INNER JOIN marque AS mp on p.id_marque = mp.id_marque";
    
    const SELECT_ID_SBC = "SELECT id_SBC 
                            FROM SBC 
                            WHERE id_SBC = ";

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
        
        $query = $this->_bdd->prepare(self::SELECT_SBC_BY_ID);
        $query->execute(array(':idSBC' => $idSBC)); 
        $dbResult = $query->fetch();
        assert(!empty($dbResult), 'Le ou les identifiant(s) fourni(s) n\'a pas ou n\'ont pas été trouvé(s) dans la base de données.');

        return new SBC($dbResult);
    }
}
?>