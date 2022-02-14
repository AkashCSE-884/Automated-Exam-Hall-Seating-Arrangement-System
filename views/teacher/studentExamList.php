<?php

if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['res'])) {
     header('Location: ../auth/index.php');
} else {

    include './teacher_header.php';

?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <style>
        th a{
            color: black !important;
        }
    </style>
    <?php

    ?>
    <div class="shadow p-3 mb-5  rounded" style="margin: 40px 20px 20px 300px; ">
        <h3 style="text-align: center; text-decoration: underline;">Student Exam List</h3>
        <div class="col-md-12 " style="padding: 20px 20px 20px 20px; ">
            <table id="example" class="table table-striped " cellspacing="0" width="100%">
                <thead style="color:black;">
                    <tr>
                        <th>#</th>
                        <th>Department</th>
                        <th>Subject</th>
                        <th>Exam Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Room Name</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Department</th>
                        <th>Subject</th>
                        <th>Exam Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Room Name</th>
                    </tr>
                </tfoot>
                <tbody id="tableBody" style="overflow-y:auto;">
                    <?php
                    $count = 0;
                    $ress = $dbm->selectExamSchedule();
                    foreach ($ress as $data) {
                    ?>
                        <tr>
                            <td><?php echo $count++; ?></td>
                            <td>
                                <?php
                                if ($data->dept_id == 1) {
                                    echo "CSE";
                                }
                                if ($data->dept_id == 2) {
                                    echo "EEE";
                                }
                                if ($data->dept_id == 3) {
                                    echo "ENG";
                                }

                                ?>
                            </td>
                            <td>
                                <?php echo $data->subject_title; ?>
                            </td>
                            <td><?php echo $data->date; ?></td>
                            <td><?php
                                echo date('h:i:s a ', strtotime($data->start_time));
                                ?></td>
                            <td>
                                <?php
                                echo date('h:i:s a ', strtotime($data->end_time));
                                ?>
                            </td>
                            <td><?php echo $data->room_name; ?></td>
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