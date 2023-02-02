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
  <title>Superairjet | Main Data</title>
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
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="../pemilu/admin.php">Pemilu</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="../login/logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container d-flex align-items-center flex-column">
          <div class="wrapper"><br><br><br><br><br>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Maskapai</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <a href="addmaskapai.php">Tambah Maskapai</a>
                <table id="tabel-data-two">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Maskapai</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $datas = query("select * from maskapai");
                        $i=1;
                        foreach($datas as $data)
                        {
                            echo "<tr>
                            <td>".$i."</td>
                            <td>".$data['nama_maskapai']."</td>".
                            '<td>'.'<a href="editprogram.php?id='.$data['id_maskapai'].'">'.'Change </a>'.'|'.
                                  '<a href="deleteprogram.php?id='.$data['id_maskapai'].'">'.' Delete</a></td>'.
                            "</tr>";
                            $i++;
                        }
                    ?>
                    </tbody>
                    
                    <script>
                    $(document).ready(function(){
                        $('#tabel-data-two').DataTable();
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


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Divisi</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
              <a href="adddivisi.php">Tambah Divisi</a>
              <table id="tabel-data-three">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $datas = query("select * from divisi");
                        $i=1;
                        foreach($datas as $data)
                        {
                            echo "<tr>
                            <td>".$i."</td>
                            <td>".$data['image']."</td>
                            <td>".$data['id']."</td>
                            <td>".$data['name']."</td>
                            <td>".$data['shortdesc']."</td>".
                            '<td>'.'<a href="editdivisi.php?id='.$data['id'].'">'.'Change </a>'.'|'.
                                  '<a href="deletedivisi.php?id='.$data['id'].'">'.' Delete</a></td>'.
                            "</tr>";
                            $i++;
                        }
                    ?>
                    </tbody>
                    
                    <script>
                    $(document).ready(function(){
                        $('#tabel-data-three').DataTable();
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


                <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Artikel</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">

              <a href="addnews.php">Tambah Artikel</a>
              <table id="tabel-data-five">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Tag</th>
                            <th>Author</th>
                            <th>Link</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $datas = query("select * from artikel");
                        $i=1;
                        foreach($datas as $data)
                        {
                            echo "<tr>
                            <td>".$i."</td>
                            <td>".$data['image']."</td>
                            <td>".$data['id']."</td>
                            <td>".$data['title']."</td>
                            <td>".$data['tag']."</td>
                            <td>".$data['author']."</td>
                            <td>".$data['link']."</td>".
                            '<td>'.'<a href="editnews.php?id='.$data['id'].'">'.'Change </a>'.'|'.
                                  '<a href="deleteartikel.php?id='.$data['id'].'">'.' Delete</a></td>'.
                            "</tr>";
                            $i++;
                        }
                    ?>
                    </tbody>
                    
                    <script>
                    $(document).ready(function(){
                        $('#tabel-data-five').DataTable();
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

                                <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Keanggotaan</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">

              <a href="addmembers.php">Tambah Anggota</a>
                <table id="tabel-data-six">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Divisi</th>
                            <th>Tanggal Lahir</th>
                            <th>Short Words</th>
                            <th>Masa Jabatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $datas = query("select * from anggota");
                        $i=1;
                        foreach($datas as $data)
                        {
                            echo "<tr>
                            <td>".$i."</td>
                            <td> <img src='images/".$data['image']."' width='150'></td>
                            <td>".$data['id']."</td>
                            <td>".$data['name']."</td>
                            <td>".$data['divisi']."</td>
                            <td>".$data['dob']."</td>
                            <td>".$data['words']."</td>
                            <td>".$data['akhirjabatan']."</td>".
                            '<td>'.'<a href="editmembers.php?id='.$data['id'].'">'.'Change </a>'.'|'.
                                  '<a href="deletemembers.php?id='.$data['id'].'">'.' Delete</a></td>'.
                            "</tr>";
                            $i++;
                        }
                    ?>
                    </tbody>
                    
                    <script>
                    $(document).ready(function(){
                        $('#tabel-data-six').DataTable();
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



    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kotak Pesan</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tabel-data-seven">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Title</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $datas = query("select * from guests");
                        $i=1;
                        foreach($datas as $data)
                        {
                            echo "<tr>
                            <td>".$i."</td>
                            <td>".$data['name']."</td>
                            <td>".$data['email']."</td>
                            <td>".$data['title']."</td>
                            <td>".$data['message']."</td>".
                            '<td>'.'<a href="#deletemessage.php?id='.$data['id'].'">'.' Delete</a></td>'.
                            "</tr>";
                            $i++;
                        }
                    ?>
                    </tbody>
                    
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