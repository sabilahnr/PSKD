<?php

session_start(); //Memulai session

require 'koneksi.php';

//menangkap data yang dikirim dari form
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //menyeleksi data user dengan username dan password yg sesuai
    $query = mysqli_query($conn, "SELECT role FROM user WHERE username = '$username' and password = '$password'");

    //mengecek data yang ditemukan
    $cek = mysqli_num_rows($query);

    if($cek>0) {
        //mengambil data
        $data = mysqli_fetch_array($query);
        $role = $data['role'];

        $_SESSION['login'] = 'True';
        $_SESSION['username'] = $username;
        $_SESSION['$role'] = $role;
        echo'
            <script>
                alert("Anda telah berhasil login sebagai '.$role.'");
                window.location.href="page.php";
            </script>';
    } else {
        echo'
        <script>
            alert("Anda Belum Terdaftar");
            window.location.href="index.php";
        </script>'; 
    }
    exit;
}
?>