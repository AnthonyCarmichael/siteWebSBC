<?php
require_once 'SBC.php';

class SBCManager
{
    const SELECT_ALL_SBC = "SELECT id_SBC, sbc.modele, garantie, RAM, longueur, largeur, prix, nbCoeur, m.nom, mp.nom
                            FROM sbc AS sbc
                            INNER JOIN processeur AS p ON sbc.id_processeur = p.id_processeur
                            INNER JOIN marque AS m on sbc.id_marque = m.id_marque
                            INNER JOIN marque AS mp on p.id_marque = mp.id_marque";

    private $_bdd;

    public function __construct(PDO $bdd) { $this->_bdd = $bdd; }
    public function __destruct() { $this->_bdd = null; }

    public function selectAllSBC() : array{
        return $this->_bdd->query(self::SELECT_ALL_SBC)->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>