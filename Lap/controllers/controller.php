<?php
//include_once "database.php";
include_once "models/Products.php";
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
    function checkid($id,$dssp){
        foreach ($dssp as $item){
            if ($item["id"]== $id){
                return true;
            }
        }return false;
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
            $pro = new Products();
            $dssp = $pro->all();
            $sql_cate= "select * from procategory";
            $cate = queryDB($sql_cate);
            include "views/home.php";
        }
        function save(){
            $id = $_POST["id"];
            $product = new Products();
            if (checkid($id,$product)){
                if ($product->update($_POST,$id)){
                    header("location: /MVC/Lap");
                }else{
                    echo "error-edit";
                }
            }else{
                if ($product->save($_POST)){
                    header("location: /MVC/Lap");
                }else{
                    echo "error-add";
                }
            }
        }
        function addoredit(){

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
                $pr = new Products();
                $item= $pr->find($id);
                $pro["id"]=$item["id"];
                $pro["name"]=$item["name"];
                $pro["mota"]=$item["mota"];
                $pro["gia"]=$item["gia"];
                $pro["ncc"]=$item["ncc"];
                $title= "Sửa thông tin";
                include "views/addProduct.php";
            }

        }
        function delete(){
            $id=$_POST["id"];
            $pr = new Products();
            if ($pr->delete($id)){
                header("location: /MVC/Lap");
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
