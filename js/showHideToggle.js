let showHideBtn = document.getElementById("ShowHideToggle");
let password = document.getElementById("password")

showHideBtn.addEventListener("click", () => {
    if (password.type == "password") {
        password.type = "text";
        showHideBtn.src = "./img/show.png";
    } else {
        password.type = "password";
        showHideBtn.src = "./img/hide.png";
    }
})