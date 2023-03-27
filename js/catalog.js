var amount = 0;

function gen_Goods(name, price){
   // let name = ["Apple", "Pear", "Orange", "Banan"];
    //let price = 10;
    let nameUrl = "product";

    let product = [];
    let productA = [];
    let _parent = document.getElementById("catalog_block");
    
    let _child = document.createElement("div");
    _child.className = "goods";
    ////////////////////////////////////
    _parent.appendChild(_child);
    ///////////////////////////////////////
    for(let i = 0; i < 4; i++){
        productA[i] = document.createElement("a");
        productA[i].href = nameUrl + ".html";

        product[i] = document.createElement("div");
        product[i].className = "product";

        _child.appendChild(productA[i]);
        productA[i].appendChild(product[i]);
        
    //    price = Math.floor(Math.random() * 1000);
        product[i].innerHTML = "<div class = 'text_center'>" + name + "<br>" + price + "</div>";
    }
}
function buy(xxx){
    alert (xxx);
}