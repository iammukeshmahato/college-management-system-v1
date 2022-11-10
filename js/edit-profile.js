let editNameForm = document.querySelector("#nameForm");
let editUsernameForm = document.querySelector("#usernameForm");
const rootURL = `http://${document.location.hostname}/${document.location.pathname.split("/")[1]}/`;

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
        xhr.open("POST", `${rootURL}php/update_admin_name.php`, true);

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
        xhr.open("POST", `${rootURL}php/update_admin_username.php`, true);

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

let showHideBtn = document.querySelectorAll(".hideShowBtn");
let password = document.querySelectorAll(".pass");

// adding click event to all the showhide btn
showHideBtn.forEach((btn, index) => {
    btn.addEventListener("click", () => {
        // console.log(`button ${index} is clicked`);
        if (password[index].type == "password") {
            password[index].type = "text";
            btn.style = `background-image: url("${rootURL}/img/show.png")`;
        } else {
            password[index].type = "password";
            btn.style = `background-image: url("${rootURL}/img/hide.png")`;
        }
    })
})

function checkPassword() {
    let newPass = document.getElementById("newPassword").value;
    let cPass = document.getElementById("confirmPassword").value;
    let cPassError = document.getElementById("cPassErrpr");
    if (newPass != "" && cPass != "") {
        if (newPass !== cPass) {
            cPassError.style.display = "block";
            cPassError.style.color = "red";
            cPassError.innerText = "Password does not matched";
            // console.log("password doesnot maatch");
        } else {
            cPassError.style.display = "block";
            cPassError.innerText = "Password Matched";
            cPassError.style.color = "green";
            // console.log("matched");
        }
    } else {
        cPassError.style.display = "none";
    }
}

let passwordForm = document.getElementById("changePasswordForm");
// console.log(PasswordForm);
passwordForm.addEventListener("submit", (e) => {
    e.preventDefault();
    // console.log("changePasswordForm submitted");

    let xhr = new XMLHttpRequest();
    xhr.open("POST", `${rootURL}php/update_admin_password.php`, true);
    xhr.onload = () => {
        // console.log("loaded");
        // console.log(xhr.responseText);

        if (xhr.responseText === "updated successfully") {
            // console.log("password changed successfully");
            passwordForm.reset();
            document.getElementById("cPassErrpr").style.display = "none";
            document.getElementById("currentPassError").style.display = "none";

            document.querySelector(".succss-wrapper").style.display = "block";
            setTimeout(() => {
                document.querySelector(".succss-wrapper").style.display = "none";
            }, 2000);

        } else {
            // if(xhr.responseText === "not mathced"){
            // if current password is not matched
            // console.log("line 163 not matched");

            document.getElementById("currentPassError").style.display = "block";

            // show updated successfully popup

        }

    }

    let formData = new FormData(passwordForm);
    xhr.send(formData);
})