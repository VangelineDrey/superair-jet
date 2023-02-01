<?php
    require 'functions.php';
    
session_start();
if(!isset($_SESSION["login"])){
    header('location:../login/login.php'); exit;}

    $id=$_GET["id"];

    $datas= query("SELECT * FROM proker WHERE id =$id")[0];

    if (isset($_POST["submit"])) { 

        if(programedit($_POST) > 0){
            echo "<script>
        alert('Data berhasil diubah');
        document.location.href='index.php';
            </script>
            ";
            
        } else {echo "<script>
            alert('Data gagal diubah');
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
    <title>Tambah Program Kerja</title>
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
    <h3>Anggota</h3>
               <form id="program" action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $datas["id"]; ?>">
                <input type="hidden" name="oldimage" value="<?= $datas["image"]; ?>">
                <div>
                  <div>
                      <input type="text" name="name" id="name" placeholder="Nama" autocomplete="on" value="<?= $datas["name"]; ?>">
                  </div>
                  <div>
                      <input type="text" name="redirect" id="link" placeholder="link" autocomplete="on" value="<?= $datas["redirect"]; ?>">
                  </div>
                  <div>
                      <textarea name="detail" type="text" class="form-control" id="detail" placeholder="Detail"><?= $datas["detail"]; ?></textarea>  
                  </div>
                  <div>
                      <label for="image">image</label>
                      <input type=file oninput="pic.src=window.URL.createObjectURL(this.files[0])" name="image" class="form-control @error('image') is-invalid @enderror"/>
                      <img id="pic" src="images/<?= $datas["image"]; ?>"style="width:200px;height:auto;"/>
                  </div>
                  <div>
                      <input type="submit" name="submit" />
                  </div>
                </div>
              </form>
  </body>
</html>