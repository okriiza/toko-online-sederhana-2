<?php  
if(!isset($_SESSION)) 
{ 
    session_start(); 
}

$id_produk = $_GET["id"];
unset($_SESSION["keranjang"][$id_produk]);
// menampilkan pesan
echo "<script>alert('Produk telah terhapus dari keranjang');</script>";
// setelah di klik 
echo "<script>location='keranjang.php';</script>";
?>