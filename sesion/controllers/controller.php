<?php
include_once "models/sinhviens.php";
class Controller{
    public function home(){
        include "views/home.php";
    }
    public function aboutUs(){
        include "views/aboutus.php";
    }
    public function listSv(){
//        $sql_txt = "select * from sinhviens";
//        $dssv=queryDB($sql_txt);
        $sv = new Sinhviens();
        $dssv = $sv->all();
        include "views/listsv.php";
    }
    public function themSv(){

        include "views/themsv.php";
    }
    public function luuSv(){
//        $name = $_POST["name"];
//        $age = $_POST["age"];
//        $address = $_POST["address"];
//
//        $sql_txt = "insert into sinhviens (name,age,address) values('$name',$age,'$address')";
//        if (insertorupdateDB($sql_txt)){
//            header("Location: ?route=listsv");
//        }else{
//            echo "error";
//        }
        $sv = new SinhVien();
        if($sv->save($_POST)){
            header("Location: ?route=listsv");
        }else{
            echo "Error";
        }
    }
}