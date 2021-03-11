<?php

/*
---------------------------
Fikri Nurhakim Akbar
---------------------------
203040170
---------------------------
Teknik Informatika (D)
---------------------------
Rabu, 3 Maret 2021
---------------------------
Pemrograman Web
---------------------------
Pertemuan 7 - GET & POST
---------------------------
*/

?>

<?php 

/*
---------------------------
Variabel Scope / Lingkup Variabel
Variabel yang berada diluar function sama yang didalam function itu ruang lingkupnya berbeda
$x = 10; -> variabel lokal untuk halaman

function tampilX() {
    $x = 20; -> variabel lokal untuk function ini saja
    global $x; -> ketika kita ganti dengan baris ini maka akan mencari variabel yang berada diluar function ini
    echo $x;
}
tampilX();

echo "<br>";
echo $x;
---------------------------
Superglobal Variabel PHP 
semuanya array assosiative
$_GET -> datanya akan dikirim melalui url dan ditangkap dengan variabel superglobalnya
$_POST ->
$_REQUEST ->
$_SESSION ->
$_COOKIE ->
$_SERVER ->
$_ENV ->
---------------------------
*/

$films = [
    [
        "judul" => "Avenger End Game", 
        "sutradara" => "Kevin Feige", 
        "rilis" => "2019", 
        "genre" => "Sci-fi Action",
        "gambar" => "avenger.jpg"
    ],
    [
        "judul" => "Jumanji Welcome To The Jungle 2", 
        "sutradara" => "Jake Kasdan", 
        "rilis" => "2019", 
        "genre" => "Adventures Comedy Fantasy Action",
        "gambar" => "jumanji.jpg"
    ],
    [
        "judul" => "Bumi Manusia", 
        "sutradara" => "Hanung Bramantyo", 
        "rilis" => "2019", 
        "genre" => "Drama History,
        "gambar" => "bumi manusia.jpg"
    ]
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

<h1>Daftar Film</h1>

<!-- <?php foreach( $films as $film ) : ?>
    <ul>
        <li>
            <img src="gambar/<?= $film["gambar"]; ?>">
        </li>
        <li>Judul : <?= $film["judul"] ?></li>
        <li>Sutradara : <?= $film["sutradara"] ?></li>
        <li>Rilis : <?= $film["rilis"] ?></li>
        <li>Genre : <?= $film["genre"] ?></li>
    </ul>
<?php endforeach ?> -->

<ul>
    <?php foreach( $films as $film ) : ?>
        <li>
        <a href="latihan2.php?judul=<?= $film["judul"] ?>&sutradara=<?= $film["sutradara"] ?>&rilis=<?= $film["rilis"] ?>&genre=<?= $film["genre"] ?>&gambar=<?= $film["gambar"]; ?>"><?= $film["judul"] ?></a>
        </li>
    <?php endforeach ?>
</ul>
    
</body>
</html>