<?php
/* 
Fikri Nurhakim Akbar
203040170
https://github.com/FikriNurhakimAkbar/pw2021_203040170.git
Pertemuan 13 (24 April 2021)
AJAX Liver Search
*/
?>
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
</head>

<body>

  <h3>Form Registrasi</h3>

  <form action="" method="POST">
    <ul>
      <li>
        <label>
          Username :
          <input type="text" name="username" autofocus autocomplete="off" required>
        </label>
      </li>
      <li>
        <label>
          Password :
          <input type="password" name="password1" required>
        </label>
      </li>
      <li>
        <label>
          Konfirmasi Password :
          <input type="password" name="password2" required>
        </label>
      </li>
      <li>
        <button type="submit" name="registrasi">Registrasi</button>
      </li>
    </ul>
  </form>

</body>

</html>