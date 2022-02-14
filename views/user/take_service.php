<?php

if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['res'])) {
     header('Location: ../auth/index.php');
} else {

    include './user_header.php';
    $email = $_SESSION['res']->email;
    $customer_id = $_SESSION['res']->user_id;
    $res = $dbm->emailIsExist($email);

    if(isset($_GET['user'])){
        $user_id = $_GET['user'];
        
        $serviceProviederId =  $_GET['user'];
        $ress = $dbm->servicePaginateByUser($user_id);
    }
?>
<style>
    #contact {
  background: #fff;
}
#contact .info {
  color: #222;
}
#contact .info i {
  font-size: 32px;
  color: #71c55d;
  float: left;
  line-height: 0;
}
#contact .info p {
  padding: 0 0 10px 50px;
  margin-bottom: 20px;
  line-height: 22px;
  font-size: 14px;
}
#contact .info .email p {
  padding-top: 5px;
}
#contact .social-links {
  padding: 20px 0;
}
#contact .social-links a {
  font-size: 18px;
  display: inline-block;
  background: #71c55d;
  color: #fff;
  line-height: 1;
  padding: 6px 0 8px 0;
  border-radius: 50%;
  text-align: center;
  width: 36px;
  height: 36px;
  transition: 0.3s;
}
#contact .social-links a:hover {
  background: #55b03f;
  color: #fff;
}
#contact .email-form .validate {
  display: none;
  color: red;
  margin: 0 0 15px 0;
  font-weight: 400;
  font-size: 13px;
}
#contact .email-form .error-message {
  display: none;
  color: #fff;
  background: #ed3c0d;
  text-align: left;
  padding: 15px;
  font-weight: 600;
}
#contact .email-form .error-message br + br {
  margin-top: 25px;
}
#contact .email-form .sent-message {
  display: none;
  color: #fff;
  background: #18d26e;
  text-align: center;
  padding: 15px;
  font-weight: 600;
}
#contact .email-form .loading {
  display: none;
  background: #fff;
  text-align: center;
  padding: 15px;
}
#contact .email-form .loading:before {
  content: "";
  display: inline-block;
  border-radius: 50%;
  width: 24px;
  height: 24px;
  margin: 0 10px -6px 0;
  border: 3px solid #18d26e;
  border-top-color: #eee;
  -webkit-animation: animate-loading 1s linear infinite;
  animation: animate-loading 1s linear infinite;
}
#contact .email-form input, #contact .email-form textarea {
  border-radius: 0;
  box-shadow: none;
  font-size: 14px;
}
#contact .email-form input:focus, #contact .email-form textarea:focus {
  border-color: #71c55d;
}
#contact .email-form input {
  padding: 10px 15px;
}
#contact .email-form textarea {
  padding: 12px 15px;
}
#contact .email-form button[type=submit] {
  background: #71c55d;
  border: 0;
  padding: 10px 24px;
  color: #fff;
  transition: 0.4s;
}
#contact .email-form button[type=submit]:hover {
  background: #92d283;
}
@media (max-width: 767.98px) { 
  .section-title{
    margin-top: 25px;
  }

 }
</style>

    <section id="contact" class="padd-section">

        <div class="container" data-aos="fade-up">
            <div class="section-title text-center mt-md-5">
                <h2>Take Service</h2>
                <!-- <p class="separator">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p> -->
            </div>
            <?php
                if (isset($_SESSION['updateMsg'])) {
                    echo $_SESSION['updateMsg'];
                    unset($_SESSION['updateMsg']);
                }
                ?>
            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">

                <div class="col-lg-8 col-md-8">
                    <div class="form  email-form">
                        <form id="service" action="../process/dataProcess.php" method="POST" autocomplete="" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="col-lg-6 mb-2">
                                    <div class="form-group">
                                        <input type="text" name="zipcode" class="form-control" id="name" placeholder="zipcode" required>
                                        <!-- serviceProviderZipCode =  echo $ress->zipcode;?> -->
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <input type="number" onkeyup="calc()" name="hours" class="form-control" id="hours" placeholder="minimum service hours?" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <input type="number" data-bs-toggle="tooltip" data-bs-placement="top" title="price" name="price" class="form-control" id="price" value="<?php echo $ress[0]->rate;?>" placeholder="price" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6 mb-2">
                                    <div class="form-group">
                                        <input type="date" name="date" class="form-control" id="name" placeholder="Service Date" required>
                                    </div>
                                </div>
                                <di class="col-lg-6 mb-2">
                                    <div class="form-group">
                                        <input type="time" name="time" class="form-control" id="name" placeholder="Service Time" required>
                                    </div>
                                </di>
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control" id="name" placeholder="Contact Number" required>
                            </div>
                            <div class="form-group mt-3">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" value="<?php echo $email;?>" required>
                                <input type="hidden" class="form-control" name="serviceproviderid"
                                 value="<?php echo $serviceProviederId;?>" >
                                <input type="hidden" class="form-control" name="customerid" value="<?php echo $customer_id;?>" >
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="address" rows="5" placeholder="Address with details" required></textarea>
                            </div>
                            <div class="text-center mt-3"><button type="submit" name="take-service">Submit</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Contact Section -->

    <?php include './user_footer.php';
    ?>
    <script>
        function calc(){
            let price = document.getElementById('price').value;
            let hours = document.getElementById('hours').value;
            if(hours){
                price = hours*price;
                console.log(price);
                document.getElementById('price').value = price;
            }
        }
        // document.getElementById('hours').addEventListener('keyup', ()=>{
        //     let price = document.getElementById('price').value;
        //     let hours = document.getElementById('hours').value;
        //     if(hours){
        //         price = hours*price;
        //         document.getElementById('price').value = price;
        //     }
        // })
        $('#service').parsley();
    </script>
<?php } ?>