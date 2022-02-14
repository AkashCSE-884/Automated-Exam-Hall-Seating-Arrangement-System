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
    <style>
        /* The Modal (background) */
        .ebcf_modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 110px;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);

        }

        /* Modal Content */
        .ebcf_modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 10px;
            border: 1px solid #888;
            width: 80%;
        }

        /* The Close Button */
        .ebcf_close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .ebcf_close:hover,
        .ebcf_close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>

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
                            <h5 class="mb-3">Manage Exam Schedule</h5>
                            <div class="form-material" style="width: 50%;">
                                <div class="form-group form-default">
                                    <button onclick="demoFromHTML()" name="exam-form" class="send-mail btn waves-effect waves-light btn-primary"><i class="icofont icofont-user-alt-3"></i>Download PDF</button>

                                </div>
                            </div>
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
                                            <th>Department</th>
                                            <th>Batch</th>
                                            <th>Subject</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Department</th>
                                            <th>Batch</th>
                                            <th>Subject</th>
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
                                                <td class="context">
                                                <?php echo $data->batch_id; ?>  
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
                    </div>
                    <!-- Hover table card end -->
                </div>
                <div id="ok">

                </div>
            </div>
        </div>
    </div>


    <script>

        function demoFromHTML() {
            var pdf = new jsPDF('p', 'pt', 'letter');
            // source can be HTML-formatted string, or a reference
            // to an actual DOM element from which the text will be scraped.
            source = $('#customers')[0];

            // we support special element handlers. Register them with jQuery-style 
            // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
            // There is no support for any other type of selectors 
            // (class, of compound) at this time.
            specialElementHandlers = {
                // element with id of "bypass" - jQuery style selector
                '#bypassme': function(element, renderer) {
                    // true = "handled elsewhere, bypass text extraction"
                    return true
                }
            };
            margins = {
                top: 80,
                bottom: 60,
                left: 40,
                width: 522
            };
            // all coords and widths are in jsPDF instance's declared units
            // 'inches' in this case
            pdf.fromHTML(
                source, // HTML string or DOM elem ref.
                margins.left, // x coord
                margins.top, { // y coord
                    'width': margins.width, // max width of content on PDF
                    'elementHandlers': specialElementHandlers
                },

                function(dispose) {
                    // dispose: object with X, Y of the last line add to the PDF 
                    //          this allow the insertion of new lines after html
                    pdf.save('Test.pdf');
                }, margins);
        }



    </script>

    <?php
    include_once './admin_footer.php';
    ?>
            <script>
                $(document).ready(function() {
            $('#example').dynatable();
        });
    </script>
<?php
}



// function sendData() {
//     var secondTableData = [];
//     if (tableBodyView.innerHTML == "") {
//         alert("Please fill form")
//     } else {


//         let obj = {}
//         let ara = []
//         var oTable = document.getElementById('tableBodyView');
//         var rowLength = oTable.rows.length;
//         for (i = 0; i < rowLength - 1; i++) {
//             var oCells = oTable.rows.item(i).cells;
//             var cellLength = oCells.length;

//             let araobj = {}
//             let inara = []
//             for (var j = 0; j < cellLength; j++) {
//                 let name = oCells.item(j).children[0].getAttribute('name')
//                 araobj.name = oCells.item(j).children[0].value;
//                 //Object.assign(araobj,  araobj); 
//                 inara.push({
//                     ...araobj
//                 })
//             }
//            // Object.assign(obj,  inara);
//             ara.push(inara);;
//         }
//         //console.log(ara)
//         let msn = []
//         ara.forEach(ins => {
//             let ina = {}

//             ins.forEach((els, x) => {

//                 // // Object.assign(ina,els);
//                 if (x <= 4) {
//                     Object.assign(ina)
//                 }
//             })
//         })
//          console.log(msn)
//     }
// }
?>