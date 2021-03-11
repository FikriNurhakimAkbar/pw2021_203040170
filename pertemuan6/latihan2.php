<?php

/*
---------------------------
Fikri Nurhakim Akbar
---------------------------
203040170
---------------------------
Teknik Informatika (D)
---------------------------
Minggu, 28 Februari 2021
---------------------------
Pemrograman Web
---------------------------
Pertemuan 6 - Array Associative
---------------------------
*/

?>

<?php 

/* 
---------------------------
Array Associative
Keynya adalah string yang dibuat sendiri
---------------------------
contoh sederhana
$mahasiswa = [
    "nama" => "Fikri", 
    "nrp" => "203040170",
    "email" => "fikri",
    "jurusan" => "Teknik Informatika"
];

echo $mahasiswa["jurusan"];
---------------------------
contoh multidimensi
$mahasiswa = [
    [
        "nama" => "Fikri", 
        "nrp" => "203040170", 
        "jurusan" => "Teknik Informatika", 
        "email" => "fikri2906@gmail.com"
    ],
    [
        "nama" => "Dery", 
        "nrp" => "20301012", 
        "jurusan" => "Teknologi Pangan", 
        "email" => "dery@gmail.com"
    ],
    [
        "nama" => "Elvira", 
        "nrp" => "203040134", 
        "jurusan" => "Teknik Industri", 
        "email" => "elvira@gmail.com"
    ]
];
            indexnya    indexnya string
                \       |
echo $mahasiswa[1]["nama"];
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
        "genre" => "Drama history",
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

<?php foreach( $films as $film ) : ?>
    <ul>
        <li>
            <img src="gambar/<?= $film["gambar"]; ?>">
        </li>
        <li>Judul : <?= $film["judul"] ?></li>
        <li>Sutradara : <?= $film["sutradara"] ?></li>
        <li>Rilis : <?= $film["rilis"] ?></li>
        <li>Genre : <?= $film["genre"] ?></li>
    </ul>
<?php endforeach ?>
    
</body>
</html>