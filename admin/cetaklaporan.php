<?php

require 'functions.php';

session_start();
if(!isset($_SESSION["login"])){
    header('location:../login/login.php'); exit;}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>OSKA | Main Data</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="shortcut icon" href="../assets/images/oska.png" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../assets/admin/css/styles.css" rel="stylesheet" />
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../assets/admin/js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

    <style>
      
td, th {
  border: 1px solid #ddd;
  padding-right: 8px;
  padding-left: 8px;
}

tr:nth-child(even){background-color: #f2f2f2;}

tr:hover {background-color: #ddd;}

th {
  padding-bottom: 5px;
  padding-top: 5px;
  text-align: left;
  background-color: rgba(64, 64, 64, 0.8);
  color: white;
}
    </style>
</head>
<body>
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top">Admin</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="../login/logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container d-flex align-items-center flex-column">
          <div class="wrapper"><br><br><br><br><br>

          <?php
                        $datas = mysqli_query($conn,"select * from pemesanan");
                        foreach($datas as $data)
                        {
                          
                          $ids=$data['id_maskapai'];
                          $maskapai=mysqli_query($conn,"SELECT * FROM maskapai WHERE id_maskapai=$ids");
                          $namamaskapai=mysqli_fetch_assoc($maskapai);

                          
                          $idp=$data['id_pembeli'];
                          $pembeli=mysqli_query($conn,"SELECT * FROM pembeli WHERE id_pembeli=$idp");
                          $namapembeli=mysqli_fetch_assoc($pembeli);

                            echo $data['id_tiket'];
                            echo $namapembeli['nama_pembeli'];
                            echo $data['kode_rute'];
                            echo $namamaskapai['nama_maskapai'];
                            echo $data['id_pesawat'];
                            echo $data['seq_number'];
                            echo $data['pnr'];
                            echo $data['tanggal_penerbangan'];
                        }
                    ?>



<script>
                    $(document).ready(function(){
                        $('#tabel-data-seven').DataTable();
                    });
                </script>

                </table>

                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->




          </div>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Bootstrap 4 -->
</body>
</html>