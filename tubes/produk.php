<?php
  session_start();
  include 'database.php';
  if($_SESSION['status_login'] != true){
      echo '<script>window.location="login.php"</script>';
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="font/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>LAPAK LIBERTY</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-info">
      <div class="container">

        <h4><i class="fas fa-cart-plus mr-2"></i></h4>
  <a class="navbar-brand font-weight-bold" href="#">Lapak Liberty</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Beranda <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Profil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Hubungi <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Bantuan <span class="sr-only">(current)</span></a>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <div class="icon mt-2">
      <h5>
        <li class="fas fa-cart-plus ml-3 mr-3" data-toogle="tooltip" title="Keranjang"></li>
        <li class="fas fa-envelope mr-3" data-toogle="tooltip" title="Surat Masuk"></li>
        <li class="fas fa-bell mr-3" data-toogle="tooltip" title="Notifikasi"></li>
      </h5>
    </div>

  </div>
  </div>
</nav>


<div class="row">
  <div class="col-md-2 bg-light">
    <ul class="list-group-flush p-2 pt-4">
<ul class="nav flex-column">
  <li class="nav-item">
    <a class="nav-link active" href="dashboard.php"><i class="fa fa-heart"></i>DASHBOARD </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php"><i class="fa fa-cube"></i>PROFIL</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="kategori.php"><i class="fa fa-tags"></i>KATEGORI</a>
  </li>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="produk.php"><i class="fa fa-tags"></i>PRODUK</a>
  </li>
    <li class="nav-item">
    <a class="nav-link" href="login.php"><i class="fa"></i>LOGOUT</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#"></a>
  </li>
</ul>
</div>
<!--content-->
<div class="section">
  <div class="container">
    <h3>Data Produk</h3>
    <div class="box">
      <p><a href="tambah-produk.php">Tambah Data</a></p>
      <table border="1" cellspacing="0" class="table">
        <thead>
          <tr>
            <th width="50px">No</th>
            <th>Kategori</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Status</th>
            <th width="150px">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $no = 1;
            $produk = mysqli_query($conn, "SELECT * FROM tb_product LEFT JOIN tb_category USING (category_id) ORDER BY product_id DESC");
            if(mysqli_num_rows($produk) > 0){
            while($row = mysqli_fetch_array($produk)){
          ?>
          <tr>
            <td><?php echo  $no++ ?></td>
            <td><?php echo  $row['category_name'] ?></td>
            <td><?php echo  $row['product_name'] ?></td>
            <td>Rp. <?php echo  number_format($row['product_price']) ?></td>
            <td><a href="img/<?php echo $row['product_image'] ?>" target="_blank"> <img src="img/<?php echo $row['product_image'] ?>" width="50px"></a></td>
            <td><?php echo ($row['product_status'] == 0)? 'TIdak Aktif':'Aktif'; ?></td>
            <td>
              <a href="edit-produk.php?id=<?php echo $row['product_id'] ?>">Edit</a> || <a href="hapus.php?idp=<?php echo $row['product_id'] ?>" onclick="return confirm('Yakin untuk menghapus')">Hapus</a>
            </td>
          </tr>
        <?php }}else{ ?>
          <tr>
            <td colspan="7">Tidak ada data</td>
          </tr>

        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!--footer-->
    
  </body>
</html>