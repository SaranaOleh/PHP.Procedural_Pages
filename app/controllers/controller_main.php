<?php
function action_index(){
    load_model("auth");
    load_view("main");
}
function action_register(){
    load_model("auth");
    $errors = empty($_SESSION["reg_errors"]) ? [] : $_SESSION["reg_errors"];
    $old = empty($_SESSION["old_values"]) ? [] : $_SESSION["old_values"];
    $_SESSION["reg_errors"]=[];
    $_SESSION["old_values"]=[];
    load_view("register",["errors"=>$errors,"old"=>$old],0);
}
function action_login(){
    load_model("auth");
    $errors = empty($_SESSION["reg_errors"]) ? [] : $_SESSION["reg_errors"];
     $old = empty($_SESSION["old_values"]) ? [] : $_SESSION["old_values"];
     $_SESSION["reg_errors"]=[];
     $_SESSION["old_values"]=[];
      load_view("login",["errors"=>$errors,"old"=>$old],0);
}