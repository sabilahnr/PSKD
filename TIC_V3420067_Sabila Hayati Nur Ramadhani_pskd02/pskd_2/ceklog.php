<?php
//Memulai session
session_start();

require 'koneksi.php';

//menangkap data yang dikirim dari form
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //menyeleksi data user dengan username dan password yg sesuai
    $query = mysqli_query($koneksi, "SELECT role, password FROM user WHERE username = '$username'");

    //mengecek data yang ditemukan
    $cek = mysqli_num_rows($query);

    
    
     
        
        // validasi input data
        if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
            echo "Input hanya huruf dan angka yang diijinkan, dan tidak boleh menggunakan spasi ...!<br>";
        }
    
        // jika validasi input hanya huruf dan angka terpenuhi
        else if(!empty($_POST['username'])){
            //Tulis query disini
            echo "Good! input data telah diisi dengan benar ...<br>";
        }    
    }    
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


?>