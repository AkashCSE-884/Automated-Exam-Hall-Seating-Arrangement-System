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
         
    </style>

<section id="blog" class="padd-sectio" style="margin-top:100px;">

<div class="container" data-aos="fade-up">
  <div class="text-center mb-5 text-decoration-underline">

    <h2 >About Us</h2>
    
  </div>

    <div>
        <h4 class="text-center mb-4">Who we are?</h4>
        <p  class="text-center" style="font-size:20px">
            ServCompany is an online home services platform based in Halifax. Currently, we're based in the Halifax Regional Municipality. Customers can schedule trustworthy and high-quality services such as salon, plumbing, heating, electrician, pest control, cleaning, painting, and carpentry through the platform, which are provided by skilled and licensed specialists conveniently at the customer's premises and at their schedule. This puts an end to users’ daily problems, such as searching for a specific service on an individual's website. Our objective with this platform is to help users receive quick and high-quality service while also assisting individual service providers in expanding their customer base and becoming micro-entrepreneurs themselves.
        </p>
    </div>
    <div>
        <h4 class="text-center mb-4">How we do it</h4>
        <p class="text-center" style="font-size:20px">
            Servcompany is a platform that connects users looking for certain services with trained and experienced specialists. Once on the platform, users select the service they want, and the system processes their request through databases, connecting them to the closest service provider who meets their needs and is available at the specified time and day.
        </p>
    </div>
</div>
</section>


<?php include './user_footer.php';
} ?>