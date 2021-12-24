<?php

require'koneksi.php';

if (isset($_POST['daftar'])) {
    //ambil data dari form   
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $password_md5 = md5($password);
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $hp = $_POST['hp'];
    $alamat = $_POST['alamat'];

    //cek username sudah ada atau belom
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "
            <script>
                alert('Username sudah pernah terdaftar');
            </script>
        ";
        return false;
    } else {
        if ($password !== $password2) {
            echo "<script>
              alert('konfirmasi password tidak sesuai');
              window.location.href='daftar.php';
              </script>";
        } else {
            $sql = mysqli_query($conn, "INSERT INTO user VALUES ('','$username','$nama','$alamat','$hp','$email','$password_md5')");
            echo "
                <script>
                    alert('Registrasi berhasil');
                    window.location.href='login.php';
                </script>
            ";
        }
    }
}
?>