"use strict"

let alert = document.querySelector('.alert');
let regon = document.querySelector('.regon');
let reg = document.querySelector('.reg');
let regbtn = document.querySelector('.regbtn');
const label = document.querySelector('.label-auth');
let auth = document.querySelector('.hiden');
let authform = document.querySelector('.form');
regon.addEventListener('click', function input(){
    if (regon.textContent == 'Зарегистрироваться'){
        reg.style.display = "block";
        regbtn.setAttribute('value', 'Регистрация');
        regon.innerHTML = 'Войти';
        label.innerHTML = "Регистрация";
        auth.checked = false;
    } else {
        reg.style.display = "none";
        regbtn.setAttribute('value', 'Войти');
        regon.innerHTML = 'Зарегистрироваться';
        label.innerHTML = "Авторизация";
        auth.checked = true;
    }
})
authform.onsubmit = function(event){
    event.preventDefault();
    sendForm(authform); 
}

function sendForm(form){
    let formData = new FormData(form);
    fetch(form.action, {
        method: form.method,
        body: formData,
    })
    .then((response) => {
        if (response.ok){
            return response.text();
        } else {
            console.error("Ошибка HTTP: " + response.status);
        }
    })
    .then((result) => {
        if (result == "ok"){
            location.href = "index.php";
        } else {
          showErrorText(result);
        }
    })
}


 
// let addShop = document.querySelector(".add-shop");
// addShop.addEventListener("click", function(){
//     location.href = "addshop.php";
// });

