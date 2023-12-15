<?php
include_once("inc/header.php");
require_once './classe/PDOFactory.php';
require_once './classe/SBCManager.php';
require_once './classe/panier.php';

$bdd = PDOFactory::getMySQLConnection();
$SBCManager = new SBCManager($bdd);

$SBCs = $SBCManager->getSBCs();
$panier = new panier();

if (isset($_REQUEST['action'])) {
    if ($_REQUEST['action'] == "inscription") {
        $cm = new ClientManager($bdd);
        $client = new Client($_REQUEST);
        print_r($client);
        $cm->addClient($client);
?>
        <?php $client = unserialize($_SESSION['client']); ?>
        <h2 class="center">Bienvenue
            <?= $client->get_prenom() . " " . $client->get_nom(); ?>
        </h2>
            <?php
        } elseif ($_REQUEST['action'] == "connexion") {
            if (isset($_SESSION['client'])) { ?>
                <?php $client = unserialize($_SESSION['client']); ?>
                <h2 class="center">Bienvenue
                    <?= $client->get_prenom() . " " . $client->get_nom(); ?>
                </h2>

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
                <section id="rappelIndex" class="white flex">
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

            <?php
            } else {
            ?>
                <section id="connexion">

                    <h2 class="center">Entrez votre utilisateur et mot de passe <br> pour accéder aux fonctionnalités</h2>
                    <p class="white center">
                        Le nom d'utilisateur ou le mot de passe ne correspond.
                    </p>

                    <form id="seConnecter" action="traitement.php" method="post" class="login">

                        <div class="flex">
                            <label class="white" for="username">Nom d'utilisateur: </label>
                            <input type="text" name="username" id="username">
                        </div>

                        <div class="flex">
                            <label class="white" for="mdp">Mot de passe: </label>
                            <input type="password" name="mdp" id="mdp">
                        </div>

                        <input type="hidden" name="action" value="connexion">

                        <div class="row">
                            <button type="submit">Se connecter</button>
                        </div>
                    </form>
                </section>
    <?php
            }
        } elseif ($_REQUEST['action'] == "suggestion") {
            $SBCObj = new SBC($_REQUEST);

            if ($SBCManager->addSBC($SBCObj)) {
                echo '<p>Le SBC a bien été ajouté.</p>';

                $destinataire = "dongmorichard6@gmail.com";
                $sujet = "Nouvelle suggestion d'SBC";
                $message = "Marque: " . $_REQUEST['marqueSBC'] . ", Modèle: " . $_REQUEST['modeleSBC'] . ", Garantie: " . $_REQUEST['garantie'] . ", Mémoire vive: " . $_REQUEST['RAM'] . ", Longueur: " . $_REQUEST['longueur'] . ", Largeur: " . $_REQUEST['largeur'] . ", Prix: " . $_REQUEST['prix'] . ", Marque du processeur: " . $_REQUEST['marqueProcesseur'] . ", Modèle du processeur: " . $_REQUEST['modeleProcesseur'] . ", Nombre de coeurs: " . $_REQUEST['nbCoeur'];
                $hote = "";

                //mail($destinataire, $sujet, $message, $hote);
            }
        } elseif ($_REQUEST['action'] == "changementInfoPerso") {
            $cm = new ClientManager($bdd);

            $client = unserialize($_SESSION['client']);
            $client->set_prenom($_REQUEST['prenom']);
            $client->set_nom($_REQUEST['nom']);


            $cm->modifInfoPerso($client->get_id_client(), $_REQUEST['prenom'], $_REQUEST['nom']);
            $_SESSION['client'] = serialize($client);
        } elseif ($_REQUEST['action'] == "changementInfoContact") {
            $cm = new ClientManager($bdd);

            $client = unserialize($_SESSION['client']);
            $client->set_courriel($_REQUEST['courriel']);
            $client->set_tel($_REQUEST['tel']);


            $cm->modifInfoContact($client->get_id_client(), $_REQUEST['courriel'], $_REQUEST['tel']);
            $_SESSION['client'] = serialize($client);
        } elseif ($_REQUEST['action'] == "changementInfoConnexion") {
            $cm = new ClientManager($bdd);

            $client = unserialize($_SESSION['client']);
            $client->set_nom_utilisateur($_REQUEST['nom_utilisateur']);
            $client->set_mdp($_REQUEST['mdp']);


            $cm->modifInfoConnexion($client->get_id_client(), $_REQUEST['nom_utilisateur'], $_REQUEST['mdp']);
            $_SESSION['client'] = serialize($client);
        } elseif ($_REQUEST['action'] == "changementAdresse") {
            $cm = new ClientManager($bdd);

            $client = unserialize($_SESSION['client']);
            $client->set_adresse($_REQUEST['adresse']);
            $client->set_ville($_REQUEST['ville']);
            $client->set_province($_REQUEST['province']);
            $client->set_pays($_REQUEST['pays']);


            $cm->modifAdresse($client, $client->get_id_client(), $_REQUEST['adresse'], $_REQUEST['ville'], $_REQUEST['province'], $_REQUEST['pays']);
            $_SESSION['client'] = serialize($client);
        } elseif ($_REQUEST['action'] == "favoris") {
            $SBC = $SBCManager->getSBCId($_REQUEST['favoris']);
            $i = 0;
            foreach ($_COOKIE as $cookie) {
                $i++;
                setcookie("favoris$i");
            }
            $i -= 2;
            setcookie("favoris$i", $_REQUEST['favoris'], time() + (86400 * 30));
            print_r($_REQUEST['favoris']);
            print_r($_COOKIE);

            echo 'Le produit a été ajouté à la liste des souhaits. <a href="javascript:history.back()">Retourner sur le catalogue</a> ';
        } elseif (isset($_REQUEST['idPanier'])) {
            $SBC = $SBCManager->getSBCId($_GET['idPanier']);
            if (empty($SBC))
                echo "Produit inexistant";
            $panier->add($SBC[0]);
            echo 'Le produit a été ajouté à votre panier. <a href="javascript:history.back()">Retourner sur le catalogue</a>';
        } elseif (($_GET['action']) == "delCommande") {
            $client = unserialize($_SESSION['client']);
            $commandeManager = new CommandeManager($bdd);
            $commandeManager->delCommande($client->get_id_client(), $_GET['idCommande']);
            echo '<h2 class="center">Commande supprimé</h2>';
        }
    }
    include_once("inc/footer.php");
    ?>