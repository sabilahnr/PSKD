<?php
//Memulai session
session_start();

require 'koneksi.php';

//menangkap data yang dikirim dari form
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //menyeleksi data user dengan username dan password yg sesuai
    $query = mysqli_query($conn, "SELECT role, password FROM user WHERE username = '$username'");

    //mengecek data yang ditemukan
    $cek = mysqli_num_rows($query);


    if($cek > 0) {
        //mengambil data
        $data = mysqli_fetch_array($query);

        $pwd = $data['password'];
        $role = $data['role'];

        if ($pwd != $password) {
            //Jika password salah
            echo '
            <script>
                alert("Password Anda Salah");
                window.location.href="index.php";
            </script>';
        } else {
            //Password Benar
            if ($role == "Admin") {
                $_SESSION['login'] = 'True';
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['$role'] = $role;
                echo'
                <script>
                    alert("Anda telah berhasil login sebagai '.$role.'");
                    window.location.href="admin.php";
                </script>';
            } else {
                $_SESSION['login'] = 'True';
                $_SESSION['username'] = $username;
                $_SESSION['$role'] = $role;
                echo'
                <script>
                    alert("Anda telah berhasil login sebagai '.$role.'");
                    window.location.href="page.php";
                </script>';
            }
        }
    } else {
        echo '
        <script>
            alert("Username Anda Salah");
            window.location.href="index.php";
        </script>';
        
        
    }
} 
?>