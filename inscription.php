<?php include_once("inc/header.php"); ?>
<h2 class="center">Créer un compte</h1>
    
<form action="traitement.php" method="post" class="register">

    <fieldset class="profil">
        <legend class="white">Vos informations</legend>
        <div class="row">
            <label class="white" for="prenom">Prénom: </label>
            <input type="text" name="prenom" id="prenom" required>

            <label class="white" for="nom">Nom: </label>
            <input type="text" name="nom" id="nom" required>


        </div>
        <div class="row">
            <label class="white" for="courriel">Courriel: </label>
            <input type="email" name="courriel" id="courriel" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" placeholder="adresse@domaine." required>

            <label class="white" for="tel">Téléphone: </label> 
            <input type="tel" name="tel" id="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="(666) 666-6666" required> <!-- Peut-être le gèrer en JS si on a le temps -->
        </div>

        <div class="row">
            <label class="white" for="nom">Nom d'utilisateur: </label>
            <input type="text" name="nomUtilisateur" id="username" required>
        </div>

        <div class="row">
            <label class="white" for="mdp">Mot de passe: </label>
            <input type="password" name="mdp" id="mdp" required>
        </div>
    </fieldset>

    <fieldset class="coord">
        <legend class="white">Coordonnées</legend>

        <div class="row">
            <label class="white" for="pays">Pays: </label>
            <input type="text" name="pays" id="pays" required>

            <label class="white" for="province">Province: </label>
            <input type="text" name="province" id="province">
        </div>

        <div class="row">
            <label class="white" for="ville">Ville: </label>
            <input type="text" name="ville" id="ville" required>

            <label class="white" for="adresse">Adresse: </label>
            <input type="text" name="adresse" id="adresse" required>
        </div>
    </fieldset>

    <div class="remise">
        <input type="hidden" name="action" value="inscription">

        <div class="row">
            <button type="submit">Envoyer</button>
        </div>
    </div>

</form>

<?php include_once("inc/footer.php"); ?>