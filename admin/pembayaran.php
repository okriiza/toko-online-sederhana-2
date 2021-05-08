<h2>Data Pembayaran</h2>

<?php 

// mendapatkan id_pembelian dari url
$id_pembelian = $_GET['id'];

//mengambil data pembayaran berdasarkan id_pembelian
$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian' ");
$detail = $ambil->fetch_assoc();
?>

<div class="row">
    <div class="col-md-6">
        <table class="table">
            <tr>
                <th>Nama</th>
                <td><?php echo $detail['nama'] ?></td>
            </tr>
            <tr>
                <th>Bank</th>
                <td><?php echo $detail['bank'] ?></td>
            </tr>
            <tr>
                <th>Jumlah</th>
                <td>Rp. <?php echo number_format($detail['jumlah']) ?></td>
            </tr>
            <tr>
                <th>tanggal</th>
                <td><?php echo $detail['tanggal'] ?></td>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <img src="../bukti_pembayaran/<?php echo $detail['bukti']?>" alt="" class="img-responsive">
    </div>
</div>

<form action="" method="post">
    <div class="form-group">
        <label for="">No Resi Pengiriman</label>
        <input type="text" class="form-control" name="resi">
    </div>
    <div class="form-group">
        <label for="">Status <label>
        <select name="status" class="form-control">
            <option value="">Pilih Status</option>
            <option value="lunas">Lunas</option>
            <option value="barang dikirim">Barang Dikirim</option>
            <option value="batal">Batal</option>
        </select>
    </div>
    <button class="btn btn-primary" name="proses"> Prosess</button>
</form>
<?php 
if (isset($_POST["proses"])) {
    $resi = $_POST["resi"];
    $status = $_POST["status"];

    $koneksi->query("UPDATE pembelian set resi_pengiriman='$resi', status_pembelian='$status' WHERE id_pembelian='$id_pembelian'");
    echo "<script>alert('data pembelian terupdate')</script>";
    echo "<script>location='index.php?halaman=pembelian';</script>";
}

?>