var x = 0;
var allMes = [];

function gen_Message(_text = "text: "){
    //получение данных
    let _parent = document.getElementById("message_block");


    //создание ребенка
    let _child = document.createElement("div");
    _child.className = "message";
    _parent.appendChild(_child);

    //вписать текст в ребенка
    _child.innerHTML = _text + x;
    x++;

    allMes.push(_child);
}
function gen_Button(){
    let _parent = document.getElementById("message_block");
    let _child = document.createElement("button");
    _parent.appendChild(_child);

    _child.className = "message";
    _child.innerHTML = "Да";

    _child.addEventListener('click', function() {
        gen_Message("X = ");
        _child.disabled = true;
    });
    allMes.push(_child);
}
