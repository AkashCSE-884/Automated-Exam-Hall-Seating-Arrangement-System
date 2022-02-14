<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['res'])) {
     header('Location: ../auth/index.php');
} else {
    include_once './admin_header.php';
?>
    <div class="col-md-8 m-auto mt-3">
        <div class="card">
            <div class="card-header">
                <h3 class="">Add Department</h3>
            </div>
            <div class="card-block">
            <?php
                if (isset($_SESSION['errorMessageRegister'])) {
                    echo $_SESSION['errorMessageRegister'];
                    unset($_SESSION['errorMessageRegister']);
                }
                ?>
                <form id="area_form" class="form-material" action="../process/dataProcess.php" method="POST" autocomplete="" enctype="multipart/form-data">
                    <div class="form-group form-default">
                        <input type="text" name="area_name" class="form-control" required="" data-parsley-trigger="keyup">
                        <span class="form-bar"></span>
                        <label class="float-label">Area Name</label>
                    </div>

                    <div  class="form-group form-default" style="display: none;">
                        <input type="text" name="district" class="form-control" value=""  data-parsley-trigger="keyup">
                        <span class="form-bar"></span>
                        <label class="float-label">District</label>
                    </div>
                    <div class="form-group form-default">
                        <input type="text" name="post_office" class="form-control" required="" data-parsley-trigger="keyup">
                        <span class="form-bar"></span>
                        <label class="float-label">Post Office</label>
                    </div>
                    <div class="form-group form-default">
                        <input type="text" name="zip_code" class="form-control" required="" data-parsley-trigger="keyup">
                        <span class="form-bar"></span>
                        <label class="float-label">Zip Code</label>
                    </div>
                    <div class="form-group form-default ">
                        <button name="add" class="btn btn-primary d-block m-auto col-md-6">Add</button>
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
        $('#area_form').parsley();
    </script>
<?php
}

?>