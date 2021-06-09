<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>
    <div class="container">
            <h2><?php echo $title?></h2>
        <div class=" col-md-6">
            <form action="?route=luupro" method="post">
                <div class="form-group">
                    <lable><h4>Tên sản phẩm:</h4></lable>
                    <input type="text" class="form-control" placeholder="Tên..." name="name" value="<?php echo $pro["id"] ?>">
                </div>
                <div class="form-group">
                    <lable><h4>Mô tả:</h4></lable>
                    <textarea type="text" class="form-control" placeholder="Mô tả..." name="mota" value="<?php echo $pro["mota"] ?>"></textarea>
                </div>
                <div class="form-group">
                    <lable><h4>Giá sản phẩm:</h4></lable>
                    <input type="number" class="form-control" placeholder="Giá..." name="gia" value="<?php echo $pro["gia"] ?>">
                </div>
                <div class="form-group">
                    <lable><h4>Nhà cung cấp:</h4></lable>
                    <input type="text" class="form-control" placeholder="Nhà cung cấp..." name="ncc" value="<?php echo $pro["ncc"] ?>">
                </div>
                <button type="submit" class="btn btn-primary my-5 me-5 px-5">Lưu</button>
                <button type="reset" class="btn btn-warning my-5 me-3 px-5">Reset</button>
                <a href="/MVC/Lap">
                    <button type="button" class="btn btn-warning my-5 me-3 px-5">Về trang chủ</button>
                </a>
            </form>
        </div>

    </div>
</body>
</html>
