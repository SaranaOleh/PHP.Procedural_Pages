<?php
function action_index(){
    load_model("auth");
    if(authIsAuth()){
        load_view("news");
    }else{
        load_view("auth",["curPage"=>"news"]);
    }
}
