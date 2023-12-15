<?php 
    $page = "comparaison";
    include_once("inc/header.php");
    require_once './classe/PDOFactory.php';
    require_once './classe/SBCManager.php';
    require_once './classe/SBC.php';

    $bdd = PDOFactory::getMySQLConnection();

    $SBCManager = new SBCManager($bdd);
?>

<h2 class="center">Comparaison</h2>

<div>
    <article>
        <select name="sbc-0" id="select-1" class="compareSelect">
            <?php
                $sbcs = $SBCManager->selectAllSBC();
                echo '<option value="' . $sbcs[0]['id_SBC'] . '" selected>' . $sbcs[0]['modeleSBC'] . '</option>';
                foreach($sbcs as $sbc)
                    echo '<option value="' . $sbc['id_SBC'] . '">' . $sbc['modeleSBC'] . '</option>'
            ?>
        </select>
        
        <?php
            foreach($sbcs as $sbc)
            {
                echo '<img class="img-' . $sbc['id_SBC'] . ' display-none" src="img/' . $sbc['modeleSBC'] . '.jpg" alt="' . $sbc['modeleSBC'] . '.jpg">';
                echo '<p class="prix-' . $sbc['id_SBC'] . ' display-none">' . $sbc['prix'] . '</p>';?>

                <form class="formPanier-<?=$sbc['id_SBC']?> display-none" action="traitement.php" method="get">
                    <input type="hidden" name="action" value="idPanier">
                    <input type="hidden" name="idPanier" value="<?= $sbc['id_SBC']; ?>">
                    <input type="submit" class="bouton" value="Ajouter au panier">
                </form>

                <form class="formFavoris-<?=$sbc['id_SBC']?> display-none" action="traitement.php" method="get">
                    <input type="hidden" name="action" value="favoris">
                    <input type="hidden" name="favoris" value="<?= $sbc['id_SBC']; ?>">
                    <input type="submit" class="bouton" value="Ajouter aux favoris">
                </form>

                <a class="savoir-<?=$sbc['id_SBC']?> display-none" href="infoSBC.php?idSBC=<?=$sbc['id_SBC']?>">En savoir plus ></a>
        <?php }?>
    </article>

    <article>
        <select name="sbc-1" id="select-2" class="compareSelect">
            <?php
                $sbcs = $SBCManager->selectAllSBC();
                echo '<option value="' . $sbcs[0]['id_SBC'] . '" selected>' . $sbcs[0]['modeleSBC'] . '</option>';
                foreach($sbcs as $sbc)
                    echo '<option value="' . $sbc['id_SBC'] . '">' . $sbc['modeleSBC'] . '</option>'
            ?>
        </select>
        
        <?php
            foreach($sbcs as $sbc)
                echo '<img class="img-' . $sbc['id_SBC'] . ' display-none" src="img/' . $sbc['modeleSBC'] . '.jpg" alt="' . $sbc['modeleSBC'] . '.jpg">';
        ?>

        <?php
            foreach($sbcs as $sbc)
                echo '<p class="prix-' . $sbc['id_SBC'] . ' display-none">' . $sbc['prix'] . '</p>';
        ?>

        <input type="button" value="Commander">
        <a href="">En savoir plus ></a>

        <form class="panier" action="traitement.php" method="get">
            <input type="hidden" name="action" value="idPanier">
            <input type="hidden" name="idPanier" value="<?= $SBC->get_id_SBC(); ?>">
            <input type="submit" class="bouton" value="Ajouter au panier">
        </form>
        <form class="favoris" action="traitement.php" method="get">
            <input type="hidden" name="action" value="favoris">
            <input type="hidden" name="favoris" value="<?= $SBC->get_id_SBC(); ?>">
            <input type="submit" class="bouton" value="Ajouter aux favoris">
        </form>
    </article>

</div>


<?php include_once("inc/footer.php");?>