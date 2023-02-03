<?php
    require 'functions.php';

    $results=mysqli_query($conn,"SELECT * FROM maskapai");
    session_start();
    if(!isset($_SESSION["login"])){
        header('location:../login/login.php'); exit;}

        $id=$_GET["id"];

        $datass= mysqli_query($conn,"SELECT * FROM pesawat WHERE id_pesawat =$id");
        $datas=mysqli_fetch_assoc($datass);

    if (isset($_POST["submit"])) { 

        if(pesawatedit($_POST) > 0){
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
    <title>Edit Pesawat</title>
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
    <h3>New Jet</h3>
               <form id="program" action="" method="post" enctype="multipart/form-data">
               <input type="hidden" name="id_pesawat" value="<?= $datas["id_pesawat"]; ?>">
                <div>
                  <div>
                      <input type="text" name="nomor_penerbangan" id="nomor_penerbangan" value="<?= $datas["nomor_penerbangan"]; ?>" placeholder="Nomor Penerbangan" autocomplete="on">
                  </div>
                  <div>
                      <input type="text" name="terminal" id="terminal" placeholder="Terminal" value="<?= $datas["terminal"]; ?>" autocomplete="on">
                  </div>
                  <div>
                    <label>Maskapai</label>
                  <select name="id_maskapai">
                      <?php foreach($results as $result){ ?>
                          <option <?php if($result['id_maskapai']==$datas['id_maskapai']){ echo 'selected';} ?> value="<?php echo $result['id_maskapai'];?>"><?php echo $result['nama_maskapai'];     ?></option> 
                      <?php } ?>
                  </select>
                </div>
                  <div>
                      <input type="submit" name="submit" />
                  </div>
                </div>
              </form>
  </body>
</html>