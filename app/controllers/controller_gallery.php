<?php
function action_index(){
    load_model("auth");
    if(authIsAuth()){
        load_view("gallery");
    }else{
        load_view("auth",["curPage"=>"gallery"]);
    }
}
