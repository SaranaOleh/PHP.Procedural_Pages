<?php
define("PROJROOT","/phpAuth/");
define("DOCROOT",$_SERVER["DOCUMENT_ROOT"].PROJROOT);
define("APPROOT",DOCROOT."app/");
define("JS","media/js/script");
define("CSS","media/css/");
//include DOCROOT."auth.php";
$request = explode("?",$_SERVER["REQUEST_URI"])[0];

$ROUTES = [
    PROJROOT=>["ctrl"=>"main","action"=>"index"],
    PROJROOT."404"=>["ctrl"=>"404","action"=>"index"],
    PROJROOT."register"=>["ctrl"=>"main","action"=>"register"],
    PROJROOT."login"=>["ctrl"=>"main","action"=>"login"],
    PROJROOT."auth/register"=>["ctrl"=>"auth","action"=>"register"],
    PROJROOT."auth/login"=>["ctrl"=>"auth","action"=>"login"],
    PROJROOT."auth/logout"=>["ctrl"=>"auth","action"=>"logout"],
    PROJROOT."news"=>["ctrl"=>"news","action"=>"index"],
    PROJROOT."gallery"=>["ctrl"=>"gallery","action"=>"index"]
];
function load_model($modelName){
    include APPROOT."models/"."model_".$modelName.".php";
}
function load_view($viewName,$params=[],$template="main"){
    extract($params);
    if($template===0){
        include APPROOT."views/"."view_".$viewName.".php";
    }else{
        $page = APPROOT."views/"."view_".$viewName.".php";
        include APPROOT."templates/"."template_".$template.".php";
    }
}
function redirect($url){
    header("Location:{$url}");
}

function route($request){
    global $ROUTES;
    if(isset($ROUTES[$request])){
        include APPROOT."controllers/"."controller_".$ROUTES[$request]["ctrl"].".php";
        call_user_func("action_".$ROUTES[$request]["action"]);
    }else{
        route(PROJROOT."404");
    }
}
route($request);
