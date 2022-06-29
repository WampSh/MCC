"use strict"

const cards = document.querySelector('.cards');
const search = document.querySelector('.search');
const regon = document.querySelector('.regon');
const reg = document.querySelector('.reg');
const regbtn = document.querySelector('.regbtn');
const label = document.querySelector('.label-auth');
let auth = document.querySelector('.hiden'); // Исправить
const authform = document.querySelector('.authform');
const searchForm = document.querySelector('.search-form');
const cat = document.querySelector('.catt');
const addUser = document.querySelector('.add-user');
const addUserWindow = document.querySelector('.add-user-window');
const error = document.querySelector('.error');
const flymenuCat = document.querySelector('.flymenu-cat');
const flymenuShop = document.querySelector('.flymenu-shop');
const mcc = document.querySelector('.mcc');
let cattemp, cardlist;
const shop = document.querySelector('.shop');
const main = document.querySelector('.main');
const spanstart = '<span class=\"grey\">';
const spanend = '</span>';
const resultWindow = document.querySelector('.result-window');
const addCardPage = document.querySelector('.add-card-page');
const addCard = document.querySelector('.add-card');
const addShopPage = document.querySelector('.add-shop-page');
const addShop = document.querySelector('.add-shop');
const backbtn = document.querySelectorAll(".back");
let opendWindow = "no";
const cardname = document.querySelector(".card-name");

// Запуск функции получения списка кард пользователя, сразу при загрузке


// Заносим список кард в OPTION для выбора 
// Поменять на что то другое !!!!!!!!!!!!
(!cardlist)? rqstPostForTempTable("card") : true;

// ------------------------------------------

// Прослушиваем нажатие на кнопку ВОЙТИ и показываем окно для входа
addUser.addEventListener('click', function addUser(){
    addUserWindow.classList.remove("hiden");
    opendWindow = "user";
    //removeEventListener('click', addUser);
})


addCard.addEventListener('click', function addCard(){
    main.classList.add("hiden");
    addCardPage.classList.remove("hiden");
    removeEventListener('click', addCard);
    opendWindow = "card";
})

addShop.addEventListener('click', function addShop(){
    main.classList.add("hiden");
    addShopPage.classList.remove("hiden");
    removeEventListener('click', addShop);
    opendWindow = "shop";
})

for (let backs of backbtn){
    backs.addEventListener('click', function back(){
        main.classList.remove('hiden');
        switch (opendWindow){
            case "shop":
                addShopPage.classList.add('hiden');
                break;
            case "card":
                addCardPage.classList.add("hiden");
                break;
            case "user":
                addUserWindow.classList.add("hiden")
        }
    })     
}

// Прослушиваем нажатие на кнопку ПОИСК и ??????????
search.addEventListener('click', function search(){
    if (cards.value != "no"){
        main.classList.add('hiden');
        resultWindow.classList.remove("hiden");
        let cardid = +cards.value;
        resultWindow.innerHTML=`По карте ${cardlist[cardid].cardname} установлены бонусные МСС:<br> ${cardlist[cardid].bonusmcc}`;
        
    } else if (mcc.value.length >= 4){
        rqstSearch(searchForm);
    }
    //removeEventListener('click', search);
})

// Change request for registration or signin 
// Меняем поля в зависимости от входа или регистрации
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

// Отправляем форму регистрации или входа
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
            username = result.username;
            addUserWindow.classList.add("hiden");
        }
        else console.log("Ошибка");
    })
}

// Flying menu for help
// при начале набора символов в строке категория, готовим таблицу с подсказками 
cat.oninput = function (){
    (cattemp == undefined || cattemp[0].descr != "mcc") ? rqstPostForTempTable("cat") : true;
    shop.value = "";
    mcc.value = "";
    if (cat.value.length > 3 ){ // after 3 leters start help
        flymenuCat.innerHTML = helpCreate("cat", cat);
        let rowws = document.querySelectorAll('.temps');
        rowws.forEach(row => row.addEventListener("click", function clickrow() {
            mcc.value = row.textContent.slice(-4);
            cat.value = row.textContent.slice(0,-4);
            row.removeEventListener("click", clickrow);
            flymenuCat.innerHTML = "";
            cattemp = undefined;
        }));

    } else flymenuCat.innerHTML = "";
}

// ---------------------- Flymenu shop ----------------------------
// при начале набора символов в строке МАГАЗИН, готовим таблицу с подсказками 
shop.oninput = function(){
    (cattemp == undefined || cattemp[0].descr != "shop") ? rqstPostForTempTable("shop") : true;
    cat.value = "";
    mcc.value = "";
    if (shop.value.length > 3 ){ // after 3 leters start help
        flymenuShop.innerHTML = helpCreate("shop", shop);
        let rowws = document.querySelectorAll('.temps');
        rowws.forEach(row => row.addEventListener("click", function clickrow() {
            mcc.value = row.textContent.slice(-4);
            shop.value = row.textContent.slice(0,-4);
            row.removeEventListener("click", clickrow);
            flymenuShop.innerHTML = "";
            cattemp = undefined;
        })); 
    } else flymenuShop.innerHTML = "";
}

// ---------------------- Create table help ------------------------
// Формируем таблицу подсказок
function helpCreate(column, obj){
    let count = 0;
    let helps = "";   
    label: for (let i = 0; i < cattemp.length; i++){
        let position = (cattemp[i][column].toLowerCase()).indexOf(obj.value.toLowerCase());
        if (position  >= 0){
            let word = cattemp[i][column].slice(0, position) + spanstart + cattemp[i][column].slice(position, position + 
                obj.value.length) + spanend + cattemp[i][column].slice(position + obj.value.length);
            helps += (`<tr class=\"temps\"><td>${word}</td><td class=\"hiden\">${cattemp[i].mcc}</td></tr>`);
            count++;
        }
        if (count >= 15) break label;
    } return helps;
}

// ----------  Отправляем Запрос на временную таблицу для подсказок
function rqstPostForTempTable(rqstin){ //rqstin принимаем имя input
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
        } else if (result[0].cat == "Table OK"){
            if (rqstin == "card"){
                cardlist = result;
                for (let i = 0; i < (cardlist.length); i++){
                    cards.innerHTML += `<option value=\"${i}\">${cardlist[i].cardname}</option>`;
                }
            } else cattemp = result;
        }  else error.innerHTML = "Ошибка в полученной таблице";
    })
  };



  function rqstSearch(form){ 
    let formData = new FormData(form);
    fetch (form.action, {
        method: form.method,
        body: formData,
       })
    .then((response) => {
        if (response.ok){
            return response.json();
        } else error.innerHTML = 'Error ' + response.status;
    })
    .then ((result) => {
        if (result.error){
            error.innerHTML = result.error;
        } else if (result[0].cat == "Table OK"){
                main.classList.add('hiden');
                resultWindow.classList.remove('hiden');
                resultWindow.innerHTML = `<h4>По выбранной МСС ${mcc.value} </h4>
                <h4>Категория: ${result[0].cat}</h4>
                <h4>Лучше платить следующими картами:</h4>`;
                for (let row of result){
                    cardname.innerHTML += `${row.cardname} с кэшбеком ${row.bonus}%`;
                }
            } else error.innerHTML = "Ошибка в полученной таблице";
       
    })
  };
