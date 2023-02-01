<?php

include 'functions.php';
session_start();
if(!isset($_SESSION["login"])){
    header('location:../login/login.php'); exit;}

$id=$_GET["id"];

if(divisidelete($id) > 0){
    echo "<script>
alert('Data berhasil dihapus');
document.location.href='index.php';
    </script>
    ";
    
} else {echo "<script>
    alert('Data gagal dihapus');
    document.location.href='index.php';
              </script>;"
    ;
}
?>