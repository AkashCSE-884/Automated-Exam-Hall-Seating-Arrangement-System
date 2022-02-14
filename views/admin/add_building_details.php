<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['res'])) {
     header('Location: ../auth/index.php');
} else {
    include_once './admin_header.php';

?>

    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Add Building Details</h4>
                                    <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                </div>
                                <div class="card-block">
                                    <?php
                                    if (isset($_SESSION['updateMsg'])) {
                                        echo $_SESSION['updateMsg'];
                                        unset($_SESSION['updateMsg']);
                                    }
                                    ?>
                                    <form id="building_form" class="form-material" action="../process/dataProcess.php" method="POST" autocomplete="" enctype="multipart/form-data">
                                        <div class="form-group form-default">
                                            <input type="text" name="building_title" class="form-control" required="" data-parsley-trigger="keyup">
                                            <span class="form-bar"></span>
                                            <label class="float-label">Building Name</label>
                                        </div>
                                        <div class="form-group form-default">
                                            <input type="number" name="total_floor" class="form-control" required="" data-parsley-trigger="keyup">
                                            <span class="form-bar"></span>
                                            <label class="float-label">Total Floor</label>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button name="building_name" class="btn waves-effect waves-light btn-primary"><i class="icofont icofont-user-alt-3"></i>Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Add Floor Details</h4>
                                    <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                </div>
                                <div class="card-block">
                                    <?php
                                    if (isset($_SESSION['updateMsgs'])) {
                                        echo $_SESSION['updateMsgs'];
                                        unset($_SESSION['updateMsgs']);
                                    }
                                    ?>
                                    <form id="floor_form" class="form-material" action="../process/dataProcess.php" method="POST" autocomplete="" enctype="multipart/form-data">
                                        <div class="form-group form-default">
                                            <input type="text" name="floor_name" class="form-control" required="" data-parsley-trigger="keyup">
                                            <span class="form-bar"></span>
                                            <label class="float-label">Floor Name</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-default">
                                                    <select name="building_id" class="form-control" required="" data-parsley-trigger="keyup">
                                                        <option value=""></option>
                                                        <?php
                                                        $res = $dbm->selectBuildingData();
                                                        foreach ($res as $res) {
                                                            echo '<option value="' . $res->building_id . '" >' . $res->building_name . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">Select Building </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-default">
                                                    <input type="number" name="total_room" class="form-control" required="" data-parsley-trigger="keyup">
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">Total Room</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button name="add_floor" class="btn waves-effect waves-light btn-primary"><i class="icofont icofont-user-alt-3"></i>Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Add Room Details</h4>
                                    <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                </div>
                                <div class="card-block">
                                <?php
                                    if (isset($_SESSION['updateMsgss'])) {
                                        echo $_SESSION['updateMsgss'];
                                        unset($_SESSION['updateMsgss']);
                                    }
                                    ?>
                                    <form id="room_form" class="form-material" action="../process/dataProcess.php" method="POST" autocomplete="" enctype="multipart/form-data">
                                        <div class="form-group form-default">
                                            <input type="text" name="room_title" class="form-control" required="" data-parsley-trigger="keyup">
                                            <span class="form-bar"></span>
                                            <label class="float-label">Room Name</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-default">
                                                    <select id="bId" name="r_building_id" class="form-control" required="" data-parsley-trigger="keyup">
                                                        <option value=""></option>
                                                        <?php
                                                        $res = $dbm->selectBuildingData();
                                                        foreach ($res as $res) {
                                                            echo '<option value="' . $res->building_id . '" >' . $res->building_name . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">Select Building </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-default">
                                                    <select id="floor_id" name="floor_id" class="form-control" required="" data-parsley-trigger="keyup">
                                                        <option value=""></option>
                                                    </select>
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">Select Floor </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group form-default">
                                            <input type="number" name="seat" class="form-control" required="" data-parsley-trigger="keyup">
                                            <span class="form-bar"></span>
                                            <label class="float-label">Total Seat</label>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button name="add_room" class="btn waves-effect waves-light btn-primary"><i class="icofont icofont-user-alt-3"></i>Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once './admin_footer.php';
    ?>
    <script src="../../contents/js/script.js"></script>
    <script>
        $('#building_form').parsley();
        $('#floor_form').parsley();
        $('#room_form').parsley();

        document.getElementById("bId").addEventListener('change', async () => {
            let b_id = document.getElementById("bId").value
            console.log(b_id);
            let formData = new FormData();
            formData.append('bid', b_id)
            let li = "";
            let htmlSegment = "";
            let req = await fetch('../process/dataProcess.php', {
                method: "POST",
                body: formData
            })
            let res = await req.json();
            res.forEach(item => {
                li = `<option value="${item.floor_id}">${item.title}</option>`;
                    htmlSegment += li;
            })
            document.getElementById('floor_id').innerHTML = htmlSegment;
        })
        

    </script>
<?php
}

?>