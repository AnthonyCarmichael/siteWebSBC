<?php include_once("inc/header.php"); ?>
<?php 

    if (isset($_SESSION['client'])) { ?>
        <?php $client = unserialize($_SESSION['client']); ?>
        <h2 class="center">Bienvenue
        <?= $client->get_prenom() . " " . $client->get_nom(); ?>
        </h2>
        <?php
    }
?>
<div class="caroussel">

    <div class="imgCaroussel fade">
        <img src="img/banniere1.png" style="width:100%">
    </div>

    <div class="imgCaroussel fade">
        <img src="img/banniere2.png" style="width:100%">
    </div>

    <div class="imgCaroussel fade">
        <img src="img/banniere3.png" style="width:100%">
    </div>
</div>
<br>
<section>
    <div>
        <h2>À propos de nous</h2>
        <p>Nous sommes trois étudiant passionnés d'informatique qui avont décidé de se spécialiser dans le
            domaine des SBC.
            Puisque ce sujet nous a particulièrement intéressés, nous avons décidé de créer une compagnie spécialisé
            dans la
            vente de SBC. Nous espérons que notre site vous plaira et n'hésitez pas à nous contacter pour tous
            commentaires
            ou même pour nous suggérer des modèles à vendre.</p>
    </div>
    <div>
        <h2>Pourquoi acheter un SBC</h2>
        <p>Les SBC propose plusieurs avantages si on les compare aux ordinateurs plus traditionnels. Tout d'abord, ils
            sont plus petit et plus léger ce qui les rends plus faciles à transporter. De plus, il consomme moins
            d'énergie et ils coûtent souvent moins chers. Ils sont donc une bonne option pour les personnes qui ont
            besoins d'un ordinateurs pour éxécuter des tàches simples.</p>
    </div>
</section>

<?php include_once("inc/footer.php"); ?>