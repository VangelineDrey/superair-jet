<?php
    require 'functions.php';
    
session_start();
if(!isset($_SESSION["login"])){
    header('location:../login/login.php'); exit;}

    if (isset($_POST["submit"])) { 

        if(program($_POST) > 0){
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
    <title>Tambah Program Kerja</title>
    <style>
    input[type=text], textarea{
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
    <h3>Program Kerja</h3>
    <form id="program" action="" method="post" enctype="multipart/form-data">
      <div>

          <div>
            <label for="exampleFormControlInput1" class="form-label">Nama Program</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nama" autocomplete="on">
          </div>

          <div>
            <label for="exampleFormControlInput1" class="form-label">Link</label>
            <input type="text" class="form-control" id="link" name="link" placeholder="Link" autocomplete="on">
          </div>

          <div>
            <label for="exampleFormControlTextarea1" class="form-label">Detail</label>
            <textarea name="detail" type="text" class="form-control" id="detail" placeholder="Detail Program Kerja"></textarea>
          </div>

          <div>
            <label for="image" class="form-label">Image</label>
            <input class="form-control" type="file" oninput="pic.src=window.URL.createObjectURL(this.files[0])" name="image" class="form-control @error('image') is-invalid @enderror"/>
            <img id="pic" style="width:200px;height:auto;"/>
          </div>

          <div>
            <fieldset>
              <input type="submit" name="submit" />
            </fieldset>
          </div>

      </div>
    </form>
  </body>
</html>