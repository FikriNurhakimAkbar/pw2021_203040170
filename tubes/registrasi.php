<?php

session_start();

if (isset($_SESSION['login'])) {
  header("Location: index.php");
  exit;
}

require 'function.php';

if (isset($_POST['registrasi'])) {
  if (registrasi($_POST) > 0) {
    echo "<script>
            alert('User baru berhasil ditambahkan. silahkan login!');
            document.location.href = 'login.php';
          </script>";
  } else {
    echo 'User gagal ditambahkan!';
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrasi</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <style>
    label {
      display: block;
    }
  </style>
</head>

<body>
  <div class="box-form">
    <div class="title-form">
  Form Registrasi
  </div>

  <div class="content-form">
  <form action="" method="POST">
    <div class="form-group">
    <ul>
        <label>
          Username :
          <input type="text" name="username" autofocus autocomplete="off" required>
        </label>
      </div>
      <div class="form-group">
        <label>
          Password :
          <input type="password" name="password1" required>
        </label>
      </div>
      <div class="form-group">
        <label>
          Konfirmasi Password :
          <input type="password" name="password2" required>
        </label>
      </div>
        <button type="submit" name="registrasi">Registrasi</button>
    </ul>
  </form>

</body>

</html>