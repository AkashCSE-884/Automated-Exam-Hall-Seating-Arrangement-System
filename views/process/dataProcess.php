<?php
ob_start();

include_once("../../vendor/autoload.php");
include_once("../../vendor/phpmailer/phpmailer/src/PHPMailer.php");


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use App\DataManipulation\DataManipulation;
use App\Utility\Utility;

$mail = new PHPMailer(true);
$dbm = new DataManipulation();
$http_reffer = $_SERVER['HTTP_REFERER'];

if (!isset($_SESSION)) {
  session_start();
}
if (isset($_GET['logout'])) {
  session_destroy();
  header('Location: ../auth/index.php');
}

// otp check
// if (isset($_POST['check'])) {
//   $otp = $_POST['otp'];
//   $email = $_POST['email'];
//   $http_reffer = $_SERVER['HTTP_REFERER'];

//   $res = $dbm->checkToken($email, $otp);
//   if ($res) {
//     $curn = $dbm->tokenUpdate($email, $otp);
//     header("Location: ../auth/index.php");
//   } else {
//     $_SESSION['errorMessageRegister'] = "<div id=\"alertBox\" class=\"text-white px-4 py-3 border-0 rounded relative mb-4 bg-red-400\">
//         <span class=\"inline-block align-middle mr-8\">
//           <b class=\"capitalize\">Please </b> provide valid otp!
//         </span>
//         <button id=\"btnClose\" class=\"absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-0 mr-1 outline-none focus:outline-none\"\">
//           <span>×</span>
//         </button>
//       </div>";
//     header("Location: $http_reffer");
//   }
// }


// signup
if (isset($_POST['submit'])) {

  var_dump($_POST);
  $pass = $_POST['password'];
  $c_pass = $_POST['cpassword'];
  $http_reffer = $_SERVER['HTTP_REFERER'];

  if ($pass == $c_pass) {
    $receiver = $_POST['email'];
    $emailToken = rand(100000, 999999);
    // $name = $_POST['name'];
    $_POST['emailToken'] = $emailToken;

    $res = $dbm->emailIsExist($receiver);


    if (!$res) {
      try {
        //Server settings
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'rafatstudent9@gmail.com  ';
        $mail->Password   = 'rafatstudent999';
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;

        //Recipients
        $mail->setFrom('rafatstudent9@gmail.com  ', 'Service System');
        $mail->addAddress("$receiver", 'User');
        $mail->addAddress('rafatstudent9@gmail.com  ');
        $mail->addReplyTo('rafatstudent9@gmail.com  ', 'Information');

        $mail->isHTML(true);
        $mail->Subject = "Verification Code";
        $mail->Body    = "<p>Here is your code <b> $emailToken </b></p>";
        $mail->AltBody = 'this is the body in plain text for non-HTML main clients';

        if ($mail->send()) {
          $dbm->setData($_POST);
          echo $_POST['emailToken'];
          $insert = $dbm->insertRegisterData();
          $_SESSION['m'] = $receiver;
          // header("HTTP/1.1 301 Moved Permanently");
          // Utility::redirect('./auth/user-otp.php');
          echo "<script type='text/javascript'>window.location.href='../auth/user-otp.php'</script>";
        }
      } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
    } else {
      $_SESSION['errorMessageRegister'] = "<div class=\"alert alert-danger alert-dismissible rounded-0\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
            <h5><i class=\"icon fas fa-ban\"></i> Oops!</h5>
            Already exists this email address. Please try another email address
          </div>";
      header("Location: $http_reffer");
    }
  } else {

    $_SESSION['errorMessageRegister'] = "<div id=\"alertBox\" class=\"text-white px-4 py-3 border-0 rounded relative mb-4 bg-red-400\">
        <span class=\"inline-block align-middle mr-8\">
          <b class=\"capitalize\">password</b> not match!
        </span>
        <button id=\"btnClose\" class=\"absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-0 mr-1 outline-none focus:outline-none\"\">
          <span>×</span>
        </button>
      </div>";
    header("Location: $http_reffer");
  }
}


