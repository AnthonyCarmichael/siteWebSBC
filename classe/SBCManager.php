<?php
require_once 'SBC.php';

class SBCManager
{
    const SELECT_ALL_SBC = "SELECT id_SBC, sbc.modele, garantie, RAM, longueur, largeur, prix, nbCoeur, m.nom, mp.nom
                            FROM sbc AS sbc
                            INNER JOIN processeur AS p ON sbc.id_processeur = p.id_processeur
                            INNER JOIN marque AS m on sbc.id_marque = m.id_marque
                            INNER JOIN marque AS mp on p.id_marque = mp.id_marque";
    const SELECT_SBC_BY_ID ="SELECT * FROM sbc WHERE id_sbc = :idSBC";

    private $_bdd;

    public function __construct(PDO $bdd) { $this->_bdd = $bdd; }
    public function __destruct() { $this->_bdd = null; }

    public function selectAllSBC() : array{
        return $this->_bdd->query(self::SELECT_ALL_SBC)->fetchAll(PDO::FETCH_ASSOC);
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