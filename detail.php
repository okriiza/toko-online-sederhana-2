<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
?>
<?php include 'koneksi.php'; ?>
<?php 

// mendapatkan id_produk dari url
$id_produk = $_GET["id"];

//query ambil data 
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();
?>

<?php include 'navbar.php'; ?>

<section class="konten">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="img/<?php echo $detail["foto_produk"]; ?>" alt="" class="img-responsive">
            </div>
            <div class="col-md-6">
                <h2><?php echo $detail["nama_produk"]; ?></h2>
                <h4>Rp. <?php echo number_format($detail["harga_produk"]);?></h4>
                <h5>Stok : <?php echo $detail["stok_produk"]; ?></h5>
                <form action="" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="number" min="1" class="form-control" name="jumlah" placeholder="masukkan berapa jumlah yang akan di beli" max="<?php echo $detail["stok_produk"]; ?>">
                            <div class="input-group-btn">
                                <button class="btn btn-primary" name="beli"><i class="fa fa-cart"></i> Beli</button>
                            </div>
                        </div>
                    </div>
                </form> <!-- /.form -->
                
                <?php 
                // jk ada tombol beli
                if (isset($_POST["beli"])) {
                    // mendapatkan jumlah yang di inputkan
                    $jumlah = $_POST["jumlah"];
                    
                    // masukkan di keranjang belanja
                    $_SESSION["keranjang"][$id_produk] = $jumlah;

                    echo "<script>alert('Produk telah masuk ke keranjang belanja')</script>";    
                    echo "<script>location='keranjang.php';</script>";             
                }
                ?>
                <p class="text-justify"><?php echo $detail["deskripsi_produk"]; ?></p>
                <a href="index.php" class="btn btn-info"> <i class="fa fa-angle-double-left"></i> Kembali</a>
            </div> <!-- /.col-md-6 -->
        </div> <!-- /.row -->
    </div> <!-- /.kontainer -->
</section> <!-- /.konten -->

<?php include 'footer.php' ;?>