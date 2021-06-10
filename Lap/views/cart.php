<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Giỏ hàng</h1>
        <a href="?route=resetcart">
            <button type="button" class="float-end btn btn-danger">Reset</button>
        </a>

        <table class="table table-striped">
            <thead>
                <th>id</th>
                <th>Tên</th>
                <th>Mô tả</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Nhà cung cấp</th>
                <th>Thành tiền</th>
            </thead>
            <tbody>
                <?php foreach ($cart as $sp): ?>
                    <tr>
                        <td><?php echo $sp["id"]  ?></td>
                        <td><?php echo $sp["name"] ?></td>
                        <td><?php echo $sp["mota"] ?></td>
                        <td><?php echo $sp["qty"] ?></td>
                        <td><?php echo $sp["gia"] ?></td>
                        <td><?php echo $sp["ncc"] ?></td>
                        <td><?php echo $sp["gia"]*$sp["qty"] ?></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
        <a href="?route=/MVC/Lap">
            <button type="button" class=" btn btn-primary">Trở lại</button>
        </a>
        <a href="?route=thanhtoan">
            <button type="button" class="float-end btn btn-success">Thanh toán</button>
        </a>

    </div>
</body>
</html>
