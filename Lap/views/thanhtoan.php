<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thanh toán</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Thanh toán</h1>
        <form action="?route=luubill" method="post">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-striped">
                    <thead>
                    <th>id</th>
                    <th>Tên</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Thành tiền</th>
                    </thead>
                    <tbody>
                    <?php $total=0 ?>
                    <?php foreach ($cart as $sp): ?>
                        <tr>
                            <td><?php echo $sp["id"]  ?></td>
                            <td><?php echo $sp["name"] ?></td>
                            <td><?php echo $sp["qty"] ?></td>
                            <td><?php echo $sp["gia"] ?></td>
                            <td><?php $total+= $sp["gia"]*$sp["qty"]; echo $sp["gia"]*$sp["qty"]." VND" ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td><h4>Tổng tiền:</h4></td>
                        <td colspan="3"></td>
                        <td><h4><?php echo $total." VND"?></h4></td>
                    </tr>
                    </tbody>

                </table>
            </div>
            <div class="col-md-6">

                    <div class="form-group">
                        <lable><b>Tên khách hàng:</b></lable>
                        <input type="text" name="customer" placeholder="Tên khách hàng..." class="form-control">
                    </div>
                    <div class="form-group">
                        <lable><b>Số điện thoại:</b></lable>
                        <input type="tel" name="tel" placeholder="Tên khách hàng..." class="form-control">
                    </div>
                    <div class="form-group">
                        <lable><b>Địa chỉ khách hàng:</b></lable>
                        <textarea name="address" placeholder="Địa chỉ ..." class="form-control"></textarea>
                    </div>


            </div>
        </div>
        <div class="mt-5">
            <a href="?route=/MVC/Lap">
                <button type="button" class=" btn btn-primary">Trở lại</button>
            </a>
            <button type="submit" class="float-end btn btn-success">Thanh toán</button>
        </div>
        </form>
    </div>
</body>
</html>
