<?php 
    $page = "infoSBC";
    include_once("inc/header.php");
    require_once './classe/PDOFactory.php';
    require_once './classe/SBCManager.php';
    require_once './classe/panier.php';
    $bdd = PDOFactory::getMySQLConnection();
    $SBCManager = new SBCManager($bdd);

    $SBCs = $SBCManager->getSBCs();
?>

    <form class="flex wrap" action="infoSBC.php" method="post" id="filtre">
        <input class="col-4" type="text" placeholder="Recherche par marque" name="marqueSBC" id="marqueSBC">
        <input class="col-4" type="text" placeholder="Recherche par modéle" name="modeleSBC" id="modeleSBC">

        <input type="hidden" name="action" value="filtre">
        <input class="col-2" type="submit" value="search">
    </form>

    <?php if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'filtre') {
                echo '<h2 class="center">Résultat(s) de la recherche</h2>';

                $SBCObjArray = $SBCManager->selectSBCs($_REQUEST);

                if (empty($SBCObjArray))
                    echo '<p>Vos filtres n\'ont retourné aucun résultat.</p>';

                else {?>
                    <section class="flex wrap">
                        <?php foreach($SBCObjArray as $SBCObj){?>
                            <article class="col-4">
                                <div>                
                                    <a href="img/<?=$SBCObj->get_modeleSBC();?>.jpg"><img src="img/<?=$SBCObj->get_modeleSBC();?>.jpg" alt="<?=$SBCObj->get_modeleSBC();?>.jpg"></a>
                                </div>
                
                                <div>
                                    <p><?=$SBCObj->get_marqueSBC(). ' ' .$SBCObj->get_modeleSBC(). ' ' .$SBCObj->get_RAM() . ' Go ' . $SBCObj->get_longueur() . ' par '. $SBCObj->get_largeur() . ' mm';?></p>
                                    <p>Processeur <?=$SBCObj->get_marqueProcesseur(). ' ' . $SBCObj->get_modeleProcesseur() . ' ' . $SBCObj->get_nbCoeur();?> Coeurs</p>
                                    <p>Prix: <?=$SBCObj->get_prix();?>$</p>
                                    <p><?php $annees = 0; $jours = $SBCObj->get_garantie(); while($jours >= 365){$annees += 1; $jours -= 365;}if($annees <= 0){echo $jours . ' jours de garantie';}elseif($jours <= 0){echo $annees . ' an de garantie';}else{echo $annees . ' an ' . $jours . ' jours de garantie';} ?> </p>
                                </div>
                
                                <a class="ajout" href="addPanier.php?id=<?=$SBCObj->get_id_SBC();?>">Ajouter au panier</a>
                                <a class="ajout" href="addSouhait.php?id=<?=$SBCObj->get_id_SBC();?>">Ajouter aux favoris</a>
                            </article>
                        <?php }?>
                    </section>
                <?php
            }
            }else{?>
                <section class="flex wrap">
                <?php foreach($SBCs as $SBC){?>
                    <article class="col-4">
                        <div>                
                            <a href="img/<?=$SBC->get_modeleSBC();?>.jpg"><img src="img/<?=$SBC->get_modeleSBC();?>.jpg" alt="<?=$SBC->get_modeleSBC();?>.jpg"></a>
                        </div>
        
                        <div>
                            <p><?=$SBC->get_marqueSBC(). ' ' .$SBC->get_modeleSBC(). ' ' .$SBC->get_RAM() . ' Go ' . $SBC->get_longueur() . ' par '. $SBC->get_largeur() . ' mm';?></p>
                            <p>Processeur <?=$SBC->get_marqueProcesseur(). ' ' . $SBC->get_modeleProcesseur() . ' ' . $SBC->get_nbCoeur();?> Coeurs</p>
                            <p>Prix: <?=$SBC->get_prix();?>$</p>
                            <p><?php $annees = 0; $jours = $SBC->get_garantie(); while($jours >= 365){$annees += 1; $jours -= 365;}if($annees <= 0){echo $jours . ' jours de garantie';}elseif($jours <= 0){echo $annees . ' an de garantie';}else{echo $annees . ' an ' . $jours . ' jours de garantie';} ?> </p>
                        </div>
        
                        <a class="ajout" href="addPanier.php?id=<?=$SBC->get_id_SBC();?>">Ajouter au panier</a>
                        <a class="ajout" href="addSouhait.php?id=<?=$SBC->get_id_SBC();?>">Ajouter aux favoris</a>
                    </article>
                <?php }?> 
            <?php }?>
        </section>

<?php include_once('inc/footer.php'); ?>

