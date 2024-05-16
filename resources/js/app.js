import './bootstrap';
let title = document.getElementById("title");
let taxes = document.getElementById("taxes");
let ads = document.getElementById("ads");
let price = document.getElementById("price");
let discount = document.getElementById("discount");
let count = document.getElementById("count");
let category = document.getElementById("category");
let submit = document.getElementById("submit");
let total = document.getElementById("total");

let mood = "create";
let tmp;
//get total
function getTotal() {
    "use strict";
    if (
        price.value != ' ') {
        let result = (+price.value + +taxes.value + +ads.value) - +discount.value;
        total.innerHTML = result;
        total.style.background = "#040";
    } else {//مشتغلش ال else
        total.innerHTML = ' ';
        total.style.background = "#a00d02";
        // console.log("dddd");
    }
}
let datapro = [];
// if (localStorage.product = null) { }
if (localStorage.product != null) {

    datapro = JSON.parse(localStorage.product);
}

submit.onclick = function () {
    let newpro = {
        title: title.value,
        taxes: taxes.value,
        price: price.value,
        ads: ads.value,
        discount: discount.value,
        total: total.innerHTML,
        category: category.value,
        count: count.value,
    }
    if (mood == "create") {
        if (newpro.count > 1) {
            for (let i = 0; i < +newpro.count; i++) {
                datapro.push(newpro);
            }
        } else {
            datapro.push(newpro);
        }
    } else {
        datapro[tmp] = newpro;
        mood = "create";
        submit.innerHTML = "create";
        count.style.display = "block";
    }
    localStorage.setItem('product', JSON.stringify(datapro));
    console.log(datapro);
    clear();
    showdata();
}

function clear() {
    title.value = '';
    taxes.value = '';
    price.value = '';
    ads.value = '';
    discount.value = '';
    total.innerHTML = '';
    category.value = '';
    count.value = '';
}

function showdata() {
    let table = '';
    for (let i = 0; i < datapro.length; i++) {
        table += `
 <tr>
<td>${i}</td>
<td>${datapro[i].title} </td>
<td>${datapro[i].price} </td>
<td>${datapro[i].taxes} </td>
<td>${datapro[i].ads} </td>
<td>${datapro[i].discount} </td>
<td>${datapro[i].total} </td>
<td>${datapro[i].category} </td>
<td> <button id="update" onclick="updata(${i})">update</button></td>
<td> <button id="delete" onclick="delete_data(${i})">delete</button></td>
</tr>`;
    }
    document.getElementById('tbody').innerHTML = table;
    let btndelete = document.getElementById("deleteall");
    if (datapro.length > 0) {
        btndelete.innerHTML = `
     <button onclick="deleteall()">delete All(${datapro.length})</button>`;

    } else {
        btndelete.innerHTML = '';
    }
}
showdata();

function delete_data(i) {
    datapro.splice(i, 1)
    localStorage.product = JSON.stringify(datapro);
    showdata();
}
function deleteall() {
    localStorage.clear;
    datapro.splice(0)
    showdata();
}

function updata(i) {
    title.value = datapro[i].title;
    price.value = datapro[i].price;
    taxes.value = datapro[i].taxes;
    ads.value = datapro[i].ads;
    discount.value = datapro[i].discount;
    getTotal();
    submit.innerHTML = 'update';
    count.style.display = "none";
    category.value = datapro[i].category;
    mood = "update";
    tmp = i;
    scroll({
        top: 0,
        behavior: "smooth"
    });

}
