<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Dashboard</title>
</head>

<body style="background-color: rgb(226, 26, 66);">
    <?php
    session_start();
    if ($_SESSION['status'] != "login") {
        header("location:login.php");
    }
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:crimson;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">UTS PSKD</a>
            <form class="d-flex">
                <a class="btn btn-outline-light" onclick="return confirm('Apakah anda yakin akan logout?')" href="logout.php" role="button">Logout</a>
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Selamat Datang, <?= $_SESSION['nama'] ?>!</h4>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>