// login
// login
if (isset($_POST['login'])) {

  $email = $_POST['email'];
  $pass = $_POST['password'];
  $userType = $_POST['u_type'];
  $pass = md5($pass);
  $http_reffer = $_SERVER['HTTP_REFERER'];

  // var_dump($email, $pass, $userType);
  $res = $dbm->checkUser($email, $pass, $userType);


  if ($res) {
    $_SESSION['res'] =  $res;
    if ($res->user_type == 'moderator') {
      header("Location: ../admin/admin_home.php");
    } else if ($res->user_type == 'Student') {
      $ress = $dbm->selectStudentsDataByEmail($email);
      if ($ress) {
        header("Location: ../user/user_home.php");
      } else {
        header("Location: ../user/student_complete_form.php");
      }
    } else if ($res->user_type == 'teacher') {
      header("Location: ../teacher/teacher_home.php");
    }
  } else {
    $_SESSION['errorMessageRegister'] = "<div id=\"alertBox\" class=\"text-white px-4 py-3 border-0 rounded relative mb-4 bg-red-400\">
        <span class=\"inline-block align-middle mr-8\">
          <b class=\"capitalize\">Invalid </b> email or password!
        </span>
        <button id=\"btnClose\" class=\"absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-0 mr-1 outline-none focus:outline-none\"\">
          <span>×</span>
        </button>
      </div>";
    header("Location: $http_reffer");
  }
}

// update Profile
if (isset($_POST['updateProfile'])) {
  // echo "<script type='text/javascript'>alert('aok ajk')</script>";



  $id = $_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];


  $size = $_FILES['image']['size'];
  if ($size > 0) {
    $files = rand(1000, 10000) . $_FILES['image']['name'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    $destinationFile = '../../contents/images/' . $files;
    move_uploaded_file($fileTmpName, $destinationFile);
    $image = $destinationFile;
    $res = $dbm->updateUserInfo($id, $name, $email, $image);
  } else {
    $res = $dbm->updateUserData($id, $name, $email);
  }

  // var_dump($_FILES['image']);

  if ($res) {
    $_SESSION['updateMsg'] = "<div class=\"alert alert-success alert-dismissible rounded-0\">
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
    <h5><i class=\"icon fas fa-ban\"></i> Updated!</h5>
    
  </div>";;
    Utility::redirect("$http_reffer");
  } else {

    $_SESSION['updateMsg'] = "<div class=\"alert alert-danger alert-dismissible rounded-0\">
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
    <h5><i class=\"icon fas fa-ban\"></i> Failed!</h5>
   
  </div>";
    Utility::redirect("$http_reffer");
  }
}


