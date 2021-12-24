<?php
$text =  '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = md5($_POST['kata']);
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>md5 Enkripsi</title>
</head>

<body style="background-color: rgb(226, 26, 66);">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:crimson;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MD5</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="caesar.php">Caesar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="affine.php">Affine</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="vigenere.php">Vigenere</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">md5</a>
                    </li>
                </ul>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-outline-light me-md" href="../pskd_uts/loginregis/daftar.php" role="button">Register</a>
                    <a class="btn btn-success" href="../pskd_uts/loginregis/login.php" role="button">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-8">
                            <h3 style="color: white; padding-top: 30pt;">Plain Text</h3>
                            <div class="form-floating">
                                <textarea name="kata" class="form-control" style="height: 100px; background-color:lightgray;"><?= isset($_POST['kata']) ? $_POST['kata'] : ''; ?></textarea>
                            </div>
                        </div>
                        <div class="col" style="text-align: center; padding-top: 80pt;">
                            <button type="submit" name="encrypt" class="btn btn-light me-md" style="color: crimson;"><strong>Encrypt</strong></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-5">
                <h3 style="color: white; padding-top: 30pt;">Chiper Text</h3>
                <div class="form-floating">
                    <div class="card text-dark" style="height: 100px; background-color:lightgray;">
                        <div class="card-body">
                            <p><?php echo $text; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="col-md-6 offset-md-3">
                
            </div> -->
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>