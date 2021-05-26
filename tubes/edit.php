<?php
  session_start();
  include 'database.php';
  if($_SESSION['status_login'] != true){
      echo '<script>window.location="login.php"</script>';
  }

  $kategori = mysqli_query($conn, "SELECT * FROM tb_category WHERE category_id = '".$_GET['id']."' ");
  if(mysqli_num_rows($kategori) == 0){
    echo '<script>window.location="produk.php"</script>';
  }
  $k = mysqli_fetch_object($kategori);
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
    <h3>Edit Data</h3>
    <div class="box">
      <form action="" method="POST">
      <input type="text" name="nama" placeholder="Nama Produk" class="input-control" value="<?php echo $k->category_name ?>" required>
      <input type="submit" name="submit" value="Submit" class="btn">
      </form>
      <?php
        if(isset($_POST['submit'])){

          $nama = ucwords($_POST['nama']);

          $update = mysqli_query($conn, "UPDATE tb_category SET
                                  category_name = '".$nama."' 
                                  WHERE category_id = '".$k->category_id."' ");

          if($update){
            echo '<script>alert("Edit Data Berhasil")</script>';
            echo '<script>window.location="produk.php"</script>';
          }else{
            echo 'gagal'.mysqli_error($conn);
          }
        }
      ?>
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