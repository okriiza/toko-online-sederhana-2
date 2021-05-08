<div class="page-header">
    <h2>Tambah Pelanggan</h2>
    <h5>Olah Tambah Pelanggan</h5>
</div> <!-- /.page-header -->
<?php 
if(isset ($_POST['save'])){
    $koneksi->query("INSERT INTO pelanggan (nama_pelanggan,email_pelanggan,password_pelanggan,telepon_pelanggan) VALUE('$_POST[nama]','$_POST[email]','$_POST[password]','$_POST[telepon]')");
    echo "<div class='alert alert-info'> Data Tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pelanggan'>";
}
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"> <i class="fa fa-user"></i> Tambah Pelanggan</h3>
    </div>
    
    <div class="panel-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Nama Lengkap </label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="form-group">
                <label for="">Email </label>
                <input type="email" class="form-control" name="email">
            </div>      
            <div class="form-group">
                <label for="">Password </label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <label for="">telepon</label>
                <input type="number" class="form-control" name="telepon">
            </div>
            <button class="btn btn-primary" name="save"> <i class="fa fa-save"></i> Simpan</button>
        </form> <!-- /.form-->
    </div> <!-- /.panel-body -->
</div> <!-- /.panel panel-primary -->
