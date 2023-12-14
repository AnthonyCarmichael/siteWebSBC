<?php
class souhait
{
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['souhait'])) {
            $_SESSION['souhait'] = array();
        }
    }

    public function add($SBC_id)
    {
        $i = 0;
        $idSbc = $_SESSION['souhait'];
        $doublon = false;
        foreach ($idSbc as $sbc) {
            $i++;
            if ($sbc == $SBC_id) {
                $doublon = true;
            }
        }
        if ($doublon == false) {
            $_SESSION['souhait'][$i] = $SBC_id;
        }

    }
}