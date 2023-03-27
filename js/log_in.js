function checkform(){
    let ok = 1;
    let msg = "";
    if(!frm.email.value){ok = 0; msg = "Email\n";}
    if(!frm.password.value){ok = 0; msg = "Пароль\n";}
    if(!ok)
    {
        alert("Заполните данные:\n"+ msg);
    }
    else{
        frm.submit();//Генерируем событие submit на форме
        frm.reset();//Очищаем форму после отправки
    }
}
