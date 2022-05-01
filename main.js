function closeModal(id) {
    let modal = document.getElementById(id);
    let inputs = modal.getElementsByTagName("input");
    if (id == "add-prop") {
        for (let i = 0; i < 7; i++) {
            inputs[i].value = "";
        }
    }

    modal.style.display = "none";
}

function showModal(id) {
    document.getElementById(id).style.display = "block"
}

function checkType() {
    let inputVal = document.getElementById("card-num").value;
    let subStr = inputVal.substring(0, 2);
    let numeric = parseInt(subStr);

    if (51 <= numeric && numeric <= 55) {
        insertType("mastercard", "red");
    } else if (subStr.charAt(0) == '4') {
        insertType("visa", "navy");
    } else if (subStr.charAt(0) == '6') {
        insertType("discover", "orange");
    } else if (numeric == 34 || numeric == 37) {
        insertType("amex", "blue");
    } else {
        insertType("none", "none")
    }
}

function insertType(logo, color) {
    let cardLogo = document.getElementById("card-logo")
    if (logo == "none") {
        cardLogo.innerHTML = "";
    }
    cardLogo.innerHTML = `<i class='fa-brands fa-7x fa-cc-${ logo }' style='color:${ color };'></i>`;
}