<?php
include_once "controllers/controller.php";
//
$router=isset($_GET["route"])?$_GET["route"]:"";
$controller = new Controller();

switch ($router){
    case "delete": $controller->delete();break;
    case "luupro": $controller->save();break;
    case "addpro": $controller->add();break;
    default: $controller-> home();break;
}
