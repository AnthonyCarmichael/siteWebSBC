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
        <select name="sbc" id="select-0" class="compareSelect">
            <?php
                $sbcs = $SBCManager->selectAllSBC();
                echo '<option value="' . $sbcs[0]['id_SBC'] . '" selected>' . $sbcs[0]['modele'] . '</option>';
                foreach($sbcs as $sbc)
                    echo '<option value="' . $sbc['id_SBC'] . '">' . $sbc['modele'] . '</option>'
            ?>
        </select>
        
        <?php
            foreach($sbcs as $sbc)
                echo '<img class="img-' . $sbc['id_SBC'] . ' display-none" src="img/' . $sbc['modele'] . '.jpg" alt="' . $sbc['modele'] . '.jpg">';
        ?>

        <?php
            foreach($sbcs as $sbc)
                echo '<p class="prix-' . $sbc['id_SBC'] . ' display-none">' . $sbc['prix'] . '</p>';
        ?>

        <input type="button" value="Commander">
        <a href="">En savoir plus ></a>
    </article>

    <article>
        <select name="sbc" id="select-1" class="compareSelect">
            <?php
                $sbcs = $SBCManager->selectAllSBC();
                echo '<option value="' . $sbcs[0]['id_SBC'] . '" selected>' . $sbcs[0]['modele'] . '</option>';
                foreach($sbcs as $sbc)
                    echo '<option value="' . $sbc['id_SBC'] . '">' . $sbc['modele'] . '</option>'
            ?>
        </select>
        
        <?php
            foreach($sbcs as $sbc)
                echo '<img class="img-' . $sbc['id_SBC'] . ' display-none" src="img/' . $sbc['modele'] . '.jpg" alt="' . $sbc['modele'] . '.jpg">';
        ?>

        <?php
            foreach($sbcs as $sbc)
                echo '<p class="prix-' . $sbc['id_SBC'] . ' display-none">' . $sbc['prix'] . '</p>';
        ?>

        <input type="button" value="Commander">
        <a href="">En savoir plus ></a>
    </article>

</div>


<?php include_once("inc/footer.php");?>