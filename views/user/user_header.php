<?php
include_once("../../vendor/autoload.php");

use App\DataManipulation\DataManipulation;

$dbm = new DataManipulation();

if (!isset($_SESSION)) {
  session_start();
}

$email = $_SESSION['res']->email;
$res = $dbm->emailIsExist($email);
if($res->image != null){

  $image = $res->image;
}
else{
  $image = "../../contents/images/no-image.jpg" ;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- <title>ServCompany</title> -->
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../../contents/css/parsley.css">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="<?php echo $image;?>" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light" style="text-align: center;"><a href=""><?php echo $res->user_name;?></a></h1>
        <h5 class="text-light" style="text-align: center;">Port City International University</h5>


      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="user_home.php" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="order.php" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Exam Schedule</span></a></li>
          <!-- <li><a href="order_list.php" class="nav-link scrollto"><i class="fas fa-shopping-cart"></i> <span>Order</span></a></li>
          <li><a href="service.php" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Services</span></a></li>
          <div class="m-2"><a href="edit_profile.php" class="nav-link scrollto"><i class="fas fa-user-edit"></i><span>Edit</span></a></div> -->
          <div class="m-2"><a href="../process/dataProcess.php?logout" class="nav-link scrollto"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></div>

        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->