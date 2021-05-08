<?php 
include 'koneksi.php';

?>
<?php  
$keyword = $_GET["keyword"];

$semuadata=array();
$ambil = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%' OR deskripsi_produk LIKE '%$keyword%'");

while($pecah = $ambil->fetch_assoc()){
    $semuadata[]=$pecah;
}

// echo "<pre>";
// print_r($semuadata);
// echo "</pre>";

?>
<?php include 'navbar.php'; ?>
<section id="halaman-artikel">
    <div class="container">
        <h3>Hasil Pencarian</h3>
        <hr>
        <?php if (empty($semuadata)):  ?>
            <div class="alert alert-danger">Produk <strong><?php echo $keyword ?></strong> Tidak Ditemukan</div>
        <?php endif ?>
        <div class="row">
            <?php foreach ($semuadata as $key => $value): ?>
            <div class="col-sm-6 col-md-3">
                <div class="thumbnail ">
                    <img src="img/<?php echo $value['foto_produk']; ?>" alt="..." class="img-rounded">
                        <div class="caption">
                            <!-- data di tampilkan -->
                            <h2><?php echo $value['nama_produk'] ;?></h2>
                            <p align="justify"><?php echo $value['deskripsi_produk'] ;?></p>
                            <h5> Rp : <?php echo number_format($value['harga_produk']) ;?></h5>
                            <a href="beli.php?id=<?php echo $value['id_produk'] ;?>" class="btn btn-primary btn-sm" role="button"><i class="fa fa-shopping-cart"></i> Add To Cart</a>
                            <a href="detail.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-default btn-sm" type="button"> <i class="fa fa-info-circle"></i> Detail Juice</a>
                        </div> <!-- /.caption -->
                </div> <!-- /.thumbnail -->
            </div> <!-- /.col-sm-6 col-md-4 -->
            <?php endforeach ?>    <!-- /.penutup -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section> <!-- /.halaman-artikel-->