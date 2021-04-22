<?php
/*
Fikri Nurhakim Akbar
203040170
Praktikum PW SHIFT JUMAT JAM 13:00
*/
?>

<?php
session_start();
session_destroy();
header("Location: ../index.php");
die;