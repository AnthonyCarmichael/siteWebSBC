<?php include_once("inc/header.php");
$bdd = PDOFactory::getMySQLConnection();
$sm = new SBCManager($bdd);

print_r($_COOKIE);
setcookie("favoris0"); 
setcookie("favoris2"); ?>
<h2 class="center">Votre liste de souhait</h2>

<?php $souhait = $_COOKIE;
$i = 0;
foreach ($souhait as $sbc) {
    if (isset($_COOKIE["favoris$i"])) {
        $sm->getSBCById($_COOKIE["favoris$i"]) ?>
        <div><a href="img/<?= $sm->getSBCById($_COOKIE["favoris$i"])->get_modeleSBC(); ?>.jpg"><img
                    src="img/<?= $sm->getSBCById($_COOKIE["favoris$i"])->get_modeleSBC(); ?>.jpg"
                    alt="<?= $sm->getSBCById($_COOKIE["favoris$i"])->get_modeleSBC(); ?>.jpg"></a>
            <?php echo $sm->getSBCById($_COOKIE["favoris$i"])->get_marqueSBC();
            echo $sm->getSBCById($_COOKIE["favoris$i"])->get_modeleSBC();
            echo $sm->getSBCById($_COOKIE["favoris$i"])->get_prix(); ?>
        </div>
    <?php }
    $i++;
} ?>
<?php include_once("inc/footer.php"); ?>