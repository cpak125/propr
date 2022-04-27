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

