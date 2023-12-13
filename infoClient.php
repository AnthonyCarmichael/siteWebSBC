<?php include_once("inc/header.php");

$client = unserialize($_SESSION['client']);
if (isset($_REQUEST['action'])) {
    if ($_REQUEST['action'] == "modificationInfoPerso") { ?>
        <form action="traitement.php" method="post" class="register">
            <label for="prenom">Prénom: </label>
            <input type="text" name="prenom" id="prenom" required>

            <label for="nom">Nom: </label>
            <input type="text" name="nom" id="nom" required>

            <input type="hidden" name="action" value="changementInfoPerso">
            <button type="submit" class="bouton">Confirmer les modifications</button>
        </form>
    <?php } else if ($_REQUEST['action'] == "modificationContact") { ?>
            <form action="traitement.php" method="post" class="register">
                <label for="courriel">Courriel: </label>
                <input type="email" name="courriel" id="courriel" required>

                <label for="tel">Téléphone: </label>
                <input type="tel" name="tel" id="tel" required>

                <input type="hidden" name="action" value="changementInfoContact">
                <button type="submit" class="bouton">Confirmer les modifications</button>
            </form>
    <?php } else if ($_REQUEST['action'] == "modificationConnexion") { ?>
                <form action="traitement.php" method="post" class="register">
                    <label for="nom_utilisateur">Nom d'utilisateur: </label>
                    <input type="nom_utilisateur" name="nom_utilisateur" id="nom_utilisateur" required>

                    <label for="mdp">Mot de passe: </label>
                    <input type="password" name="mdp" id="mdp" required>

                    <input type="hidden" name="action" value="changementInfoConexion">
                    <button type="submit" class="bouton">Confirmer les modifications</button>
                </form>
    <?php } else if ($_REQUEST['action'] == "modificationAdresse") { ?>
                    <form action="traitement.php" method="post" class="register">
                        <label for="adresse">Adresse: </label>
                        <input type="text" name="adresse" id="adresse" required>

                        <label for="ville">Ville: </label>
                        <input type="text" name="ville" id="ville" required>

                        <label for="province">Province: </label>
                        <input type="text" name="province" id="province" required>

                        <label for="pays">Pays: </label>
                        <input type="text" name="pays" id="pays" required>

                        <input type="hidden" name="action" value="changementAdresse">
                        <button type="submit" class="bouton">Confirmer les modifications</button>
                    </form>
    <?php }
} else { ?>
<h2 class="center">Vos informations</h2>
    <section>
        <div class="col-6 center">
            <p><span>Prénom: </span>
                <?= $client->get_prenom(); ?>
            </p>
            <p><span>Nom: </span>
                <?= $client->get_nom(); ?>
            </p>
            <form class="modificationInfoPerso" action="infoClient.php" method="post">
                <input type="hidden" name="action" value="modificationInfoPerso">
                <input type="submit" class="bouton" value="Modifier les informations personnelles">
            </form>
        </div>
        <div class="col-6 center">
            <p><span>Courriel: </span>
                <?= $client->get_courriel(); ?>
            </p>
            <p><span>Téléphone: </span>
                <?= $client->get_tel(); ?>
            </p>
            <form class="modificationContact" action="infoClient.php" method="post">
                <input type="hidden" name="action" value="modificationContact">
                <input type="submit" class="bouton" value="Modifier les informations de contact">
            </form>
        </div>
        <div class="col-6 center">
            <p><span>Nom d'utilisateur: </span>
                <?= $client->get_nom_utilisateur(); ?>
            </p>
            <p><span>Mot de passe: </span>
                <?= $client->get_mdp(); ?>
            </p>
            <form class="modificationConnexion" action="infoClient.php" method="post">
                <input type="hidden" name="action" value="modificationConnexion">
                <input type="submit" class="bouton" value="Modifier les informations de connexion">
            </form>
        </div>
        <div class="col-6 center">
            <p><span>Adresse: </span>
                <?= $client->get_adresse(); ?>
            </p>
            <p><span>Ville: </span>
                <?= $client->get_ville(); ?>
            </p>
            <p><span>Province: </span>
                <?= $client->get_province(); ?>
            </p>
            <p><span>Pays: </span>
                <?= $client->get_pays(); ?>
            </p>
            <form class="modificationAdresse" action="infoClient.php" method="post">
                <input type="hidden" name="action" value="modificationAdresse">
                <input type="submit" class="bouton" value="Modifier l'adresse">
            </form>
        </div>
    </section>
    <form class="historique center" action="historique.php" method="post">
        <input type="hidden" name="action" value="historique">
        <input type="submit" class="bouton" value="Mon historique de commande">
    </form>
<?php }

include_once("inc/footer.php"); ?>