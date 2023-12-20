<?php include_once("inc/header.php"); ?>
<h2 class="center">Créer un compte</h2>
    
<form action="traitement.php" method="post" class="register">

    <fieldset class="profil">
        <legend class="white">Vos informations</legend>
        <div class="flex">
            <label class="white col-2" for="prenom">Prénom: </label>
            <input class="col-4" type="text" name="prenom" id="prenom" required>

            <label class="white col-2" for="nom">Nom: </label>
            <input class="col-4" type="text" name="nom" id="nom" required>


        </div>
        <div class="flex">
            <label class="white" for="courriel">Courriel: </label>
            <input type="email" name="courriel" id="courriel" placeholder="adresse@domaine." required> <!-- pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" -->

            <label class="white" for="tel">Téléphone: </label> 
            <input type="tel" name="tel" id="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="666-666-6666" required> <!-- Peut-être le gèrer en JS si on a le temps -->
        </div>

        <div class="flex">
            <label class="white" for="nom">Nom d'utilisateur: </label>
            <input type="text" name="nom_utilisateur" id="username" required>
        </div>

        <div class="flex">
            <label class="white" for="mdp">Mot de passe: </label>
            <input type="password" name="mdp" id="mdp" required>
        </div>
    </fieldset>

    <fieldset class="coord">
        <legend class="white">Coordonnées</legend>

        <div class="flex">
            <label class="white" for="pays">Pays: </label>
            <input type="text" name="pays" id="pays" required>

            <label class="white" for="province">Province: </label>
            <input type="text" name="province" id="province">
        </div>

        <div class="flex">
            <label class="white" for="ville">Ville: </label>
            <input type="text" name="ville" id="ville" required>

            <label class="white" for="adresse">Adresse: </label>
            <input type="text" name="adresse" id="adresse" required>
        </div>
    </fieldset>

    <div class="remise">
        <input type="hidden" name="action" value="inscription">

        <div class="flex">
            <button class="bouton" type="submit">Envoyer</button>
        </div>
    </div>

</form>

<?php include_once("inc/footer.php"); ?>