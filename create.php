<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Peserta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    include "koneksi.php";

    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama=input($_POST["nama"]);
        $jeniskelamin=input($_POST["jeniskelamin"]);
        $tgllahir=input($_POST["tgllahir"]);
        $no_hp=input($_POST["no_hp"]);
        $alamat=input($_POST["alamat"]);

        
        $sql="insert into peserta (nama,jeniskelamin,tgllahir,no_hp,alamat) values
		('$nama','$jeniskelamin','$tgllahir','$no_hp','$alamat')";

    
        $hasil=mysqli_query($kon,$sql);

       
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required />

        </div>
        <div class="form-group">
            <label>Jenis Kelamin :</label>
            <input type="text" name="jeniskelamin" class="form-control" placeholder="Masukan Jenis Kelamin" required/>
        </div>
       <div class="form-group">
            <label>Tanggal Lahir :</label>
            <input type="text" name="tgllahir" class="form-control" placeholder="CCYY-MM-DD" required/>
        </div>
                </p>
        <div class="form-group">
            <label>No HP:</label>
            <input type="text" name="no_hp" class="form-control" placeholder="Masukan No HP" required/>
        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <textarea name="alamat" class="form-control" rows="5"placeholder="Masukan Alamat" required></textarea>
        </div>       

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>