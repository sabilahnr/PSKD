<?php
//Memulai session
session_start();

require 'koneksi.php';

//menangkap data yang dikirim dari form
if(isset($_POST['login'])) {
    $Username = $_POST['username'];
    $Password = $_POST['password'];
    $Password_md5 = md5($Password);

    //menyeleksi data user dengan username dan password yg sesuai
    $query = mysqli_query($koneksi, "SELECT password FROM user WHERE username = '$Username'");

    //mengecek data yang ditemukan
    $cek = mysqli_num_rows($query);

    
    
     
        
        // validasi input data
        if(!preg_match("/^[a-zA-Z0-9]*$/", $Username)){
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

        if ($pwd != $Password) {
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
                $_SESSION['username'] = $Username;
                $_SESSION['password'] = $Password;
               
                echo'
                <script>
                    alert("Anda telah berhasil login");
                    window.location.href="welcome.php";
                </script>';
            } else {
                $_SESSION['login'] = 'True';
                $_SESSION['username'] = $Username;
                echo'
                <script>
                    alert("Anda telah berhasil login sebagai");
                    window.location.href="welcome.php";
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