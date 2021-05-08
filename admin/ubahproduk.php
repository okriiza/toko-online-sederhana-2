<?php
$ambil= $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";
?>

<div class="page-header">
    <h2>Ubah Produk</h2>
    <h5>Olah Ubah Produk </h5>
</div> <!-- /.page-header -->

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-exchange"></i> Ubah Produk</h3>
    </div> <!-- /.panel-heading-->
    <div class="panel-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Nama Produk</label>
                <input type="text" name="nama" class="form-control" value="4 ">
            </div>
            <div class="form-group">
                <label for="">Harga (Rp)</label>
                <input type="number" name="harga" class="form-control" value="<?php echo $pecah['harga_produk'];?>">
            </div>
            <div class="form-group">
                <label for="">Berat (Gr)</label>
                <input type="text" name="berat" class="form-control" value="<?php echo $pecah['berat_produk'];?>">
            </div>
            <div class="form-group">
                <!-- <label for=""> Foto Pada Beranda</label> -->
                <img src="../img/<?php echo $pecah['foto_produk']; ?>" width="200">
            </div>
            <div class="form-group">
                <label for="">Ganti Foto</label>
                <input type="file" name="foto" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="10">
                    <?php echo $pecah['deskripsi_produk']; ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="">Stok  </label>
                <input type="number" class="form-control" name="stok" value="<?php echo $pecah["stok_produk"]; ?>">
            </div>
            <button class="btn btn-primary" name="ubah"> <i class="fa fa-exchange"></i> Ubah</button>
        </form> <!-- /.form -->
        <?php
        if (isset($_POST['ubah'])) {
            $namafoto=$_FILES['foto']['name'];
            $lokasifoto=$_FILES['foto']['tmp_name'];
            //jika foto di rubah
            if (!empty($lokasifoto)) {
                move_uploaded_file($lokasifoto, "../img/$namafoto");
                $koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',harga_produk='$_POST[harga]',berat_produk='$_POST[berat]',foto_produk='$namafoto',deskripsi_produk='$_POST[deskripsi]', stok_produk='$_POST[stok]' WHERE id_produk='$_GET[id]'");
            } else {
                $koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',harga_produk='$_POST[harga]',berat_produk='$_POST[berat]',deskripsi_produk='$_POST[deskripsi]', stok_produk='$_POST[stok]' WHERE id_produk='$_GET[id]'");
            }
            echo "<script>alert('Data Produk telah diubah')</script>";
            echo "<script>location='index.php?halaman=produk';</script>";
        } 
        ?>
    </div> <!-- /.panel-body-->
</div> <!-- /.panel panel-primary -->

