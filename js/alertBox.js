let alertBox = document.querySelector(".alertBox");
let closeBtn = document.querySelector(".btn-close");

// console.log(closeBtn);

setTimeout(() => {
    alertBox.style.display = "none";
}, 5000);

closeBtn.addEventListener("click", () => {
    alertBox.style.display = "none";
});