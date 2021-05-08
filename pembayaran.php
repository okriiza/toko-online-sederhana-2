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

// mendapatkan id_pembelian dari url
$idpem = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
$detpem = $ambil->fetch_assoc();


// mendapatkan id_pelanggan yang beli
$id_pelanggan_beli = $detpem["id_pelanggan"];
// mendapatkan id_pelanggan yang login
$id_pelanggan0login = $_SESSION["pelanggan"]["id_pelanggan"];

if ($id_pelanggan0login !== $id_pelanggan_beli) {
    echo "<script>alert('Kamu Nakal Yahh');</script>";
    echo "<script>location='riwayat.php';</script>";
}
?>

<!-- mengambil menu navbar -->
<?php include 'navbar.php'; ?>

<!-- Pembuatan daftar Pelanggan -->
<section class="konten">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"> <i class="fa fa-user"></i> Konfirmasi Pembayaran</h3>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post" enctype="multipart/form-data">
                        <!-- <p class="text-success"> <b>Kirim Bukti Pembayaran Disini !</b> </p> -->
                        <div class="alert alert-info"> Total tagihan Anda <strong>Rp. <?php echo number_format($detpem["total_pembelian"]) ?></strong></div>
                            <div class="form-group">
                                <label for="" >Nama Penyetor</label>
                                <input type="text" class="form-control" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="" >Bank</label>
                                <input type="text" class="form-control" name="bank" required>
                            </div>
                            <div class="form-group">
                                <label for="" >Jumlah</label>
                                <input type="nunber" class="form-control" name="jumlah" required min="1">
                            </div>
                            <div class="form-group">
                                <label for="" >Foto Bukti</label>
                                <input type="file" class="form-control" name="bukti" required>
                                <p class="text-danger"> Foto Bukti Harus JPG maksimal 2MB</p>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" name="kirim"> <i class="fa fa-sign-in"></i> Kirim</button>
                            </div>
                        </form><!-- /.form -->
                    <?php 
                    // jika ada tombol kirim/ tombil di kirim di tekan
                    if (isset($_POST["kirim"])) {
                        // upload dulu foto bukti
                        $namabukti = $_FILES["bukti"]["name"];
                        $lokasibukti = $_FILES["bukti"]["tmp_name"];
                        $namafiks = date("ymdHis").$namabukti;
                        move_uploaded_file($lokasibukti,"bukti_pembayaran/$namafiks");

                        $nama = $_POST["nama"];
                        $bank = $_POST["bank"];
                        $jumlah = $_POST["jumlah"];
                        $tanggal = date("Y-m-d");

                        // Simpan Pembayaran
                        $koneksi->query("INSERT INTO pembayaran(id_pembelian, nama, bank, jumlah, tanggal,bukti) VALUE('$idpem','$nama','$bank', '$jumlah','$tanggal','$namafiks')");

                        // update data pembelian dari pending jadi sudah kirim pembayaran
                        $koneksi->query("UPDATE pembelian SET status_pembelian='sudah kirim pembayaran' WHERE id_pembelian='$idpem'");

                        echo "<script>alert('Bukti Pembayaran Terkirim');</script>";
                        echo "<script>location='riwayat.php';</script>";
                    }
                    
                    
                    ?>
                    </div> <!-- /.panel-body -->
                </div> <!-- /.panel panel-primary -->
            </div> <!-- /.col-md-4 col-md-offset-4 -->
        </div> <!-- /.row -->
    </div> <!-- /.kontainer -->
</section> <!-- /.konten -->


<?php include 'footer.php' ;?>