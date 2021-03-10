<?php

/*
---------------------------
Fikri Nurhakim Akbar
---------------------------
203040170
---------------------------
Teknik Informatika (D)
---------------------------
Jumat, 5 Maret 2021
---------------------------
Pemrograman Web
---------------------------
Pertemuan 5 - Array
---------------------------
*/

?>

<?php 

/* 
---------------------------
Array numeric
array yang indexnya angka
---------------------------
Array Assosiatif
array yang indexnya string
---------------------------
*/

$mahasiswa = [
    ["Fikri", "203040123", "Teknik Informatika", "fikri29@gmail.com"],
    ["Dery", "203010453", "Teknologi pangan", "dery12@gmail.com"],
    ["Elvira", "203030111", "Teknik Industri", "elvira@gmail.com"]
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>

<h1>Daftar Mahasiswa</h1>

<?php foreach( $mahasiswa as $mhs ) : ?>
    <ul>
        <li>Nama : <?= $mhs[0] ?></li>
        <li>NRP : <?= $mhs[1] ?></li>
        <li>Jurusan : <?= $mhs[2] ?></li>
        <li>Email : <?= $mhs[3] ?></li>
    </ul>
<?php endforeach ?>
    
</body>
</html>