<?php include_once("inc/header.php");
$bdd = PDOFactory::getMySQLConnection();
$sm = new SBCManager($bdd);
print_r($_COOKIE['favoris']);
print_r($sm->getSBCById($_COOKIE['favoris'][1])); ?>
<h2 class="center">Votre liste de souhait</h2>

<?php $souhait = $_COOKIE['favoris'];
foreach ($souhait as $sbc) { ?>
    <div><a href="img/<?= $sm->getSBCById($sbc)->get_modele(); ?>.jpg"><img
                src="img/<?= $sm->getSBCById($sbc)->get_modele(); ?>.jpg"
                alt="<?= $sm->getSBCById($sbc)->get_modele(); ?>.jpg"></a>
        <?php echo $sm->getSBCById($sbc)->get_marqueSBC();
        echo $sm->getSBCById($sbc)->get_modele();
        echo $sm->getSBCById($sbc)->get_prix(); ?>
    </div>

<?php } ?>
<?php include_once("inc/footer.php"); ?>