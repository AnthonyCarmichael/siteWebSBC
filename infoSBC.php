<?php
    setcookie('favoris', '0', time() + 3600 * 24);

    include_once("inc/header.php");
    require_once './classe/PDOFactory.php';
    require_once './classe/SBCManager.php';
    //require_once './classe/panier.php';
    include_once("inc/header.php");
    require_once './classe/PDOFactory.php';
    require_once './classe/SBCManager.php';

    $bdd = PDOFactory::getMySQLConnection();
    $SBCManager = new SBCManager($bdd);

    $SBCs = $SBCManager->getSBCs();



    /*$count=0;

    foreach($SBCs as $sbc)
        $count = $count + 1;

    $nbPages = ceil($count/6);*/
?>

<form class="flex wrap recherche" action="infoSBC.php" method="post" id="filtre">
    <input class="col-4 col-4m" type="text" placeholder="Recherche par marque" name="marqueSBC" id="marqueSBC">
    <input class="col-4 col-4m" type="text" placeholder="Recherche par modéle" name="modeleSBC" id="modeleSBC">

    <input type="hidden" name="action" value="filtre">
    <input class="col-2 col-2m bouton" type="submit" value="Rechercher">
</form>

<?php if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'filtre') {
    echo '<h2 class="center">Résultat(s) de la recherche</h2>';

    $SBCObjArray = $SBCManager->selectSBCs($_REQUEST);

    if (empty($SBCObjArray))
        echo '<h3 class="center white">Vos filtres n\'ont retourné aucun résultat.</h3>';
    else { ?>
        <section class="flex wrap white">
            <?php foreach ($SBCObjArray as $SBCObj) { ?>
                <article class="col-4 col-6m">
                    <div>
                        <a href="img/<?= $SBCObj->get_modeleSBC(); ?>.jpg"><img src="img/<?= $SBCObj->get_modeleSBC(); ?>.jpg"
                                alt="<?= $SBCObj->get_modeleSBC(); ?>.jpg"></a>
                    </div>

                    <div>
                        <p>
                            <?= $SBCObj->get_marqueSBC() . ' ' . $SBCObj->get_modeleSBC() . ' ' . $SBCObj->get_RAM() . ' Go ' . $SBCObj->get_longueur() . ' par ' . $SBCObj->get_largeur() . ' mm'; ?>
                        </p>
                        <p>Processeur
                            <?= $SBCObj->get_marqueProcesseur() . ' ' . $SBCObj->get_modeleProcesseur() . ' ' . $SBCObj->get_nbCoeur(); ?>
                            Coeurs
                        </p>
                        <p>Prix:
                            <?= $SBCObj->get_prix(); ?>$
                        </p>
                        <p>
                            <?php $annees = 0;
                            $jours = $SBCObj->get_garantie();
                            while ($jours >= 365) {
                                $annees += 1;
                                $jours -= 365;
                            }
                            if ($annees <= 0) {
                                echo $jours . ' jours de garantie';
                            } elseif ($jours <= 0) {
                                echo $annees . ' an de garantie';
                            } else {
                                echo $annees . ' an ' . $jours . ' jours de garantie';
                            } ?>
                        </p>
                    <p><a class="certification" href="infoCertification.php?idSBC=<?=$SBCObj->get_id_SBC();?>">Certification</a></p>
                    </div>

                    <form class="panier" action="traitement.php" method="get">
                        <input type="hidden" name="action" value="panier">
                        <input type="hidden" name="panier" value="<?= $SBCObj->get_id_SBC(); ?>">
                        <input type="submit" class="bouton" value="Ajouter aux panier">
                    </form>
                    <form class="favoris" action="traitement.php" method="get">
                        <input type="hidden" name="action" value="favoris">
                        <input type="hidden" name="favoris" value="<?= $SBCObj->get_id_SBC(); ?>">
                        <input type="submit" class="bouton" value="Ajouter au favoris">
                    </form>
                </article>
            <?php } ?>
        </section>
        <?php
    }
}elseif (isset($_REQUEST['idSBC'])) {
    $sbc = $SBCManager->getSBCById($_REQUEST['idSBC']);?>
    <article class="col-4 col-6m white">
        <div>
            <a href="img/<?= $sbc->get_modeleSBC(); ?>.jpg"><img src="img/<?= $sbc->get_modeleSBC(); ?>.jpg"
                    alt="<?= $sbc->get_modeleSBC(); ?>.jpg"></a>
        </div>

        <div>
            <p>
                <?= $sbc->get_marqueSBC() . ' ' . $sbc->get_modeleSBC() . ' ' . $sbc->get_RAM() . ' Go ' . $sbc->get_longueur() . ' par ' . $sbc->get_largeur() . ' mm'; ?>
            </p>
            <p>Processeur
                <?= $sbc->get_marqueProcesseur() . ' ' . $sbc->get_modeleProcesseur() . ' ' . $sbc->get_nbCoeur(); ?>
                Coeurs
            </p>
            <p>Prix:
                <?= $sbc->get_prix(); ?>$
            </p>
            <p>
                <?php $annees = 0;
                $jours = $sbc->get_garantie();
                while ($jours >= 365) {
                    $annees += 1;
                    $jours -= 365;
                }
                if ($annees <= 0) {
                    echo $jours . ' jours de garantie';
                } elseif ($jours <= 0) {
                    echo $annees . ' an de garantie';
                } else {
                    echo $annees . ' an ' . $jours . ' jours de garantie';
                } ?>
            </p>
        <p><a class="certification" href="infoCertification.php?idSBC=<?=$sbc->get_id_SBC();?>">Certification</a></p>
        </div>

        <form class="panier" action="traitement.php" method="get">
            <input type="hidden" name="action" value="panier">
            <input type="hidden" name="panier" value="<?= $sbc->get_id_SBC(); ?>">
            <input type="submit" class="bouton" value="Ajouter aux panier">
        </form>
        <form class="favoris" action="traitement.php" method="get">
            <input type="hidden" name="action" value="favoris">
            <input type="hidden" name="favoris" value="<?= $sbc->get_id_SBC(); ?>">
            <input type="submit" class="bouton" value="Ajouter au favoris">
        </form>
    </article>
<?php }else { ?>
    <section class="flex wrap white">
        <?php foreach ($SBCs as $SBC) { ?>
            <article class="col-4 col-6m">
                <div>
                    <a href="img/<?= $SBC->get_modeleSBC(); ?>.jpg"><img src="img/<?= $SBC->get_modeleSBC(); ?>.jpg"
                            alt="<?= $SBC->get_modeleSBC(); ?>.jpg"></a>
                </div>

                <div>
                    <p>
                        <?= $SBC->get_marqueSBC() . ' ' . $SBC->get_modeleSBC() . ' ' . $SBC->get_RAM() . ' Go ' . $SBC->get_longueur() . ' par ' . $SBC->get_largeur() . ' mm'; ?>
                    </p>
                    <p>Processeur
                        <?= $SBC->get_marqueProcesseur() . ' ' . $SBC->get_modeleProcesseur() . ' ' . $SBC->get_nbCoeur(); ?>
                        Coeurs
                    </p>
                    <p>Prix:
                        <?= $SBC->get_prix(); ?>$
                    </p>
                    <p>
                        <?php $annees = 0;
                        $jours = $SBC->get_garantie();
                        while ($jours >= 365) {
                            $annees += 1;
                            $jours -= 365;
                        }
                        if ($annees <= 0) {
                            echo $jours . ' jours de garantie';
                        } elseif ($jours <= 0) {
                            echo $annees . ' an de garantie';
                        } else {
                            echo $annees . ' an ' . $jours . ' jours de garantie';
                        } ?>
                    </p>
                    <p><a class="certification" href="infoCertification.php?idSBC=<?=$SBC->get_id_SBC();?>">Certification</a></p>
                </div>

                <form class="panier" action="traitement.php" method="get">
                    <input type="hidden" name="action" value="panier">
                    <input type="hidden" name="panier" value="<?= $SBC->get_id_SBC(); ?>">
                    <input type="submit" class="bouton" value="Ajouter au panier">
                </form>
                <form class="favoris" action="traitement.php" method="get">
                    <input type="hidden" name="action" value="favoris">
                    <input type="hidden" name="favoris" value="<?= $SBC->get_id_SBC(); ?>">
                    <input type="submit" class="bouton" value="Ajouter aux favoris">
                </form>
            </article>
        <?php } ?>
    </section>
<?php } ?>

<?php include_once('inc/footer.php'); ?>