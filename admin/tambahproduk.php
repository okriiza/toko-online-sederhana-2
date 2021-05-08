s<div class="page-header">
    <h2>Tambah Produk</h2>
    <h5>Olah Tambah Produk </h5>
</div> <!-- /.page-header-->
<?php 
if(isset ($_POST['save'])){
    $nama = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    move_uploaded_file($lokasi, '../img/'.$nama);
    $koneksi->query("INSERT INTO produk (nama_produk,harga_produk,berat_produk,foto_produk,deskripsi_produk, stok_produk) VALUE('$_POST[nama]','$_POST[harga]','$_POST[berat]','$nama','$_POST[deskripsi]','$_POST[stok]')");
    echo "<div class='alert alert-info'> Data Tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
}
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Tambah Produk</h3>
    </div>
    <div class="panel-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="form-group">
                <label for="">Harga (Rp) </label>
                <input type="number" class="form-control" name="harga">
            </div>
            <div class="form-group">
                <label for="">Berat (Gr) </label>
                <input type="number" class="form-control" name="berat">
            </div>
            <div class="form-group">
                <label for="">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" row="10"></textarea>
            </div>
            <div class="form-group">
                <label for="">Foto</label>
                <input type="file" class="form-control" name="foto">
            </div>
            <div class="form-group">
                <label for="">Stok  </label>
                <input type="number" class="form-control" name="stok">
            </div>
            <button class="btn btn-primary" name="save"> <i class="fa fa-save"></i> Simpan</button>
        </form> <!-- /.form-->
    </div> <!-- /.panel-body -->
</div> <!-- /.panel panel-primary -->

