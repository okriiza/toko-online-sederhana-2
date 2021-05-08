<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- BOOTSTRAP STYLES-->
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <!-- CUSTOM STYLES-->
    <link rel="stylesheet" href="custom.css">
    <!-- FONTAWESOME STYLES-->
    <link href="admin/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Google FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700%7CPT+Serif:400,700,400italic' rel='stylesheet'>
    <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <title>Pakaianku</title>
</head> <!-- /.head -->
<body>
<!-- navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#naff" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Pakaianku</a>
        </div> <!-- /.navbar-header -->

        <div class="collapse navbar-collapse" id="naff">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php"> <i class="fa fa-home"></i> Home</a></li>
                <li><a href="keranjang.php"> <i class="fa fa-shopping-cart"></i> Keranjang</a></li>
                <li class="dropdown"> 
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-tags"></i> Official Account <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Official Instagram</a></li>
                        <li><a href="#">Official Facebook</a></li>
                        <li><a href="#">Official Line</a></li>
                    </ul>
                </li>
                <!-- jika sudah login (ada session pelanggan) -->
                <?php if (isset($_SESSION["pelanggan"]))  :?>
                    
                    <li><a href="Logout.php"> <i class="fa fa-sign-out"></i> Logout</a></li>
                    <li><a href="checkout.php"> <i class="fa fa-check-circle"></i> Checkout</a></li>
                    <li><a href="riwayat.php"> <i class="fa fa-check-circle"></i> Riwayat</a></li>
                <!-- selain itu (blm login || blm ada session pelanggan) -->
                <?php  else: ?>
                    <li><a href="Login.php"> <i class="fa fa-sign-in"></i> Login</a></li>
                    <li><a href="daftar.php"> <i class="fa fa-user"></i> Daftar</a></li>
                <?php  endif ?>
                <li><form action="pencarian.php" class="navbar-form" method="GET">
                    <input type="text" class="form-control" placeholder="Cari Barang" name="keyword">
                    <!-- <button class="btn btn-primary"> Cari</button> -->
                </form></li>
            </ul> <!-- /.nav navbar-nav navbar-right -->
        </div> <!-- /.collapse navbar-collapse -->
    </div> <!-- /.container -->
</nav> <!-- /.navbar navbar-default navbar-fixed-top -->