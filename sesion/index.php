<?php
// Bộ định tuyến
include_once "controllers/controller.php";
$route = isset($_GET["route"])?$_GET["route"]:"";
$conroller = new Controller();

switch ($route){
    case "listsv": $conroller->listSv();break;
    case "themsv": $conroller->themSv();break;
    case "luusv": $conroller->luuSV();break;
    case "aboutus": $conroller->aboutUs();break;
    default:$conroller->home();
}
