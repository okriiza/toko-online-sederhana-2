<?php
if (!isset($_SESSION)) {
    session_start();
}
include 'koneksi.php';
?>

<!-- mengambil menu navbar -->
<?php include 'navbar.php'; ?>


<header class="Jumbotron">
    <div class="container">
        <div class="jumbotron">
        <div class="row">
        <div class="col-md-6">
            <h1 style="font-size:39px">Produk Spesial Akhir Bulan</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus autem reiciendis velit deserunt quisquam officiis veniam cumque dignissimos corporis at numquam magnam aliquid commodi vitae, sequi provident eveniet. Saepe, adipisci.</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
        </div>
        <div class="col-md-6">
            <img src="img/3.jpg" alt="" width="300" heigth="300" style="">
        </div>

        </div>
        </div>
    </div>

</header>

<section id="halaman-artikel">
    <div class="container">
        <div class="row">
        <h2>Produk Terbaru</h2>
        <hr>
            <!-- mengambil data pada database -->
            <?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
            <?php while ($perproduk = $ambil->fetch_assoc()) {; ?>
                <!-- pembuka -->
                <div class="col-md-3">
                    <div class="thumbnail ">
                        <img src="img/<?php echo $perproduk['foto_produk']; ?>" alt="..." width="400" height="400" class="img-rounded">
                        <div class="caption">
                            <!-- data di tampilkan -->
                            <h2 class="text-center"><?php echo $perproduk['nama_produk']; ?></h2>
                            <p align="justify"><?php echo $perproduk['deskripsi_produk']; ?></p>
                            <h5 class="text-center"> Rp : <?php echo number_format($perproduk['harga_produk']); ?></h5>
                            <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary btn-sm" role="button"><i class="fa fa-shopping-cart"></i> Add To Cart</a>
                            <a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-default btn-sm" type="button"> <i class="fa fa-info-circle"></i> Detail Pakaian</a>
                        </div> <!-- /.caption -->
                    </div> <!-- /.thumbnail -->
                </div> <!-- /.col-sm-6 col-md-4 -->
            <?php } ?>
            <!-- /.penutup -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section> <!-- /.halaman-artikel-->


<?php include 'footer.php'; ?>