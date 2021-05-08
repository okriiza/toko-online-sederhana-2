<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
//koneksi ke database
include 'koneksi.php';

if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) {
    echo "<script>alert('Keranjang kosong, silahkan belanja terlebih dahulu');</script>";
    echo "<script>location='index.php';</script>";
}

?>

<?php include 'navbar.php' ;?>



<section class="konten">
    <div class="container">
        <h1>Keranjang Belanja</h1>
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subharga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor=1;?>
                <?php foreach ($_SESSION["keranjang"] as $id_produk =>$jumlah): ?>
                <!-- menampilkan produk yang sedang diperulangkan berdasarkan id_produk -->
                <?php  
                    $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk ='$id_produk'");
                $pecah = $ambil->fetch_assoc();
                $subharga = $pecah["harga_produk"]*$jumlah;
                ?>
                <tr>
                    <td align="center"><?php echo $nomor; ?></td>
                    <td><?php  echo $pecah["nama_produk"];?></td>
                    <td>Rp. <?php  echo number_format($pecah["harga_produk"]);?></td>
                    <td><?php  echo $jumlah;?></td>
                    <td>Rp. <?php echo  number_format($subharga);?></td>
                    <td>
                        <a href="hapuskeranjang.php?id=<?php echo $id_produk ?>" class="btn btn-danger btn-xs">Hapus</a>
                    </td>
                </tr>
                <?php $nomor++;?>
                <?php endforeach ?>
            </tbody>
        </table> <!-- /.table table-bordered -->
        <a href="index.php" class="btn btn-default"> <i class="fa fa-angle-double-left"></i> Lanjutkan Belanja</a>
        <a href="checkout.php" class="btn btn-primary"> <i class="fa fa-check-circle"></i> Checkout</a>
    </div> <!-- /.kontainer -->
</section> <!-- /.konten -->


<?php include 'footer.php' ;?>