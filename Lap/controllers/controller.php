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
            if ( $id=$_POST["id"]==""){
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

            }else{
                $id=$_POST["id"];
                $name=$_POST["name"];
                $mota=$_POST["mota"];
                $gia=$_POST["gia"];
                $ncc=$_POST["ncc"];
                $sql_txt= "update products set name ='$name', gia=$gia, mota='$mota', ncc='$ncc' where id=$id";
                if (insertorupdateDB($sql_txt)){
                    header("location: /MVC/Lap");
                }else{
                    echo "error";
                }
            }


        }
        function add(){

            if (!isset($_POST["id"])){
                $pro["id"]="";
                $pro["name"]="";
                $pro["mota"]="";
                $pro["gia"]="";
                $pro["ncc"]="";
                $title = "Thêm mới";
                include "views/addProduct.php";
            }else{
                $id=$_POST["id"];
                $sql_txt = "select * from products";
                $dssp= queryDB($sql_txt);
                foreach ($dssp as $item){
                    if ($item["id"]==$id){
                        $pro["id"]=$item["id"];
                        $pro["name"]=$item["name"];
                        $pro["mota"]=$item["mota"];
                        $pro["gia"]=$item["gia"];
                        $pro["ncc"]=$item["ncc"];
                        $title= "Sửa thông tin";
                        include "views/addProduct.php";

                    }
                }

            }

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
