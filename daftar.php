<?php include 'koneksi.php'; ?>
<?php include 'navbar.php' ;?>

<!-- Pembuatan daftar Pelanggan -->
<section class="konten">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"> <i class="fa fa-user"></i> Daftar Pelanggan</h3>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post" >
                            <div class="form-group">
                                <label for="" >Nama</label>
                                <input type="text" class="form-control" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="" >Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="" >Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="" >Alamat</label>
                                <textarea name="alamat" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="" >Telp/HP</label>
                                <input type="number" class="form-control" name="telepon" required>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" name="daftar"> <i class="fa fa-sign-in"></i> Daftar</button>
                            </div>
                        </form><!-- /.form -->
                        <?php 
                        // jika ada tombol dafta (ditekan tombol dafta)
                        if (isset($_POST["daftar"])) {
                            // mengambil isi nama , email, passowrd, alamat, telepon
                            $nama = $_POST["nama"];
                            $email = $_POST["email"];
                            $password = $_POST["password"];
                            $alamat = $_POST["alamat"];
                            $telepon = $_POST["telepon"];

                            // cek apakah email sudah di gunakan
                            $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
                            $yangcocok = $ambil->num_rows;
                            if ($yangcocok==1) {
                                echo "<script>alert('Pendaftaran gagal, email sudah di gunakan');</script>";
                                echo "<script>location='daftar.php';</script>";
                            } else {
                                // query insert ke table pelanggan
                                $koneksi->query("INSERT INTO pelanggan (email_pelanggan, password_pelanggan, nama_pelanggan, telepon_pelanggan, alamat_pelanggan) VALUES ('$email','$password','$nama','$telepon','$alamat')");
                                echo "<script>alert('Pendaftaran suskes, silahkan login');</script>";
                                echo "<script>location='login.php';</script>";
                            }
                            
                        }
                        ?>
                    </div> <!-- /.panel-body -->
                </div> <!-- /.panel panel-primary -->
            </div> <!-- /.col-md-4 col-md-offset-4 -->
        </div> <!-- /.row -->
    </div> <!-- /.kontainer -->
</section> <!-- /.konten -->
    
<?php include 'footer.php' ;?>