<?php include_once("inc/header.php"); ?>
<?php 
$certificationManager= new CertificationManager($bdd);
$tabCertificationas = $certificationManager->getCertification($_GET['idSBC']);
?>
<section class="white">

<h2 class="center">Certification</h2>

<?php
foreach ($tabCertificationas as $certification) {
    ?>
    <h2 class=""><?php echo $certification->get_nom();?></h2>
    <p><?php echo $certification->get_description();?></p>
    <a href=<?php echo $certification->get_lien();?> target="_blank" >Pour plus d'informations</a>
    <br>
    <?php
}
?>

</section>
<?php include_once("inc/footer.php"); ?>