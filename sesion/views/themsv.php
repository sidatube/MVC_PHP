<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang chủ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <h1>Thêm sinh viên</h1>

    <div class="col-md-6">
        <form action="?route=luusv" method="post">
            <div class="form-group">
                <lable>Name</lable>
                <input type="text" placeholder="name..." name="name" class="form-control" >
            </div>
            <div class="form-group">
                <lable>Age</lable>
                <input type="text" placeholder="name..." name="age" class="form-control" >
            </div>
            <div class="form-group">
                <lable>Address</lable>
                <textarea name="address" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Lưu</button>

            </div>
        </form>
    </div>
</div>
</body>
</html>
