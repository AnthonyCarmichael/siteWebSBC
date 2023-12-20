<?php
if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "moins") {
    $id = $_REQUEST["idSbc"];
    $nouveauTotal = $_COOKIE["calcul$id"] - 1;

    if ($nouveauTotal == 0) {

        $i = 0;
        foreach ($_COOKIE as $cookie) {
            if (isset($_COOKIE["panier$i"]) && $_COOKIE["panier$i"] == $id) {
                setcookie("panier$i");
            }
            $i++;
        }
        setcookie("calcul$id");
    } else {
        setcookie("calcul$id", $nouveauTotal, time() + (86400 * 30));
    }

    header('Location: http://localhost/siteWebSBC/panier.php');

}

if (isset($_REQUEST['action']) && $_REQUEST['action'] == "plus") {
    $id = $_REQUEST["idSbc"];
    $nouveauTotal = $_COOKIE["calcul$id"] + 1;
    setcookie("calcul$id", $nouveauTotal, time() + (86400 * 30));
    unset($_REQUEST['action']);


    header('Location: http://localhost/siteWebSBC/panier.php');
}
?>