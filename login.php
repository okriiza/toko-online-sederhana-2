<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
include 'koneksi.php';
?>
<?php include 'navbar.php' ;?>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"> <i class="fa fa-sign-in"></i> Login Pelanggan</h3>
                    </div>
                    <div class="panel-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" id="" class="form-control" placeholder="Masukkan Email" >
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" id="" class="form-control" placeholder="Masukkan Password" >
                            </div>
                            <button class="btn btn-primary btn-sm" name="login"> <i class="fa fa-sign-in"></i> login</button>
                        </form> <!-- /.form -->
                    </div> <!-- /.panel-body -->
                </div> <!-- /.panel panel-primary -->
            </div> <!-- /.col-md-4 col-md-offset-4r -->
        </div> <!-- /.row -->
    </div> <!-- /.kontainer -->
    
<?php  
// jika ada tombol login (tombol login ditekann)
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    // lakukan qiery ngecek akun di table pleanggan di database
    $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");
    //ngitung akum yang terambil
    $akunyangcocok = $ambil->num_rows;
    // jika 1 akun yang cocok, maka di loginkan
        if ($akunyangcocok==1) {
            // anda sukses login
            // mendapakan akun dalam bentuk arrat
            $akun = $ambil->fetch_assoc();
            $_SESSION["pelanggan"]= $akun;
            echo "<script>alert('anda sukses login');</script>";
            // jika sudah belanja
            if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"])) {
                echo "<script>location='checkout.php';</script>";
            }else {
                echo "<script>location='riwayat.php';</script>";
            }
            
        } else {
            // anda gagal login
            echo "<script>alert('anda gagal login, periksa kembali akun anda');</script>";
            echo "<script>location='login.php';</script>";
        }
}
?>

<?php include 'footer.php' ;?>