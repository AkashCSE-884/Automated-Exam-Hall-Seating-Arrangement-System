<?php

if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['res'])) {
    header('Location: ../auth/index.php');
} else {
    include './teacher_header.php'; ?>
    <style>
            body{
                background-image: url('https://www.portcity.edu.bd/img/welcome-to-port-city-international-university_banner-welcome-message.jpg');
                background-size: cover;
            }
        </style>

    <!-- <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
        <div class="hero-container" data-aos="fade-in">
            <h1>Alex Smith</h1>
            <p>I'm <span class="typed" data-typed-items="Designer, Developer, Freelancer, Photographer"></span></p>
        </div>
    </section>End Hero -->
<?php include './teacher_footer.php';
} ?>