if (isset($_POST['forgotEmail'])) {

  // var_dump($_POST);
  // $pass = $_POST['password'];
  // $c_pass = $_POST['cpassword'];
  $email = $_POST['email'];

  $http_reffer = $_SERVER['HTTP_REFERER'];

  $receiver = $_POST['email'];
  $emailToken = rand(100000, 999999);
  // $name = $_POST['name'];
  $_POST['emailToken'] = $emailToken;

  $res = $dbm->emailIsExist($receiver);


  if ($res) {
    try {
      //Server settings
      $mail->SMTPDebug = 2;
      $mail->isSMTP();
      $mail->Host       = 'smtp.gmail.com';
      $mail->SMTPAuth   = true;
      $mail->Username   = 'rafatstudent9@gmail.com  ';
      $mail->Password   = 'rafatstudent999';
      $mail->SMTPSecure = 'ssl';
      $mail->Port       = 465;

      //Recipients
      $mail->setFrom('rafatstudent9@gmail.com  ', 'Service System');
      $mail->addAddress("$receiver", 'User');
      $mail->addAddress('rafatstudent9@gmail.com  ');
      $mail->addReplyTo('rafatstudent9@gmail.com  ', 'Information');

      $mail->isHTML(true);
      $mail->Subject = "Verification Code";
      $mail->Body    = "<p>Here is your code <b> $emailToken </b></p>";
      $mail->AltBody = 'this is the body in plain text for non-HTML main clients';

      if ($mail->send()) {

        $_SESSION['m'] = $receiver;
        $_SESSION['fpass'] = 'set';
        $dbm->otpUpdate($email, $emailToken);
        header("Location: ../auth/user-otp.php");
        echo "<script type='text/javascript'>window.location.href='../auth/user-otp.php'</script>";
      }
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  } else {
    $_SESSION['errorMessageRegister'] = "<div class=\"alert alert-danger alert-dismissible rounded-0\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
            <h5><i class=\"icon fas fa-ban\"></i> Oops!</h5>
           Mail not found!!!
          </div>";
    header("Location: $http_reffer");
  }
}

if (isset($_POST['check'])) {
  $otp = $_POST['otp'];
  $email = $_POST['email'];
  $http_reffer = $_SERVER['HTTP_REFERER'];

  $res = $dbm->checkToken($email, $otp);
  if ($res and (!$_SESSION['fpass'])) {
    $curn = $dbm->tokenUpdate($email, $otp);
    header("Location: ../auth/index.php");
  } else if ($_SESSION['fpass']) {
    header("Location: ../auth/forgot-pass.php");
    unset($_SESSION['fpass']);
  } else {
    $_SESSION['errorMessageRegister'] = "<div id=\"alertBox\" class=\"text-white px-4 py-3 border-0 rounded relative mb-4 bg-red-400\">
        <span class=\"inline-block align-middle mr-8\">
          <b class=\"capitalize\">Please </b> provide valid otp!
        </span>
        <button id=\"btnClose\" class=\"absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-0 mr-1 outline-none focus:outline-none\"\">
          <span>×</span>
        </button>
      </div>";
    header("Location: $http_reffer");
  }
}

if (isset($_POST['forgotPass'])) {
  //var_dump($_POST);

  $pass = $_POST['password'];
  $c_pass = $_POST['cpassword'];
  $email =  $_SESSION['m'];

  if ($pass == $c_pass) {
    $pass = md5($pass);
    $res = $dbm->updatePassword($email, $pass);
    header("Location: ../auth/index.php");
  } else {

    $_SESSION['errorMessageRegister'] = "<div id=\"alertBox\" class=\"text-white px-4 py-3 border-0 rounded relative mb-4 bg-red-400\">
      <span class=\"inline-block align-middle mr-8\">
        <b class=\"capitalize\">password</b> not match!
      </span>
      <button id=\"btnClose\" class=\"absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-0 mr-1 outline-none focus:outline-none\"\">
        <span>×</span>
      </button>
    </div>";
    header("Location: $http_reffer");
  }
}
if (isset($_POST['Submit-staff'])) {
  $name = $_POST['name'];
  $u_id = $_POST['u_id'];

  $res = $dbm->addStaff($name, $u_id);
  if ($res) {
    $_SESSION['updateMsg'] = "<div class=\"alert alert-success alert-dismissible rounded-0\">
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
    <h5><i class=\"fas fa-check\"></i> Updated!</h5>
    
  </div>";;
  } else {

    $_SESSION['updateMsg'] = "<div class=\"alert alert-danger alert-dismissible rounded-0\">
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\" style=\"font-size:16px\">×</button>
  <h5><i class=\"icon fas fa-ban\"></i> Failed!</h5>
  
  </div>";
  }
  Utility::redirect("$http_reffer");
}
if (isset($_POST['building_name'])) {
  $name = $_POST['building_title'];
  $u_id = $_POST['total_floor'];

  $res = $dbm->addBuildingsInfo($name, $u_id);
  if ($res) {
    $_SESSION['updateMsg'] = "<div class=\"alert alert-success alert-dismissible rounded-0\">
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
    <h5><i class=\"fas fa-check\"></i> Added!</h5>
    
  </div>";;
  } else {

    $_SESSION['updateMsg'] = "<div class=\"alert alert-danger alert-dismissible rounded-0\">
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\" style=\"font-size:16px\">×</button>
  <h5><i class=\"icon fas fa-ban\"></i> Failed!</h5>
  
  </div>";
  }
  Utility::redirect("$http_reffer");
}
if (isset($_POST['add_floor'])) {
  $name = $_POST['floor_name'];
  $building_id = $_POST['building_id'];
  $total_room = $_POST['total_room'];

  $res = $dbm->addFloorInfo($name, $building_id, $total_room);
  if ($res) {
    $_SESSION['updateMsgs'] = "<div class=\"alert alert-success alert-dismissible rounded-0\">
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
    <h5><i class=\"fas fa-check\"></i> Added!</h5>
    
  </div>";;
  } else {

    $_SESSION['updateMsgs'] = "<div class=\"alert alert-danger alert-dismissible rounded-0\">
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\" style=\"font-size:16px\">×</button>
  <h5><i class=\"icon fas fa-ban\"></i> Failed!</h5>
  
  </div>";
  }
  Utility::redirect("$http_reffer");
}

if (isset($_POST['add_room'])) {
  $name = $_POST['room_title'];
  $building_id = $_POST['r_building_id'];
  $floor_id = $_POST['floor_id'];
  $total_seat = $_POST['seat'];

  $res = $dbm->addRoomInfo($name, $building_id, $floor_id, $total_seat);
  if ($res) {
    $_SESSION['updateMsgss'] = "<div class=\"alert alert-success alert-dismissible rounded-0\">
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
    <h5><i class=\"fas fa-check\"></i> Added!</h5>
    
  </div>";;
  } else {

    $_SESSION['updateMsgss'] = "<div class=\"alert alert-danger alert-dismissible rounded-0\">
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\" style=\"font-size:16px\">×</button>
  <h5><i class=\"icon fas fa-ban\"></i> Failed!</h5>
  
  </div>";
  }
  Utility::redirect("$http_reffer");
}

if (isset($_POST['bid'])) {
  $res = $dbm->selectFloorDataByBuildingId($_POST['bid']);
  echo json_encode($res);
}

if (isset($_POST['student_details_button'])) {

  $user_id = $_POST['student_details_user_id'];
  $dept_id = $_POST['student_details_dept_id'];
  $batch_id = $_POST['student_details_batch_id'];
  $mobile_number = $_POST['student_details_mobile_number'];
  $alt_mobile_number = $_POST['student_details_alt_mobile_number'];
  $linkedin_address = $_POST['student_details_linkedin_address'];
  $github_address = $_POST['student_details_github_address'];

  $size = $_FILES['image']['size'];

  $files = rand(1000, 10000) . $_FILES['image']['name'];
  $fileTmpName = $_FILES['image']['tmp_name'];
  $destinationFile = '../../contents/images/' . $files;
  move_uploaded_file($fileTmpName, $destinationFile);
  $image = $destinationFile;



  $res = $dbm->studentDetailsInsert($user_id, $dept_id, $batch_id, $mobile_number, $alt_mobile_number, $linkedin_address, $github_address);
  $ress = $dbm->updateStudentInfo($user_id, $image);
  if ($res && $res) {
    $_SESSION['errorMessageRegister'] = "<div class=\"alert alert-success alert-dismissible rounded-0\">
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
    <h5><i class=\"fas fa-check\"></i> Added!</h5>
    
  </div>";
    header("Location:../user/user_home.php");
  } else {

    $_SESSION['errorMessageRegister'] = "<div class=\"alert alert-danger alert-dismissible rounded-0\">
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\" style=\"font-size:16px\">×</button>
  <h5><i class=\"icon fas fa-ban\"></i> Failed!</h5>
  
  </div>";
    Utility::redirect("$http_reffer");
  }
}
if (isset($_GET['sendmail'])) {
  if (sendMails('lionaks884@gmail.com', 'ok')) {
    Utility::redirect("$http_reffer");
    echo "Sent mail successfully";
  } else {
    echo "false";
    echo "console.log('asdf')";
  }
}

function sendMails($email, $msgBody)
{
  $mail = new PHPMailer(true);
  $receiver = $email;
  try {
    //Server settings
    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'rafatstudent9@gmail.com  ';
    $mail->Password   = 'rafatstudent999';
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;

    //Recipients
    $mail->setFrom('rafatstudent9@gmail.com  ', 'Service System');
    $mail->addAddress("$receiver", 'User');
    $mail->addAddress('rafatstudent9@gmail.com  ');
    $mail->addReplyTo('rafatstudent9@gmail.com  ', 'Information');

    $mail->isHTML(true);
    $mail->Subject = "Verification Code";
    $mail->Body    = "<p>Here is Summer Exam schedule</p>
      <!DOCTYPE html>
      <html>
      <head>
      <style>
      #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }
      
      #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
      }
      
      #customers tr:nth-child(even){background-color: #f2f2f2;}
      
      #customers tr:hover {background-color: #ddd;}
      
      #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
      }
      </style>
      </head>
      <body>
      
      <h1>A Fancy Table</h1>
      
      <table id='customers'>
        <tr>
          <th>Company</th>
          <th>Contact</th>
          <th>Country</th>
        </tr>
        <tr>
          <td>Alfreds Futterkiste</td>
          <td>Maria Anders</td>
          <td>Germany</td>
        </tr>
      </table>
      </body>
      </html>

      ";
    $mail->AltBody = 'this is the body in plain text for non-HTML main clients';

    if ($mail->send()) {
      return true;
    }
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
  return false;
}

