<?php

include_once "../includes/functions.php";

if(!isset($_SESSION['user'])) {
    redirect("login.php");
}

$current_user = findById("users", $_SESSION['user']);

if(findById("user_levels", $current_user->level)->name == "Super User") {
    redirect("../admin/index.php");
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Farm</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/css-pro-layout@1.1.0/dist/css/css-pro-layout.css">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- data table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="../assets/css/typography.css">
    <link rel="stylesheet" href="../assets/css/layout.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/reponsive.css">

</head>

<body>

<div class="layout has-sidebar fixed-sidebar fixed-header">
    <!-- ---------------------Side bar-------------- -->
    <aside id="sidebar" class="sidebar break-point-lg has-bg-image">
        <div class="sidebar-layout">
            <div class="sidebar-header d-flex justify-content-center">

                <a id="btn-toggle2" href="#" class="sidebar-toggler break-point-lg">
                    <!-- <i class="bi bi-list f-22 text-white"></i> -->
                </a>
                <div class="d-flex justify-content-center align-items-center">
                     <img width="65px" src="../assets/images/logo.png" alt="" class="img-fluid logo">

                </div>
            </div>
            <div class="sidebar-content">
                <nav class="menu open-current-submenu">
                    <ul>
                        <li class="menu-item">
                            <a href="index.php">
                                    <span class="menu-icon">
                                        <i class="bi bi-columns-gap" style="margin-top: 2px"></i>
                                    </span>
                                <span class="menu-title text-dark-blue mt-1">Dashboard</span>
                            </a>
                        </li>

                    </ul>
                    <div class="menu-item py-3">
                        <span class="ps-4 f-14 w-500 text-light-white ls-3 menu-heading ">DATA</span>
                    </div>
                    <ul>
                        <li class="menu-item">
                            <a href="cattle.php">
                                    <span class="menu-icon">
                                        <i class="fa-solid fa-cow"></i>
                                    </span>
                                <span class="menu-title">Cattle</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="milk-production.php">
                                    <span class="menu-icon">
                                        <i class="fa-solid fa-bottle-droplet"></i>
                                    </span>
                                <span class="menu-title">Milk Production</span>
                            </a>
                        </li>
                    </ul>
                    <div class="menu-item py-3">
                        <span class="ps-4 f-14 w-500 text-light-white ls-3 menu-heading ">SETTINGS</span>
                    </div>
                    <ul>

                        <li class="menu-item">
                            <a href="profile.php">
                                    <span class="menu-icon">
                                        <i class="bi bi-person-gear"></i>
                                    </span>
                                <span class="menu-title">Profile</span>
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>
    </aside>

    <!-- --------------------Main Side-------------- -->
    <div id="overlay" class="overlay"></div>
    <div class="layout">
        <!-- ----------------Header--------------- -->
        <header class="header">
            <a id="btn-collapse" href="#" class="align-self-center ">
                <i class="bi bi-filter-left f-28 btn-head"></i>
            </a>
            <a id="btn-toggle" href="#" class="sidebar-toggler break-point-lg align-self-center">
                <i class="bi bi-filter-left f-28  btn-head"></i>
            </a>
            <div class="d-flex ms-auto user-account px-2">

                <div class="user-icon">
                    <i class="bi bi-person "></i>
                </div>
                <div class="dropdown profile-dropdown">
                    <button class=" dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $current_user->username ?>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="profile.php"><i class="bi bi-person-gear me-2"></i> Profile</a>
                        </li>
                        <li><a class="dropdown-item" href="?a=logout"><i class="bi bi-box-arrow-left me-2"></i>Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>