<?php

include 'functions.php';

$id=$_GET["id"];

$dbk= query("SELECT * FROM buku_tamu WHERE id_pesan =$id")[0];

if (isset($_POST["submit"])) { 

     if(programedit($_POST) > 0){
          echo "<script>
alert('Data berhasil diubah');
document.location.href='index.php';
          </script>
          ";
          
     } else {echo "<script>
          alert('Data gagal diubah(fileubah)');
          document.location.href='index.php';
                    </script>;";
}
}

?>
<!DOCTYPE html>
<html>
<head>
    <title> Ubah data buku </title>
</head>
<body style="background-color:#fab8ff;color:#ed00ff;">
    <h1>Ubah data</h1>

    <form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $dbk["id_pesan"]; ?>">
        <ul>
        <li> <label for="nama"> Nama : </label>
             <input type="text" name="nama" id="nama"  value="<?= $dbk["nama"]; ?>">
        </li>
        <li> <label for="email"> Email : </label>
             <input type="text" name="email" id="email"  value="<?= $dbk["email"]; ?>">
        </li>
        <li> <label for="pesan"> Pesan : </label>
             <input type="text" name="pesan" id="pesan"  value="<?= $dbk["pesan"]; ?>">
        </li>
        <li> <button type="submit"name="submit">Ubah</button>
</li>
        </ul>
</body>
</html>