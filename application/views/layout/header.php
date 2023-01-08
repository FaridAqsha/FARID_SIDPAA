<!doctype html>
<html class="no-js" lang="en">
<script src="<?= base_url('assets/') ?>/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SIDPAA 2022</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="<?= base_url('assets/') ?>/img/logo.png" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/ionicons/dist/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/icon-kit/dist/css/iconkit.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/theme.min.css">
    <script src="<?= base_url('assets/') ?>src/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="wrapper">
        <header class="header-top" header-theme="light">
            <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    <div class="top-menu d-flex align-items-center">
                        <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                    </div>
                    <div class="top-menu d-flex align-items-center">
                        <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
                        <button type="button" class="nav-link ml-10" id="apps_modal_btn" data-toggle="modal" data-target="#appsModal"><i class="ik ik-grid"></i></button>
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="<?= base_url('assets/img/user/') . $user['gambar']; ?>" alt=""></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url('User/detail/') . $user['id']; ?>"><i class="ik ik-user dropdown-icon"></i> Profile</a>
                                <a class="dropdown-item" href="<?= site_url('Auth/logout') ?>" onclick="return confirm('Apakah anda yakin ingin logout akun ini?');"><i class=" ik ik-power dropdown-icon"></i> Logout</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </header>

        <div class="page-wrap">
            <div class="app-sidebar colored">
                <div class="sidebar-header">
                    <a class="header-brand" href="<?= base_url('Dashboard') ?>">
                        <div class="logo-img">
                            <img src="<?= base_url('assets/') ?>/img/logo.png" class="header-brand-img" alt="lavalite">
                        </div>
                        <span class="text">SIDPAA<sup>2022</sup></span>
                    </a>
                </div>

                <div class="sidebar-content">
                    <div class="nav-container">
                        <nav id="main-menu-navigation" class="navigation-main">

                            <div class="nav-item">
                                <a href="<?= base_url('Dashboard') ?>"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                                <a href="<?= base_url('User') ?>"><i class="ik ik-users"></i><span>User</span></a>
                                <a href="<?= base_url('Donasi_Uang') ?>"><i class="ik ik-dollar-sign"></i><span>Donasi Uang</span></a>
                                <a href="<?= base_url('Donasi_Barang') ?>"><i class="ik ik-package"></i><span>Donasi Barang</span></a>
                                <a href="<?= base_url('Pengeluaran') ?>"><i class="ik ik-file-text"></i><span>Pengeluaran</span></a>
                                <a href="<?= site_url('Auth/logout') ?>" onclick="return confirm('Apakah anda yakin ingin logout akun ini?');"><i class="ik ik-lock"></i><span>Logout</span></a>
                            </div>
                    </div>
                </div>
            </div>