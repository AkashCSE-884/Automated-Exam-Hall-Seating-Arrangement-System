<?php

if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['res'])) {
     header('Location: ../auth/index.php');
} else {

    include './user_header.php';

?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {

            background: #eff;
        }

        h3 {
            font-size: 16px;
        }

        .ibox-content {
            background-color: #ffffff;
            color: inherit;
            padding: 15px 20px 20px 20px;
            border-color: #e7eaec;
            border-image: none;
            border-style: solid solid none;
            border-width: 1px 0;
        }


        .btn-grad {
            background-image: linear-gradient(to right, #56CCF2 0%, #2F80ED 51%, #56CCF2 100%)
        }

        .btn-grad {

            padding: 8px 20px;
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;
            font-size: 12px;
            font-weight: bold;
            box-shadow: 0 0 20px #eee;
            border-radius: 10px;
            display: block;
            border: none;
        }

        .btn-grad:hover {
            background-position: right center;
            /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
        }
    </style>
    <?php

    ?>
    <div class="shadow p-3 mb-5 bg-body rounded" style="margin: 90px 20px 20px 300px; ">
                <div class="col-md-12 "  style="padding: 20px 20px 20px 20px;  background-color: #ffffff;">
                    <table  class="table table-hover" cellspacing="0" width="100%">
                        <thead style="text-align:center">
                            <tr>
                                <th>#</th>
                                <th>Department</th>
                                <th>id</th>
                                <th>Subject</th>
                                <th>Exam Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Room Name</th>
                            </tr>
                        </thead>
                        <tbody style="text-align:center">
                            <?php
                            $user_id = $_SESSION['res']->user_id;
                            $u_id = $_SESSION['res']->id;
                            $count = 0;
                            $res = $dbm->selectExamScheduleByUserId($user_id);
                            foreach ($res as $res) {
                            ?>
                                <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td>
                                        <?php
                                        if ($res->dept_id == 1) {
                                            echo "CSE";
                                        }
                                        if ($res->dept_id == 2) {
                                            echo "EEE";
                                        }
                                        if ($res->dept_id == 3) {
                                            echo "ENG";
                                        }
                                        ?></td>
                                    <td><?php echo $u_id ?></td>
                                    <td><?php echo $res->subject_title; ?></td>
                                    <td><?php echo $res->date; ?></td>
                                    <td><?php
                                        echo date('h:i:s a ', strtotime($res->start_time));
                                        ?></td>
                                    <td>
                                        <?php
                                        echo date('h:i:s a ', strtotime($res->end_time));
                                        ?>
                                    </td>
                                    <td><?php echo $res->room_name; ?></td>

                                </tr>
                            <?php   }
                            ?>
                        </tbody>
                    </table>

                </div>

            </div>

    <?php include './user_footer.php'; ?>

    <script>
        $(document).ready(function() {
            $('#example').dynatable();
        });
    </script>
<?php
} ?>