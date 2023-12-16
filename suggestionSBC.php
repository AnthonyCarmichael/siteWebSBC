<?php 
    $page = "suggestion";
    include_once("inc/header.php");
    include_once("inc/header.php");
    require_once './classe/PDOFactory.php';
    require_once './classe/SBCManager.php';
    $bdd = PDOFactory::getMySQLConnection();
    $SBCManager = new SBCManager($bdd); 
?>

    <h2 class="center">Suggestion SBC</h2>
        
    <form action="traitement.php" method="post">

        <fieldset class="flex wrap">
            <legend>Infos SBC</legend>

            <div class="col-6">
                <div class="flex wrap">
                    <label class="col-4" for="marqueSBC">Marque: </label>
                    <input class="col-7" required placeholder="Marque du produit" type="text" name="marqueSBC" id="marqueSBC">
                </div>

                <div class="flex wrap">
                    <label class="col-4" for="modeleSBC">Modele: </label>
                    <input class="col-7" required placeholder="Modèle du produit" type="text" name="modeleSBC" id="modeleSBC">
                </div>
                
                <div class="flex wrap">
                    <label class="col-4" for="garantie">Garantie: </label>
                    <input class="col-7" required placeholder="Durée de la garantie (en jours)" type="number" name="garantie" id="garantie">
                </div>
                
                <div class="flex wrap">
                    <label class="col-4" for="RAM">Mémoire vive: </label>
                    <input class="col-7" required placeholder="Quantité de memoire vive (en Go)" type="number" name="RAM" id="RAM">
                </div>
                
                <div class="flex wrap">
                    <label class="col-4" for="longueur">Longueur: </label>
                    <input class="col-7" required placeholder="Longueur du produit (en cm)" type="number" name="longueur" id="longueur">
                </div>
                
                <div class="flex wrap">
                    <label class="col-4" for="largeur">Largeur: </label>
                    <input class="col-7" required placeholder="Largeur du produit (en cm)" type="number" name="largeur" id="largeur">
                </div>
                
                <div class="flex wrap">
                    <label class="col-4" for="prix">Prix: </label>
                    <input class="col-7" required placeholder="Prix du produit" type="number" name="prix" id="prix">
                </div>
            </div>

            <div class="col-6">
                <div class="flex wrap">
                    <label class="col-4" for="marqueProcesseur">Marque processeur: </label>
                    <input class="col-7" required placeholder="Marque du processeur" type="text" name="marqueProcesseur" id="marqueProcesseur">
                </div>
                
                <div class="flex wrap">
                    <label class="col-4" for="modeleProcesseur">Modele processeur: </label>
                    <input class="col-7" required placeholder="Modéle du processeur" type="text" name="modeleProcesseur" id="modeleProcesseur">
                </div>
                
                <div class="flex wrap">
                    <label class="col-4" for="nbCoeur">Nombre de coeurs: </label>
                    <input class="col-7" required placeholder="Nombre de coeurs du processeur" type="number" name="nbCoeur" id="nbCoeur">
                </div>
            </div>
        </fieldset>
            
        <div class="flex wrap">
            <span class="col-9"></span>
            <input type="hidden" name="action" value="suggestion">
            <input class="col-1 suggestion-annuler" type="reset" value="Annuler">
            <input class="col-1 suggestion-envoyer" type="submit" value="Envoyer">
        </div>
    </form>

<?php include_once("inc/footer.php"); ?>