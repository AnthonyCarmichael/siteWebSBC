<?php
// Prétraitement //////////////////////////////////////////////////////////////////
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once("inc/autoloader.php");

$bdd = PDOFactory::getMySQLConnection();

if (isset($_REQUEST['action']) && $_REQUEST['action'] == "connexion") {
    $clientManager = new ClientManager($bdd);
    $client = $clientManager->clientExiste($_REQUEST['username'], $_REQUEST['mdp']);
    if ($client != null) {
        $_SESSION['client'] = serialize($client);
    }
} else if (isset($_REQUEST['action']) && $_REQUEST['action'] == "logout") {
    $_SESSION = array();
    session_destroy();
}

include_once("prétraitement.php");
///////////////////////////////////////////////////////////////////////////////////
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Whisper&display=swap" rel="stylesheet">
    <script src="js/script.js" defer></script>
    <title>SBC</title>
</head>

<body>
    <header>
        <h1 class="center">Chip Wave</h1>
        <nav class="menu-connexion">
            <ul class="end">


                <?php if (isset($_SESSION['client'])) { ?>
                    <li><a href="traitement.php?action=logout">Se déconnecter</a></li>
                <?php } else { ?>
                    <li><a href="inscription.php">Inscription</a></li>
                    <li><a href="connexion.php">Se connecter</a></li>
                <?php } ?>
            </ul>
        </nav>
        <nav class="menu-principal flex">
            <ul class="flex">
                <li><img id="logo" src="img/logo.png" alt="compagnie"></li>
                <li>
                    <img id="hamburger" src="img/hamburgerIcon.png" alt="compagnie">
                    <ul id="menuBurger" class="display-none">
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="infoSBC.php">SBC</a></li>
                        <li><a href="comparaison.php">Comparaison</a></li>
                        <li><a href="suggestionSBC.php">Suggestion</a></li>
                    </ul>
                </li>
                <li><a href="index.php" class="pc">Accueil</a></li>
                <li><a href="infoSBC.php" class="pc">SBC</a></li>
                <li><a href="comparaison.php" class="pc">Comparaison</a></li>
                <li><a href="suggestionSBC.php" class="pc">Suggestion</a></li>
            </ul>

            <!-- Si le client est connecter, d'autre lien s'affiche -->
            <!-- Le if est en commentaire pour tester le css même si y'a pas de client connecter -->
            <?php
            if (isset($_SESSION['client'])) { ?>
                <ul class="flex">
                    <li><a href="infoClient.php" class="pc">Gestion de compte</a></li>
                    <li><a href="wishList.php" class="pc">Liste de souhait</a></li>
                    <li>
                        <a id="logoPanier" href="panier.php" class="pc"><img src="img/panier.png" alt="panier"></a>
                        <ul id="menuUser" class="display-none">
                            <li><a href="traitement.php?action=logout">Se déconnecter</a></li>
                            <li><a href="infoClient.php">Gestion de compte</a></li>
                            <li><a href="wishList.php">Liste de souhait</a></li>
                            <li><a href="panier.php">Panier</a></li>
                        </ul>
                    </li>
                </ul>
                <?php
            } else {
                ?>
                <ul id="menuUser" class="display-none">
                    <li><a href="inscription.php">Inscription</a></li>
                    <li><a href="connexion.php">Se connecter</a></li>
                </ul>
                <?php
            }
            ?>
            <img id="userIcon" src="img/userIcon.png" alt="user">
        </nav>
    </header>
    <?php
    // Chaque main a un id correspondant a son nom de page
    $page = basename($_SERVER['REQUEST_URI'], '.php');

    if ($page == "siteWebSBC") {
        $page = "index";
    } else {
        $parts = explode('.', $page);
        $page = $parts[0];
    }
    ?>
    <main id="<?= $page ?>">