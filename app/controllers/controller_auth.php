<?php
function action_register(){
    load_model("auth");
    $login = @$_POST["login"];
    $pass = @$_POST["pass"];
    $pass2 = @$_POST["pass2"];
    $errors = [];
    if(empty($login)) $errors["login"]="Поле не заполненно";
    if(empty($pass)) $errors["pass"]="Поле не заполненно";
    if(empty($pass2)) $errors["pass2"]="Поле не заполненно";
    if($pass2!==$pass) $errors["pass2"]="Пароли не совпадают";
    if(empty($errors)){
        if(!authRegister($login,$pass)) $errors["login"]="Имя пользователя занято";
    }
    if(!empty($errors)){
        $_SESSION["reg_errors"]=$errors;
        $_SESSION["old_values"]=$_POST;
        redirect(PROJROOT."register");
        return;
    }
    redirect(PROJROOT."login");
}
function action_login(){
    load_model("auth");
    $login = @$_POST["login"];
    $pass = @$_POST["pass"];
    $errors = [];
    if(empty($login)) $errors["login"]="Поле не заполненно";
    if(empty($pass)) $errors["pass"]="Поле не заполненно";
    if(empty($errors)){
        if(getUserByLogin($login)===null) $errors["login"]="Такого пользователя не существует";
    }
    if(empty($errors)) {
        if(md5($pass)!==getUserByLogin($login)["pass"]) $errors["pass"]="Не верный пароль";
    }
    if(!empty($errors)){
        $_SESSION["reg_errors"]=$errors;
        $_SESSION["old_values"]=$_POST;
        redirect(PROJROOT."login");
        return;
    }
    if(!authLogin($login,$pass)) die("Что-то пошло не так");
    redirect(PROJROOT);
}
function action_logout(){
    load_model("auth");
    authLogout();
    redirect(PROJROOT);
}