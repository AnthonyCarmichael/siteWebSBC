<?php include_once("inc/header.php"); ?>
<?php
    $commandeManager = new CommandeManager($bdd);
    $arrCommande = array();
    $client = unserialize($_SESSION['client']);
    $arrCommande = $commandeManager->getCommandeClient($client->get_id_Client());
    //print_r($client);
    //print_r($arrCommande);
    date_default_timezone_set("America/New_York");
    $dateToday = new DateTime("now");
    //$interval = $origin->diff($target);
    //echo $interval->format('%R%a days');

?>


<h2 class="center">Historique des commandes</h2>
<section>

    <?php 
        $cpt = sizeof($arrCommande);
        //Pour avoir la derniere commande effectué en premier et la première en dernier
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
                        <p class="white bold underline">Date de commande:</p>
                        <p class="white bold underline">Total:</p>
                        <p class="white bold underline">Nom client:</p>
                        <p class="white bold underline">Adresse:</p>
                        <p class="white bold underline">Numéro de commande</p>
                    </div>
                    <div class="flex">
                        <p class="white"><?php echo $commande->get_date_commande();?></p>
                        <p class="white"><?php echo $commande->get_prix()."$";?></p>
                        <p class="white"><?php echo $client->get_prenom(). " ".$client->get_nom();?></p>
                        <p class="white"><?php echo $client->get_adresse()." ".$client->get_ville()." ".$client->get_province()." ".$client->get_pays();?></p>
                        <p class="white center"><?php echo $commande->get_id_commande();?></p>
                    </div>

                </aside>
                <?php 
                $tabSBC = $commande->get_tabSBC();
                //print_r($tabSBC);

                foreach ($tabSBC as $sbc) {
                    ?> 
                        <div id="infoSpecifique" class="flex">
                            <img src=<?php echo "img/".$sbc->get_modele().".jpg";?> alt=<?php echo $sbc->get_modele();?>>

                            <div class="white">
                                <p>Marque: <?php echo $sbc->get_marqueProcesseur();?></p>
                                <p>Modèle: <?php echo $sbc->get_modeleProcesseur()?></p>
                                <p>Numéro d'identifiant: <?php echo  $sbc->get_id_SBC();?></p>
                                <p>Prix: <?php echo $sbc->get_prix()."$";?></p>    
                            </div>

                            <a class="bouton" href="historique.php">Ajouter au panier</a>
                        </div>


                    <?php
                }
                
                $dateCommande = new DateTime($commande->get_date_commande());
                $interval = $dateCommande->diff($dateToday);
                if ($interval->format("%a")<7) {?>
                    <div class="end">
                        <a class="bouton" href="traitement.php?action=delCommande&idCommande=<?php echo $commande->get_id_commande();?>">Il reste <?php echo 8-$interval->format("%a"); ?> jours pour annuler la commande</a>
                    </div><?php
                }
                elseif ($interval->format("%a")==7) {?>
                    <div class="end">
                        <a class="bouton" href="traitement.php?action=delCommande&idCommande=<?php echo $commande->get_id_commande();?>">Dernier jours pour annuler la commande</a>
                    </div><?php
                }
                ?>

            </article>
            <?php
            $cpt--;
        }
        
    ?>

</section>
<?php include_once("inc/footer.php"); ?>