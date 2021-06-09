<?php
include_once "database.php";
    class Controller{

        function home(){
            $sql_txt = "select * from products";
            $dssp= queryDB($sql_txt);
            $sql_cate= "select * from procategory";
            $cate = queryDB($sql_cate);
            include "views/home.php";
        }
        function save(){
            $name=$_POST["name"];
            $mota=$_POST["mota"];
            $gia=$_POST["gia"];
            $ncc=$_POST["ncc"];

            $sql="insert into products (name,mota,gia,ncc) values ('$name','$mota','$gia','$ncc')";
            if (insertorupdateDB($sql)){
                header("location: /MVC/Lap");
            }else{
                echo "error";
            }
        }
        function add(){
            $pro["id"]="";
            $pro["mota"]="";
            $pro["gia"]="";
            $pro["ncc"]="";
            $title = "Thêm mới";
            include "views/addProduct.php";
        }
        function delete(){
            $id=$_POST["id"];
            $sql="delete from products where id = $id";
            if (insertorupdateDB($sql)){
                header("location: /MVC/Lap");
                echo "ez";
            }else{
                echo "error";
            }
        }
    }
