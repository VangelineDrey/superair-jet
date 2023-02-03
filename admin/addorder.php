<?php
    require 'functions.php';
    session_start();
    if(!isset($_SESSION["login"])){
        header('location:../login/login.php'); exit;}

    if (isset($_POST["submit"])) { 

        if(order($_POST) > 0){
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
    <title>Tambah Pemesanan</title>
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
    <h3>New Order</h3>
               <form id="program" action="" method="post" enctype="multipart/form-data">
                <div>
                  <div>
                    <label>Pembeli</label>
                    <select name="id_pembeli">
                        <?php 
                        $results=mysqli_query($conn,"SELECT * FROM pembeli");
                        foreach($results as $result){ ?>
                            <option value="<?php echo $result['id_pembeli'];?>"><?php echo $result['nama_pembeli'];     ?></option> 
                        <?php } ?>
                    </select>
                    </div>
                  <div>
                    <label>Rute</label>
                    <select name="kode_rute">
                        <?php
                        $results=mysqli_query($conn,"SELECT * FROM rute");
                        foreach($results as $result){ ?>
                            <option value="<?php echo $result['kode_rute'];?>"><?php echo $result['kode_rute'];     ?></option> 
                        <?php } ?>
                    </select>
                    </div>
                    <div>
                    <label>Maskapai</label>
                        <select name="id_maskapai">
                            <?php 
                            $results=mysqli_query($conn,"SELECT * FROM maskapai");
                            foreach($results as $result){ ?>
                                <option value="<?php echo $result['id_maskapai'];?>"><?php echo $result['nama_maskapai'];     ?></option> 
                            <?php } ?>
                        </select>
                  </div>
                  <div>
                    <label>Pesawat</label>
                        <select name="id_pesawat">
                            <?php 
                            $results=mysqli_query($conn,"SELECT * FROM pesawat");
                            foreach($results as $result){ ?>
                                <option value="<?php echo $result['id_pesawat'];?>"><?php echo $result['id_pesawat'];     ?></option> 
                            <?php } ?>
                        </select>
                  </div>
                  <div>
                      <input type="text" name="seq_number" id="seq_number" placeholder="seq_number" autocomplete="on">
                  </div>
                  <div>
                      <input type="text" name="pnr" id="pnr" placeholder="pnr" autocomplete="on">
                  </div>
                  <div>
                      <input type="date" name="tanggal_penerbangan" id="tanggal_penerbangan" placeholder="tanggal_penerbangan" autocomplete="on">
                  </div>
                  <div>
                      <input type="time" name="waktu" id="waktu" placeholder="Waktu" autocomplete="on">
                  </div>
                  <div>
                      <input type="submit" name="submit" />
                  </div>
                </div>
              </form>
  </body>
</html>