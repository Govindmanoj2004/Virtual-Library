<?php
include("SessionValidation.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../Assets/Templates/Admin/images/favicon.png">
    <!-- Bootstrap Core CSS -->
    <link href="../Assets/Templates/Admin/assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../Assets/Templates/Admin/assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="../Assets/Templates/Admin/assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--c3 CSS -->
    <link href="../Assets/Templates/Admin/assets/node_modules/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../Assets/Templates/Admin/css/style.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="../Assets/Templates/Admin/css/pages/dashboard1.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="../Assets/Templates/Admin/css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Admin Wrap</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="Homepage.php">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="../Assets/Templates/Admin/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="../Assets/Templates/Admin/assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <img src="../Assets/Templates/Admin/assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                         <!-- Light Logo text -->    
                         <img src="../Assets/Templates/Admin/assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> 
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="fa fa-bars"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../Assets/Templates/Admin/assets/images/users/1.jpg" alt="user" class="" /> <span class="hidden-md-down">Mark Sanders &nbsp;</span> </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="Homepage.php" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Home Page</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="NewAuthor.php" aria-expanded="false"><i class="fa fa-smile-o"></i><span class="hide-menu">New Author</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="VerifiedAuthors.php" aria-expanded="false"><i class="fa fa-globe"></i><span class="hide-menu">Verified Author</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="RejectedAuthors.php" aria-expanded="false"><i class="fa fa-bookmark-o"></i><span class="hide-menu">Rejected Authors</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="AllUsers.php" aria-expanded="false"><i class="fa fa-bookmark-o"></i><span class="hide-menu">Users</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="District.php" aria-expanded="false"><i class="fa fa-bookmark-o"></i><span class="hide-menu">Add District</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="Place.php" aria-expanded="false"><i class="fa fa-bookmark-o"></i><span class="hide-menu">Add Place</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="Category.php" aria-expanded="false"><i class="fa fa-bookmark-o"></i><span class="hide-menu">Add Category</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="Genre.php" aria-expanded="false"><i class="fa fa-bookmark-o"></i><span class="hide-menu">Add Genre</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="pages-error-404.html" aria-expanded="false"><i class="fa fa-question-circle"></i><span class="hide-menu">Reports</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="../Logout.php" aria-expanded="false"><i class="fa fa-question-circle"></i><span class="hide-menu">Logout</span></a>
                        </li>
                    </ul>
                    <!--<div class="text-center m-t-30">
                        <a href="https://wrappixel.com/templates/adminwrap/" class="btn waves-effect waves-light btn-info hidden-md-down"> Upgrade to Pro</a>
                    </div>-->
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">