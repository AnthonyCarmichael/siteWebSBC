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