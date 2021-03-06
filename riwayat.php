<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
include 'koneksi.php';

// jika tidak ada session pelanggan (Belum Login)
if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) {
    echo "<script>alert('Silahkan Login Terlebih Dulu');</script>";
    echo "<script>location='login.php';</script>";
}
?>

<!-- mengambil menu navbar -->
<?php include 'navbar.php'; ?>

<section class="konten">
    <div class="container">
        <h1>Riwayat Belanja <?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?></h1>
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $nomor=1;
                // mendapatakn id_pelanggan yang login dari session
                $id_pelanggan = $_SESSION["pelanggan"]['id_pelanggan'];
                $ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan'");
                while($pecah = $ambil->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $pecah["tanggal_pembelian"]; ?></td>
                    <td>
                        <?php echo $pecah["status_pembelian"]; ?>
                        <br>
                        <?php if (!empty($pecah['resi_pengiriman'])) : ?>
                        Resi: <?php echo $pecah['resi_pengiriman']; ?>
                        <?php endif ?>
                    </td>
                    <td>Rp. <?php echo number_format($pecah["total_pembelian"]); ?></td>
                    <td>
                        <a href="nota.php?id=<?php echo $pecah["id_pembelian"] ?>" class="btn btn-info btn-xs">Nota</a>
                        <?php if ($pecah['status_pembelian']=="Pending"): ?> 
                            <a href="pembayaran.php?id=<?php echo $pecah["id_pembelian"] ?>" class="btn btn-success btn-xs">Input Pembayaran</a>
                        <?php else: ?>
                            <a href="lihat_pembayaran.php?id=<?php echo $pecah["id_pembelian"]; ?>" class="btn btn-warning btn-xs"> Lihat Pembayaran</a>
                        <?php endif  ?>
                        
                        
                    </td>
                </tr>
                <?php $nomor++; ?>
                <?php } ?>
            </tbody>
        </table> <!-- /.table table-bordered -->
    </div> <!-- /.kontainer -->
</section> <!-- /.konten -->


<?php include 'footer.php' ;?>