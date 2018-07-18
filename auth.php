<?php
define("USERS_BASE",DOCROOT."users.json");
session_start();
function getUsers(){
    return json_decode(file_get_contents(USERS_BASE),true);
}
function setUsers($user){
    file_put_contents(USERS_BASE,json_encode($user));
}
function getUserByLogin($login){
    $users = getUsers();
    $users = array_filter($users,function ($user) use($login){
        return $user["login"]==$login;
    });
    $user = (!empty($users) && is_array($users)) ? array_values($users)[0] : null;
    return $user;
}
function newUser($login,$pass){
    return [
        "login"=>$login,
        "pass"=>md5($pass)
    ];
}
function authRegister($login,$pass){
    if(getUserByLogin($login)!==null) return false;
    $users = getUsers();
    $users[]= newUser($login,$pass);
    setUsers($users);
    return true;
}
function authLogin($login,$pass){
    $user = getUserByLogin($login);
    if($user===null) return false;
    if(md5($pass)!==$user["pass"]) return false;
    $_SESSION["auth_login"]=$login;
    $_SESSION["auth_ip"]=md5($_SERVER["REMOTE_ADDR"]);
    $_SESSION["auth_browser"]=md5($_SERVER["HTTP_USER_AGENT"]);
    return true;
}
function authIsAuth(){
    if(empty($_SESSION["auth_login"])) return false;
    if(empty($_SESSION["auth_ip"]) || $_SESSION["auth_ip"]!==md5($_SERVER["REMOTE_ADDR"])) return false;
    if(empty($_SESSION["auth_browser"]) || $_SESSION["auth_browser"]!== md5($_SERVER["HTTP_USER_AGENT"])) return false;
    if(getUsers($_SESSION["auth_login"])===null) return false;
    return true;
}
function authLogout(){
    session_destroy();
}
function authCurrentUser(){
    return getUsers($_SESSION["auth_login"]);
}