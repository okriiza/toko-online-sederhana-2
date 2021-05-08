﻿<?php
session_start();
//koneksi ke database
$koneksi = new mysqli("localhost","root","","17111114_penjualan");
// mengamankan admin
if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Anda harus login dahulu');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dasbor Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Admin Pakaianku</a> 
        </div> <!-- /. navbar-header  -->
        <div style="color: white;
        padding: 15px 50px 5px 50px;
        float: right;
        font-size: 16px;"> Last access : 30 juli 2019 &nbsp; <a href="index.php?halaman=logout" class="btn btn-info square-btn-adjust"> <i class="fa fa-sign-out"></i> Logout</a> </div>
    </nav>   <!-- /. navbar navbar-default navbar-cls-top  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
            <li class="text-center">
                <img src="assets/img/find_user.png" class="user-image img-responsive"/>
                </li>
                <li><a href="index.php"><i class="fa fa-dashboard fa-2x"></i> Dashboard</a></li>
                <li><a href="index.php?halaman=produk"><i class="fa fa-cube fa-2x"></i> Produk</a></li>
                <li><a href="index.php?halaman=pembelian"><i class="fa fa-shopping-cart fa-2x"></i> Pembelian</a></li>
                <li><a href="index.php?halaman=pelanggan"><i class="fa fa-user fa-2x"></i> Pelanggan</a></li>
                <li><a href="index.php?halaman=laporan_pembelian"><i class="fa fa-file fa-2x"></i> Laporan</a></li>
                <!-- <li><a href="index.php?halaman=logout"><i class="fa fa-sign-out fa-2x"></i> Logout</a></li> -->
            </ul>
        </div> <!-- /. sidebar-collapse  -->
    </nav>  <!-- /. navbar-default navbar-side -->

    
    <div id="page-wrapper" >
        <div id="page-inner">    
            <?php 
            if (isset($_GET['halaman'])) {
                if ($_GET['halaman']=="produk") {
                    include 'produk.php';
                } elseif ($_GET['halaman']=="pembelian"){
                    include 'pembelian.php';
                } elseif ($_GET['halaman']=="pelanggan") {
                    include 'pelanggan.php';
                } elseif ($_GET['halaman']=="detail") {
                    include 'detail.php';
                } elseif ($_GET['halaman']=="tambahproduk") {
                    include 'tambahproduk.php';
                } elseif ($_GET['halaman']=="tambahpelanggan") {
                    include 'tambahpelanggan.php';
                } elseif ($_GET['halaman']=="hapusproduk") {
                    include 'hapusproduk.php';
                } elseif ($_GET['halaman']=="ubahproduk") {
                    include 'ubahproduk.php';
                } elseif ($_GET['halaman']=="logout") {
                    include 'logout.php';
                } elseif ($_GET['halaman']=="hapuspelanggan") {
                    include 'hapuspelanggan.php';
                } elseif ($_GET['halaman']=="pembayaran") {
                    include 'pembayaran.php';
                } elseif ($_GET['halaman']=="laporan_pembelian") {
                    include 'laporan_pembelian.php';
                }
                
            } else{
                include 'home.php';
            }
            ?>
        </div> <!-- /. PAGE INNER  -->
    </div> <!-- /. PAGE WRAPPER  -->
</div> <!-- /. WRAPPER  -->


    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- MORRIS CHART SCRIPTS -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
</body>
</html>
