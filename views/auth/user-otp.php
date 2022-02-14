<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Code Verification</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.16/tailwind.min.css" integrity="sha512-5D0ofs3AsWoKsspH9kCWlY7qGxnHvdN/Yz2rTNwD9L271Mno85s+5ERo03qk9SUNtdgOZ4A9t8kRDexkvnWByA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style type="text/css">
        body {
            background-color: #d7d5d5;
        }
    </style>
</head>

<body>
    <div class="container px-4  mx-auto ">
        <div class="w-full h-screen flex items-center justify-center">
            <form class="w-96 LgnForm max-w-xl mx-auto  shadow-md bg-white rounded-lg pt-6 pb-8 mb-4 px-5" action="../process/dataProcess.php" method="POST" autocomplete="" enctype="multipart/form-data">
            <?php
                if (isset($_SESSION['errorMessageRegister'])) {
                    echo $_SESSION['errorMessageRegister'];
                    unset($_SESSION['errorMessageRegister']);
                }
                ?> 
                <h2 class="text-center font-bold text-3xl mb-4">Code Verification</h2>
                <div class="form-group">
                    <input class="form-control py-2" type="number" id="otp" name="otp" placeholder="Enter verification code" required>
                    <input  type="hidden"  name="email" value="<?php echo $_SESSION['m'];?>">
                </div>
                <div class="form-group">
                    <button name="check" class="bg-blue-500 w-full hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        // document.getElementById('check').addEventListener('click',()=>{

        //     var formData = new FormData(); 
        //     formData.append('name', document.getElementById('otp').value);
        //     let res = await fetch('../process/dataProcess.php', {
        //         method: 'POST',
        //         body: formData
        //     });
        // })
    </script>
</body>

</html>