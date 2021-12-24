<?php
require('koneksi.php');
if (isset($_POST['daftar'])) {
    //ambil data dari form   
    $Username = $_POST['username'];
    $Nama = $_POST['nama'];
    $Email = $_POST['email'];
    $Alamat = $_POST['alamat'];
    $Password = $_POST['password'];
    $Password2 = $_POST['password2'];
    $Role = 'Mahasiswa';
    $Aktif = '0';

    // Validasi kekuatan password
    $uppercase = preg_match('@[A-Z]@', $Password); 
    $lowercase = preg_match('@[a-z]@', $Password);
    $number    = preg_match('@[0-9]@', $Password);
    $specialChars = preg_match('@[^\w]@', $Password);

    //cek username sudah ada atau belom
    $result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$Username'");

    if (mysqli_fetch_assoc($result)) {
        echo "
            <script>
                alert('Username sudah pernah terdaftar');
            </script>
        ";
        return false;
    } else {
        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($Password) < 8) {
            echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Password harus terdiri dari 8 karakter atau lebih, terdapat huruf besar, huruf kecil, angka, dan spesial karakter!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        } else {
            //buat token
            $token = hash('sha256', md5(date('Y-m-d')));
            //cek user terdaftar
            $sql_cek = mysqli_query($koneksi, "SELECT * FROM user WHERE email = '$Email'");
            $r_cek = mysqli_num_rows($sql_cek);
            if ($Password !== $Password2) {
                echo "<script>
                  alert('konfirmasi password tidak sesuai');
                  </script>";
            } else {
                //enkripsi password
                $Password = password_hash($Password, PASSWORD_DEFAULT);
                if ($r_cek > 0) {
                    echo '<script>
                    alert("Email sudah terdaftar");
                    document.location="registrasi.php";
                    </script>';
                } else {
                    $insert = mysqli_query(
                        $koneksi,
                        "INSERT INTO user VALUES ('','$Username', '$Nama', '$Email','$Alamat','$Password','$Role', '$token', '0')"
                    );
                    //include kirim email
                    include("mail.php");

                    if ($insert) {
                        echo '<div class="alert alert-success">
                            Pendaftaran anda berhasil, silahkan cek email anda untuk aktivasi. 
                            <a href="index.php">Login</a>
                        </div>';
                    }
                }
                return false;
            }
        }
    }
}
?>
 
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
    <div class="container">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="" method="POST">
                        <div class="form-group">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" style="font-size: 10pt;">nama</label>
                                    <input type="text" class="form-control" name="nama" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" style="font-size: 10pt;">username</label>
                                    <input type="text" class="form-control" name="username" required onkeypress="return runScript(event)">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" style="font-size: 10pt;">email</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" style="font-size: 10pt;">alamat</label>
                                    <div class="col-sm-12">
                                        <textarea name="alamat" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="mb-3">
                                    <label class="form-label" style="font-size: 10pt;">password</label>
                                    <input type="password" class="form-control" name="password" required>
                                    <div id="passwordHelpBlock" class="form-text">
                                       <p> password harus terdiri dari 8 karakter atau lebih, terdapat huruf besar, huruf kecil, angka, dan spesial karakter.</p>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" style="font-size: 10pt;">Konfirmasi password</label>
                                    <input type="password" class="form-control" name="password2" required>
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="submit" class="btn btn-primary" name="daftar" >Daftar</button>
                                </div>
                                <div>
                                <p>Already have an account? <a href="index.php">Login here</a>.</p>
                                </div>
                            </div>
                        </div>
                    </form>
                    <p class="footer margin-t text-center text-light" style="padding: 20px; "><small style="font-size: 10pt;">&copy; V3420067 SABILA HAYATI NUR RAMADHANI </small> </p>
    </div>   

</body>

</html>