<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Danh sách sản phẩm</h1>
        <a href="?route=addpro">
            <button type="button" class="float-end btn btn-primary">Thêm mới</button>
        </a>

        <a href="?route=mycart">
            <button type="button" class="float-end btn btn-warning me-5">Giỏ hàng</button>
        </a>

        <table class="table table-striped">
            <thead>
                <th>id</th>
                <th>Tên</th>
                <th colspan="2">Mô tả</th>
                <th>Giá</th>
                <th>Nhà cung cấp</th>
                <th colspan="3">Tool</th>
            </thead>
            <tbody>
                <?php foreach ($dssp as $sp): ?>
                    <tr>
                        <td><?php echo $sp["id"]  ?></td>
                        <td><?php echo $sp["name"] ?></td>
                        <td colspan="2"><?php echo $sp["mota"] ?></td>
                        <td><?php echo $sp["gia"]." VND" ?></td>
                        <td><?php echo $sp["ncc"] ?></td>
                        <td>
                            <form action="?route=addpro" method="post">
                                <input type="hidden" name="id" value="<?php echo $sp["id"]  ?>">
                                <button type="submit" class="btn btn-primary">Sửa</button>
                            </form>
                        </td>
                        <td>
                            <form action="?route=delete" method="post">
                                <input type="hidden" name="id" value="<?php echo $sp["id"]  ?>">
                                <button type="submit" class="btn btn-success">Xóa</button>
                            </form>
                        </td>
                        <td>
                            <form action="?route=addtocart" method="post">
                                <input type="hidden" name="id" value="<?php echo $sp["id"]  ?>">
                                <button type="submit" class="btn btn-warning">Cart+</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h2 style="margin-top:50px ">Category</h2>
        <a href="?route=addcate">
            <button type="button" class="float-end btn btn-primary">Thêm mới</button>
        </a>
        <?php foreach ($cate as $c):?>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault<?php echo $c["id"] ?>">
            <label class="form-check-label" for="flexCheckDefault<?php echo $c["id"] ?>">
                <?php echo $c["name"] ?>
            </label>
        </div>
        <?php endforeach;?>

    </div>
</body>
</html>
