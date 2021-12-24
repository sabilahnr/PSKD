<?php
$string1 =  $string2 = '';
if($_SERVER["REQUEST_METHOD"]=="POST") {
    $string1 = md5($_POST['teks1']);
    $string2 = md5($_POST['teks2']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Enkripsi MD5</title>
</head>

<body>
    <div class="container">
        <h3 style="text-align: center; margin-top: 30px; margin-bottom:30px;">ENKRIPSI MD5</h3><hr>
        <div class="row">
            <div class="col-sm-6">
                <div class="card text-dark bg-light">
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label class="form-label" style="font-size: 10pt;">TEKS PERTAMA</label>
                                <textarea class="form-control" rows="4" name="teks1"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" style="font-size: 10pt;">TEKS KEDUA</label>
                                <textarea class="form-control" rows="4" name="teks2"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="enkripsi" value="Enkripsi" class="btn btn-primary btn-block">
                                <input type="reset" name="reset" value="Reset" class="btn btn-danger btn-block">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card text-dark bg-light">
                    <div class="card-body">
                        <table cellspacing="0" cellpadding="5">
                            <tr>
                                <td>TEKS PERTAMA : <?php echo $string1;?></td>
                            </tr>
                            <tr>
                                <td>TEKS KEDUA : <?php echo $string2;?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>