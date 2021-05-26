<?php
  session_start();
  include 'database.php';
  if($_SESSION['status_login'] != true){
      echo '<script>window.location="login.php"</script>';
  }

  $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."' ");
  if(mysqli_num_rows($produk) ==0){
    echo '<script>window.location="produk.php"</script>';
  }
  $p = mysqli_fetch_object($produk);
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
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

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
    <h3>Edit Data Produk</h3>
    <div class="box">
      <form action="" method="POST" enctype="multipart/form-data">
      <select class="input-control" name="kategori" required>
        <option value="">--Pilih--</option>
        <?php
          $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
          while($r = mysqli_fetch_array($kategori)){
        ?>
        <option value="<?php echo $r['category_id'] ?>" <?php echo ($r['category_id'] == $p->category_id)? 'selected':''; ?>><?php echo $r['category_name'] ?></option>
        <?php } ?>
      </select>

      <input type="text" name="nama" class="input-control" placeholder="Nama Produk" value="<?php echo $p->product_name ?>" required>
      <input type="text" name="harga" class="input-control" placeholder="Harga" value="<?php echo $p->product_price ?>" required>

      <img src="img/<?php echo $p->product_image ?>" width="100px">
      <input type="hidden" name="foto" value="<?php echo $p->product_image ?>">
      <input type="file" name="gambar" class="input-control">
      <textarea class="input-control" name="deskripsi" placeholder="Deskripsi">value="<?php echo $p->product_description ?>"</textarea><br>
      <select class="input-control" name="status">
        <option value="">--Pilih--</option>
        <option value="1" <?php echo ($p->product_status == 1)? 'selected':''; ?>>Aktif</option>
        <option value="0" <?php echo ($p->product_status == 0)? 'selected':''; ?>>Tidak Aktif</option>
      </select>
      <input type="submit" name="submit" value="Submit" class="btn">
      </form>
      <?php
        if(isset($_POST['submit'])){

          // data input dari form
          $kategori   = $_POST['kategori'];
          $nama       = $_POST['nama'];
          $harga      = $_POST['harga'];
          $deskripsi  = $_POST['deskripsi'];
          $status     = $_POST['status'];
          $foto       = $_POST['foto'];

          // data gambar baru 
          $filename = $_FILES['gambar']['name'];
          $tmp_name = $_FILES['gambar']['tmp_name'];

         
          // jika admin ganti gambar 
          if($filename !=''){
             $type1 = explode('.', $filename);
          $type2 = $type1[1];

          $newname = 'produk'.time().'.'.$type2;

          // menampung data format file yang diizinkan
          $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');


          // validasi format file
          if(!in_array($type2, $tipe_diizinkan)){
            // jika format file tidak ada didalam tipe diizinkan
            echo '<script>alert("Format file tidak diizinkan")</script>';

            }else{
              unlink('./img/.'.$foto);
              move_uploaded_file($tmp_name, './img/'.$newname);
              $namagambar = $newname;
            }

          }else{
            //jika admin tidak ganti gambar
            $namagambar = $foto;

          }

          // query update produk
          $update = mysqli_query($conn, "UPDATE tb_product SET
                                  category_id         = '".$kategori."',
                                  product_name        = '".$nama."',
                                  product_price       = '".$harga."',
                                  product_description = '".$deskripsi."',
                                  product_image       = '".$namagambar."',
                                  product_status      = '".$status."',
                                  WHERE product_id    = '".$p->product_id."' ");
          if($update){
              echo '<script>alert("Ubah data berhasil")</script>';
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
   <script>
       CKEDITOR.replace( 'deskripsi' );
   </script>
    
  </body>
</html>