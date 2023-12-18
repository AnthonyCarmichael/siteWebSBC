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
    <span class="col-3"></span>
    <?php for($i = 1; $i <= 3; $i++ ) {?>
    <article class="col-3 center">
        <select name="sbc-0" id="select-<?=$i?>" class="compareSelect">
            <?php
                echo '<option value="' . $sbcs[0]['id_SBC'] . '" selected>' . $sbcs[0]['modeleSBC'] . '</option>';
                foreach($sbcs as $sbc)
                    echo '<option value="' . $sbc['id_SBC'] . '">' . $sbc['modeleSBC'] . '</option>'
            ?>
        </select>
        
        <?php
            foreach($sbcs as $sbc)
            {
                echo '<img class="img-' . $sbc['id_SBC'] . ' display-none" src="img/' . $sbc['modeleSBC'] . '.jpg" alt="' . $sbc['modeleSBC'] . '.jpg">';
                echo '<p class="prix-' . $sbc['id_SBC'] . ' display-none white">' . $sbc['prix'] . '$</p>';?>

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

                <a class="savoir-<?=$sbc['id_SBC']?> display-none plus" href="infoSBC.php?idSBC=<?=$sbc['id_SBC']?>">En savoir plus ></a>
        <?php }?>
    </article>
    <?php }?>
</div>

<table class="white">
    <tr>
        <td>Largeur</td>
        <?php
        foreach($sbcs as $sbc) {?>
            <td class="largeur1-<?=$sbc['id_SBC']?> display-none"><?=$sbc['largeur']?></td>
            <td class="largeur3-<?=$sbc['id_SBC']?> display-none"><?=$sbc['largeur']?></td>
            <td class="largeur2-<?=$sbc['id_SBC']?> display-none"><?=$sbc['largeur']?></td>
        <?php }?>
    </tr>
    <tr>
        <td>Longueur</td>
        <?php
        foreach($sbcs as $sbc) {?>
            <td class="longueur1-<?=$sbc['id_SBC']?> display-none"><?=$sbc['longueur']?></td>
            <td class="longueur2-<?=$sbc['id_SBC']?> display-none"><?=$sbc['longueur']?></td>
            <td class="longueur3-<?=$sbc['id_SBC']?> display-none"><?=$sbc['longueur']?></td>
        <?php }?>
    </tr>
    <tr>
        <td>Marque du processeur</td>
        <?php
        foreach($sbcs as $sbc) {?>
            <td class="pMarque1-<?=$sbc['id_SBC']?> display-none"><?=$sbc['marqueProcesseur']?></td>
            <td class="pMarque2-<?=$sbc['id_SBC']?> display-none"><?=$sbc['marqueProcesseur']?></td>
            <td class="pMarque3-<?=$sbc['id_SBC']?> display-none"><?=$sbc['marqueProcesseur']?></td>
        <?php }?>
    </tr>
    <tr>
        <td>Nombre de coeurs</td>
        <?php
        foreach($sbcs as $sbc) {?>
            <td class="nbCoeur1-<?=$sbc['id_SBC']?> display-none"><?=$sbc['nbCoeur']?></td>
            <td class="nbCoeur2-<?=$sbc['id_SBC']?> display-none"><?=$sbc['nbCoeur']?></td>
            <td class="nbCoeur3-<?=$sbc['id_SBC']?> display-none"><?=$sbc['nbCoeur']?></td>
        <?php }?>
    </tr>
    <tr>
        <td>Mémoire vive</td>
        <?php
        foreach($sbcs as $sbc) {?>
            <td class="ram1-<?=$sbc['id_SBC']?> display-none"><?=$sbc['RAM']?></td>
            <td class="ram2-<?=$sbc['id_SBC']?> display-none"><?=$sbc['RAM']?></td>
            <td class="ram3-<?=$sbc['id_SBC']?> display-none"><?=$sbc['RAM']?></td>
        <?php }?>
    </tr>
    <tr>
        <td>Garantie</td>
        <?php
        foreach($sbcs as $sbc) {?>
            <td class="garantie1-<?=$sbc['id_SBC']?> display-none"><?=$sbc['garantie']?></td>
            <td class="garantie2-<?=$sbc['id_SBC']?> display-none"><?=$sbc['garantie']?></td>
            <td class="garantie3-<?=$sbc['id_SBC']?> display-none"><?=$sbc['garantie']?></td>
        <?php }?>
    </tr>
</table>


<?php include_once("inc/footer.php");?>