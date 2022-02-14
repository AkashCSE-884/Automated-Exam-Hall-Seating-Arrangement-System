<?php

if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['res'])) {
    header('Location: ../auth/index.php');
} else {

    $user_id = $_SESSION['res']->user_id;
    include './teacher_header.php';

?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <style>
        th a {
            color: black !important;
        }
    </style>
    <?php

    ?>
    <div class="shadow p-3 mb-5  rounded" style="margin: 40px 20px 20px 300px; ">
        <h3 style="text-align: center; text-decoration: underline;">Student Exam List</h3>
        <div class="col-md-12 " style="padding: 20px 20px 20px 20px; ">
            <table id="example" class="table table-striped " cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Room Name</th>
                        <th>Name</th>
                        <!-- <th>ID</th> -->
                        <th>Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td>#</td>
                        <td>Room Name</td>
                        <td>Name</td>
                        <!-- <td>ID</td> -->
                        <td>Date</td>
                        <td>Start Time</td>
                        <td>End Time</td>
                    </tr>
                </tfoot>
                <tbody id="tableBody" style="overflow-y:auto;">
                    <?php
                    $count = 0;
                    $ress = $dbm->selectAssignTeacherList();
                    foreach ($ress as $data) {
                        ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td>
                                     <?php echo $data->room_name; ?>
                                </td>
                                <td><?php echo $data->user_name; ?></td>
                                <!-- <td class="context">
                                     echo $data->id; 
                                </td> -->
                                <td><?php echo $data->date; ?></td>
                                <td><?php
                                    echo date('h:i:s a ', strtotime($data->start_time));
                                    ?></td>
                                <td>
                                    <?php
                                    echo date('h:i:s a ', strtotime($data->end_time));
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>

    </div>

    <?php include './teacher_footer.php'; ?>

    <script>
        $(document).ready(function() {
            $('#example').dynatable();
        });
    </script>
<?php
} ?>