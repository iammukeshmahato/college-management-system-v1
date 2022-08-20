let phone = document.querySelector("#phone");
let PhoneErrorMsg = document.querySelector(".errorMsg");
let DOBErrorMsg = document.querySelector("#DOBErrorMsg");
// let dob = document.querySelector("#dob");

phone.addEventListener("blur", (e) => {
    console.log("Blur event fired");
    const regex = /^9[678]{1}[0-9]{8}$/;
    if (regex.test(phone.value)) {
        phone.classList.remove("invalid");
        PhoneErrorMsg.style.display = "none";
    } else {
        phone.classList.add("invalid");
        PhoneErrorMsg.style.display = "block";

    }

})

// dob.addEventListener("blur", () => {
//     let currentDate = new Date();
//     let selectedDOB = new Date(dob.value);
//     let diff_in_sec = (currentDate.getTime() - selectedDOB.getTime()) / 1000;
//     let year = (diff_in_sec / 86400) / 365;

//     if (year >= 14) {
//         dob.classList.remove("invalid");
//         DOBErrorMsg.style.display = "none";
//     } else {
//         dob.classList.add("invalid");
//         DOBErrorMsg.style.display = "block";

//     }
// })