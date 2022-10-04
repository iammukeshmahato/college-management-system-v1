let phone = document.querySelector("#phone");
let PhoneErrorMsg = document.querySelector(".errorMsg");
let DOBErrorMsg = document.querySelector("#DOBErrorMsg");
let btn = document.querySelector("#submitBtn");

let allInput = document.querySelectorAll("input[type=text]");

if(btn == null){
    btn = document.querySelector("#updateBtn");
}

// let dob = document.querySelector("#dob");

phone.addEventListener("input", (e) => {
    const regex = /^9[678]{1}[0-9]{8}$/;
    if (regex.test(phone.value)) {
        phone.classList.remove("invalid");
        PhoneErrorMsg.style.display = "none";
        btn.removeAttribute("disabled");
        console.log(phone.classList);
    } else {
        phone.classList.add("invalid");
        // console.log(phone.value);
        console.log(phone.classList);
        PhoneErrorMsg.style.display = "block";
        btn.setAttribute("disabled" ,"");
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

allInput.forEach(elem => {
    let regEx = /<script>/;
    elem.addEventListener("input", ()=>{
        if(regEx.test(elem.value)){
            elem.classList.add("invalid");
            btn.setAttribute("disabled" ,"");
        }else{
            elem.classList.remove("invalid");
            btn.removeAttribute("disabled");
        }
    })
})
