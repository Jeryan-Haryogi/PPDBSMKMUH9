
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from themes.startbootstrap.com/sb-admin-pro/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 14:31:09 GMT -->
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        <title>Super Administrator</title>
        <link href="{{url('admin')}}/css/styles.css" rel="stylesheet" />
        <link href="{{url('admin')}}/cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link href="{{url('admin')}}/cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet" crossorigin="anonymous" />
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <script data-search-pseudo-elements defer src="{{url('admin')}}/cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script> <script src="{{url('admin')}}/cdnjs.cloudflare.com/ajax/libs/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body class="nav-fixed">
        <nav class="topnav navbar navbar-expand shadow navbar-light bg-white" id="sidenavAccordion">
            <a class="navbar-brand" href="index-2.html">SUPER ADMIN</a>
            <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2" id="sidebarToggle" href="#"><i data-feather="menu"></i></button>
           
            <ul class="navbar-nav align-items-center ml-auto">
               
              
                <li class="nav-item dropdown no-caret mr-2 dropdown-user">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="https://source.unsplash.com/QAB-WJcbgJk/60x60"/></a>
                    <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                        <h6 class="dropdown-header d-flex align-items-center">
                            <img class="dropdown-user-img" src="https://source.unsplash.com/QAB-WJcbgJk/60x60" />
                            <div class="dropdown-user-details">
                                <div class="dropdown-user-details-name">SUPER ADMIN</div>
                            </div>
                        </h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{url('Administrator/Keluar')}}">
                            <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sidenav shadow-right sidenav-light">
                    <div class="sidenav-menu">
                        <div class="nav accordion" id="accordionSidenav">
                            <div class="sidenav-menu-heading">Core</div>
                            <a class="nav-link collapsed" href="{{url('Administrator/dashboard')}}" >
                                <div class="nav-link-icon"><i data-feather="activity"></i></div>
                                Dashboards
                            </a>
                            <div class="sidenav-menu-heading">Data base</div>
                            <a class="nav-link collapsed" href="{{url('Administrator/data-operator')}}" >
                                <div class="nav-link-icon"><i data-feather="grid"></i></div>
                               Operator
                                
                            </a>
                             <a class="nav-link collapsed" href="{{url('Administrator/ppdb/peserta-didik-baru')}}/<?= date('Y')?>-<?= date('Y', strtotime('+1 year'))?>" >
                                <div class="nav-link-icon"><i data-feather="users"></i></div>
                               Daftar Peserta Didik Baru
                            </a>
                             <a class="nav-link collapsed" href="{{url('Administrator/ppdb/peserta-didik-baru-terkonfirmasi')}}/<?= date('Y')?>-<?= date('Y', strtotime('+1 year'))?>" >
                                <div class="nav-link-icon"><i data-feather="user-plus"></i></div>
                                Peserta Didik Baru Terkonfirmasi
                            </a>
                           <!--   <a class="nav-link collapsed" href="{{url('Administrator/Pesan-Masuk')}}" >
                                <div class="nav-link-icon"><i data-feather="mail"></i></div>
                               Pesan Masuk
                            </a> -->
                             <a class="nav-link collapsed" href="{{url('Administrator/Setting')}}" >
                                <div class="nav-link-icon"><i data-feather="settings"></i></div>
                                Pengaturan
                            </a>
                             <a class="nav-link collapsed" href="{{url('Administrator/Keluar')}}" >
                                <div class="nav-link-icon"><i data-feather="power"></i></div>
                             Keluar
                            </a>
                           
                           
                        </div>
                    </div>
                    <div class="sidenav-footer">
                        <div class="sidenav-footer-content">
                            <div class="sidenav-footer-subtitle">Jeryan Haryogi</div>
                            <div class="sidenav-footer-title">XII MM 1</div>
                        </div>
                    </div>
                </nav>
            </div>