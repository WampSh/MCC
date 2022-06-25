"use strict"

let alert = document.querySelector('.alert');
let regon = document.querySelector('.regon');
let reg = document.querySelector('.reg');
let regbtn = document.querySelector('.regbtn');
const label = document.querySelector('.label-auth');
let auth = document.querySelector('.hiden');
let authform = document.querySelector('.form');
let cat = document.querySelector('.catt');
let temp = document.querySelector('.temp');
const adduser = document.querySelector('.add-user');
const addUserWindow = document.querySelector('.add-user-window');
const error = document.querySelector('.error');
const flymenu = document.querySelector('.flymenu');
let mcc = document.querySelector('.mcc');
let cattemp;
let invisform = document.querySelector('.invisform');
const shop = document.querySelector('.shop');

const spanstart = '<span class=\"grey\">';
const spanend = '</span>';
let flag = 0;
adduser.addEventListener('click', function addUser(){

    addUserWindow.style.display = "block";
})

// Change request for registration or signin 

regon.addEventListener('click', function input(){
    if (regon.textContent == 'Зарегистрироваться'){
        reg.style.display = "block";
        regbtn.setAttribute('value', 'Регистрация');
        regon.innerHTML = 'Войти';
        label.innerHTML = "Регистрация";
        error.innerHTML = "";
        auth.checked = false;
    } else {
        reg.style.display = "none";
        regbtn.setAttribute('value', 'Войти');
        regon.innerHTML = 'Зарегистрироваться';
        label.innerHTML = "Авторизация";
        error.innerHTML = "";
        auth.checked = true;
    }
})

//Send form for registration or signin 
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
            return response.json();
        } else {
            console.error("Ошибка HTTP: " + response.status);
        }
    })
    .then((result) => {
        if (result.error){
            error.innerHTML = result.error;
        } else if (result.OK == "ok"){
            addUserWindow.style.display = "none";}
        else console.log("Ошибка");
    })
}

// Flying menu for help

cat.oninput = function (){
    cattemp == undefined ? rqstPostForTempTable("cat") : true;
    if (cat.value.length > 3 ){ // after 3 leters start help
        
        flymenu.innerHTML = helpCreate();
        let rowws = document.querySelectorAll('.temps');
        rowws.forEach(row => row.addEventListener("click", function clickrow() {
            mcc.value = row.textContent.slice(-4);
            cat.value = row.textContent.slice(0,-4);
            row.removeEventListener("click", clickrow);
            flymenu.innerHTML = "";
            cattemp = undefined;
        }));

    } else flymenu.innerHTML = "";
}
// ---------------------- Flymenu shop ----------------------------

shop.oninput = function(){
    cattemp == undefined ? rqstPostForTempTable("shop") : true;
    if (cat.value.length > 3 ){ // after 3 leters start help
        
    }
}

// ---------------------- Create table help ------------------------
function helpCreate(){
    let count = 0;
    let helps = "";   
    label: for (let i = 0; i < cattemp.length; i++){
        let position = (cattemp[i].cat.toLowerCase()).indexOf(cat.value.toLowerCase());
        if (position  >= 0){
            let word = cattemp[i].cat.slice(0, position) + spanstart + cattemp[i].cat.slice(position, position + 
                cat.value.length) + spanend + cattemp[i].cat.slice(position + cat.value.length);
            helps += (`<tr class=\"temps\"><td>${word}</td><td class=\"hiden\">${cattemp[i].mcc}</td></tr>`);
            count++;
        }
        if (count >= 15) break label;
    } return helps;
}

function rqstPostForTempTable(rqstin){
    fetch ("tempobr.php", {
        method: "POST",
        body: JSON.stringify({"rqst": rqstin})
       })
    .then((response) => {
        if (response.ok){
            return response.json();
        } else error.innerHTML = 'Error ' + response.status;
    })
    .then ((result) => {
        if (result.error){
            error.innerHTML = result.error;
        } else if (result[1064].cat == "Full table"){
            cattemp = result;
        }  else error.innerHTML = "Ошибка в полученной таблице";

    })
}