// algo
if (isset($_POST['exam-form'])) {
  $exam_name = $_POST['exam_title'];
  $dept_id = $_POST['dept_id'];
  $batch_id = $_POST['setion_id'];
  $var = $dbm->selectExamScheduleDataBySemester($exam_name, $batch_id);
  if (!$var) {

    $data = base64_decode($_POST['exam_data']);
    $data = json_decode($data);
    //var_dump($data);
    $resss = $dbm->selectStudentsByDeptAndSection($dept_id, $batch_id);
    $res = $dbm->selectRoomData();
    $total_res = false;
    $f_res = false;

    // var_dump($data[$i][0]->exam_title);
    for ($i = 0; $i < sizeof($data); $i++) {

      for ($x = 0; $x < sizeof($res); $x++) {

        for ($k = 0; $k < sizeof($resss); $k++) {
          $chek = $dbm->selectExamScheduleTotalBatchData($res[$x]->room_id, $batch_id, $data[$i][0]->date, $data[$i][0]->start_time);

          if ($chek->total_student == 20) {
            break;
          }
          if ($chek->total_student < 21 && $res[$x]->seat_capacity >= $chek->total_student) {

            $exit_batch = $dbm->selectExamScheduleDataByRoom($resss[$k]->user_id, $batch_id, $res[$x]->room_id);

            if (!$exit_batch) {

              $fi_check = $dbm->selectExamScheduleStudentByExamTitleAndId($data[$i][0]->exam_title, $resss[$k]->user_id);

              if (!$fi_check) {
                $f_res = $dbm->addExamInfo($resss[$k]->user_id, $exam_name, $data[$i][0]->exam_title, $res[$x]->room_id, $data[$i][0]->date, $data[$i][0]->start_time, $data[$i][0]->end_time, $dept_id, $batch_id);
              }
            }
          }
        }
      }
    }

    if ($f_res) {
      $_SESSION['errorMessageRegister'] = "<div class=\"alert alert-success alert-dismissible rounded-0\">
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
    <h5><i class=\"fas fa-check\"></i>Assign successfully</h5>
    
  </div>";
    } else {
      $_SESSION['errorMessageRegister'] = "<div class=\"alert alert-danger alert-dismissible rounded-0\">
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\" style=\"font-size:16px\">×</button>
    <h5><i class=\"icon fas fa-ban\"></i> Something went wrong</h5>!</h5>
    
    </div>";
    }
  } else {
    $_SESSION['errorMessageRegister'] = "<div class=\"alert alert-danger alert-dismissible rounded-0\">
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\" style=\"font-size:16px\">×</button>
  <h5><i class=\"icon fas fa-ban\"></i> Already assigned</h5>!</h5>
  
  </div>";
  }
  Utility::redirect("$http_reffer");
}
//algo

