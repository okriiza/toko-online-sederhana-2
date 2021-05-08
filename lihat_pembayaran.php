<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
include 'koneksi.php';

$id_pembelian = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM pembayaran 
LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian
WHERE pembelian.id_pembelian='$id_pembelian'");
$detbay = $ambil->fetch_assoc();

// jika belum ada data pembayaran
if (empty($detbay)) {
    echo "<script>alert('Belum Ada Data Pembayaran');</script>";
    echo "<script>location='riwayat.php';</script>";
    exit();
}

//jika data pelanggan yang bayar tidak sesuai dengan yang login
if ($_SESSION["pelanggan"]['id_pelanggan']!==$detbay["id_pelanggan"]) {
    echo "<script>alert('Anda Tidak Berhak Melihat Pembayaran Orang Lain');</script>";
    echo "<script>location='riwayat.php';</script>";
    exit();
}
?>

<!-- mengambil menu navbar -->
<?php include 'navbar.php'; ?>

<section class="konten">
    <div class="container">
        <h1>Lihat Pembayaran</h1>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        <td><?php echo $detbay["nama"];?></td>
                    </tr>
                    <tr>
                        <th>bank</th>
                        <td><?php echo $detbay["bank"];?></td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td><?php echo $detbay["tanggal"];?></td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td>Rp. <?php echo number_format($detbay["jumlah"]);?></td>
                    </tr>
                </table> <!-- /.table table-bordered -->
            </div><!-- /.col-md-6 -->
            <div class="col-md-6">
                <!-- <label for=""> Bukti Pembayaran </label> -->
                <img src="bukti_pembayaran/<?php echo $detbay["bukti"]; ?>" alt="" class="img-responsive">
            </div><!-- /.col-md-6 -->
        </div> <!-- /.row-->
    </div> <!-- /.kontainer -->
</section> <!-- /.konten -->


<?php include 'footer.php' ;?>