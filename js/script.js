window.onload = function () {
    //let selectMenu = document.querySelector("article select[name='sbc']");
    let selectMenu = document.querySelectorAll(".compareSelect");


    for (let i = 0; i < selectMenu.length; i++) {

        if (selectMenu[i] != undefined) {
            selectMenu[i].addEventListener('change', function (e) {
                //let idSelect = e.target.id.toString().charAt(e.target.id.toString().length - 1);

                let pricesArray = document.querySelectorAll("#" + e.target.id + " ~ p[class*='prix-'");
                let imgArray = document.querySelectorAll("#" + e.target.id + " ~ img[class*='img-'");
                let formPanierArray = document.querySelectorAll("#" + e.target.id + " ~ form[class*='formPanier-'");
                let formFavorisArray = document.querySelectorAll("#" + e.target.id + " ~ form[class*='formFavoris-'");
                let savoirArray = document.querySelectorAll("#" + e.target.id + " ~ a[class*='savoir-'");
                let largeur1Array = document.querySelectorAll("." + e.target.id + "-container + table tr td[class*='largeur1-'");
                let largeur2Array = document.querySelectorAll("." + e.target.id + "-container + table tr td[class*='largeur2-'");
                let largeur3Array = document.querySelectorAll("." + e.target.id + "-container + table tr td[class*='largeur3-'");
                let longueur1Array = document.querySelectorAll("." + e.target.id + "-container + table tr td[class*='longueur1-'");
                let longueur2Array = document.querySelectorAll("." + e.target.id + "-container + table tr td[class*='longueur2-'");
                let longueur3Array = document.querySelectorAll("." + e.target.id + "-container + table tr td[class*='longueur3-'");
                let pMarque1Array = document.querySelectorAll("." + e.target.id + "-container + table tr td[class*='pMarque1-'");
                let pMarque2Array = document.querySelectorAll("." + e.target.id + "-container + table tr td[class*='pMarque2-'");
                let pMarque3Array = document.querySelectorAll("." + e.target.id + "-container + table tr td[class*='pMarque3-'");
                let nbCoeur1Array = document.querySelectorAll("." + e.target.id + "-container + table tr td[class*='nbCoeur1-'");
                let nbCoeur2Array = document.querySelectorAll("." + e.target.id + "-container + table tr td[class*='nbCoeur2-'");
                let nbCoeur3Array = document.querySelectorAll("." + e.target.id + "-container + table tr td[class*='nbCoeur3-'");
                let ram1Array = document.querySelectorAll("." + e.target.id + "-container + table tr td[class*='ram1-'");
                let ram2Array = document.querySelectorAll("." + e.target.id + "-container + table tr td[class*='ram2-'");
                let ram3Array = document.querySelectorAll("." + e.target.id + "-container + table tr td[class*='ram3-'");
                let garantie1Array = document.querySelectorAll("." + e.target.id + "-container + table tr td[class*='garantie1-'");
                let garantie2Array = document.querySelectorAll("." + e.target.id + "-container + table tr td[class*='garantie2-'");
                let garantie3Array = document.querySelectorAll("." + e.target.id + "-container + table tr td[class*='garantie3-'");

                let priceclassListString, priceIndexOfSpace, imgclassListString, imgIndexOfSpace, formPanierClassListString, formPanierIndexOfSpace, formFavorisClassListString, formFavorisIndexOfSpace, savoirClassListString, savoirIndexOfSpace, largeur1classListString, largeur1IndexOfSpace, largeur2classListString, largeur2IndexOfSpace, largeur3classListString, largeur3IndexOfSpace, longueur1classListString, longueur1IndexOfSpace, longueur2classListString, longueur2IndexOfSpace, longueur3classListString, longueur3IndexOfSpace, pMarque1ClassListString, pMarque1IndexOfSpace, pMarque2ClassListString, pMarque2IndexOfSpace, pMarque3ClassListString, pMarque3IndexOfSpace, nbCoeur1ClassListString, nbCoeur1IndexOfSpace, nbCoeur2ClassListString, nbCoeur2IndexOfSpace, nbCoeur3ClassListString, nbCoeur3IndexOfSpace, ram1ClassListString, ram1IndexOfSpace, ram2ClassListString, ram2IndexOfSpace, ram3ClassListString, ram3IndexOfSpace, garantie1ClassListString, garantie1IndexOfSpace, garantie2ClassListString, garantie2IndexOfSpace, garantie3ClassListString, garantie3IndexOfSpace;
                //let priceclassListString, priceIndexOfSpace, imgclassListString, imgIndexOfSpace;

                console.log(pricesArray);
                console.log(imgArray);

                for (let j = 0; j < pricesArray.length; j++) {
                    //Affichage prix
                    pricesArray[j].classList.add('display-none');

                    priceclassListString = pricesArray[j].classList.toString();
                    priceIndexOfSpace = priceclassListString.indexOf(' ');

                    if (e.target.value === priceclassListString.substring(5, priceIndexOfSpace)) {
                        pricesArray[j].classList.remove('display-none');
                    }

                    //Affichage image
                    imgArray[j].classList.add('display-none');

                    imgclassListString = imgArray[j].classList.toString();
                    imgIndexOfSpace = imgclassListString.indexOf(' ');

                    if (e.target.value === imgclassListString.substring(4, imgIndexOfSpace)) {
                        imgArray[j].classList.remove('display-none');
                    }

                    //Affichage formPanier
                    formPanierArray[j].classList.add('display-none');

                    formPanierClassListString = formPanierArray[j].classList.toString();
                    formPanierIndexOfSpace = formPanierClassListString.indexOf(' ');

                    if (e.target.value === formPanierClassListString.substring(11, formPanierIndexOfSpace)) {
                        formPanierArray[j].classList.remove('display-none');
                    }

                    //Affichage formFavoris
                    formFavorisArray[j].classList.add('display-none');

                    formFavorisClassListString = formFavorisArray[j].classList.toString();
                    formFavorisIndexOfSpace = formFavorisClassListString.indexOf(' ');

                    if (e.target.value === formFavorisClassListString.substring(12, formFavorisIndexOfSpace)) {
                        formFavorisArray[j].classList.remove('display-none');
                    }

                    //Affichage lien en savoir plus
                    savoirArray[j].classList.add('display-none');

                    savoirClassListString = savoirArray[j].classList.toString();
                    savoirIndexOfSpace = savoirClassListString.indexOf(' ');

                    if (e.target.value === savoirClassListString.substring(7, savoirIndexOfSpace)) {
                        savoirArray[j].classList.remove('display-none');
                    }
                    
                    

                    if(e.target.id == "select-1"){
                    
                        //Affichage largeur1
                        largeur1Array[j].classList.add('display-none');
    
                        largeur1classListString = largeur1Array[j].classList.toString();
                        largeur1IndexOfSpace = largeur1classListString.indexOf(' ');
    
                        if (e.target.value === largeur1classListString.substring(9, largeur1IndexOfSpace)) {
                            largeur1Array[j].classList.remove('display-none');
                        }

                        //Affichage longueur1
                        longueur1Array[j].classList.add('display-none');
    
                        longueur1classListString = longueur1Array[j].classList.toString();
                        longueur1IndexOfSpace = longueur1classListString.indexOf(' ');                
    
                        if (e.target.value === longueur1classListString.substring(10, longueur1IndexOfSpace)) {
                            longueur1Array[j].classList.remove('display-none');
                        }     

                        //Affichage pMarque1
                        pMarque1Array[j].classList.add('display-none');
    
                        pMarque1ClassListString = pMarque1Array[j].classList.toString();
                        pMarque1IndexOfSpace = pMarque1ClassListString.indexOf(' ');
    
                        if (e.target.value === pMarque1ClassListString.substring(9, pMarque1IndexOfSpace)) {
                            pMarque1Array[j].classList.remove('display-none');
                        }    

                        //Affichage nbCoeur1
                        nbCoeur1Array[j].classList.add('display-none');
    
                        nbCoeur1ClassListString = nbCoeur1Array[j].classList.toString();
                        nbCoeur1IndexOfSpace = nbCoeur1ClassListString.indexOf(' ');
    
                        if (e.target.value === nbCoeur1ClassListString.substring(9, nbCoeur1IndexOfSpace)) {
                            nbCoeur1Array[j].classList.remove('display-none');
                        }   

                        //Affichage ram1
                        ram1Array[j].classList.add('display-none');
    
                        ram1ClassListString = ram1Array[j].classList.toString();
                        ram1IndexOfSpace = ram1ClassListString.indexOf(' ');
    
                        if (e.target.value === ram1ClassListString.substring(5, ram1IndexOfSpace)) {
                            ram1Array[j].classList.remove('display-none');
                        }   

                        //Affichage garantie1
                        garantie1Array[j].classList.add('display-none');
    
                        garantie1ClassListString = garantie1Array[j].classList.toString();
                        garantie1IndexOfSpace = garantie1ClassListString.indexOf(' ');
    
                        if (e.target.value === garantie1ClassListString.substring(10, garantie1IndexOfSpace)) {
                            garantie1Array[j].classList.remove('display-none');
                        }         
                    }

                    if(e.target.id == "select-2"){
                    
                        //Affichage largeur2
                        largeur2Array[j].classList.add('display-none');
    
                        largeur2classListString = largeur2Array[j].classList.toString();
                        largeur2IndexOfSpace = largeur2classListString.indexOf(' ');
    
                        if (e.target.value === largeur2classListString.substring(9, largeur2IndexOfSpace)) {
                            largeur2Array[j].classList.remove('display-none');
                        }

                        //Affichage longueur2
                        longueur2Array[j].classList.add('display-none');
    
                        longueur2classListString = longueur2Array[j].classList.toString();
                        longueur2IndexOfSpace = longueur2classListString.indexOf(' ');                
    
                        if (e.target.value === longueur2classListString.substring(10, longueur2IndexOfSpace)) {
                            longueur2Array[j].classList.remove('display-none');
                        }   

                        //Affichage pMarque2
                        pMarque2Array[j].classList.add('display-none');
    
                        pMarque2ClassListString = pMarque2Array[j].classList.toString();
                        pMarque2IndexOfSpace = pMarque2ClassListString.indexOf(' ');
    
                        if (e.target.value === pMarque2ClassListString.substring(9, pMarque2IndexOfSpace)) {
                            pMarque2Array[j].classList.remove('display-none');
                        }        

                        //Affichage nbCoeur2
                        nbCoeur2Array[j].classList.add('display-none');
    
                        nbCoeur2ClassListString = nbCoeur2Array[j].classList.toString();
                        nbCoeur2IndexOfSpace = nbCoeur2ClassListString.indexOf(' ');
    
                        if (e.target.value === nbCoeur2ClassListString.substring(9, nbCoeur2IndexOfSpace)) {
                            nbCoeur2Array[j].classList.remove('display-none');
                        }     

                        //Affichage ram2
                        ram2Array[j].classList.add('display-none');
    
                        ram2ClassListString = ram2Array[j].classList.toString();
                        ram2IndexOfSpace = ram2ClassListString.indexOf(' ');
    
                        if (e.target.value === ram2ClassListString.substring(5, ram2IndexOfSpace)) {
                            ram2Array[j].classList.remove('display-none');
                        }    

                        //Affichage garantie2
                        garantie2Array[j].classList.add('display-none');
    
                        garantie2ClassListString = garantie2Array[j].classList.toString();
                        garantie2IndexOfSpace = garantie2ClassListString.indexOf(' ');
    
                        if (e.target.value === garantie2ClassListString.substring(10, garantie2IndexOfSpace)) {
                            garantie2Array[j].classList.remove('display-none');
                        }    
                    }

                    if(e.target.id == "select-3"){
                    
                        //Affichage largeur3
                        largeur3Array[j].classList.add('display-none');
    
                        largeur3classListString = largeur3Array[j].classList.toString();
                        largeur3IndexOfSpace = largeur3classListString.indexOf(' ');
    
                        if (e.target.value === largeur3classListString.substring(9, largeur3IndexOfSpace)) {
                            largeur3Array[j].classList.remove('display-none');
                        }

                        //Affichage longueur3
                        longueur3Array[j].classList.add('display-none');
    
                        longueur3classListString = longueur3Array[j].classList.toString();
                        longueur3IndexOfSpace = longueur3classListString.indexOf(' ');                
    
                        if (e.target.value === longueur3classListString.substring(10, longueur3IndexOfSpace)) {
                            longueur3Array[j].classList.remove('display-none');
                        }  

                        //Affichage pMarque3
                        pMarque3Array[j].classList.add('display-none');
    
                        pMarque3ClassListString = pMarque3Array[j].classList.toString();
                        pMarque3IndexOfSpace = pMarque3ClassListString.indexOf(' ');
    
                        if (e.target.value === pMarque3ClassListString.substring(9, pMarque3IndexOfSpace)) {
                            pMarque3Array[j].classList.remove('display-none');
                        }    

                        //Affichage nbCoeur3
                        nbCoeur3Array[j].classList.add('display-none');
    
                        nbCoeur3ClassListString = nbCoeur3Array[j].classList.toString();
                        nbCoeur3IndexOfSpace = nbCoeur3ClassListString.indexOf(' ');
    
                        if (e.target.value === nbCoeur3ClassListString.substring(9, nbCoeur3IndexOfSpace)) {
                            nbCoeur3Array[j].classList.remove('display-none');
                        }      

                        //Affichage ram3
                        ram3Array[j].classList.add('display-none');
    
                        ram3ClassListString = ram3Array[j].classList.toString();
                        ram3IndexOfSpace = ram3ClassListString.indexOf(' ');
    
                        if (e.target.value === ram3ClassListString.substring(5, ram3IndexOfSpace)) {
                            ram3Array[j].classList.remove('display-none');
                        }   

                        //Affichage garantie3
                        garantie3Array[j].classList.add('display-none');
    
                        garantie3ClassListString = garantie3Array[j].classList.toString();
                        garantie3IndexOfSpace = garantie3ClassListString.indexOf(' ');
    
                        if (e.target.value === garantie3ClassListString.substring(10, garantie3IndexOfSpace)) {
                            garantie3Array[j].classList.remove('display-none');
                        }         
                    }
                }
            });
        }
    }
};

