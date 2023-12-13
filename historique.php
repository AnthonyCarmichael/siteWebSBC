<?php include_once("inc/header.php"); ?>
<?php
    $commandeManager = new CommandeManager($bdd);
    $arrCommande = array();
    $client = unserialize($_SESSION['client']);
    $arrCommande = $commandeManager->getCommandeClient($client->get_id_Client());
    //print_r($client);
    //print_r($arrCommande);
?>


<h2 class="center">Historique des commandes</h2>
<section>

    <?php 
        $cpt = sizeof($arrCommande);
        $arrCommande = array_reverse($arrCommande);
        foreach ($arrCommande as $commande) {?>
            <article id = "commande">
                <aside id="headCommande"> <?php
                    if ($cpt == 1) 
                    {
                        echo '<h3 class="center">1<sup>ere</sup> commande</h3>';
                    }
                    else 
                    {
                        echo '<h3 class="center">'.$cpt.'<sup>e</sup> commande </h3>';
                    }
                    ?>
                    <div class="flex">
                        <p class="white bold">Date de commande:</p>
                        <p class="white bold">Total:</p>
                        <p class="white bold">Nom client:</p>
                        <p class="white bold">Adresse:</p>
                        <p class="white bold">Numéro de commande</p>
                    </div>
                    <div class="flex">
                        <p class="white"><?php echo $commande->get_date_commande();?></p>
                        <p class="white"><?php echo $commande->get_date_commande();?></p>
                        <p class="white"><?php echo $commande->get_date_commande();?></p>
                        <p class="white"><?php echo $commande->get_date_commande();?></p>
                        <p class="white"><?php echo $commande->get_date_commande();?></p>
                    </div>

                </aside>
                <?php 
                
                ?>
            </article>
            <?php
            $cpt--;
        }
        
    ?>

</section>
<?php include_once("inc/footer.php"); ?>