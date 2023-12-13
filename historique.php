<?php include_once("inc/header.php"); ?>
<?php
    $commandeManager = new CommandeManager($bdd);
    $arrCommande = array();
    $client = unserialize($_SESSION['client']);
    $arrCommande = $commandeManager->getCommandeClient($client->get_id_Client());
    print_r($client);
    print_r($arrCommande);
?>


<h2 class="center">historique des commandes</h2>
<section id="commande">
    <article id = "item">
        <aside id="headCommande">

        </aside>
    </article>
</section>
<?php include_once("inc/footer.php"); ?>