<?php
    require 'functions.php';
    session_start();
    if(!isset($_SESSION["login"])){
        header('location:../login/login.php'); exit;}


        $id=$_GET["id"];

        $datass= mysqli_query($conn,"SELECT * FROM rute WHERE kode_rute =$id");
        $datas=mysqli_fetch_assoc($datass);

    if (isset($_POST["submit"])) { 

        if(ruteedit($_POST) > 0){
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
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Rute</title>
    <style>
    input[type=text], textarea, date{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    }

   input[type=submit] {
   width: 100%;
   background-color: #4CAF50;
   color: white;
   padding: 14px 20px;
   margin: 8px 0;
   border: none;
   border-radius: 4px;
   cursor: pointer;
   }

  input[type=submit]:hover {
  background-color: #45a049;
   }

  div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  }
</style>
  </head>
  <body>
    <h3>Edit Route</h3>
               <form id="program" action="" method="post" enctype="multipart/form-data">
               <input type="hidden" name="kode_rute" value="<?= $datas["kode_rute"]; ?>">
                <div>
                  <div>
                    <input type="text"  disabled  name="empty" value="<?= $datas["kode_rute"]; ?>">
                  </div>
                  <div>
                      <input type="text" name="kelas" id="kelas" placeholder="kelas" value="<?= $datas["kelas"]; ?>" autocomplete="on">
                  </div>
                  <div>
                      <input type="text" name="asal" id="asal" placeholder="Asal" value="<?= $datas["asal"]; ?>" autocomplete="on">
                  </div>
                  <div>
                      <input type="text" name="destinasi" id="destinasi" placeholder="Destinasi" value="<?= $datas["destinasi"]; ?>" autocomplete="on">
                  </div>
                  <div>
                      <input type="time" name="waktu" id="waktu" placeholder="Waktu" value="<?= $datas["waktu"]; ?>" autocomplete="on">
                  </div>
                  <div>
                      <input type="submit" name="submit" />
                  </div>
                </div>
              </form>
  </body>
</html>