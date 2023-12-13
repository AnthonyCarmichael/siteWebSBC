<?php include_once("inc/header.php");
$cm = new ClientManager($bdd);
$client = $cm->clientExiste("LHuguette", "LHuguette");
if (isset($_REQUEST['action'])) {
    if ($_REQUEST['action'] == "modification") { ?>
        <div class="center">
            <ul class="traitement center">
                <li>Anciennes informations
                    <ul>
                        <li><span>Prénom: </span>
                            <?= $client->get_prenom(); ?>
                        </li>
                        <li><span>Nom: </span>
                            <?= $client->get_nom(); ?>
                        </li>
                        <li><span>Courriel: </span>
                            <?= $client->get_courriel(); ?>
                        </li>
                        <li><span>Téléphone: </span>
                            <?= $client->get_tel(); ?>
                        </li>
                        <li><span>Nom d'utilisateur: </span>
                            <?= $client->get_nomUtilisateur(); ?>
                        </li>
                        <li><span>Mot de passe: </span>
                            <?= $client->get_mdp(); ?>
                        </li>
                        <li><span>Adresse: </span>
                            <?= $client->get_adresse(); ?>
                        </li>
                        <li><span>Ville: </span>
                            <?= $client->get_ville(); ?>
                        </li>
                        <li><span>Province: </span>
                            <?= $client->get_province(); ?>
                        </li>
                        <li><span>Pays: </span>
                            <?= $client->get_pays(); ?>
                        </li>
                    </ul>
                </li>
            </ul>
            <form action="traitement.php" method="post" class="register">
                <label for="prenom">Prénom: </label>
                <input type="text" name="prenom" id="prenom" value=<?= $client->get_prenom(); ?>>

                <label for="nom">Nom: </label>
                <input type="text" name="nom" id="nom" value=<?= $client->get_nom(); ?>>

                <label for="courriel">Courriel: </label>
                <input type="email" name="courriel" id="courriel" value=<?= $client->get_courriel(); ?>>

                <label for="tel">Téléphone: </label>
                <input type="tel" name="tel" id="tel" value=<?= $client->get_tel(); ?>>

                <label for="nom_utilisateur">Nom d'utilisateur: </label>
                <input type="nom_utilisateur" name="nom_utilisateur" id="nom_utilisateur" value=<?= $client->get_nomUtilisateur(); ?>>

                <label for="mdp">Mot de passe: </label>
                <input type="password" name="mdp" id="mdp" value=<?= $client->get_mdp(); ?>>

                <label for="adresse">Adresse: </label>
                <input type="text" name="adresse" id="adresse" value=<?= $client->get_adresse(); ?>>

                <label for="ville">Ville: </label>
                <input type="text" name="ville" id="ville" value=<?= $client->get_ville(); ?>>

                <label for="province">Province: </label>
                <input type="text" name="province" id="province" value=<?= $client->get_province(); ?>>

                <label for="pays">Pays: </label>
                <input type="text" name="pays" id="pays" value=<?= $client->get_pays(); ?>>

                <input type="hidden" name="action" value="changement">
                <button type="submit">Confirmer les modifications</button>
            </form>
        </div>
    <?php }
} else { ?>
    <ul class="traitement center">
        <li>Profil
            <ul>
                <li><span>Prénom: </span>
                    <?= $client->get_prenom(); ?>
                </li>
                <li><span>Nom: </span>
                    <?= $client->get_nom(); ?>
                </li>
                <li><span>Courriel: </span>
                    <?= $client->get_courriel(); ?>
                </li>
                <li><span>Téléphone: </span>
                    <?= $client->get_tel(); ?>
                </li>
                <li><span>Nom d'utilisateur: </span>
                    <?= $client->get_nomUtilisateur(); ?>
                </li>
                <li><span>Mot de passe: </span>
                    <?= $client->get_mdp(); ?>
                </li>
                <li><span>Adresse: </span>
                    <?= $client->get_adresse(); ?>
                </li>
                <li><span>Ville: </span>
                    <?= $client->get_ville(); ?>
                </li>
                <li><span>Province: </span>
                    <?= $client->get_province(); ?>
                </li>
                <li><span>Pays: </span>
                    <?= $client->get_pays(); ?>
                </li>
            </ul>
        </li>
    </ul>
    <form class="modification" action="infoClient.php" method="post">
        <input type="hidden" name="action" value="modification">
        <input type="submit" value="Modifier les informations">
    <?php }

include_once("inc/footer.php"); ?>