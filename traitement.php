<?php include_once("inc/header.php"); ?>

<?php 
    if(isset($_REQUEST['action'])) 
    {
        if($_REQUEST['action'] == "inscription") {
            $cm = new ClientManager($bdd);
            $client = new Client($_REQUEST);
            $cm->addClient($client);
        ?>
        <ul class="traitement">
            <li>Profil
                <ul>
                    <li><span>Prénom: </span><?= $client->get_prenom(); ?></li>
                    <li><span>Nom: </span><?= $client->get_nom(); ?></li>
                    <li><span>Courriel: </span><?= $client->get_courriel(); ?></li>
                    <li><span>Téléphone: </span><?= $client->get_tel(); ?></li>
                    <li><span>Nom d'utilisateur: </span><?= $client->get_nomUtilisateur(); ?></li>
                    <li><span>Mot de passe: </span><?= $client->get_mdp(); ?></li>
                </ul>
            </li>
            <li>Coordonnées
                <ul>
                    <li><span>Pays: </span><?= $client->get_pays(); ?></li>
                    <li><span>Adresse: </span><?= $client->get_adresse(); ?></li>
                    <li><span>Ville: </span><?= $client->get_ville(); ?></li>
                    <li><span>Province: </span><?= $client->get_province(); ?></li>
                </ul>
            </li>
        </ul>
        <?php
        } 
    } ?>

<?php include_once("inc/footer.php"); ?>