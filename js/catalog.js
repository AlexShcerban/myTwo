var amount = 0;

function gen_Goods(products){
    let nameUrl = "product";

    let product = [];
    let productA = [];
    let _parent = document.getElementById("catalog_block");
    
    let _child = document.createElement("div");
    _child.className = "goods";
    _parent.appendChild(_child);

    //создание товаров
    for(let i = 0; i < products.length; i++){
        product[i] = document.createElement("div");
        product[i].className = "product";
       // product[i].href = 'product.php?id_product=' + i + ';
      //  product[i].setAttribute("href", 'product.php?id_product='+i);

        _child.appendChild(product[i]);

      //  product[i].innerHTML = products[i][1];

        product[i].innerHTML = '<a href = "product.php?id_product=' + i + '">' + products[i][1] + '</a>';
    }
}

function buy(xxx){
    alert (xxx);
}
function event_submit(){
    frm.submit();
}