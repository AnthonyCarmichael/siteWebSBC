<?php
$page = "comparaison";
include_once("inc/header.php");
require_once './classe/PDOFactory.php';
require_once './classe/SBCManager.php';
require_once './classe/SBC.php';

$bdd = PDOFactory::getMySQLConnection();

$SBCManager = new SBCManager($bdd);

$sbcs = $SBCManager->selectAllSBC();
?>

<h2 class="center">Comparaison</h2>

<div class="select-1-container select-2-container select-3-container flex wrap">
    <span class="col-3 col-3m"></span>
    <?php for ($i = 1; $i <= 2; $i++) { ?>
        <article class="col-3 col-4m center">
            <select name="sbc-0" id="select-<?= $i ?>" class="compareSelect">
                <?php
                foreach ($sbcs as $sbc)
                    echo '<option value="' . $sbc['id_SBC'] . '">' . $sbc['modeleSBC'] . '</option>'
                        ?>
                </select>

                <?php foreach ($sbcs as $sbc) {
                    echo '<img class="img-' . $sbc['id_SBC'] . ' display-none" src="img/' . $sbc['modeleSBC'] . '.jpg" alt="' . $sbc['modeleSBC'] . '.jpg">';
                    echo '<p class="prix-' . $sbc['id_SBC'] . ' display-none white">' . $sbc['prix'] . '$</p>'; ?>

                <form class="formPanier-<?= $sbc['id_SBC'] ?> display-none" action="traitement.php" method="get">
                    <input type="hidden" name="action" value="panier">
                    <input type="hidden" name="panier" value="<?= $sbc['id_SBC']; ?>">
                    <input type="submit" class="bouton" value="Ajouter au panier">
                </form>

                <form class="formFavoris-<?= $sbc['id_SBC'] ?> display-none" action="traitement.php" method="get">
                    <input type="hidden" name="action" value="favoris">
                    <input type="hidden" name="favoris" value="<?= $sbc['id_SBC']; ?>">
                    <input type="submit" class="bouton" value="Ajouter aux favoris">
                </form>

                <a class="savoir-<?= $sbc['id_SBC'] ?> display-none plus" href="infoSBC.php?idSBC=<?= $sbc['id_SBC'] ?>">En savoir
                    plus ></a>
            <?php } ?>
        </article>
    <?php } ?>
    <article class="col-3 col-1m center visibility">
        <select name="sbc-0" id="select-3" class="compareSelect">
            <?php
            foreach ($sbcs as $sbc)
                echo '<option value="' . $sbc['id_SBC'] . '">' . $sbc['modeleSBC'] . '</option>'
                    ?>
            </select>

            <?php foreach ($sbcs as $sbc) {
                echo '<img class="img-' . $sbc['id_SBC'] . ' display-none" src="img/' . $sbc['modeleSBC'] . '.jpg" alt="' . $sbc['modeleSBC'] . '.jpg">';
                echo '<p class="prix-' . $sbc['id_SBC'] . ' display-none white">' . $sbc['prix'] . '$</p>'; ?>

            <form class="formPanier-<?= $sbc['id_SBC'] ?> display-none" action="traitement.php" method="get">
                <input type="hidden" name="action" value="idPanier">
                <input type="hidden" name="idPanier" value="<?= $sbc['id_SBC']; ?>">
                <input type="submit" class="bouton" value="Ajouter au panier">
            </form>

            <form class="formFavoris-<?= $sbc['id_SBC'] ?> display-none" action="traitement.php" method="get">
                <input type="hidden" name="action" value="favoris">
                <input type="hidden" name="favoris" value="<?= $sbc['id_SBC']; ?>">
                <input type="submit" class="bouton" value="Ajouter aux favoris">
            </form>

            <a class="savoir-<?= $sbc['id_SBC'] ?> display-none plus" href="infoSBC.php?idSBC=<?= $sbc['id_SBC'] ?>">En savoir
                plus ></a>
        <?php } ?>
    </article>
</div>

<table class="white">
    <tr>
        <td class="element">Largeur</td>
        <td class="largeur1 valeur"></td>
        <td class="largeur2 valeur"></td>
        <td class="largeur3 valeur visibility"></td>
    </tr>
    <tr>
        <td class="element">Longueur</td>
        <td class="longueur1 valeur"></td>
        <td class="longueur2 valeur"></td>
        <td class="longueur3 valeur visibility"></td>
    </tr>
    <tr>
        <td class="element">Marque du processeur</td>
        <td class="pMarque1 valeur"></td>
        <td class="pMarque2 valeur"></td>
        <td class="pMarque3 valeur visibility"></td>
    </tr>
    <tr>
        <td class="element">Nombre de coeurs</td>
        <td class="nbCoeur1 valeur"></td>
        <td class="nbCoeur2 valeur"></td>
        <td class="nbCoeur3 valeur visibility"></td>
    </tr>
    <tr>
        <td class="element">Mémoire vive</td>
        <td class="ram1 valeur"></td>
        <td class="ram2 valeur"></td>
        <td class="ram3 valeur visibility"></td>
    </tr>
    <tr>
        <td class="element">Garantie</td>
        <td class="garantie1 valeur"></td>
        <td class="garantie2 valeur"></td>
        <td class="garantie3 valeur visibility"></td>
    </tr>
</table>

<?php
foreach ($sbcs as $sbc) {
    echo '<p class="largeur-' . $sbc['id_SBC'] . ' display-none">' . $sbc['largeur'] . '</p>';
    echo '<p class="longueur-' . $sbc['id_SBC'] . ' display-none">' . $sbc['longueur'] . '</p>';
    echo '<p class="pMarque-' . $sbc['id_SBC'] . ' display-none">' . $sbc['marqueSBC'] . '</p>';
    echo '<p class="nbCoeur-' . $sbc['id_SBC'] . ' display-none">' . $sbc['nbCoeur'] . '</p>';
    echo '<p class="ram-' . $sbc['id_SBC'] . ' display-none">' . $sbc['RAM'] . '</p>';

    $annees = 0;
    $jours = $sbc['garantie'];

    while ($jours >= 365) {
        $annees += 1;
        $jours -= 365;
    }

    if ($annees <= 0) {
        echo '<p class="garantie-' . $sbc['id_SBC'] . ' display-none">' . $jours . ' jours de garantie</p>';
    } elseif ($jours <= 0) {
        echo '<p class="garantie-' . $sbc['id_SBC'] . ' display-none">' . $annees . ' an de garantie</p>';
    } else {
        echo '<p class="garantie-' . $sbc['id_SBC'] . ' display-none">' . $annees . ' an ' . $jours . ' jours de garantie</p>';
    }
}
?>


<?php include_once("inc/footer.php"); ?>