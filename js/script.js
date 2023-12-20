window.onload = function () {
    //let selectMenu = document.querySelector("article select[name='sbc']");
    let selectMenu = document.querySelectorAll(".compareSelect");


    for (let i = 0; i < selectMenu.length; i++) {

        if (selectMenu[i] != undefined) {
            selectMenu[i].addEventListener('change', function (e) {
                //let idSelect = e.target.id.toString().charAt(e.target.id.toString().length - 1);

                let pricesArray = document.querySelectorAll("#" + e.target.id + " ~ p[class*='prix-'");
                let imgArray = document.querySelectorAll("#" + e.target.id + " ~ img[class*='img-'");
                let priceclassListString, priceIndexOfSpace, imgclassListString, imgIndexOfSpace;

                console.log(pricesArray);
                console.log(imgArray);

                for (let j = 0; j < pricesArray.length; j++) {
                    pricesArray[j].classList.add('display-none');

                    priceclassListString = pricesArray[j].classList.toString();
                    priceIndexOfSpace = priceclassListString.indexOf(' ');

                    if (e.target.value === priceclassListString.substring(5, priceIndexOfSpace)) {
                        pricesArray[j].classList.remove('display-none');
                    }
                }

                for (let j = 0; j < imgArray.length; j++) {
                    imgArray[j].classList.add('display-none');

                    imgclassListString = imgArray[j].classList.toString();
                    imgIndexOfSpace = imgclassListString.indexOf(' ');

                    if (e.target.value === imgclassListString.substring(4, imgIndexOfSpace)) {
                        imgArray[j].classList.remove('display-none');
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

let infoSup = document.querySelectorAll("#infoSup");
let nomSBC = document.querySelectorAll("#nom");
for (let i = 0; i < nomSBC.length; i++){
nomSBC[i].addEventListener("click", afficheInfo);
}

function afficheInfo(evt){
evt.target.parentElement.parentElement.nextElementSibling.classList.toggle("display-none")
}

let poubelleHover = document.querySelector("#poubelle img");
console.log(poubelleHover);
if (poubelleHover) {
    poubelleHover.addEventListener("mouseover", changeImgUrl);
    function changeImgUrl(evt) {
        newImg = document.createElement("img");
        newImg.setAttribute("src", "img/corbeilleRose.png");
        newImg.setAttribute("alt", "poubelle");
        evt.target.parentNode.insertAdjacentElement("beforeend", newImg);
        evt.target.remove();
        let poubelleRoseHover = document.querySelector("#poubelle img");
        //console.log(panierRoseHover);
        poubelleRoseHover.addEventListener("mouseout", resetUrl);
    }
    function resetUrl(evt) {
        newImg = document.createElement("img");
        newImg.setAttribute("src", "img/corbeille.png");
        newImg.setAttribute("alt", "poubelle");
        evt.target.parentNode.insertAdjacentElement("beforeend", newImg);
        evt.target.remove();
        let poubelleResetHover = document.querySelector("#poubelle img");
        poubelleResetHover.addEventListener("mouseover", changeImgUrl);
    }
}
