<?php include_once("inc/header.php"); ?>

<h2 class="center">Entrez votre utilisateur et mot de passe <br> pour acheter un de nos SBC</h1>

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

<?php include_once("inc/footer.php"); ?>