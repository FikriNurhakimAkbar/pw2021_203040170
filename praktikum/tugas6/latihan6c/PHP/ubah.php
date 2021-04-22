<?php
require 'functions.php';


$id = $_GET["id"];

// query equipment_ml berdasarkan id
$games = query("SELECT * FROM data WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST['ubah'])) {

    // cek apakah data berhasil di tambahkan atau tidak
    if (ubah($_POST) > 0) {
        echo "
      <script>
        alert('data berhasil ditambahkan!');
        document.location.href = 'admin.php';
      </script>
    ";
    } else {
        echo "
      <script>
        alert('data gagal ditambahkan!');
        document.location.href = 'admin.php';
      </script>
    ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Data</title>
    <link rel="stylesheet" href="../assets/css/form.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
</head>

<body>

<div class="container" style="margin-top:50px;">
<div class="alert alert-dark" role="alert"style="width:500px;">
  <h3>Tambah Data!</h3>
</div>

<div class="row">
<div class="col-6">
<form>
  <div class="form-group">
    <label for="formGroupExampleInput" >NO</label>
    <input type="text" class="form-control" id="formGroupExampleInput" style="width:500px;" value="<?= $games["NO"]; ?>"> 
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Pictures</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" style="width:500px;" value="<?= $games["Pictures"]; ?>">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Nama Equipment</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" style="width:500px;" value="<?= $games["Nama Equipment"]; ?>">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Tipe Equipment</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" style="width:500px;" value="<?= $games["Tipe Equipment"]; ?>">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Penjelasan</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" style="width:500px;" value="<?= $games["Penjelasan"]; ?>">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Harga</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" style="width:500px;" value="<?= $games["Harga"]; ?>">
  </div>
</form>

</div>
<div class="col-4">

<button type="submit" class="btn btn-outline-secondary" name="kli">Tambahkan</button>
<button type="submit" class="btn btn-outline-secondary"><a href="../index.php">Kembali</a> </button>

</div>

</div>


</div>

</body>

</html>