<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <h1>Danh sách sinh viên</h1>
    <a href="?route=themsv">Thêm sinh viên</a>

    <table class="table table-striped table-bordered">
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Age</th>
            <th>Address</th>
        </thead>
        <tbody>
            <?php foreach ($dssv as $sv):?>
            <tr>
            <td><?php echo $sv["id"]  ?></td>
            <td><?php echo $sv["name"]  ?></td>
            <td><?php echo $sv["age"]  ?></td>
            <td><?php echo $sv["address"]  ?></td></tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
