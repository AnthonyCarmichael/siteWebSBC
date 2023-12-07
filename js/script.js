window.onload = function() {
    let selectMenu = document.querySelector("article select[name='sbc']");

    if (selectMenu != null) {
        selectMenu.addEventListener('change', function() {
            let pricesArray = document.querySelectorAll("p[class*='prix-']");
            let classListString, indexOfSpace;

            for (let i = 0; i < pricesArray.length; i++) {
                pricesArray[i].classList.add('display-none');

                classListString = pricesArray[i].classList.toString();
                indexOfSpace = classListString.indexOf(' ');

                if (selectMenu.value === classListString.substring(5, indexOfSpace)) {
                    pricesArray[i].classList.remove('display-none');
                }
            }
        });
    }

};