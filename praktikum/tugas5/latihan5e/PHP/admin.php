<?php
// menghubungkan dengan file php lain nya
require 'functions.php';
//melakukan query
$games = query ("SELECT * FROM equipment_ml");




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan4a</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
<div class="float-md-start">
<table class="table table-bordered table-striped table-hover text-center">
  <thead>
    <tr>
      <th scope="col">NO</th>
      <th scope="col">Picture</th>
      <th scope="col">Nama Equipment</th>
      <th scope="col">Tipe Equipment</th>
      <th scope="col">Penjelasan</th>
      <th scope="col">Harga</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1 ?>
    <?php foreach( $games as $games) : ?>
            <tr>
            
              <th scope="row"><?= $i ?></th>
              <td>
              <a href=""><button class="btn btn-outline-primary rounded-pill">Ubah</button></a>
              <a href=""><button class="btn btn-outline-danger rounded-pill">Hapus</button></a>
            </td>
              <td><img src="img/<?= $row["picture"]; ?>"></td>
              <td><?= $row["nama_equipment"] ?></td>
              <td><?= $row["tipe_equipment"] ?></td>
              <td><?= $row["penjelasan"] ?></td>
              <td><?= $row["harga"] ?></td>
            </tr>
            <?php $i++ ?>
            <?php endforeach; ?>
  </tbody>
</table>
</div>
</body>
</html>