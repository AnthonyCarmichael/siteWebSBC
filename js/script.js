window.onload = function() {
    //let selectMenu = document.querySelector("article select[name='sbc']");
    let selectMenu = document.querySelectorAll("compareSelect");

    for(let i = 0; selectMenu.length; i++){

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