<?php 
    $page = "infoSBC";
    include_once("inc/header.php");
    require_once './classe/PDOFactory.php';
    require_once './classe/SBCManager.php';
    require_once './classe/panier.php';
    $bdd = PDOFactory::getMySQLConnection();
    $SBCManager = new SBCManager($bdd);

    $SBCs = $SBCManager->getSBCs();
    $panier = new panier();

    if(isset($_GET['id'])){
        $SBC = $SBCManager->getSBCId($_GET['id']);
        if(empty($SBC))
            echo "Produit inexistant";
        $panier->add($SBC[0]);
        echo 'Le produit a été ajouté à votre panier. <a href="javascript:history.back()">Retourner sur le catalogue</a>';
    }

    else{
        echo "Vous n'avez pas de selection";
    }
?>

