<?php
include_once "controllers/controller.php";
//
$router=isset($_GET["route"])?$_GET["route"]:"";
$controller = new Controller();

switch ($router){
    case "luubill": $controller->luuBill();break;
    case "thanhtoan"; $controller->thanhtoan();break;
    case "resetcart": $controller->resetCart();break;
    case "addtocart": $controller->addToCart();break;
    case "mycart": $controller->mycart();break;
    case "addcate": $controller->addCate();break;
    case "luucate": $controller->luuCate();break;
    case "delete": $controller->delete();break;
    case "luupro": $controller->save();break;
    case "addpro": $controller->add();break;
    default: $controller-> home();break;
}
