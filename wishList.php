<?php include_once("inc/header.php");
$bdd = PDOFactory::getMySQLConnection();
$sm = new SBCManager($bdd); ?>
<h2 class="center">Votre liste de souhait</h2>

<?php $souhait = $_COOKIE;
$i = 0;
foreach ($souhait as $sbc) {
    if (isset($_COOKIE["favoris$i"])) {
        $sm->getSBCById($_COOKIE["favoris$i"]) ?>

        <div id="infoSpecifique" class="flex">
            <a href="img/<?= $sm->getSBCById($_COOKIE["favoris$i"])->get_modeleSBC(); ?>.jpg"><img
                    src="img/<?= $sm->getSBCById($_COOKIE["favoris$i"])->get_modeleSBC(); ?>.jpg"
                    alt="<?= $sm->getSBCById($_COOKIE["favoris$i"])->get_modeleSBC(); ?>.jpg"></a>
            <div class="white flex">
                <p>Marque:
                    <?php echo $sm->getSBCById($_COOKIE["favoris$i"])->get_marqueSBC(); ?>
                </p>

                <p>Modèle:
                    <?php echo $sm->getSBCById($_COOKIE["favoris$i"])->get_modeleSBC(); ?>
                </p>

                <p id="prix">Prix:
                    <?php echo $sm->getSBCById($_COOKIE["favoris$i"])->get_prix(); ?>$
                </p>

            </div>

            <form class="panier" action="traitement.php" method="get">
                <input type="hidden" name="action" value="panier">
                <input type="hidden" name="panier" value="<?= $sm->getSBCById($_COOKIE["favoris$i"])->get_id_SBC(); ?>">
                <input type="submit" class="bouton" value="Ajouter aux panier">
            </form>
            <form class="favoris" action="traitement.php" method="get">
                <input type="hidden" name="action" value="retireFavoris">
                <input type="hidden" name="retireFavoris" value="<?= $i ?>">
                <input type="submit" class="bouton" value="Retirer de la liste">
            </form>
        </div>
    <?php }
    $i++;
} ?>
<?php include_once("inc/footer.php"); ?>