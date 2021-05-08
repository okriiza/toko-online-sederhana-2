<?php 
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

<div class="page-header">
    <h2>Detail Pembelian</h2>
    <h5>Olah Detail Pembelian </h5>
</div> <!-- /.page-header-->

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"> <i class="fa fa-cog"></i> Detail Pembelian</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-4">
                <h3>Pembelian</h3>
                <strong>No. Pembelian: <?php echo $detail['id_pembelian']; ?></strong><br>
                Tanggal: <?php echo $detail['tanggal_pembelian']; ?><br>
                <!-- Total: Rp. <?php //echo number_format($detail['total_pembelian']); ?> <br> -->
                Status Pembelian: <?php echo $detail['status_pembelian'];?>
            </div>
            <div class="col-md-4">
                <h3>Pelanggan</h3>
                <strong><?php echo $detail['nama_pelanggan']; ?></strong> <br>
                <?php echo $detail['telepon_pelanggan'];?> <br>
                <?php echo $detail['email_pelanggan']; ?>
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
    </div><!-- /.panel-body -->
</div> <!-- /.panel panel-primary-->