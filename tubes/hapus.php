<?php

include 'database.php';

if(isset($_GET['idk'])){
	$delete = mysqli_query($conn, "DELETE FROM tb_category WHERE category_id = '".$_GET['idk']."' ");
	echo '<script>window.location="kategori.php"</script>';
}

if(isset($_GET['idp'])){
	$produk = mysqli_query($conn, "SELECT product_image FROM tb_product WHERE product_id = '".$_GET['idp']."' ");
	$p = mysqli_fetch_object($produk);

	unlink('./img/'.$p->product_image);

	$delete = mysqli_query($conn, "DELETE FROM tb_product WHERE product_id = '".$_GET['idp']."' ");
	echo '<script>window.location="produk.php"</script>';
}

?>