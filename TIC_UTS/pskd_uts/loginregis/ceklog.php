<?php
//mengaktifkan session php
session_start();

//menghubungkan dengan koneksi
require 'koneksi.php';

//menangkap data yang dikirim dari form
$username= $_POST["username"]; 
$password= $_POST["password"]; 
$password_md5 = md5($password);

//menyeleksi data dengan username dan password yang sesuai
$query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password_md5'");

//menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($query);
$data = mysqli_fetch_assoc($query);

if($cek > 0) {
    $_SESSION['username'] = $data['username'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['status'] = "login";
    echo'
    <script>
        alert("Anda telah berhasil login");
        window.location.href="index.php";
    </script>';
} else {
    //data tidak di temukan
    echo'
    <script>
        alert("Username atau Password Salah");
        window.location.href="login.php";
    </script>';
}
