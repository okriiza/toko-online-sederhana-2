<?php

// mengambil data berdasarkan id pelanggan
$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

// delete data berdasarkan id pelanggan
$koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
echo "<script>alert('pelanggan Terhapus');</script>";
echo "<script>location='index.php?halaman=pelanggan';</script>";
?>