<?php

if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['res'])) {
     header('Location: ../auth/index.php');
} else {

    include './user_header.php';
    $email = $_SESSION['res']->email;
    $res = $dbm->emailIsExist($email);
?>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" />
    <section class="pt-5 mx-3" style="margin-top:60px; margin-bottom:70px;">
        <?php
        if (isset($_GET['search_input'])) {

            $query = $_GET['search_input'];
            $res = $dbm->searchResults($query);
        }
        if (!$res) {
            echo '<div class="text-xl mb-4">no search results found</div>';
        } else {
            echo '<div class="text-xl mb-3">Your Result</div>';
        }

        ?>

        <div class="row">

            <?php

            foreach ($res as $res) {
            ?>
                <div class="col-3 mb-2">
                    <a href="service_provider.php?service=<?php echo $res->title; ?>">
                        <div class="card" style="width: 18rem;">
                            <img src="<?php echo $res->feature_image; ?>" class="card-img-top" alt="...">
                            <div class="" style="padding: 2px 0;">
                                <h5 class="card-title text-center"><?php echo $res->title; ?></h5>
                            </div>
                        </div>
                    </a>
                </div>
            <?php
            }
            ?>
        </div>
    </section>
<?php
} ?>