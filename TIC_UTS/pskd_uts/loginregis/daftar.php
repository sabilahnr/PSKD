<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Daftar</title>
</head>

<body style="background-color: rgb(226, 26, 66);">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:crimson;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">UTS PSKD</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Kriptografi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="daftar.php">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="card bg-light" style="margin:auto; margin-top:30px; width:45rem;">
                <div class="card-body">
                    <div class="card-title text-center" style="padding-bottom: 15px;">
                        <h5>Welcome</h5>
                        <p class="text-muted">Register to get access</p>
                    </div>
                    <form action="inputdata.php" method="POST">
                        <div class="row justify-content-evenly">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" style="font-size: 10pt;">Username</label>
                                    <input type="text" class="form-control" name="username" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" style="font-size: 10pt;">Nama</label>
                                    <input type="text" class="form-control" name="nama" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" style="font-size: 10pt;">Email</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" style="font-size: 10pt;">Handphone</label>
                                    <input type="text" class="form-control" name="hp" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label" style="font-size: 10pt;">Password</label>
                                            <input type="password" class="form-control" name="password" required>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label" style="font-size: 10pt;">Password Konfirmasi</label>
                                            <input type="password" class="form-control" name="password2" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" style="font-size: 10pt;">Alamat</label>
                                    <textarea name="alamat" class="form-control" style="height: 90px;"></textarea>
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="submit" class="btn btn-primary" name="daftar" style="margin-top: 15px;">Daftar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <p class="footer margin-t text-center text-light" style="padding: 20px; ">
            <small style="font-size: 10pt;">V3420057 - V3420060 - V3420067 - V3420068 - V3420069</small> </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>

</html>