if (isset($_GET['tech'])) {
  $res = $dbm->selectTeachersList();
  $ress = $dbm->selectExamSchedule();
  $f_res = false;


  for ($i = 0; $i < sizeof($ress); $i++) {
    $count = 1;
    $dt = $dbm->checkExitsTeacherByDateAndTime($ress[$i]->date, $ress[$i]->start_time, $ress[$i]->room_id);
    if (!$dt) {
      for ($j = 0; $j < sizeof($res); $j++) {
        $req = $dbm->checkExitsTeacher($res[$j]->user_id, $ress[$i]->date);
        if ((!$req) && ($count != 3)) {
          $count++;
          $f_res = $dbm->addTeacherInfo($res[$j]->user_id, $ress[$i]->room_id, $ress[$i]->room_name, $ress[$i]->date, $ress[$i]->start_time, $ress[$i]->end_time);
        }
      }
    }
  }
  // $f_res = $dbm->addTeacherInfo($res[rand(0, sizeof($res) - 1)]->user_id, $ress[$i]->room_id, $ress[$i]->room_name, $ress[$i]->date, $ress[$i]->start_time, $ress[$i]->end_time);
  

  //   foreach ($ress as $item) {
  //     foreach ($res as $ele) {
  //     $rew = $dbm->checkExitsTeacher($ele->user_id);
  //     if (!$rew) {
  //       $dt = $dbm->checkExitsTeacherByDateAndTime($item->date, $item->start_time);
  //       if (!$dt) {
  //         $f_res = $dbm->addTeacherInfo($ele->user_id, $item->room_id, $item->room_name, $item->date, $item->start_time, $item->end_time);
  //       }
  //     }

  //   }
  // }
  if ($f_res) {
    $_SESSION['errorMessageRegister'] = "<div class=\"alert alert-success alert-dismissible rounded-0\">
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
    <h5><i class=\"fas fa-check\"></i> Teacher Assign successfully</h5>
    
  </div>";
  } else {
    $_SESSION['errorMessageRegister'] = "<div class=\"alert alert-danger alert-dismissible rounded-0\">
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\" style=\"font-size:16px\">×</button>
    <h5><i class=\"icon fas fa-ban\"></i> Something went wrong</h5>!</h5>
    
    </div>";
  }
  Utility::redirect("$http_reffer");
}


// foreach ($res as $ele) {
//   foreach ($ress as $item) {
//     $ress = $dbm->checkExitsTeacher($ele->user_id);
//     if (!$ress) {
//       $dt = $dbm->checkExitsTeacherByDateAndTime($item->date, $item->start_time);
//       if (!$dt) {
//         $f_res = $dbm->addTeacherInfo($ele->user_id, $item->room_id, $item->room_name, $item->date, $item->start_time, $item->end_time);
//       }
//     } 
//   }
// }