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
                            <?php
                            if (isset($_SESSION['errorMessageRegister'])) {
                                echo $_SESSION['errorMessageRegister'];
                                unset($_SESSION['errorMessageRegister']);
                            }
                            ?>
                            <h5 class="mb-3">Manage Exam Schedule</h5>
                            <form class="form-material" style="width: 50%;">
                                <div class="form-group form-default">
                                    <input id="examTitle" pattern="^[a-zA-Z0-9]+$" type="text" name="footer-email" class="form-control">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Exam Title</label>
                                </div>
                            </form>
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
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Department</th>
                                            <th>Batch</th>
                                            <th>Manage Exam Date</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody">
                                        <tr>
                                        </tr>
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
    <!-- modal start -->
    <div id="viewModal" class=" ebcf_modal">

        <div class="ebcf_modal-content">
            <!-- <span id="ebcf_close" class="ebcf_close">&times;</span> -->
            <div id="mainContent">
                <div class="">
                    <div class="card">
                        <div class="card-header">
                            <?php
                            if (isset($_SESSION['errorMessageRegister'])) {
                                echo $_SESSION['errorMessageRegister'];
                                unset($_SESSION['errorMessageRegister']);
                            }
                            ?>
                            <h5 class="mb-3">Manage Exam Schedule</h5>
                            <form class="form-material" style="width: 50%;">
                                <div class="form-group form-default">
                                    <input id="examTitleValue" type="text" name="footer-email" disabled class="form-control">
                                    <span class="form-bar"></span>
                                    <!-- <label class="float-label">Exam Title</label> -->
                                </div>
                            </form>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                    <li><i class="fa fa-window-maximize full-card"></i></li>
                                    <li><i class="fa fa-minus minimize-card"></i></li>
                                    <li><i class="fa fa-refresh reload-card"></i></li>
                                    <li><i onclick="modalHidden()" class="fa fa-trash"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Date</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBodyView">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Hover table card end -->

                </div>
            </div>
        </div>
    </div>
    <!-- modal end -->
    <?php
    include_once './admin_footer.php';
    ?>
    <!-- <script src="../../contents/js/script.js"></script> -->
    <script>
        examTitle.addEventListener('keyup', () => {
            var x = document.getElementById("examTitle");
            x.value = x.value.toUpperCase();
        })
        const dataLoad = async () => {
            const req = await fetch('../../section.json');
            let res = await req.json();
            let data = res.ret_data;

            const deptReq = await fetch('../../department.json');
            let deptRes = await deptReq.json();
            let deptData = deptRes.ret_data;

            let html = '';
            deptData.forEach(index => {
                data.forEach((element, id) => {
                    if (index.department_id == element.department_id) {

                        let htmlSegment = `
                        <tr>
                                <td scope="row">${id}</td>
                                <td>${index.name}</td>
                                <td>${element.name}</td>
                                <td style="" class="">
                                    <button  data-title ="${element.name}" onclick="viewModalFunc(${element.section_id}, ${index.department_id})" data-id ="${element.section_id} "class="viewModalBtn btn waves-effect waves-light btn-primary"><i class="icofont icofont-user-alt-3"></i>View</button>
                                </td>
                                <td style="" class="px-0 d-flex justify-content-center">
                                <form action="../process/dataProcess.php" type="hidden" class="dataform" method="post" name="dataForm">
                                    <button onclick="sendData( this, ${element.section_id}, ${element.department_id})"  name ="exam-form" class="send-mail btn waves-effect waves-light btn-primary"><i class="icofont icofont-user-alt-3"></i>Send Exam Details</button>
                                 </form>
                                </td>

                            </tr>

                    `;
                        html += htmlSegment;
                        // onclick="sendData(${element.section_id}, ${element.department_id})"
                    }
                });
            })
            tableBody.innerHTML = html;
        }

        function modalHidden() {
            document.getElementById("viewModal").style.display = "none";
        }

        const viewModalFunc = async (id, dept_id) => {
            let sec = []
            if (examTitle.value != "") {
                examTitleValue.value = examTitle.value;

                // e.stopImmediatePropagation();
                const reqq = await fetch('../../subject.json');
                let ress = await reqq.json();
                let datad = ress.ret_data;
                let htmlSeg = '';
                let htmls = '';
                //console.log(batch_name);
                datad.forEach((element, count) => {
                    if (element.section_id == id) {
                        //console.log(element);

                        htmls = `
                        <tr>
                            <td >
                            <input type="hidden" name="exam_title" class="exam_title" value="${element.name}"  >
                            ${element.name}</td>
                            <td>
                                <input type="date" name="date"  class="form-control">
                            </td>
                            <td>
                                <input type="time" name="start_time"  class="form-control">
                            </td>
                            <td>
                                <input type="time" name="end_time"  class="form-control">
                            </td>
                        </tr>
                    `
                        htmlSeg += htmls;
                    }
                    sec.push({
                        ...element
                    })
                    // console.log(htmlSeg);
                });
                htmlSeg += `       
                <tr class="d-flex flex-row-reverse">    
                    <button  onclick="modalHidden()" class="btn waves-effect waves-light btn-primary"><i class="icofont icofont-user-alt-3"></i>Submit</button>
                </tr>`
                //console.log(htmlSeg);
                document.getElementById("tableBodyView").innerHTML = htmlSeg;
                document.getElementById("viewModal").style.display = "block"
            } else {
                alert("Please Enter exam title");
            }
        }
        dataLoad();


        async function sendData(event, section_id, dept_id) {
            console.log(event);

            var secondTableData = [];
            if (tableBodyView.innerHTML == "") {
                alert("Please fill form")
            } else {
                let obj = {}
                let ara = []
                var oTable = document.getElementById('tableBodyView');
                var rowLength = oTable.rows.length;
                for (i = 0; i < rowLength - 1; i++) {
                    var oCells = oTable.rows.item(i).cells;
                    var cellLength = oCells.length;

                    var araobj = {}
                    var inara = []
                    for (var j = 0; j < cellLength; j++) {
                        let name = oCells.item(j).children[0].getAttribute('name')
                        araobj[name] = oCells.item(j).children[0].value;
                        //Object.assign(araobj,  araobj); 
                        if (j == 3) {
                            inara.push({
                                ...araobj
                            })
                        }

                    }
                    ara.push(inara);
                }
                console.log(ara)
                let formData = ''
                formData = `

                        <input type="hidden" name="setion_id" value="${section_id}">
                        <input type="hidden" name="dept_id" value="${dept_id}">
                        <input type="hidden" class="exam_data"  name="exam_data" value="${btoa(unescape(encodeURIComponent(JSON.stringify(ara))))}">
                        <input type="hidden" name="exam_title" value= "${examTitle.value}">
                `;

                event.parentElement.insertAdjacentHTML("beforeend", formData);

                // let frm = new FormData();
                // frm.append("exam_title",examTitle.value);
                // frm.append("dept_id", dept_id);
                // frm.append("batch_id", section_id);
                // frm.append("data", JSON.stringify(ara));

                // let reqq = await fetch("../process/dataProcess.php", {
                //     method: "POST",
                //     body: frm
                // });

                //  let ress = await reqq.json();

                // console.log(ress);


            }
        }
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