<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
    <title>SBC</title>
</head>
<body>
    <header>
        <h1 class="center">Chip Wave</h1>
        <nav class="menu-connexion">
            <ul class="end">
                <li><a href="inscription.php">Inscription</a></li>

                <?php if(isset($_SESSION['client'])){ ?>
                    <li><a href="traitement.php?action=logout">Se déconnecter</a></li>
                <?php } else { ?>
                    <li><a href="connexion.php">Se connecter</a></li>                    
                <?php } ?>
            </ul>
        </nav>
        <nav class="menu-principal flex"> 
            <ul class="flex">
                <li><img id="logo" src="img/logo.png" alt="compagnie"></li>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="infoSBC.php">SBC</a></li>
                <li><a href="comparaison.php">Comparaison</a></li>
                <li><a href="suggestionSBC.php">Suggestion</a></li>
            </ul>

            <!-- Si le client est connecter, d'autre lien s'affiche -->
            <!-- Le if est en commentaire pour tester le css même si y'a pas de client connecter -->
            <?php //if(isset($_SESSION['client'])){ ?>
            <ul class="flex"> 
                <li><a href="infoClient.php">Gestion de compte</a></li>
                <li><a href="wishList.php">Liste de souhait</a></li>
                <li><a href="panier.php"><img id="panier" src="img/panier.png" alt="panier"></a></li>
            </ul>
            <?php // }  ?>
        </nav>
    </header>
    <main id="<?= $page?>">

