<?php
// mengambil data berdasarkan id produk
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotoproduk = $pecah['foto_produk'];
if (file_exists("../img/$fotoproduk")) {
    unlink("../img/$fotoproduk");
}
//delet data berdasarkan id produk
$koneksi->query("DELETE FROM produk WHERE id_produk='$_GET[id]'");
echo "<script>alert('Produk Terhapus');</script>";
echo "<script>location='index.php?halaman=produk';</script>";
?>