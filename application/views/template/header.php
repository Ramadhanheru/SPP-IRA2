
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <title>SPP Transaksi Pengadilan</title>
  <link rel="shortcut icon" type="image/ico" href="<?= base_url(''); ?>assets/img/logo-free.png" />
  <!-- <link rel="shortcut icon" type="image/ico" href="../logo-free.png" /> -->

  <!-- Custom fonts for this template-->
  <link href="<?= base_url(''); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url(''); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- line chart -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <!-- Custom styles for this page -->
  <link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  

</head>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion merah" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon">
      <img src="<?= base_url(''); ?>assets/img/logo-free.png" width="35px">

    </div>
    <div class="sidebar-brand-text mx-3">
      <h3>Sipentung</h3>
    </div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('welcome') ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Input Transaksi</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Menu Admin
  </div>

  <!-- beranda -->
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('welcome/user'); ?>">
      <i class="fas fa-fw fa-user"></i>
      <span>User</span></a>
  </li>

  <!-- laporan -->
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('welcome/laporan'); ?>">
      <i class="fas fa-fw fa-table"></i>
      <span>Laporan</span></a>
  </li>

  <!-- Data -->
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('welcome/data'); ?>">
      <i class="fas fa-fw fa-file"></i>
      <span>Pengolahan Data</span></a>
  </li>


  <!-- logout -->
  <li class="nav-item">
    <a class="nav-link" href="" data-toggle="modal" data-target="#logoutModal">
      <i class="fas fa-fw fa-power-off"></i>
      <span>Keluar</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

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
          <h3 style="color: #2DB28B;">Sistem Pencatatan & Perhitungan </h3>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 text-gray-600 medium">Admin <?= $user['username'] ?>
                </span>
                <img class="img-profile rounded-circle" src="<?= base_url('assets/img/').$user['photo']; ?>" alt="foto_admin_heru">
              </a>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->