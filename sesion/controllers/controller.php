<?php
include_once "database.php";
class Controller{
    public function home(){
        include "views/home.php";
    }
    public function aboutUs(){
        include "views/aboutus.php";
    }
    public function listSv(){
        $sql_txt = "select * from sinhviens";
        $dssv=queryDB($sql_txt);
        include "views/listsv.php";
    }
    public function themSv(){

        include "views/themsv.php";
    }
    public function luuSv(){
        $name = $_POST["name"];
        $age = $_POST["age"];
        $address = $_POST["address"];

        $sql_txt = "insert into sinhviens (name,age,address) values('$name',$age,'$address')";
        if (insertorupdateDB($sql_txt)){
            header("Location: ?route=listsv");
        }else{
            echo "error";
        }
    }
}