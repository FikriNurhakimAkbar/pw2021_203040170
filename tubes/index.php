<?php
include 'database.php';
  session_start();
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
    <link rel="stylesheet" type="text/css" href="css/styles.css">

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
    <div class="search">
    <form action="produk-terbaru.php" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    </div>
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
    <a class="nav-link" href="profil.php"><i class="fa fa-cube"></i>PROFIL</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="kategori.php"><i class="fa fa-tags"></i>KATEGORI</a>
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


  <div class="col-md-10">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/art1.jpg" class="d-block w-100" alt="..." height="650px">
    </div>
    <div class="carousel-item">
      <img src="img/art2.jpg" class="d-block w-100" alt="..." height="650px">
    </div>
    <div class="carousel-item">
      <img src="img/art3.jpg" class="d-block w-100" alt="..." height="650px">
    </div>
    <div class="carousel-item">
      <img src="img/art4.jpg" class="d-block w-100" alt="..." height="650px">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- produk terbaru -->
<div class="section">
  <div class="container">
    <div class="row">
    <div class="col-md-4">
    <h3>Produk Terbaru</h3>
    <div class="box">
      <?php
      $produk = mysqli_query($conn, "SELECT * FROM tb_product ORDER BY product_id DESC LIMIT 8");
      if(mysqli_num_rows($produk) > 0){
        while($p = mysqli_fetch_array($produk)){
      ?>
      <a href="detail-produk.php?id=<?php echo $p['product_id'] ?>">
        <div class="col-8">
          <img src="img/<?php echo $p['product_image'] ?>" width="250">
          <p class="nama"><?php echo $p['product_name'] ?></p>
          <p class="harga">Rp. <?php echo $p['product_price'] ?></p>
        </div>
      </a>
    <?php }}else{ ?>
      <p>Produk tidak ada</p>
    <?php } ?>
    </div>
    </div>
  </div>
  </div>
</div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>