let panierHover = document.querySelector("#logoPanier img");
console.log(panierHover);
if (panierHover) {

    panierHover.addEventListener("mouseover", changeImgUrl);
    function changeImgUrl(evt) {
        newImg = document.createElement("img");
        newImg.setAttribute("src", "img/panierRose.png");
        newImg.setAttribute("alt", "panier");
        evt.target.parentNode.insertAdjacentElement("beforeend", newImg);
        evt.target.remove();
        let panierRoseHover = document.querySelector("#logoPanier img");
        //console.log(panierRoseHover);
        panierRoseHover.addEventListener("mouseout", resetUrl);
    }
    function resetUrl(evt) {
        newImg = document.createElement("img");
        newImg.setAttribute("src", "img/panier.png");
        newImg.setAttribute("alt", "panier");
        evt.target.parentNode.insertAdjacentElement("beforeend", newImg);
        evt.target.remove();
        let panierResetHover = document.querySelector("#logoPanier img");
        panierResetHover.addEventListener("mouseover", changeImgUrl);
    }
}

let main = document.querySelector("main");
if (main.id == "index" || main.id == "traitement") {
    let imgActuel = 0;
    imgVu();

    function imgVu() {
        let i;
        let img = document.getElementsByClassName("imgCaroussel");
        for (i = 0; i < img.length; i++) {
            img[i].style.display = "none";
        }
        imgActuel++;
        if (imgActuel > img.length) { imgActuel = 1 }
        img[imgActuel - 1].style.display = "block";
        setTimeout(imgVu, 5000);
    }
}