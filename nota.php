<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
//koneksi ke database
include 'koneksi.php';
?>
<?php include 'navbar.php' ;?>


<?php 
    $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
    $detail = $ambil->fetch_assoc();
?>

<!-- Jika pelanggan yang beli tidak sama dengan pelanggan yang login, maka di larikan ke riwayat.php karena dia tidak berhak melihat mota orang lain, "PELANGGAN YANG BELI HARUS PELANGGAN YANG LOGIN" -->
<?php 
//mendapatkan id pelanggan yang beli
$idpelangganyangbeli = $detail["id_pelanggan"];

// mendapatkan id_[elanggan yang login]
$idpelangganyanglogin = $_SESSION["pelanggan"]["id_pelanggan"];

if ($idpelangganyangbeli!==$idpelangganyanglogin) {
    echo "<script>alert('Kamu Nakal Yahhhh :v');</script>";
    echo "<script>location='riwayat.php';</script>";
}

?>

<section class="konten">
    <div class="container">
        <div class="page-header">
            <h2>Detail Pembelian</h2>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Detail Pembelian</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <h3>Pembelian</h3>
                        <strong>No. Pembelian: <?php echo $detail['id_pembelian']; ?></strong><br>
                        <!-- Tanggal: <?php //echo $detail['tanggal_pembelian']; ?><br> -->
                        Total: Rp. <?php echo number_format($detail['total_pembelian']); ?>
                    </div>
                    <div class="col-md-4">
                        <h3>Pelanggan</h3>
                        <strong><?php echo $detail['nama_pelanggan']; ?></strong> <br>
                        <p>
                            <?php echo $detail['telepon_pelanggan'];?> <br>
                            <?php echo $detail['email_pelanggan']; ?>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <h3>Pengiriman</h3>
                        <strong><?php  echo $detail['nama_kota'] ?></strong> <br>
                        Ongkos Kirim: Rp. <?php echo number_format($detail['tarif']); ?><br>
                        Alamat: <?php echo $detail['alamat_pengiriman'];?>
                    </div>
                </div> <!-- /.row -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Berat</th>
                            <th>Jumlah</th>
                            <th>Subberat</th>
                            <th>Subharga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor=1;?>
                        <?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
                        <?php while($pecah = $ambil->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $nomor ?></td>
                            <td><?php echo $pecah['nama']; ?></td>
                            <td>Rp. <?php echo number_format($pecah['harga']);?></td>
                            <td><?php echo $pecah['berat'];?> Gr.</td>
                            <td><?php echo $pecah['jumlah'];?></td>
                            <td><?php echo $pecah['subberat'];?> Gr.</td>
                            <td>Rp. <?php echo number_format($pecah['subharga']);?></td>
                        </tr>
                        <?php $nomor++?>
                        <?php }?>
                    </tbody>
                    <tfoot>
                <tr>
                    <th colspan="6">Total Pembelian + Ongkir </th>
                    <th>Rp. <?php echo number_format($detail['total_pembelian']); ?></th>
                </tr>
            </tfoot>
                </table>
            </div> <!-- /.panel-body -->
        </div> <!-- /.panel panel-primary-->
        <div class="row">
            <div class="col-md-7">
                <div class="alert alert-info">
                    <p>
                        Silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?> ke <br>
                        <strong> BANK BRI 089026509236509 AN. OKRIIZA </strong>
                    </p>
                </div> <!-- /.alert alert-info -->
                <a href="index.php" class="btn btn-primary"> <i class="fa fa-angle-double-left"></i> Kembali Berbelanja</a>
            </div> <!-- /.col-md-7-->
        </div> <!-- /.row -->
    </div> <!-- /.kontainer -->
</section> <!-- /.konten -->


<?php include 'footer.php' ;?>