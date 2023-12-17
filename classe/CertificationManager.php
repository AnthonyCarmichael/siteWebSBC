<?php
class CertificationManager
{
    private $_db;

    const SELECT_CERTIFICATION_BY_SBC_ID = "SELECT c.id_certification, c.nom, c.description, c.lien
        FROM certification_sbc cs
            INNER JOIN certification c ON c.id_certification = cs.id_certification
            INNER JOIN sbc s ON s.id_SBC = cs.id_SBC
            WHERE s.id_SBC = :id";





    private function set_db($db)
    {
      assert(is_a($db, 'PDO'), 'La classe "CertificationManager" doit recevoir une instance (un objet) de la classe "PDO" lors de l\'appel à son constructeur.');
  
      $this->_db = $db;
    }

    public function __construct($db)
    {
        $this->set_db($db);
    }


    public function getCertification($idSBC)
    {
        $tabCertification = array();

        $query = $this->_db->prepare(self::SELECT_CERTIFICATION_BY_SBC_ID);
        $query->execute(array(':id' => $idSBC));




        while ($bddResult = $query->fetch())
        {
            $certification = new Certification($bddResult);
            array_push($tabCertification,$certification);
        }

        return $tabCertification; 
    }



};