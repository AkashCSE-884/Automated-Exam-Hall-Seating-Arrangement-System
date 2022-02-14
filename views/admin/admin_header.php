<?php
include_once("../../vendor/autoload.php");

use App\DataManipulation\DataManipulation;

$dbm = new DataManipulation();

if (!isset($_SESSION)) {
    session_start();
}

$email = $_SESSION['res']->email;
$res = $dbm->emailIsExist($email);
$image ='';
// var_dump($res->image);

if($res->image != null){

    $image = $res->image;
}
else{
    $image = "../../contents/images/no-image.jpg" ;
}

// $image = $image !='' ? $image : "../../contants/images/no-image.jpg" 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="keywords" content="" />
    <meta name="author" content="Codedthemes" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
 
    <link rel="stylesheet" href="../../assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-8D+M+7Y6jVsEa7RD6Kv/Z7EImSpNpQllgaEIQAtqHcI0H6F4iZknRj0Nx1DCdB+TwBaS+702BGWYC0Ze2hpExQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >

    <link rel="stylesheet" href="../../assets/pages/waves/css/waves.min.css" type="text/css" media="all">

    <link rel="stylesheet" type="text/css" href="../../assets/icon/themify-icons/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-n.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome.min.css">
    <!-- scrollbar.css -->
    <link rel="stylesheet" type="text/css" href="../../assets/css/jquery.mCustomScrollbar.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../contents/css/parsley.css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css">
    <link rel="stylesheet" media="all" href="https://s3.amazonaws.com/dynatable-docs-assets/css/jquery.dynatable.css" />    <style>
        .dynatable-sort-header {
            color: black;
        }

        @media (max-width:500) {
            table>* {
                font-size: 10px !important;
            }

            table>* {
                font-size: 8px !important;
            }
            .dynatable-sort-header{
                font-size: 10px !important;
            }
        }
        @media (max-width:450){
            .dynatable-head{
                font-size: 8px !important;
            }
        }
    </style>
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="preloader-wrapper">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <div class="mobile-search waves-effect waves-light">
                            <div class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-prepend search-close"><i class="ti-close input-group-text"></i></span>
                                        <input type="text" class="form-control" placeholder="Enter Keyword">
                                        <span class="input-group-append search-btn"><i class="ti-search input-group-text"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="index.html">
                            <!-- <img class="img-fluid" src="" alt="Theme-Logo" /> -->
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="ti-more"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="user-profile header-notification">
                                <a href="#!" class="waves-effect waves-light">
                                    <img src="<?php  echo $image;?>" class="img-radius" alt="User-Profile-Image"  style="height:35px; width:35px;" >
                                    <span><?php echo $res->user_name ;?></span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    <!-- <li class="waves-effect waves-light">
                                        <a href="#!">
                                            <i class="ti-settings"></i> Settings
                                        </a>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <a href="./edit-profile.php">
                                            <i class="ti-user"></i> Profile
                                        </a>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <a href="email-inbox.html">
                                            <i class="ti-email"></i> My Messages
                                        </a>
                                    </li> -->
                                    <li class="waves-effect waves-light">
                                        <a href="auth-lock-screen.html">
                                            <i class="ti-lock"></i> Lock Screen
                                        </a>
                            </li>
                            <li class="waves-effect waves-light">
                                <a href="../process/dataProcess.php?logout">
                                    <i class="ti-layout-sidebar-left"></i> Logout
                                </a>
                            </li>
                        </ul>
                        </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="">
                                <div class="main-menu-header">
                                    <img class="img-80 mt-3 img-radius" style="height:55px; width:55px;" src="<?php  echo $image;?>" alt="User-Profile-Image">
                                    <div class="user-details">
                                        <span id="more-details"><?php echo $res->user_name ;?><i class="fa fa-caret-down"></i></span>
                                    </div>
                                </div>
                                <div class="main-menu-content">
                                    <ul>
                                        <li class="more-details">
                                            <a href="edit-profile.php"><i class="ti-user"></i>View Profile</a>
                                            <a href="#!"><i class="ti-settings"></i>Settings</a>
                                            <a href="../process/dataProcess.php?logout"><i class="ti-layout-sidebar-left"></i>Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- <div class="p-15 p-b-0">
                                <form class="form-material">
                                    <div class="form-group form-primary">
                                        <input type="text" name="footer-email" class="form-control">
                                        <span class="form-bar"></span>
                                        <label class="float-label"><i class="fa fa-search m-r-10"></i>Search Friend</label>
                                    </div>
                                </form>
                            </div> -->
                            <div class="pcoded-navigation-label">Navigation</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="active">
                                    <a href="admin_home.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                        
                            <!-- <div class="pcoded-navigation-label">Staff Info</div> 
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="add_staff.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                        <span class="pcoded-mtext">Add Staff</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul> -->
                            <div class="pcoded-navigation-label">Buildings Info</div> 
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="add_building_details.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                        <span class="pcoded-mtext">Add Building Details</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="view_building_details.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                        <span class="pcoded-mtext">View Building Details</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <div class="pcoded-navigation-label">Manage Exam Schedule</div> 
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="manageExamSedule.php" name="sendmail" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                        <span class="pcoded-mtext">Exam Schedule</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>

                            <!-- <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="viewExamSchedule.php" name="sendmail" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                        <span class="pcoded-mtext">View Exam Schedule</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul> -->
                            <div class="pcoded-navigation-label">View Exam Information</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="studentList.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="fas fa-users"></i><b>C</b></span>
                                        <span class="pcoded-mtext">Student List</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="instructorList.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="fas fa-users"></i><b>M</b></span>
                                        <span class="pcoded-mtext">Teacher List</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <!-- <li class="">
                                    <a href="staffList.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="fas fa-users"></i><b>M</b></span>
                                        <span class="pcoded-mtext">Staff List</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li> -->
                            </ul>
                            <!-- <div class="pcoded-navigation-label">Tables</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="bs-basic-table.html" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-receipt"></i><b>B</b></span>
                                        <span class="pcoded-mtext">Table</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <div class="pcoded-navigation-label">Chart And Maps</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="chart-morris.html" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-bar-chart-alt"></i><b>C</b></span>
                                        <span class="pcoded-mtext">Charts</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="map-google.html" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-map-alt"></i><b>M</b></span>
                                        <span class="pcoded-mtext">Maps</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul> 
                            <div class="pcoded-navigation-label">Pages</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu ">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-id-badge"></i><b>A</b></span>
                                        <span class="pcoded-mtext">Pages</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                   <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="auth-normal-sign-in.html" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Login</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="auth-sign-up.html" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Registration</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="sample-page.html" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-layout-sidebar-left"></i><b>S</b></span>
                                                <span class="pcoded-mtext">Sample Page</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul> -->
                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Dashboard</h5>
                                            <!-- <p class="m-b-0">Welcome to Material Able</p> -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>