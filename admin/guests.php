<?php

require 'functions.php';

session_start();
if(!isset($_SESSION["login"])){
    header('location:../login/login.php'); exit;}

$jumdthlm =10;
$jmldt= count(query("SELECT * FROM message"));
$jmllmn = ceil($jmldt / $jumdthlm);
$hlmakf=(isset($_GET["p"])) ? $_GET["p"] :1;
$awaldata = ($jumdthlm * $hlmakf) - $jumdthlm;
 
$tamu = query("SELECT * FROM buku_tamu LIMIT $awaldata,$jumdthlm");
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title> Message Page </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="background-image: url('https://www.icegif.com/wp-content/uploads/cool-wallpapers-icegif-1.gif');">
<?php require('navbar.html'); ?>
    <span class="rainbow"> Guests' Message </span>
    <br><br>

    <form action="" method="post">
	<input type="text" name="keyword" size="40" autofocus placeholder="masukkan kata kunci untuk pencarian" autocomplete="off" id="keyword">
</form>

<br>
    <?php if($hlmakf >1) : ?>
    <a href="?p=<?= $hlmakf - 1?>">&laquo;</a>
        <?php endif; ?>
    <?php for($i=1;$i<=$jmllmn;$i++) : ?>
    <?php if($i == $hlmakf) : ?>
    <a href="?p=<?= $i ?>" style="font-weight:bold; color:red;"><?= $i ?> </a>
    <?php else : ?>
        <a href="?p=<?= $i ?>"><?= $i ?> </a>
    <?php endif; ?>
    <?php endfor; ?>

    <?php if($hlmakf < $jmllmn) : ?>
    <a href="?p=<?= $hlmakf + 1?>">&raquo;</a>
        <?php endif; ?>
    <br>

    <div id="container">
    <table border="1" class="rainbowtable wrapper" style="color:white;border:2px inset white" cellpadding="10" cellspacing="0">
    <tr> 
        <th>No.</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Pesan</th>
        <th>Aksi</th>
    </tr>
    <?php $i=1; ?>
<?php foreach($tamu as $row): ?>
    <tr> 
    <td><?= $i?>  </td>
        <td><?= $row["nama"] ?></td>
        <td><?= $row["email"] ?></td>
        <td><?= $row["pesan"] ?></td>
        <td><a href="ubah.php?id=<?= $row["id_pesan"]?>" style="color:black;">Ubah</a> 
        | <a href="hapus.php?id=<?= $row["id_pesan"]?>" onclick="return confirm('Yakin?');" style="color:black;">Hapus</a></td>
    </tr>
    <?php $i++ ?>
<?php endforeach; ?> 
</table>
</div>
<script src="script.js"></script>
</body>
</html>