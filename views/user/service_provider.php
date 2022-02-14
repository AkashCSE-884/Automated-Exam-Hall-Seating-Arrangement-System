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

            background: #eee;
        }

        h3 {
            font-size: 16px;
        }

        .text-navy {
            color: #1ab394;
        }

        .cart-product-imitation {
            text-align: center;
            margin: 0 50px;
            height: 100px;
            width: 100px;
            /* background-color: #f8f8f9; */
        }

        .product-desc {
            padding: 20px;
            position: relative;
        }

        .ecommerce .tag-list {
            padding: 0;
        }

        .ecommerce .fa-star {
            color: #d1dade;
        }

        .ecommerce .fa-star.active {
            color: #f8ac59;
        }

        .ecommerce .note-editor {
            border: 1px solid #e7eaec;
        }

        table.shoping-cart-table {
            margin-bottom: 0;
        }

        table.shoping-cart-table tr td {
            border: none;
            text-align: right;
        }

        table.shoping-cart-table tr td.desc,
        table.shoping-cart-table tr td:first-child {
            text-align: left;
        }

        table.shoping-cart-table tr td:last-child {
            width: 80px;
        }

        .ibox {
            clear: both;
            margin-bottom: 25px;
            margin-top: 0;
            padding: 0;
        }

        .ibox.collapsed .ibox-content {
            display: none;
        }

        .ibox:after,
        .ibox:before {
            display: table;
        }

        .ibox-title {
            -moz-border-bottom-colors: none;
            -moz-border-left-colors: none;
            -moz-border-right-colors: none;
            -moz-border-top-colors: none;
            background-color: #ffffff;
            border-color: #e7eaec;
            border-image: none;
            border-style: solid solid none;
            border-width: 3px 0 0;
            color: inherit;
            margin-bottom: 0;
            padding: 14px 15px 7px;
            min-height: 48px;
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

        .ibox-footer {
            color: inherit;
            border-top: 1px solid #e7eaec;
            font-size: 90%;
            background: #ffffff;
            padding: 10px 15px;
        }
        
        .btn-grad {background-image: linear-gradient(to right, #56CCF2 0%, #2F80ED  51%, #56CCF2  100%)}
         .btn-grad {
          
            padding: 8px 20px;
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;
            font-size:12px;
            font-weight: bold;           
            box-shadow: 0 0 20px #eee;
            border-radius: 10px;
            display: block;
            border:none;
          }

          .btn-grad:hover {
            background-position: right center; /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
          }
          @media (max-width: 768px) { 
            tr{
                display: flex;
                flex-direction: column;
            }
            td:last-child{
                width: 120px;
                margin: auto;
            }
            
            .cart-product-imitation:img{
                height: 150px !important;
            }
            .btn-grad{
                margin-top: 5px;
            }
            .tsd{
                text-align: center;
            }
            .tsd:a{
                margin-top: 5px;
            }
            table.shoping-cart-table tr td:last-child {
            width: 120px;
            text-align: right;
            margin-right:20px;
        }
           }
           @media (max-width:520px){
            .ibox-content {

            padding: 15px 3px 20px 3px;
            }
            table.shoping-cart-table tr td:last-child {
            width: 120px;
            text-align: right;
            margin-right:5px;
        }
        .tsd:a{
                margin-top: 0px;
            }
           }
         
    </style>
<?php
        if (isset($_GET['service'])) {

            $query = $_GET['service'];
          
            $res = $dbm->serviceProviderPaginateForUser($query);
          
        }
?>
    <div class="container" style="margin-top:100px">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-md-9">
                    <div class="ibox">
                        <div class="ibox-title">
                            <!-- <span class="pull-right">(<strong>5</strong>) items</span>-->
                            <h5><?php echo $query ?></h5>
                        </div>
                        <?php 
                            foreach ($res as $res){
                        ?>
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table shoping-cart-table">
                                    <tbody>
                                        <tr>
                                            <td width="90">
                                                <div class="cart-product-imitation">

                                                    <img style="height: 100px; max-width:150px; " src="<?php echo $res->image; ?>">
                                                </div>
                                            </td>
                                            <td class="desc">
                                                <h3>
                                                    <a href="#" class="text-navy">
                                                        <?php

                                                        echo $res->user_name; ?>
                                                    </a>
                                                </h3>
                                                <h6 class="" style="font-weight: bold;margin-bottom:20px;">
                                                    <?php echo $res->first_service; ?>
                                                </h6>
                                                <p class="mb-1 text-justifys" style="font-weight: bold;">
                                                    <?php echo $res->title; ?>
                                                </p>

                                                <dl class="small m-b-none text-justifys">
                                                    <?php echo $res->description; ?>
                                                </dl>

                                                <div class="m-t-sm">
                                                    <a class="" style="text-decoration: none; color:black;"><i class=" p-1 fas fa-briefcase"></i></a>

                                                    <a class=" p-1" style="text-decoration: none; color:black;">
                                                        <?php $exp = $res->experience;
                                                        if ($exp <= 1) {
                                                            echo $exp, " Year";
                                                        } else {
                                                            echo $exp, " Years";
                                                        }; ?> Experience</a>
                                                </div>
                                            </td>

                                            <td class="tsd">
                                                <h4 >
                                                    <?php echo "$", $res->rate; ?>
                                                </h4>
                                                per hour
                                               <a href="take_service.php?user=<?php echo $res->user_id;?>"> <button class="btn-grad" type="button" style="margin-top: 10px">
                                                    Take Service
                                                </button></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    <?php } ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Support</h5>
                        </div>
                        <div class="ibox-content text-center">
                            <h3><i class="fa fa-phone"></i> +1 (902) 221-6337</h3>
                            <span class="small">
                                Please contact with us if you have any questions. We are avalible 24h.
                            </span>
                        </div>
                    </div>

                    <div class="ibox">
                        <div class="ibox-content">

                            <p class="font-bold">
                                Other Services you may be interested
                            </p>
                            <hr>
                            <?php
                                $res = $dbm->selectService();
                                foreach ($res as $res) {
                                    if($res->title != $query){
                                ?>
                            <div>
                                <a href="service_provider.php?service=<?php echo $res->title; ?>" class="product-name"> <?php echo $res->title; ?></a>
                            </div>
                            <hr>
                            <?php } }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include './user_footer.php';
} ?>