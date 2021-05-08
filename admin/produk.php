<div class="page-header">
    <h2>Data Produk</h2>
    <h5>Olah Data Produk </h5>
</div> <!-- /.ppage-header-->

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"> <i class="fa fa-database"></i> Data Produk</h3>
    </div> <!-- /.panel-heading-->
    <div class="row">
        <div class="col-md-12" style="padding-top:15px;">
            <div class="col-md-6">
            <a href="index.php?halaman=tambahproduk" class="btn btn-success btn-sm"><span class="fa fa-plus"></span> Tambah Produk</a>
            </div>
        </div>
    </div> <!-- /.row -->
    
    <div class="panel-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Berat</th>
                    <th>Foto</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor=1; ?>
                <?php $ambil=$koneksi->query("SELECT * FROM produk"); ?>
                <?php while($pecah=$ambil->fetch_assoc()){ ?>
                <tr>
                    <td align="center"><?php echo $nomor; ?></td>
                    <td><?php echo $pecah['nama_produk']; ?></td>
                    <td><?php echo $pecah['harga_produk']; ?></td>
                    <td><?php echo $pecah['berat_produk']; ?></td>
                    <td>
                        <img src="../img/<?php echo $pecah['foto_produk']; ?>" width="100">
                    </td>
                    <td><?php echo $pecah['stok_produk']; ?></td>
                    <td>
                        <a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> Hapus</a> |
                        <a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-info btn-sm"> <i class="fa fa-exchange"></i> Ubah</a>
                    </td>
                </tr>
                <?php $nomor++; ?>
                <?php } ?>
            </tbody> <!-- /.tbody -->
        </table> <!-- /.table -->
    </div> <!-- /.panel-body -->
</div> <!-- /.panel panel-primary -->

