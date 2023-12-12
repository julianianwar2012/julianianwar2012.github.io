<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Anggota</title>
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
   
    if (isset($_GET['id_peserta'])) {
        $id_peserta=input($_GET["id_peserta"]);

        $sql="select * from peserta where id_peserta=$id_peserta";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);


    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_peserta=htmlspecialchars($_POST["id_peserta"]);
        $nama=input($_POST["nama"]);
        $jeniskelamin=input($_POST["jeniskelamin"]);
        $tgllahir=input($_POST["tgllahir"]);
        $no_hp=input($_POST["no_hp"]);
        $alamat=input($_POST["alamat"]);

      
        $sql="update peserta set
			nama='$nama',
			jeniskelamin='$jeniskelamin',
			tgllahir='$tgllahir',
			no_hp='$no_hp',
			alamat='$alamat'
			where id_peserta=$id_peserta";

        $hasil=mysqli_query($kon,$sql);

       
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }

    ?>
    <h2>Update Data</h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required />

        </div>
        <div class="form-group">
            <label>Jenis Kelamin:</label>
            <input type="text" name="jeniskelamin" class="form-control" placeholder="Masukan Jenis Kelamin" required/>
        </div>
        <div class="form-group">
            <label>Tanggal Lahir :</label>
            <input type="text" name="tgllahir" class="form-control" placeholder="CCYY-MM-DD" required/>
        </div>
        <div class="form-group">
            <label>No HP:</label>
            <input type="text" name="no_hp" class="form-control" placeholder="Masukan No HP" required/>
        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <textarea name="alamat" class="form-control" rows="5"placeholder="Masukan Alamat" required></textarea>
        </div>

        <input type="hidden" name="id_peserta" value="<?php echo $data['id_peserta']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>