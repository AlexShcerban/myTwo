var amount = 0;

function gen_Goods(products){
    alert ("asdasd");
    let product = [];
    let _parent = document.getElementById("catalog_block");
 //   alert (search);
    let _child = document.createElement("div");
    _child.className = "goods";
    _parent.appendChild(_child);

    //создание товаров
    for(let i = 0; i < products.length; i++){
        product[i] = document.createElement("div");
        product[i].className = "product";
        _child.appendChild(product[i]);
        product[i].innerHTML = '<a href = "product.php?id_product=' + i + '">' + products[i][1] + '<br> <img src="' + products[i][4] + '" alt="Фото курса" width = "170" height = "170" style = "margin-top: 10px;"></a>';
    }
}

function buy(xxx){
    alert (xxx);
}
function event_submit(){
    frm.submit();
}