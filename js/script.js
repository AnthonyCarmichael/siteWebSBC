window.onload = function() {
    //let selectMenu = document.querySelector("article select[name='sbc']");
    let selectMenu = document.querySelectorAll(".compareSelect");

    for(let i = 0; i < selectMenu.length; i++){

        if (selectMenu[i] != null) {
            selectMenu[i].addEventListener('change', function(e) {
                let idSelect = e.target.id.toString().charAt(e.target.id.toString().length - 1);

                let pricesArray = document.querySelectorAll("p[class*='prix-']")[idSelect];
                let imgArray = document.querySelectorAll("img[class*='img-']")[idSelect];
                let priceclassListString, priceIndexOfSpace, imgclassListString, imgIndexOfSpace;

                for (let i = 0; i < pricesArray.length; i++) {
                    pricesArray[i].classList.add('display-none');
                    imgArray[i].classList.add('display-none');

                    priceclassListString = pricesArray[i].classList.toString();
                    priceIndexOfSpace = priceclassListString.indexOf(' ');

                    imgclassListString = imgArray[i].classList.toString();
                    imgIndexOfSpace = imgclassListString.indexOf(' ');

                    if (selectMenu[i].value === priceclassListString.substring(5, priceIndexOfSpace)) {
                        pricesArray[i].classList.remove('display-none');
                    }

                    if (selectMenu[i].value === imgclassListString.substring(4, imgIndexOfSpace)) {
                        imgArray[i].classList.remove('display-none');
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
        newImg.setAttribute("src","img/panierRose.png");
        newImg.setAttribute("alt","panier");
        evt.target.parentNode.insertAdjacentElement("beforeend",newImg);
        evt.target.remove();
        let panierRoseHover = document.querySelector("#logoPanier img");
    //console.log(panierRoseHover);
        panierRoseHover.addEventListener("mouseout", resetUrl);
    }
    function resetUrl(evt) {
        newImg = document.createElement("img");
        newImg.setAttribute("src","img/panier.png");
        newImg.setAttribute("alt","panier");
        evt.target.parentNode.insertAdjacentElement("beforeend",newImg);
        evt.target.remove();
        let panierResetHover = document.querySelector("#logoPanier img");
        panierResetHover.addEventListener("mouseover", changeImgUrl);
    }
}

let main = document.querySelector("main");
if(main.id == "index")
{
    let imgActuel = 0;
    imgVu();
    
    function imgVu() {
      let i;
      let img = document.getElementsByClassName("imgCaroussel");
      for (i = 0; i < img.length; i++) {
        img[i].style.display = "none";
      }
      imgActuel++;
      if (imgActuel > img.length) {imgActuel = 1}
      img[imgActuel-1].style.display = "block";
      setTimeout(imgVu, 5000);
    }
}
