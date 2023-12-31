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
            <legend>Suggestion SBC</legend>

            <div class="col-6">
                <div class="flex wrap">
                    <label class="col-4 col-4m" for="marqueSBC">Marque: </label>
                    <input class="col-7 col-7m" required placeholder="Marque du produit" type="text" name="marqueSBC" id="marqueSBC">
                </div>

                <div class="flex wrap">
                    <label class="col-4 col-4m" for="modeleSBC">Modele: </label>
                    <input class="col-7 col-7m" required placeholder="Modèle du produit" type="text" name="modeleSBC" id="modeleSBC">
                </div>
                
                <div class="flex wrap">
                    <label class="col-4 col-4m" for="garantie">Garantie: </label>
                    <input class="col-7 col-7m" required placeholder="Durée de la garantie (en jours)" type="number" name="garantie" id="garantie">
                </div>
                
                <div class="flex wrap">
                    <label class="col-4 col-4m" for="RAM">Mémoire vive: </label>
                    <input class="col-7 col-7m" required placeholder="Quantité de memoire vive (en Go)" type="number" name="RAM" id="RAM">
                </div>
                
                <div class="flex wrap">
                    <label class="col-4 col-4m" for="longueur">Longueur: </label>
                    <input class="col-7 col-7m" required placeholder="Longueur du produit (en cm)" type="number" name="longueur" id="longueur">
                </div>
                
                <div class="flex wrap">
                    <label class="col-4 col-4m" for="largeur">Largeur: </label>
                    <input class="col-7 col-7m" required placeholder="Largeur du produit (en cm)" type="number" name="largeur" id="largeur">
                </div>
                
                <div class="flex wrap">
                    <label class="col-4 col-4m" for="prix">Prix: </label>
                    <input class="col-7 col-7m" required placeholder="Prix du produit" type="number" name="prix" id="prix">
                </div>
            </div>

            <div class="col-6">
                <div class="flex wrap">
                    <label class="col-4 col-4m" for="marqueProcesseur">Marque processeur: </label>
                    <input class="col-7 col-7m" required placeholder="Marque du processeur" type="text" name="marqueProcesseur" id="marqueProcesseur">
                </div>
                
                <div class="flex wrap">
                    <label class="col-4 col-4m" for="modeleProcesseur">Modele processeur: </label>
                    <input class="col-7 col-7m" required placeholder="Modéle du processeur" type="text" name="modeleProcesseur" id="modeleProcesseur">
                </div>
                
                <div class="flex wrap">
                    <label class="col-4 col-4m" for="nbCoeur">Nombre de coeurs: </label>
                    <input class="col-7 col-7m" required placeholder="Nombre de coeurs du processeur" type="number" name="nbCoeur" id="nbCoeur">
                </div>
            </div>
        </fieldset>
            
        <div id="boutonSuggestion" class="flex wrap center">
        
            <input type="hidden" name="action" value="suggestion">
            <input class="suggestion-annuler bouton" type="reset" value="Annuler">
            <input class="suggestion-envoyer bouton" type="submit" value="Envoyer">
        </div>
    </form>

<?php include_once("inc/footer.php"); ?>