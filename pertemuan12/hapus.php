<?php
/* 
Fikri Nurhakim Akbar
203040170
https://github.com/FikriNurhakimAkbar/pw2021_203040170.git
Pertemuan 12 (24 April 2021)
Login dan Registrasi
*/
?>
<?php

session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

// jika tidak ada id di url
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

// mengambil id dari url
$id = $_GET['id'];

if (hapus($id) > 0) {
  echo "<script>
          alert('data berhasil dihapus');
          document.location.href = 'index.php';
       </script>";
} else {
  echo "data gagal ditambahkan!";
}