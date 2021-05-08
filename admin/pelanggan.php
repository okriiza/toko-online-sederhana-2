<div class="page-header">
    <h2>Data Pelanggan</h2>
    <h5>Olah Data pelanggan </h5>
</div> <!-- /.page-header -->

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"> <i class="fa fa-user"></i> Data Pelanggan</h3>
    </div> <!-- /.panel-heading-->
    <div class="row">
        <div class="col-md-12" style="padding-top:15px;">
            <div class="col-md-6">
            <a href="index.php?halaman=tambahpelanggan" class="btn btn-success btn-sm"><span class="fa fa-plus"></span> Tambah Pelanggan</a>
            </div>
        </div>
    </div> <!-- /.row -->
    <div class="panel-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor=1; ?>
                <?php $ambil=$koneksi->query("SELECT * FROM pelanggan");?>
                <?php while($pecah=$ambil->fetch_assoc()) { ?>
                <tr>
                    <td align="center"><?php echo $nomor ?></td>
                    <td><?php echo $pecah['nama_pelanggan']; ?></td>
                    <td><?php echo $pecah['email_pelanggan']; ?></td>
                    <td><?php echo $pecah['telepon_pelanggan']; ?></td>
                    <td>
                        <a href="index.php?halaman=hapuspelanggan&id=<?php echo $pecah['id_pelanggan'];?>" class="btn btn-danger"> <i class="fa fa-trash"></i> Hapus</a>    
                    </td>
                </tr>
                
                <?php $nomor++ ?>
                <?php }?>
            </tbody> <!-- /.tbody -->
        </table> <!-- /.table -->
    </div> <!-- /.panel-body -->
</div> <!-- /.panel panel-primary -->