<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['res'])) {
     header('Location: ../auth/index.php');
} else {
    include_once './admin_header.php';

?>
    <!-- Page-header end -->
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-body start -->
                <div class="page-body">
                    <!-- Basic table card start -->
                    <!-- Hover table card start -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-3">Room Details</h5>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                    <li><i class="fa fa-window-maximize full-card"></i></li>
                                    <li><i class="fa fa-minus minimize-card"></i></li>
                                    <li><i class="fa fa-refresh reload-card"></i></li>
                                    <li><i class="fa fa-trash close-card"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div id="customers" class="card-block">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Room Name</th>
                                            <th>Seat Capacity</th>
                                            <th>Building Name</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <td>#</td>
                                            <td>Room Name</td>
                                            <td>Seat Capacity</td>
                                            <td>Building Name</td>
                                        </tr>
                                    </tfoot>
                                    <tbody id="tableBody" style="overflow-y:auto;">
                                        <?php
                                        $count = 0;
                                        $ress = $dbm->selectBuildingDetailsInfo();
                                        foreach ($ress as $data) {
                                        ?>
                                            <tr>
                                                <td><?php echo $count++; ?></td>
                                                <td>
                                                     <?php echo $data->title; ?>
                                                </td>
                                                <td><?php echo $data->seat_capacity; ?></td>
                                                <!-- <td class="context">
                                                     echo $data->id; 
                                                </td> -->
                                                <td><?php echo $data->building_name; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Hover table card end -->
                </div>
                <div id="ok">

                </div>
            </div>
        </div>
    </div>

    <?php
    include_once './admin_footer.php';
    ?>
    <script src="../../contents/js/script.js"></script>
    <script>
          $(document).ready(function() {
            $('#example').dynatable();
        });
    </script>

<?php
}
          
              
?>