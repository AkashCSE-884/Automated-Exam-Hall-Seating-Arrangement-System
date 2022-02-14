<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['res'])) {
    header('Location: ../auth/index.php');
} else {
    include_once './admin_header.php';

    // var_dump($_SESSION['res']);
?>
    <div class="col-md-8 m-auto">
        <div class="card">
        <?php 
                    $email = $_SESSION['res']->email;
                    $res = $dbm->emailIsExist($email);
                ?>
            <div class="card-header">
                <h4 class="text-uppercase">Add Staff</h4>
            </div>
            <div class="card-block">
            <?php
                if (isset($_SESSION['updateMsg'])) {
                    echo $_SESSION['updateMsg'];
                    unset($_SESSION['updateMsg']);
                }
                ?>
                <form id="addStaff" class="form-material" action="../process/dataProcess.php" method="POST" autocomplete="" enctype="multipart/form-data">
                    <div class="form-group form-default">
                         <label class="">Full Name</label>
                        <input type="text" name="name" class="form-control" required="" data-parsley-trigger="keyup">
                        <span class="form-bar"></span>
                        
                    </div>
                    <div class="form-group form-default">
                    <label class="">University ID</label>
                        <input type="text" name="u_id"   class="form-control" required="" data-parsley-trigger="keyup">
                        <span class="form-bar"></span>
                        
                    </div>
                    <!-- <div class="form-group form-default">
                    <label class="">ID</label>
                        <input type="text" name="id"  class="disabled form-control"  >
                        <span class="form-bar"></span>
                      
                    </div>
                    <div class="form-group form-default">
                        <label class="">Profile Image</label>
                        <input type="file" name="image" class="form-control"accept="image/*" >
                        <span class="form-bar"></span>
                    </div> -->
                    <div class="form-group form-default ">
                        <button name="Submit-staff" type="submit" class="btn btn-primary d-block m-auto col-md-6" >Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    include_once './admin_footer.php';
    ?>
    <script src="../../contents/js/script.js"></script>
    <script>
        $('#addStaff').parsley();
    </script>
<?php
}

?>