<?php
session_start();
require_once '../helper/connection.php';
require_once '../helper/repository/admin_repository.php';
require_once '../helper/repository/user_repository.php';
require_once '../helper/repository/ispa_repository.php';
require_once '../helper/middleware.php';


// Ambil gejala yang dipilih dari formulir
$gejala1 = $_POST['gejala1'];
$gejala2 = $_POST['gejala2'];
$gejala3 = $_POST['gejala3'];

// Lakukan kueri ke database untuk mencocokkan gejala dengan jenis ISPA
$query = "SELECT jenis_ispa.nama_ispa
          FROM gejala
          JOIN gejala_jenis_ispa ON gejala.id = gejala_jenis_ispa.gejala_id
          JOIN jenis_ispa ON gejala_jenis_ispa.jenis_ispa_id = jenis_ispa.id
          WHERE gejala.id IN ('$gejala1', '$gejala2', '$gejala3')
          GROUP BY jenis_ispa.nama_ispa
          HAVING COUNT(*) = 3";

$result = $connection->query($query);

if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $hasil= $row['nama_ispa'] ;
        }
    } else {
        $hasil = 'Maaf Gejala yang anda pilih tidak ada yang sesuai dengan database';
    }
} else {
    echo "Kesalahan dalam menjalankan kueri: " . $connection->error;
}



?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard -Admin</title>
    <link rel="icon" href="../assets/img/ispa.png">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon ">
                    <img src="../assets/img/icon.png" style="width : 50px"alt="">
                </div>
                <div class="sidebar-brand-text mx-3">ISPA Diagnose</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                <i class="fa-solid fa-gauge fa-bounce"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pusat Data
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa-solid fa-database fa-bounce"></i>
                    <span>Data</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Mau Nambah Apa?:</h6>
                        <a class="collapse-item" href="jenis_ispa.php">Data Jenis ISPA</a>
                        <a class="collapse-item" href="add_user.php">Data User</a>
                    </div>
                </div>
            </li>

            

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Testing Sistem
            </div>

           
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="sistem.php">
                <i class="fa-solid fa-cube fa-bounce"></i>
                    <span>Test</span></a>
            </li>

            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0 " id="sidebarToggle"></button>
            </div>

            
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>

                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Jenis ISPA</h1>
                            <a href="dashboard.php" class="btn btn-primary">Kembali</a>
                        </div>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Data Jenis ISPA</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Gejala 1</th>
                                                    <th>Gejala 2</th>
                                                    <th>Gejala 3</th>
                                                    <th>Hasil Diagnosa</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Gejala 1</th>
                                                    <th>Gejala 2</th>
                                                    <th>Gejala 3</th>
                                                    <th>Hasil Diagnosa</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <?= $gejala1 ?>
                                                    </td>
                                                    <td>
                                                        <?= $gejala2 ?>
                                                    </td>
                                                    <td>
                                                        <?= $gejala3 ?>
                                                    </td>
                                                    <td>
                                                        <?= $hasil ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="keterangan">
                                            <h5" >Keterangan angka pada kolom gejala :</h5>
                                            <ul>    
                                                <li type="1">Sesak Nafas Tiba-tiba</li>
                                                <li type="1">Gelisah</li>
                                                <li type="1">Sakit Tenggorokan</li>
                                                <li type="1">Demam</li>
                                                <li type="1">Intensitas Nafas Sesak Berat</li>
                                                <li type="1">Menderita Amandel</li>
                                                <li type="1">Dada Terasa Berat</li>
                                                <li type="1">Suara Nafas Kasar</li>
                                                <li type="1">Sakit Kepala</li>
                                            </ul>
                                        </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Syalisa Amani Fatiha 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../helper/auth/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>