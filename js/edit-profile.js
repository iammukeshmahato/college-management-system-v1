let editNameForm = document.querySelector("#nameForm");
let editUsernameForm = document.querySelector("#usernameForm");

editNameForm.addEventListener("submit", e => e.preventDefault());
editUsernameForm.addEventListener("submit", e => e.preventDefault());

showPopupWrapper = () => document.querySelector(".popup-wrapper").classList.add("display-flex");
hidePopupWrapper = () => document.querySelector(".popup-wrapper").classList.remove("display-flex");

function cancelForm(params) {

    // clearing previously displayed error message
    document.getElementById("nameErrorMsg").innerHTML = "";
    document.getElementById("usernameErrorMsg").innerHTML = "";

    // hiding errorMsg Div
    document.getElementById("nameErrorMsg").style.display = "none";
    document.getElementById("usernameErrorMsg").style.display = "none";

    document.querySelector(`.${params}`).classList.remove("display-block");
    hidePopupWrapper();
}

function nameEditBtnClick() {
    showPopupWrapper();
    document.querySelector(".popup-name").classList.add("display-block");
    document.getElementById("admin_name").value = document.getElementById("updateName").innerText;
    nameFormonSubmit();
}


function usernameEditBtnClick() {
    showPopupWrapper();
    document.querySelector(".popup-username").classList.add("display-block");
    document.getElementById("admin_username").value = document.getElementById("updateUsername").innerText;
    usernameFormOnSumbim();
}

function nameFormonSubmit() {

    editNameForm.addEventListener("submit", (e) => {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "http://localhost/minor%20project/php/update_admin_name.php", true);

        xhr.onload = () => {
            if (xhr.status == 200) {

                let data = xhr.responseText.split("\n");
                // data = [isValid, ErrorMsg, userInput];

                // if there is error in input i.e data[0] = 0;
                document.getElementById("admin_name").value = data[2];      // if error, setting the userinput to the input field
                if (data[0] == 0) {
                    // show error message
                    let nameErrorDiv = document.getElementById("nameErrorMsg");
                    nameErrorDiv.style.display = "block";
                    nameErrorDiv.innerText = data[1];
                } else {
                    document.querySelector(".popup-wrapper").classList.remove("display-flex");
                    document.querySelector(".popup-name").classList.remove("display-block");

                    document.getElementById("updateName").innerHTML = data[2] + `<span id="editName" onclick="nameEditBtnClick()"></span>`;

                    // reloading page after changing the name, so that it can be reflected in sidebar
                    location.reload();
                }
            }
        };

        let form = new FormData(editNameForm);
        xhr.send(form);

    })
}

function usernameFormOnSumbim() {
    document.getElementById("usernameForm").addEventListener("submit", (e) => {

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "http://localhost/minor%20project/php/update_admin_username.php", true);

        xhr.onload = () => {

            if (xhr.status == 200) {
                let data = xhr.responseText.split("\n");

                // if there is error in input
                document.getElementById("admin_username").value = data[2];
                if (data[0] == 0) {
                    // show error message
                    let usernameErrorDiv = document.getElementById("usernameErrorMsg");
                    usernameErrorDiv.style.display = "block";
                    usernameErrorDiv.innerText = data[1];
                } else {
                    hidePopupWrapper();
                    let usernameErrorDiv = document.getElementById("usernameErrorMsg");
                    usernameErrorDiv.style.display = "none";
                    usernameErrorDiv.innerText = "";
                    document.querySelector(".popup-username").classList.remove("display-block");

                    document.getElementById("updateUsername").innerHTML = data[2] + `<span id="editName" onclick="usernameEditBtnClick()"></span>`;
                }
            }
        };

        let form = new FormData(editUsernameForm);
        xhr.send(form);
    })
}