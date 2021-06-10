<?php
include_once "database.php";
session_start();
if (!isset($_SESSION["Cart"])){
    $_SESSION["Cart"]=[];
}
function checkcart($sp,$cart){
    foreach ($cart as $p){
        if ($p["id"]==$sp["id"]){
            return true;
        }
    }
    return false;
}
    class Controller{

        function mycart(){
            $cart=$_SESSION["Cart"];
            if ($cart==[]){
                header("location: /MVC/Lap");
            }
            include "views/cart.php";
        }
        function resetCart(){
            $cart = [];
            $_SESSION["Cart"]=$cart;
            header("location: /MVC/Lap");
        }
        function thanhtoan(){
            $cart=$_SESSION["Cart"];
            include "views/thanhtoan.php";
        }
        function luuBill(){
            $name= $_POST["customer"];
            $tel = $_POST["tel"];
            $address = $_POST["address"];
            $cart = isset($_SESSION["Cart"])?$_SESSION["Cart"]:[];
            if (count($cart)>0){
                $total =0;
                foreach ($cart as $item) {
                    $total += $item["gia"] * $item["qty"];
                }
                try {
                    $sql_order= " insert into orders (customers,tel,address,grandtotal) values ('$name','$tel','$address',$total)";
                    $conn = connectDB();
                    $order_id=0;
                    if ($conn->query($sql_order)===true){
                        $order_id = $conn->insert_id;
                    }
                    if ($order_id>0){
                        $sql_item= "insert into order_product (order_id,pro_id,qty,price) values ";
                        $values= [];
                        foreach ($cart as $item){
                            $p_id=$item["id"];
                            $p_price = $item["gia"];
                            $p_qty = $item["qty"];
                            $values[]="($order_id,$p_id,$p_qty,$p_price)";
                        }
                        $v = implode(",",$values);
                        $sql_item.= $v;
                        insertorupdateDB($sql_item);
                        echo "tạo đơn thành công";
                    }

                }catch (Exception $e){
                    var_dump($e);
                }
            }else{
                echo "Không có sản phẩm trong giỏ hàng";
            }

        }
        function addToCart(){
            $cart=$_SESSION["Cart"];
            $id = $_POST["id"];

            $sql_txt=" select * from products where id =$id";
            $dssp= queryDB($sql_txt);
            if(count($dssp)>0){
                $sp=$dssp[0];
                $sp["qty"]=1;
                if (checkcart($sp,$cart)){
                    foreach ($cart as $key=>$p){
                        if ($p["id"]==$sp["id"]){
                            $cart[$key]["qty"]++;
                        }
                    }
                }else{
                    $cart[]=$sp;
                }
                $_SESSION["Cart"]=$cart;
                header("location: /MVC/Lap");
                }else{
                echo "Sản phẩm không tồn tại!";
            }


        }


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
        function addCate(){
            $title = "Thêm mới";

            include "views/addCategory.php";
        }
        function luuCate(){
            $cate=$_POST["name"];
            $sql="insert into category (name) values ('$cate')";
            if (insertorupdateDB($sql)){
                header("location: /MVC/Lap");
            }else{
                echo "error";
            }
        }
    }
