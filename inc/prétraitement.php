<?php
if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "moins") {
    $id = $_REQUEST["idSbc"];
    $nouveauTotal = $_COOKIE["calcul$id"] - 1;

    if ($nouveauTotal == 0) {
        setcookie("calcul$id");
    } else {
        setcookie("calcul$id", $nouveauTotal, time() + (86400 * 30));
    }

}

if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "plus") {
    $id = $_REQUEST["idSbc"];
    $nouveauTotal = $_COOKIE["calcul$id"] + 1;
    setcookie("calcul$id", $nouveauTotal, time() + (86400 * 30));
}
?>