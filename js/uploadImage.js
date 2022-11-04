let imageInput = document.getElementById("uploadImage");
const img = document.querySelectorAll('#avtar');
const profileForm = document.getElementById("imageUploadForm");
const profilePicError = document.getElementById("pp-error");

imageInput.addEventListener("change", function () {
    const choosedFile = this.files[0];
    if (choosedFile) {
        const reader = new FileReader(); //FileReader is a predefined function of JS
        reader.addEventListener('load', function () {

            const url = "http://localhost/minor%20project/php/uploadImage.php";
            const xhr = new XMLHttpRequest();

            xhr.open("POST", url, true);

            xhr.onprogress = () => {
                console.log("progress");
                // loading animation will be added
            }

            xhr.onload = () => {
                if (xhr.responseText === "OK") {
                    profilePicError.style.visibility = "hidden";
                    img[1].style = "border:2px solid; border-color:#00c300;";
                    location.reload();
                } else {
                    profilePicError.innerHTML = xhr.responseText;
                    img[1].style = "border-color:red";
                    profilePicError.style.visibility = "visible";
                }
            }

            let dataToSend = new FormData(document.getElementById("imageUploadForm"))
            xhr.send(dataToSend);

            img[1].setAttribute('src', reader.result);      // [1] because we have 2 images with id avtar,
        });
        reader.readAsDataURL(choosedFile);
    } else {
        img.setAttribute('src', "./img/Mukesh Mahato Facebook PP.jpeg");
    }
})
