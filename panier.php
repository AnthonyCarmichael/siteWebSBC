<?php include_once("inc/header.php");
$bdd = PDOFactory::getMySQLConnection();
$sm = new SBCManager($bdd); ?>
<h2 class="center">Votre panier</h2>

<?php

$panier = $_COOKIE;
$i = 0;
$prixTotal = 0;

foreach ($panier as $sbc) {
    if (isset($_COOKIE["panier$i"])) {
        $sm->getSBCById($_COOKIE["panier$i"]);
        $j = $sm->getSBCById($_COOKIE["panier$i"])->get_id_SBC();

        ?>

        <div id="infoSpecifique" class="flex">
            <a class="SBC" href="img/<?= $sm->getSBCById($_COOKIE["panier$i"])->get_modeleSBC(); ?>.jpg"><img
                    src="img/<?= $sm->getSBCById($_COOKIE["panier$i"])->get_modeleSBC(); ?>.jpg"
                    alt="<?= $sm->getSBCById($_COOKIE["panier$i"])->get_modeleSBC(); ?>.jpg"></a>
            <div class="white flex">
                <p id="nom">
                    <?php echo $sm->getSBCById($_COOKIE["panier$i"])->get_marqueSBC(); ?>
                    <?php echo $sm->getSBCById($_COOKIE["panier$i"])->get_modeleSBC(); ?>
                </p>

                <p id="quantite">
                    <a href="panier.php?action=moins&idSbc=<?= $j; ?>"><i class="fa fa-minus-square" aria-hidden="true"></i></a>
                    Quantité:
                    <?php echo $_COOKIE["calcul$j"]; ?>
                    <a href="panier.php?action=plus&idSbc=<?= $j; ?>"><span class="vide"></span><i class="fa fa-plus-square"
                            aria-hidden="true"></i></a>
                </p>


                <p id="prix">Prix:
                    <?php echo $sm->getSBCById($_COOKIE["panier$i"])->get_prix(); ?>$
                </p>

            </div>

            <form class="retirer" action="traitement.php" method="get">
                <input type="hidden" name="action" value="retirePanier">
                <input type="hidden" name="retirePanier" value="<?= $i ?>">
                <input type="submit" class="bouton" value="Retirer du panier">
            </form>

            <a id="poubelle" href="traitement.php?action=retirePanier&retirePanier=<?= $i ?>"><img id="logo"
                    src="img/corbeille.png" alt="compagnie"></a>
        </div>
        <div id="infoSup" class="white display-none">
            <p>
                <?= $sm->getSBCById($_COOKIE["panier$i"])->get_RAM() . ' Go ' ?>
            </p>
            <p>
                <?= $sm->getSBCById($_COOKIE["panier$i"])->get_longueur() . ' par ' . $sm->getSBCById($_COOKIE["panier$i"])->get_largeur() . ' mm'; ?>
            </p>
            <p>Processeur
                <?= $sm->getSBCById($_COOKIE["panier$i"])->get_marqueProcesseur() . ' ' . $sm->getSBCById($_COOKIE["panier$i"])->get_modeleProcesseur() . ' ' . $sm->getSBCById($_COOKIE["panier$i"])->get_nbCoeur(); ?>
                Coeurs
            </p>
            <p>
                <?php $annees = 0;
                $jours = $sm->getSBCById($_COOKIE["panier$i"])->get_garantie();
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
        </div>
        <?php $prixTotal += ($sm->getSBCById($_COOKIE["panier$i"])->get_prix() * $_COOKIE["calcul$j"]);
    }

    $i++;
}
if ($prixTotal != 0) { ?>
    <h3 class="white center">Prix total:
        <?php echo $prixTotal; ?>$
        <form class="commander center" action="traitement.php" method="get">
            <input type="hidden" name="action" value="commander">
            <input type="submit" class="bouton" value="Passer la commande">
        </form>
    </h3>
<?php } else { ?>
    <h3 class="center">Votre panier est vide</h3>
<?php } ?>




<?php include_once("inc/footer.php"); ?>