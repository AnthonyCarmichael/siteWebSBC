<?php include_once("inc/header.php"); ?>
<?php
    $commandeManager = new CommandeManager($bdd);
    $arrCommande = array();
    $arrCommande = $commandeManager->getCommandeClient(6);
    
?>


<h2 class="center">historique des commandes</h2>
<section id="commande">
    <article id = "item">

    </article>
</section>
<?php include_once("inc/footer.php"); ?>