window.onload = function () {
    let selectMenu = document.querySelectorAll(".compareSelect");
    

    for (let i = 0; i < selectMenu.length; i++) {

        if (selectMenu[i] != undefined) {
            selectMenu[i].addEventListener('change', function (e) {

                let pricesArray = document.querySelectorAll("#" + e.target.id + " ~ p[class*='prix-'");
                let imgArray = document.querySelectorAll("#" + e.target.id + " ~ img[class*='img-'");
                let formPanierArray = document.querySelectorAll("#" + e.target.id + " ~ form[class*='formPanier-'");
                let formFavorisArray = document.querySelectorAll("#" + e.target.id + " ~ form[class*='formFavoris-'");
                let savoirArray = document.querySelectorAll("#" + e.target.id + " ~ a[class*='savoir-'");

                let largeur1Array = document.querySelector("." + e.target.id + "-container + table tr td.largeur1");
                let largeur2Array = document.querySelector("." + e.target.id + "-container + table tr td.largeur2");
                let largeur3Array = document.querySelector("." + e.target.id + "-container + table tr td.largeur3");
                let pLargeur = document.querySelectorAll("p[class*='largeur-'");

                let longueur1Array = document.querySelector("." + e.target.id + "-container + table tr td.longueur1");
                let longueur2Array = document.querySelector("." + e.target.id + "-container + table tr td.longueur2");
                let longueur3Array = document.querySelector("." + e.target.id + "-container + table tr td.longueur3");
                let pLongueur = document.querySelectorAll("p[class*='longueur-'");

                let pMarque1Array = document.querySelector("." + e.target.id + "-container + table tr td.pMarque1");
                let pMarque2Array = document.querySelector("." + e.target.id + "-container + table tr td.pMarque2");
                let pMarque3Array = document.querySelector("." + e.target.id + "-container + table tr td.pMarque3");
                let pMarque = document.querySelectorAll("p[class*='pMarque-'");

                let nbCoeur1Array = document.querySelector("." + e.target.id + "-container + table tr td.nbCoeur1");
                let nbCoeur2Array = document.querySelector("." + e.target.id + "-container + table tr td.nbCoeur2");
                let nbCoeur3Array = document.querySelector("." + e.target.id + "-container + table tr td.nbCoeur3");
                let pCoeur = document.querySelectorAll("p[class*='nbCoeur-'");
                
                let ram1Array = document.querySelector("." + e.target.id + "-container + table tr td.ram1");
                let ram2Array = document.querySelector("." + e.target.id + "-container + table tr td.ram2");
                let ram3Array = document.querySelector("." + e.target.id + "-container + table tr td.ram3");
                let pRam = document.querySelectorAll("p[class*='ram-'");

                let garantie1Array = document.querySelector("." + e.target.id + "-container + table tr td.garantie1");
                let garantie2Array = document.querySelector("." + e.target.id + "-container + table tr td.garantie2");
                let garantie3Array = document.querySelector("." + e.target.id + "-container + table tr td.garantie3");
                let pGarantie = document.querySelectorAll("p[class*='garantie-'");

                let priceclassListString, priceIndexOfSpace, imgclassListString, imgIndexOfSpace, formPanierClassListString, formPanierIndexOfSpace, 
                    formFavorisClassListString, formFavorisIndexOfSpace, savoirClassListString, savoirIndexOfSpace, largeurclassListString, largeurIndexOfSpace, 
                    longueurclassListString, longueurIndexOfSpace,  pMarqueClassListString, pMarqueIndexOfSpace, nbCoeurClassListString, nbCoeurIndexOfSpace, 
                    ramClassListString, ramIndexOfSpace,  garantieClassListString, garantieIndexOfSpace;

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

                    //Affichage des éléments du premier select

                    if(e.target.id == "select-1"){
                        //Affichage largeur1
                        largeurclassListString = pLargeur[j].classList.toString();
                        largeurIndexOfSpace = largeurclassListString.indexOf(' ');

                        if (e.target.value == largeurclassListString.substring(8, largeurIndexOfSpace)) {
                            largeur1Array.innerHTML = pLargeur[j].innerHTML + " cm";
                        }
    
                        //Affichage longueur1
                        longueurclassListString = pLongueur[j].classList.toString();
                        longueurIndexOfSpace = longueurclassListString.indexOf(' ');

                        if (e.target.value == longueurclassListString.substring(9, longueurIndexOfSpace)) {
                            longueur1Array.innerHTML = pLongueur[j].innerHTML + " cm";
                        }
    
                        //Affichage pMarque1
                        pMarqueClassListString = pMarque[j].classList.toString();
                        pMarqueIndexOfSpace = pMarqueClassListString.indexOf(' ');

                        if (e.target.value == pMarqueClassListString.substring(8, pMarqueIndexOfSpace)) {
                            pMarque1Array.innerHTML = pMarque[j].innerHTML;
                        }
    
                        //Affichage nbCoeur1
                        nbCoeurClassListString = pCoeur[j].classList.toString();
                        nbCoeurIndexOfSpace = nbCoeurClassListString.indexOf(' ');

                        if (e.target.value == nbCoeurClassListString.substring(8, nbCoeurIndexOfSpace)) {
                            nbCoeur1Array.innerHTML = pCoeur[j].innerHTML;
                        }
    
                        //Affichage ram1
                        ramClassListString = pRam[j].classList.toString();
                        ramIndexOfSpace = ramClassListString.indexOf(' ');

                        if (e.target.value == ramClassListString.substring(4, ramIndexOfSpace)) {
                            ram1Array.innerHTML = pRam[j].innerHTML + " Go";
                        }
    
                        //Affichage garantie1
                        garantieClassListString = pGarantie[j].classList.toString();
                        garantieIndexOfSpace = garantieClassListString.indexOf(' ');

                        if (e.target.value == garantieClassListString.substring(9, garantieIndexOfSpace)) {
                            garantie1Array.innerHTML = pGarantie[j].innerHTML;
                        }     
                    }

                    //Affichage des éléments du deuxième select

                    if(e.target.id == "select-2"){
                        //Affichage largeur2
                        largeurclassListString = pLargeur[j].classList.toString();
                        largeurIndexOfSpace = largeurclassListString.indexOf(' ');

                        if (e.target.value == largeurclassListString.substring(8, largeurIndexOfSpace)) {
                            largeur2Array.innerHTML = pLargeur[j].innerHTML + " cm";
                        }
    
                        //Affichage longueur2
                        longueurclassListString = pLongueur[j].classList.toString();
                        longueurIndexOfSpace = longueurclassListString.indexOf(' ');

                        if (e.target.value == longueurclassListString.substring(9, longueurIndexOfSpace)) {
                            longueur2Array.innerHTML = pLongueur[j].innerHTML + " cm";
                        }
    
                        //Affichage pMarque2
                        pMarqueClassListString = pMarque[j].classList.toString();
                        pMarqueIndexOfSpace = pMarqueClassListString.indexOf(' ');

                        if (e.target.value == pMarqueClassListString.substring(8, pMarqueIndexOfSpace)) {
                            pMarque2Array.innerHTML = pMarque[j].innerHTML;
                        }
    
                        //Affichage nbCoeur2
                        nbCoeurClassListString = pCoeur[j].classList.toString();
                        nbCoeurIndexOfSpace = nbCoeurClassListString.indexOf(' ');

                        if (e.target.value == nbCoeurClassListString.substring(8, nbCoeurIndexOfSpace)) {
                            nbCoeur2Array.innerHTML = pCoeur[j].innerHTML;
                        }
    
                        //Affichage ram2
                        ramClassListString = pRam[j].classList.toString();
                        ramIndexOfSpace = ramClassListString.indexOf(' ');

                        if (e.target.value == ramClassListString.substring(4, ramIndexOfSpace)) {
                            ram2Array.innerHTML = pRam[j].innerHTML + " Go";
                        }
    
                        //Affichage garantie2
                        garantieClassListString = pGarantie[j].classList.toString();
                        garantieIndexOfSpace = garantieClassListString.indexOf(' ');

                        if (e.target.value == garantieClassListString.substring(9, garantieIndexOfSpace)) {
                            garantie2Array.innerHTML = pGarantie[j].innerHTML;
                        }
                    }

                    //Affichage des éléments du troisième select

                    if(e.target.id == "select-3"){
                        //Affichage largeur3
                        largeurclassListString = pLargeur[j].classList.toString();
                        largeurIndexOfSpace = largeurclassListString.indexOf(' ');

                        if (e.target.value == largeurclassListString.substring(8, largeurIndexOfSpace)) {
                            largeur3Array.innerHTML = pLargeur[j].innerHTML + " cm";
                        }
    
                        //Affichage longueur3
                        longueurclassListString = pLongueur[j].classList.toString();
                        longueurIndexOfSpace = longueurclassListString.indexOf(' ');

                        if (e.target.value == longueurclassListString.substring(9, longueurIndexOfSpace)) {
                            longueur3Array.innerHTML = pLongueur[j].innerHTML + " cm";
                        }
    
                        //Affichage pMarque3
                        pMarqueClassListString = pMarque[j].classList.toString();
                        pMarqueIndexOfSpace = pMarqueClassListString.indexOf(' ');

                        if (e.target.value == pMarqueClassListString.substring(8, pMarqueIndexOfSpace)) {
                            pMarque3Array.innerHTML = pMarque[j].innerHTML;
                        }
    
                        //Affichage nbCoeur3
                        nbCoeurClassListString = pCoeur[j].classList.toString();
                        nbCoeurIndexOfSpace = nbCoeurClassListString.indexOf(' ');

                        if (e.target.value == nbCoeurClassListString.substring(8, nbCoeurIndexOfSpace)) {
                            nbCoeur3Array.innerHTML = pCoeur[j].innerHTML;
                        }
    
                        //Affichage ram3
                        ramClassListString = pRam[j].classList.toString();
                        ramIndexOfSpace = ramClassListString.indexOf(' ');

                        if (e.target.value == ramClassListString.substring(4, ramIndexOfSpace)) {
                            ram3Array.innerHTML = pRam[j].innerHTML + " Go";
                        }
    
                        //Affichage garantie3
                        garantieClassListString = pGarantie[j].classList.toString();
                        garantieIndexOfSpace = garantieClassListString.indexOf(' ');

                        if (e.target.value == garantieClassListString.substring(9, garantieIndexOfSpace)) {
                            garantie3Array.innerHTML = pGarantie[j].innerHTML;
                        }
                    }
                }
            });

            selectMenu[i].querySelectorAll('option')[i].selected = 'selected';
            selectMenu[i].dispatchEvent(new Event('change'));
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

let userHover = document.querySelector("#userIcon");
console.log(userHover);
if (userHover) {
    userHover.addEventListener("mouseover", changeImgUrlUser);
    function changeImgUrlUser(evt) {
        newImg = document.createElement("img");
        newImg.setAttribute("src","img/userIconRose.png");
        newImg.setAttribute("alt","user");
        newImg.setAttribute("id","userIcon");
        evt.target.parentNode.insertAdjacentElement("beforeend",newImg);
        evt.target.remove();
        let userRoseHover = document.querySelector("#userIcon");
        //console.log(userRoseHover);
        userRoseHover.addEventListener("mouseout", resetUrlUser);
        userRoseHover.addEventListener("click", addClassUser);

        
    }
    function resetUrlUser(evt) {
        newImg = document.createElement("img");
        newImg.setAttribute("src","img/userIcon.png");
        newImg.setAttribute("alt","user");
        newImg.setAttribute("id","userIcon");
        evt.target.parentNode.insertAdjacentElement("beforeend",newImg);
        evt.target.remove();

        let menuUser = document.querySelector("#menuUser");
        if (!menuUser.classList.contains("display-none")) {
            menuUser.classList.add("display-none");
        }
        let userResetHover = document.querySelector("#userIcon");
        userResetHover.addEventListener("mouseover", changeImgUrlUser);
        console.log( userResetHover);
    }

    function addClassUser(evt) {
        let menuUser = document.querySelector("#menuUser");
        console.log( menuUser);
        menuUser.classList.remove("display-none");
        evt.target.removeEventListener("mouseout", resetUrlUser);
        evt.target.addEventListener("click", resetUrlUser);
   
    }
}

let burgerHover = document.querySelector("#hamburger");

console.log(burgerHover);
if (burgerHover) {
    burgerHover.addEventListener("mouseover", changeImgUrlBurger);
    function changeImgUrlBurger(evt) {
        newImg = document.createElement("img");
        newImg.setAttribute("src","img/hamburgerIconRose.png");
        newImg.setAttribute("alt","burger");
        newImg.setAttribute("id","hamburger");
        evt.target.parentNode.insertAdjacentElement("beforeend",newImg);
        evt.target.remove();
        let burgerRoseHover = document.querySelector("#hamburger");
        //console.log(panierRoseHover);
        burgerRoseHover.addEventListener("mouseout", resetUrlBurger);
        burgerRoseHover.addEventListener("click", addClassBurger);
    }
    function resetUrlBurger(evt) {
        newImg = document.createElement("img");
        newImg.setAttribute("src","img/hamburgerIcon.png");
        newImg.setAttribute("alt","panier");
        newImg.setAttribute("id","hamburger");
        evt.target.parentNode.insertAdjacentElement("beforeend",newImg);
        evt.target.remove();

        let menuBurger = document.querySelector("#menuBurger");
        if (!menuBurger.classList.contains("display-none")) {
            menuBurger.classList.add("display-none");
        }
        let burgerResetHover = document.querySelector("#hamburger");
        burgerResetHover.addEventListener("mouseover", changeImgUrlBurger);
    }
    function addClassBurger(evt) {
        let menuBurger = document.querySelector("#menuBurger");
        console.log( menuBurger);
        menuBurger.classList.remove("display-none");
        evt.target.removeEventListener("mouseout", resetUrlBurger);
        evt.target.addEventListener("click", resetUrlBurger);
   
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


