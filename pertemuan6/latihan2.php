<?php

/*
---------------------------
Fikri Nurhakim Akbar
---------------------------
203040170
---------------------------
Teknik Informatika (D)
---------------------------
Senin, 8 Maret 2021
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
    "email" => "fikri29",
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
        "email" => "fikri29@gmail.com"
    ],
    [
        "nama" => "Dery", 
        "nrp" => "203010012", 
        "jurusan" => "Teknologi Pangan", 
        "email" => "dery12@gmail.com"
    ],
    [
        "nama" => "Elvira", 
        "nrp" => "203031234", 
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
        "judul" => "Godzilla vs Kong", 
        "sutradara" => "Adam Wingard", 
        "rilis" => "2021", 
        "genre" => "Sci-fi Action",
        "gambar" => "monster.jpg"
    ],
    [
        "judul" => "Tenet", 
        "sutradara" => "Christoper Nolan", 
        "rilis" => "2020", 
        "genre" => "Sci-fi Action",
        "gambar" => "tenet.jpg"
    ],
    [
        "judul" => "Avenger End Game", 
        "sutradara" => "Kevin Feige", 
        "rilis" => "2019", 
        "genre" => "Sci-fi Action",
        "gambar" => "avenger.jpg"
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