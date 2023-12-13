<?php include_once("inc/header.php"); ?>
    <h2 class="center">Créer un compte</h1>
    
<form action="traitement.php" method="post" class="register">

    <fieldset class="profil">
        <legend class="white">Vos informations</legend>
        <div class="row">
            <label class="white" for="prenom">Prénom: </label>
            <input type="text" name="prenom" id="prenom">

            <label class="white" for="nom">Nom: </label>
            <input type="text" name="nom" id="nom">


        </div>
        <div class="row">
            <label class="white" for="courriel">Courriel: </label>
            <input type="email" name="courriel" id="courriel">

            <label class="white" for="tel">Téléphone: </label> <!-- Gérer le format du téléphone -->
            <input type="tel" name="tel" id="tel">
        </div>

        <div class="row">
            <label class="white" for="nom">Nom d'utilisateur: </label>
            <input type="text" name="nomUtilisateur" id="username">
        </div>

        <div class="row">
            <label class="white" for="mdp">Mot de passe: </label>
            <input type="password" name="mdp" id="mdp">
        </div>
    </fieldset>

    <fieldset class="coord">
        <legend class="white">Coordonnées</legend>

        <div class="row">
            <label class="white" for="pays">Pays: </label>
            <input type="text" name="pays" id="pays">

            <label class="white" for="province">Province: </label>
            <input type="text" name="province" id="province">
        </div>

        <div class="row">
            <label class="white" for="ville">Ville: </label>
            <input type="text" name="ville" id="ville">

            <label class="white" for="adresse">Adresse: </label>
            <input type="text" name="adresse" id="adresse">
        </div>
    </fieldset>

    <fieldset class="remise">
        <input type="hidden" name="action" value="inscription">

        <div class="row">
            <button type="submit">Envoyer</button>
        </div>
    </fieldset>

</form>

<?php include_once("inc/footer.php"); ?>