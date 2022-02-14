<?php


if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['res'])) {
    header('Location: ../auth/index.php');
} else {
    include_once './admin_header.php';

    $totalData = $dbm->seleclTotalDataForDashBoard();

    //var_dump($_SESSION['res']);


?>
    <!-- Page-header end -->
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-body start -->
                <div class="page-body">
                    <div class="row">

                        <div class="col-xl-4 col-md-12">
                            <div class="card mat-stat-card">
                                <div class="card-block">
                                    <div class="row align-items-center b-b-default">
                                        <div class="col-sm-6 b-r-default p-b-20 p-t-20">
                                            <div class="row align-items-center text-center">
                                                <div class="col-4 p-r-0">
                                                    <i class="fas fa-users text-c-purple f-24"></i>
                                                </div>
                                                <div class="col-8 p-l-0">
                                                    <h5><?php echo $totalData-> total_student;?></h5>
                                                    <p class="text-muted m-b-0">Students</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 p-b-20 p-t-20">
                                            <div class="row align-items-center text-center">
                                                <div class="col-4 p-r-0">
                                                    <i class="fas fa-users text-c-green f-24"></i>
                                                </div>
                                                <div class="col-8 p-l-0">
                                                    <h5><?php echo $totalData-> total_teacher;?></h5>
                                                    <p class="text-muted m-b-0">Teachers</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-sm-6 p-b-20 p-t-20 b-r-default">
                                            <div class="row align-items-center text-center">
                                                <div class="col-4 p-r-0">
                                                    <i class="fas fa-users text-c-red f-24"></i>
                                                </div>
                                                <div class="col-8 p-l-0">
                                                    <h5><?php echo $totalData-> total_moderator;?></h5>
                                                    <p class="text-muted m-b-0">Moderators</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-sm-6 p-b-20 p-t-20">
                                            <div class="row align-items-center text-center">
                                                <div class="col-4 p-r-0">
                                                    <i class="fas fa-users text-c-blue f-24"></i>
                                                </div>
                                                <div class="col-8 p-l-0">
                                                    <h5><?php echo $totalData-> total_staff;?></h5>
                                                    <p class="text-muted m-b-0">Staff</p>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-md-12">
                            <div class="row">
                                <!-- sale card start -->

                                <div class="col-md-6">
                                    <div class="card text-center order-visitor-card">
                                        <div class="card-block">
                                            <h6 class="m-b-0">Total Room</h6>
                                            <h4 class="m-t-15 m-b-15"><i class="fa fa-arrow-down m-r-15 text-c-red"></i><?php echo $totalData-> total_room;?></h4>
                                            <!-- <p class="m-b-0">48% From Last 24 Hours</p> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card text-center order-visitor-card">
                                        <div class="card-block">
                                            <h6 class="m-b-0">Total Department</h6>
                                            <h4 class="m-t-15 m-b-15"><i class="fa fa-arrow-down m-r-15 text-c-red"></i>3</h4>
                                            <!-- <p class="m-b-0">48% From Last 24 Hours</p> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card text-center order-visitor-card">
                                        <div class="card-block">
                                            <h6 class="m-b-0">Total Batch</h6>
                                            <h4 class="m-t-15 m-b-15"><i class="fa fa-arrow-down m-r-15 text-c-red"></i>12</h4>
                                            <!-- <p class="m-b-0">48% From Last 24 Hours</p> -->
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                                    <div class="card text-center order-visitor-card">
                                        <div class="card-block">
                                            <h6 class="m-b-0">Order Status</h6>
                                            <h4 class="m-t-15 m-b-15"><i class="fa fa-arrow-up m-r-15 text-c-green"></i>6325</h4>
                                            <p class="m-b-0">36% From Last 6 Months</p>
                                        </div>
                                    </div>
                                </div> -->

                                <!-- sale card end -->
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
<?php
    include_once './admin_footer.php';
}
?>