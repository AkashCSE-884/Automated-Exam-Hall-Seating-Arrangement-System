<?php

if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['res'])) {
    header('Location: ./../auth/index.php');
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>ServCompany</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="http://parsleyjs.org/dist/parsley.js"></script>
        <link rel="stylesheet" href="../../contents/css/parsley.css">
        <style>
            #grad1 {
                background-color: #fffa;

                height: 100%;
            }

            #msform {
                text-align: center;
                position: relative;
                margin-top: 20px
            }

            #msform fieldset .form-card {
                background: white;
                border: 0 none;
                border-radius: 0px;
                /* box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2); */
                padding: 20px 40px 30px 40px;
                box-sizing: border-box;
                width: 94%;
                margin: 0 3% 20px 3%;
                position: relative
            }

            #msform fieldset {
                /* background: white;
            border: 0 none;
             border-radius: 0.5rem;
            box-sizing: border-box; */
                width: 100%;
                margin: 0;
                padding-bottom: 20px;
                position: relative
            }

            #msform fieldset:not(:first-of-type) {
                display: none
            }

            #msform fieldset .form-card {
                text-align: left;
                color: #9E9E9E
            }

            #msform input,
            #msform select,
            #msform textarea {
                padding: 0px 8px 4px 8px;
                border: none;
                border-bottom: 1px solid #ccc;
                border-radius: 0px;
                margin-bottom: 25px;
                margin-top: 2px;
                width: 100%;
                box-sizing: border-box;
                font-family: montserrat;
                color: #2C3E50;
                font-size: 16px;
                letter-spacing: 1px
            }

            #msform input:focus,
            #msform textarea:focus {
                -moz-box-shadow: none !important;
                -webkit-box-shadow: none !important;
                box-shadow: none !important;
                border: none;
                font-weight: bold;
                border-bottom: 2px solid skyblue;
                outline-width: 0
            }

            #msform .action-button {
                width: 100px;
                background: skyblue;
                font-weight: bold;
                color: white;
                border: 0 none;
                border-radius: 0px;
                cursor: pointer;
                padding: 10px 5px;
                margin: 10px 5px
            }

            #msform .action-button:hover,
            #msform .action-button:focus {
                box-shadow: 0 0 0 2px white, 0 0 0 3px skyblue
            }

            #msform .action-button-previous {
                width: 100px;
                background: #616161;
                font-weight: bold;
                color: white;
                border: 0 none;
                border-radius: 0px;
                cursor: pointer;
                padding: 10px 5px;
                margin: 10px 5px
            }

            #msform .action-button-previous:hover,
            #msform .action-button-previous:focus {
                box-shadow: 0 0 0 2px white, 0 0 0 3px #616161
            }

            select.list-dt {
                border: none;
                outline: 0;
                border-bottom: 1px solid #ccc;
                padding: 2px 5px 3px 5px;
                margin: 2px
            }

            select.list-dt:focus {
                border-bottom: 2px solid skyblue
            }

            .card {
                z-index: 0;
                border: none;
                border-radius: 0.5rem;
                position: relative
            }

            .fs-title {
                font-size: 25px;
                color: #2C3E50;
                margin-bottom: 10px;
                font-weight: bold;
                text-align: left
            }

            #progressbar {
                margin-bottom: 30px;
                overflow: hidden;
                color: lightgrey
            }

            #progressbar .active {
                color: #000000
            }

            #progressbar li {
                list-style-type: none;
                font-size: 12px;
                width: 25%;
                float: left;
                position: relative
            }

            #progressbar #account:before {
                font-family: FontAwesome;
                content: "1"
            }

            #progressbar #personal:before {
                font-family: FontAwesome;
                content: "2"
            }

            #progressbar #payment:before {
                font-family: FontAwesome;
                content: "3"
            }

            #progressbar #confirm:before {
                font-family: FontAwesome;
                content: "4"
            }

            #progressbar li:before {
                width: 50px;
                height: 50px;
                line-height: 45px;
                display: block;
                font-size: 18px;
                color: #ffffff;
                background: lightgray;
                border-radius: 50%;
                margin: 0 auto 10px auto;
                padding: 2px
            }

            #progressbar li:after {
                content: '';
                width: 100%;
                height: 2px;
                background: lightgray;
                position: absolute;
                left: 0;
                top: 25px;
                z-index: -1
            }

            #progressbar li.active:before,
            #progressbar li.active:after {
                background: skyblue
            }

            .radio-group {
                position: relative;
                margin-bottom: 25px
            }

            .radio {
                display: inline-block;
                width: 204;
                height: 104;
                border-radius: 0;
                background: lightblue;
                box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
                box-sizing: border-box;
                cursor: pointer;
                margin: 8px 2px
            }

            .radio:hover {
                box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3)
            }

            .radio.selected {
                box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1)
            }

            .fit-image {
                width: 100%;
                object-fit: cover
            }
        </style>

    </head>

    <body>
        <div class="container-fluid " id="grad1">
            <?php
            if (isset($_SESSION['errorMessageRegister'])) {
                echo $_SESSION['errorMessageRegister'];
                unset($_SESSION['errorMessageRegister']);
            }
            ?>
            <div class="row justify-content-center">
                <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2  shadow p-3 mb-5 bg-body rounded">
                    <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                        <h2><strong>Please Complete Your profile</strong></h2>
                        <p>Fill all form field to go to next step</p>
                        <div class="row">
                            <div class="col-md-12 mx-0">
                                <form id="msform" class="" action="../process/dataProcess.php" method="POST" autocomplete="" enctype="multipart/form-data">
                                    <!-- progressbar -->
                                    <ul id="progressbar">
                                        <li class="active" id="account"><strong></strong></li>
                                        <li id="personal"><strong></strong></li>
                                        <li id="payment"><strong></strong></li>
                                        <li id="confirm"><strong></strong></li>
                                    </ul> <!-- fieldsets -->
                                    <fieldset>
                                        <div class="form-card">
                                            <h2 class="fs-title">Account Information</h2>
                                            <div class="col-9">
                                                <label class="pay">Profile Image</label>
                                                <input required="" data-parsley-trigger="keyup" type="file" name="image" placeholder="Image" />
                                            </div>
                                            <input name="student_details_user_id" type="hidden" value="<?php echo $_SESSION['res']->user_id; ?>" />
                                            <label class="pay">Select Department</label>
                                            <select name="student_details_dept_id" id="dept" required="" data-parsley-trigger="keyup">
                                                <option value="">Select Department</option>
                                            </select>
                                            <label class="pay">Select Batch</label>
                                            <select name="student_details_batch_id" id="batch" required="" data-parsley-trigger="keyup">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                        <input type="button" name="next" class="next action-button" value="Next Step" />
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <h2 class="fs-title">Personal Information</h2>
                                            <input type="text" name="student_details_mobile_number" placeholder="Contact No." />
                                            <input required="" data-parsley-trigger="keyup" type="text" name="student_details_alt_mobile_number" placeholder="Alternate Contact No." />
                                        </div> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                        <input type="button" name="next" class="next action-button" value="Next Step" />
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <h2 class="fs-title">Social Media Information</h2>
                                            <input type="text" name="student_details_github_address" placeholder="github profile link" />
                                            <input type="text" name="student_details_linkedin_address" placeholder="linkedin url link" />
                                        </div> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                        <input type="submit" name="student_details_button" class="next action-button" value="Confirm" />
                                    </fieldset>
                                    <fieldset>
                                        <!--<div class="form-card">
                                            <h2 class="fs-title">Payment Information</h2>
                                            <div class="radio-group">
                                                <div class='radio' data-value="credit"><img src="https://i.imgur.com/XzOzVHZ.jpg" width="200px" height="100px"></div>
                                                <div class='radio' data-value="paypal"><img src="https://i.imgur.com/jXjwZlj.jpg" width="200px" height="100px"></div> <br>
                                            </div> <label class="pay">Card Holder Name*</label>
                                            <input type="text" name="holdername" placeholder="" required="" data-parsley-trigger="keyup" />
                                            <div class="row">
                                                <div class="col-9">
                                                    <label class="pay">Card Number*</label>
                                                    <input type="text" name="cardno" required="" data-parsley-trigger="keyup" />
                                                </div>
                                                <div class="col-3">
                                                    <label class="pay">CVC*</label>
                                                    <input type="password" name="cvcpwd" placeholder="***" required="" data-parsley-trigger="keyup" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3"> <label class="pay">Expiry Date*</label> </div>
                                                <div class="col-9">
                                                    <input type="date" name="expDate" placeholder="" required="" data-parsley-trigger="keyup" />
                                                </div>
                                            </div>
                                        </div>-->
                                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $('#msform').parsley();
            async function deptDataLoad() {
                const req = await fetch('../../department.json')
                let res = await req.json();
                res = res.ret_data;
                let htmlSegment = '';
                let li = '';
                res.forEach(item => {
                    li = `<option value="${item.department_id}">${item.name}</option>`;
                    htmlSegment += li;
                })
                document.getElementById('dept').innerHTML = htmlSegment;
            }
            deptDataLoad();
            document.getElementById("dept").addEventListener('change', async () => {
                let b_id = document.getElementById("dept").value
                console.log(b_id);
                let li = "";
                let htmlSegment = "";
                let req = await fetch('../../section.json')
                let res = await req.json();
                res = res.ret_data;
                res.forEach(index => {
                    if (index.department_id == b_id) {
                        li = `<option value="${index.section_id}">${index.name}</option>`;
                        htmlSegment += li;
                    }
                })
                document.getElementById('batch').innerHTML = htmlSegment;
            })
        </script>
        <script>
            $(document).ready(function() {

                var current_fs, next_fs, previous_fs; //fieldsets
                var opacity;

                $(".next").click(function() {
                    current_fs = $(this).parent();
                    next_fs = $(this).parent().next();

                    //Add Class Active
                    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                    //show the next fieldset
                    next_fs.show();
                    //hide the current fieldset with style
                    current_fs.animate({
                        opacity: 0
                    }, {
                        step: function(now) {
                            // for making fielset appear animation
                            opacity = 1 - now;

                            current_fs.css({
                                'display': 'none',
                                'position': 'relative'
                            });
                            next_fs.css({
                                'opacity': opacity
                            });
                        },
                        duration: 600
                    });
                    parsley();
                });

                $(".previous").click(function() {

                    current_fs = $(this).parent();
                    previous_fs = $(this).parent().prev();

                    //Remove class active
                    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                    //show the previous fieldset
                    previous_fs.show();

                    //hide the current fieldset with style
                    current_fs.animate({
                        opacity: 0
                    }, {
                        step: function(now) {
                            // for making fielset appear animation
                            opacity = 1 - now;

                            current_fs.css({
                                'display': 'none',
                                'position': 'relative'
                            });
                            previous_fs.css({
                                'opacity': opacity
                            });
                        },
                        duration: 600
                    });
                });

                $('.radio-group .radio').click(function() {
                    $(this).parent().find('.radio').removeClass('selected');
                    $(this).addClass('selected');
                });

                // $(".submit").click(function() {
                //     return false;
                // })

            });
        </script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>


    </body>

    </html>
<?php } ?>