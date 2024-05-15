<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href=<?= base_url('vendor/fontawesome-free/css/all.min.css') ?> rel="stylesheet" type="text/css">
    <link href=<?= base_url('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i') ?> rel="stylesheet">
    <link href="vendor/select2/dist/css/select2.min.css" rel="stylesheet" />
    <script src="vendor/select2/dist/js/select2.min.js"></script>
    <!-- Custom styles for this template-->
    <link href=<?= base_url('css/sb-admin-2.min.css') ?> rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/pages">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"> Home <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->

            <li class="nav-item active">
                <a class="nav-link" href="/pemasok">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Jadwal Distribusi</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/ekspedisi">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Data Distribusi</span></a>
            </li>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/ekspedisi">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Laporan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="form-inline my-2 my-lg-0 d-flex" action="" method="POST">
                        <input class="form-control mr-sm-2" placeholder="Cari data disini" name="keyword">
                        <button class="btn btn-outline-warning my-2 my-sm-0" type="submit" name="submit">Cari</button>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">Logout</a>
                        </li>


                    </ul>

                </nav>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->


                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->


                    </div>
                    <!-- /.container-fluid -->
                    <?= $this->renderSection('content') ?>
                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright Berkah Textile 2024</span>
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


        <!-- Bootstrap core JavaScript-->
        <script src=<?= base_url('vendor/jquery/jquery.min.js') ?>></script>
        <script src=<?= base_url('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>></script>

        <!-- Core plugin JavaScript-->
        <script src=<?= base_url('vendor/jquery-easing/jquery.easing.min.js') ?>></script>

        <!-- Custom scripts for all pages-->
        <script src=<?= base_url('js/sb-admin-2.min.js') ?>></script>

        <!-- Page level plugins -->
        <script src=<?= base_url('vendor/chart.js/Chart.min.js') ?>></script>

        <!-- Page level custom scripts -->
        <script src=<?= base_url('js/demo/chart-area-demo.js') ?>></script>
        <script src=<?= base_url('js/demo/chart-pie-demo.js') ?>></script>

</body>

</html>