<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Affine Cipher</title>
    <!-- <script type="text/javascript">
        function Encrypt(f) {
            var word, newword, code, newcode, newletter
            var addkey, multkey
            word = f.p.value
            word = word.toLowerCase()
            word = word.replace(/\W/g, "")
            addkey = 0

            for (i = 0; i < f.add.options.length; i++) {
                addkey = addkey + (f.add.options[i].text) * (f.add.options[i].selected)
            }

            multkey = 0

            for (i = 0; i < f.mult.options.length; i++) {
                multkey = multkey + (f.mult.options[i].text) * (f.mult.options[i].selected)
            }

            newword = ""

            for (i = 0; i < word.length; i++) {
                code = word.charCodeAt(i) - 97
                newcode = ((multkey * code + addkey) % 26) + 97
                newletter = String.fromCharCode(newcode)
                newword = newword + newletter
            }

            f.c.value = newword + " "
        }

        function Decrypt(f) {
            var word, newword, code, newcode, newletter
            var addkey, multkey, multinverse

            word = f.c.value
            word = word.toLowerCase()
            word = word.replace(/\W/g, "")
            addkey = 0

            for (i = 0; i < f.add.options.length; i++) {
                addkey = addkey + (f.add.options[i].text) * (f.add.options[i].selected)
            }

            multkey = 0

            for (i = 0; i < f.mult.options.length; i++) {
                multkey = multkey + (f.mult.options[i].text) * (f.mult.options[i].selected)
            }

            multinverse = 1

            for (i = 1; i <= 25; i = i + 2) {
                if ((multkey * i) % 26 == 1) {
                    multinverse = i
                }
            }

            newword = ""

            for (i = 0; i < word.length; i++) {
                code = word.charCodeAt(i) - 97
                newcode = ((multinverse * (code + 26 - addkey)) % 26) + 97
                newletter = String.fromCharCode(newcode)
                newword = newword + newletter
            }

            f.p.value = newword.toLowerCase()
        }
    </script> -->
</head>

<body style="background-color: rgb(226, 26, 66);">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:crimson;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Affine Cipher</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="caesar.php">Caesar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="affine.php">Affine</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="vigenere.php">Vigenere</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="md5.php">md5</a>
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
                        <div class="col">
                            <div class="row" style="padding-top: 60pt;">
                                <label class="col-sm col-form-label" style="color: white;"><strong>a :</strong></label>
                                <div class="col-sm-8">
                                    <input name="a" type="number" value="<?= isset($_POST['a']) ? $_POST['a'] : '' ?>" class="form-control" style="background-color:lightgray">
                                </div>
                            </div>
                            <div class="row mb-3" style="padding-top: 5pt;">
                                <label class="col-sm col-form-label" style="color: white;"><strong>b :</strong></label>
                                <div class="col-sm-8">
                                    <input name="b" type="number" value="<?= isset($_POST['b']) ? $_POST['b'] : '' ?>" class="form-control" style="background-color:lightgray">
                                </div>
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" name="encrypt" class="btn btn-light me-md" style="color: crimson;"><strong>Encrypt</strong></button>
                                <button type="submit" name="decrypt" class="btn btn-light" style="color: crimson;"><strong>Decrypt</strong></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-5">
                <h3 style="color: white; padding-top: 30pt;">Chiper Text</h3>
                <div class="form-floating">
                    <div class="card text-dark" style="height: 100px; background-color:lightgray;">
                        <div class="card-body">
                            <?php
                            $hasil = '';
                            if (isset($_POST["encrypt"])) {
                                $a = $_POST['a'];
                                $b = $_POST['b'];
                                $text = $_POST['kata'];
                                function encrypt($a, $b, $text)
                                {
                                    $result = "";
                                    // traverse text
                                    for ($i = 0; $i < strlen($text); $i++) {
                                        if (ctype_upper($text[$i])) {
                                            $result = $result . chr(((($a * (ord($text[$i]) - 65))
                                                + $b) % 26) + 65);
                                        } else // else simply append space character
                                        {
                                            $result = $result . chr(((($a * (ord($text[$i]) - 97))
                                                + $b) % 26) + 97);
                                        }
                                    }
                                    return $result;
                                }
                                $hasil = encrypt($text, $a, $b);
                            } else if (isset($_POST["decrypt"])) {
                                $a = $_POST['a'];
                                $b = $_POST['b'];
                                $text = $_POST['kata'];
                                $a_inv = 0;
                                $flag = 0;
                                function decrypt($a, $b, $text)
                                {
                                    $result = "";
                                    for ($i = 0; $i < 26; $i++) {
                                        $flag = ($a * $i) % 26;
                                        if ($flag == 1) {
                                            $a_inv = $i;
                                        }
                                    }
                                    for ($i = 0; $i < strlen($text); $i++) {
                                        /*Applying decryption formula a^-1 ( x - b ) mod m
                                        {here x is cipher[i] and m is 26} and added 'A'
                                        to bring it in range of ASCII alphabet[ 65-90 | A-Z ] */
                                        if ($text[$i] != ' ') {
                                            $result = $result + chr((($a_inv *
                                                (($text[$i] + 'A' - $b)) % 26)) + 'A');
                                        } else //else simply append space character
                                        {
                                            $result += $text[$i];
                                        }
                                    }

                                    return $result;
                                }
                                $hasil = decrypt($text, $a, $b);
                            }
                            ?>
                            <p><?= $hasil; ?></p>
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