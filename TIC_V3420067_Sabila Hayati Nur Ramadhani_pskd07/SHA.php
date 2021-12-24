<?php
if (isset($_POST['ubah'])) {
    $string1 = md5($_POST['teks1']);
    $string2 = sha1($_POST['teks1']);
}
?>
<!doctype html>
<html lang="en">

<head>
    <style type="text/css">
    body{
    background:#B0E0E6; 
    }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <title>SHA</title>
</head>

<body>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.min.js" integrity="sha384-PsUw7Xwds7x08Ew3exXhqzbhuEYmA2xnwc8BuD6SEr+UmEHlX8/MCltYEodzWA4u" crossorigin="anonymous"></script>
    -->
    <div class="rounded-3">
        <div class="login">
            <p>SHNR</p>

            <form method="post">
                <table>
                    <tr>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label" placeholder="Masukkan teks1">Teks1</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="teks1"></textarea>
                        </div>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><input type="submit" value="UBAH" name="ubah" style="background-color: #e3f2fd;"></td>
                        <td><input type="reset" value="RESET" name="reset" style="background-color: #e3f2fd;"></td>
                    </tr>
                </table>
            </form>
            <br>

        </div>
    </div>
    <div class="form2">
        <br>
        <table border="1" cellspacing="0" cellpadding="5">
            <tr>
                <td>Enkripsi MD5 : <br> <?php echo md5($string1); ?></td>
            </tr>
            <tr>
                <td>Enkripsi SHA1 : <?php echo sha1($string2); ?></td>
            </tr>
        </table>
    </div>
</body>

