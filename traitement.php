<?php 
    $page = "traitement";
    include_once("inc/header.php");
    include_once("inc/header.php");
    require_once './classe/PDOFactory.php';
    require_once './classe/SBCManager.php';
    require_once './classe/panier.php';
    $bdd = PDOFactory::getMySQLConnection();
    $SBCManager = new SBCManager($bdd); 

    if(isset($_REQUEST['action'])) 
    {
        if($_REQUEST['action'] == "inscription") {
            $cm = new ClientManager($bdd);
            $client = new Client($_REQUEST);
            print_r($client);
            $cm->addClient($client);
            ?>
            <section class="white">
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
            </section><?php 
        } 
        elseif ($_REQUEST['action'] == "connexion")
        { 
            if (isset($_SESSION['client'])) {
                ?>
                <?php $client = unserialize($_SESSION['client']);?>
                <h2 class="center">Bienvenue <?= $client->get_prenom() . " " . $client->get_nom(); ?> </h1>
                <?php 
            }
            else {
                ?>
                <h2 class="center">Entrez votre utilisateur et mot de passe <br> pour accéder aux fonctionnalités</h2>
                <p class="white center">
                    Le nom d'utilisateur ou le mot de passe ne correspond.
                </p>

                <form action="traitement.php" method="post" class="login">

                    <div class="row">
                        <label class="white" for="username">Nom d'utilisateur: </label>
                        <input type="text" name="username" id="username">
                        </div>

                    <div class="row">
                        <label class="white" for="mdp">Mot de passe: </label>
                        <input type="password" name="mdp" id="mdp">
                    </div>

                    <input type="hidden" name="action" value="connexion">

                    <div class="row">
                        <button type="submit">Se connecter</button>
                    </div>
                </form>
                <?php
            }
        }
        elseif ($_REQUEST['action'] == "suggestion")
        { 
            $SBCObj = new SBC($_REQUEST);

            if($SBCManager->addSBC($SBCObj)){
                echo '<p>Le SBC a bien été ajouté.</p>';

                $destinataire = "dongmorichard6@gmail.com";
                $sujet = "Nouvelle suggestion d'SBC";
                $message = "Marque: ". $_REQUEST['marqueSBC'] . ", Modèle: ". $_REQUEST['modeleSBC'] . ", Garantie: ". $_REQUEST['garantie'] . ", Mémoire vive: ". $_REQUEST['RAM'] . ", Longueur: ". $_REQUEST['longueur'] . ", Largeur: ". $_REQUEST['largeur'] . ", Prix: ". $_REQUEST['prix'] . ", Marque du processeur: ". $_REQUEST['marqueProcesseur'] . ", Modèle du processeur: ". $_REQUEST['modeleProcesseur'] . ", Nombre de coeurs: ". $_REQUEST['nbCoeur'];
                $hote = "";

                //mail($destinataire, $sujet, $message, $hote);
            }
        }
    } ?>

<?php include_once("inc/footer.php"); ?>