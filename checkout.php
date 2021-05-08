<?php
if (!isset($_SESSION)) {
    session_start();
}
//koneksi ke database
include 'koneksi.php';

// jika tidak ada session pelanggan (belum login) maka dilarikan ke  login.php
if (!isset($_SESSION["pelanggan"])) {
    echo "<script>alert('Silahkan Login');</script>";
    echo "<script>location='login.php';</script>";
}
?>


<?php include 'navbar.php'; ?>

<section class="konten">
    <div class="container">
        <h1>Checkout</h1>
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subharga</th>
                </tr>
            </thead><!-- /.thead -->
            <tbody>
                <?php $nomor = 1; ?>
                <?php $totalbelanja = 0; ?>
                <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) : ?>
                    <!-- menampilkan produk yang sedang diperulangkan berdasarkan id_produk -->
                    <?php
                    $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk ='$id_produk'");
                    $pecah = $ambil->fetch_assoc();
                    $subharga = $pecah["harga_produk"] * $jumlah;
                    ?>
                    <tr>
                        <td align="center"><?php echo $nomor; ?></td>
                        <td><?php echo $pecah["nama_produk"]; ?></td>
                        <td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
                        <td><?php echo $jumlah; ?></td>
                        <td>Rp. <?php echo  number_format($subharga); ?></td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php $totalbelanja += $subharga; ?>
                <?php endforeach ?>
            </tbody><!-- /.tbody-->
            <tfoot>
                <tr>
                    <th colspan="4">Total Belanja</th>
                    <th>Rp. <?php echo number_format($totalbelanja) ?></th>
                </tr>
            </tfoot>
        </table><!-- /.table-->
        <form action="" method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan'] ?>" class="form-control">
                    </div><!-- /.form-group-->
                </div><!-- /.col-md-4 -->
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['telepon_pelanggan'] ?>" class="form-control">
                    </div><!-- /.form-group-->
                </div><!-- /.col-md-4 -->
                <div class="col-md-4">
                    <select name="id_ongkir" id="" class="form-control">
                        <option value="">Pilih Ongkos Kirim</option>
                        <?php $ambil = $koneksi->query("SELECT * FROM ongkir");
                        while ($perongkir = $ambil->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $perongkir["id_ongkir"] ?>">
                                <?php echo $perongkir['nama_kota'] ?> -
                                Rp. <?php echo number_format($perongkir['tarif']) ?>
                            </option>
                        <?php  } ?>
                    </select>
                </div> <!-- /.col-md-4 -->
            </div> <!-- /.row -->
            <div class="form-group">
                <label for="">Alamat Lengkap Pengiriman</label>
                <textarea class="form-control" name="alamat_pengiriman" placeholder="Masukkan alamat lengkap pengiriman (termasuk kode pos)"></textarea>
            </div> <!-- /.form-group-->
            <button class="btn btn-primary" name="checkout"> <i class="fa fa-check-circle"></i> Checkout</button>
        </form> <!-- /.form -->
        <?php
        if (isset($_POST["checkout"])) {
            $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
            $id_ongkir = $_POST["id_ongkir"];
            $tanggal_pembelian = date("y-m-d");
            $alamat_pengiriman = $_POST['alamat_pengiriman'];

            $ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
            $arrayongkir = $ambil->fetch_assoc();
            $nama_kota = $arrayongkir['nama_kota'];
            $tarif = $arrayongkir['tarif'];

            $total_pembelian = $totalbelanja + $tarif;

            // 1. menyimpan data ke table pembelian
            $koneksi->query("INSERT INTO pembelian (id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif,alamat_pengiriman) VALUE ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_kota','$tarif','$alamat_pengiriman') ");

            // mendaptakan id-pembelian barusan terjadi
            $id_pembelian_barusan = $koneksi->insert_id;

            foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {
                $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                $perproduk = $ambil->fetch_assoc();

                $nama = $perproduk['nama_produk'];
                $harga = $perproduk['harga_produk'];
                $berat = $perproduk['berat_produk'];

                $subberat = $perproduk['berat_produk'] * $jumlah;
                $subharga = $perproduk['harga_produk'] * $jumlah;
                $koneksi->query("INSERT INTO pembelian_produk (id_pembelian, id_produk,nama,harga,berat,subberat,subharga, jumlah) VALUE ('$id_pembelian_barusan', '$id_produk','$nama','$harga','$berat','$subberat','$subharga', '$jumlah') ");

                // update stok
                $koneksi->query("UPDATE produk SET stok_produk = stok_produk -$jumlah WHERE id_produk='$id_produk' ");
            }
            //mengosongkan keranjang belanja
            unset($_SESSION["keranjang"]);

            // tampilan di alihkan ke halaman nota, nota dari pembelian barusan
            echo "<script>alert('Pembelian Sukses');</script>";
            echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
        }
        ?>
    </div><!-- /.container -->
</section> <!-- /.konten -->

<?php include 'footer.php'; ?>