<?php 
    $page = "infoSBC";
    include_once("inc/header.php");
    require_once './classe/PDOFactory.php';
    require_once './classe/SBCManager.php';
    require_once './classe/souhait.php';
    $bdd = PDOFactory::getMySQLConnection();
    $SBCManager = new SBCManager($bdd);

    $SBCs = $SBCManager->getSBCs();
    $souhait = new souhait();

    if(isset($_GET['id'])){
        $SBC = $SBCManager->getSBCId($_GET['id']);
        if(empty($SBC))
            echo "Produit inexistant";
        $souhait->add($SBC[0]);
        echo 'Le produit a été ajouté à la liste des souhaits. <a href="javascript:history.back()">Retourner sur le catalogue</a>';
    }

    else{
        echo "Vous n'avez pas de selection";
    }
?>

