<?php
function action_index(){
    load_model("auth");
    load_view("404",[],1);
}