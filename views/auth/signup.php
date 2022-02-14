<?php

if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.16/tailwind.min.css" integrity="sha512-5D0ofs3AsWoKsspH9kCWlY7qGxnHvdN/Yz2rTNwD9L271Mno85s+5ERo03qk9SUNtdgOZ4A9t8kRDexkvnWByA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../../contents/css/parsley.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="http://parsleyjs.org/dist/parsley.js"></script>
    <script src="../../contents/js/script.js"></script>
    <title>Signup</title>
    <style type="text/css">
        body {
            background-color: #d7d5d5;
        }
    </style>
</head>

<body>
    <div class="container px-4  mx-auto my-8">
        <div class="w-full  mx-auto">

            <form id="validate_form" class="LgnForm max-w-xl mx-auto  shadow-lg bg-white rounded-lg pt-6 pb-8 mb-4 px-5" action="../process/dataProcess.php" method="POST" autocomplete="" enctype="multipart/form-data">
                <?php
                if (isset($_SESSION['errorMessageRegister'])) {
                    echo $_SESSION['errorMessageRegister'];
                    unset($_SESSION['errorMessageRegister']);
                }
                ?>
                <!-- <img class="h-16 w-16 md:h-24 md:w-24 rounded-full mx-auto" src="https://i.imgur.com/6NEUhor.jpg"> -->
                <p class="text-xl font-bold  text-center mb-4  border-b-2 border-gray-600">Create Account</p>
                <div class="grid grid-cols-2 gap-3">
                    <div class="">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Email
                        </label>
                        <input class=" apperance-none border rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" id="email" type="email" placeholder="..@gmail.com" required="" data-parsley-trigger="keyup">
                    </div>
                    <div class="">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            User Type
                        </label>
                        <select name="u_type" id="u_type" class="apperance-none border rounded w-full py-3 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="" class="text-gray-400" required="" data-parsley-trigger="keyup">Select User Type</option>
                            <option value="teacher">teacher</option>
                            <option value="student">student</option>
                            <!-- <option value="moderator">moderator</option> -->
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Username
                        </label>
                        <input class=" apperance-none border rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" name="username" type="text" placeholder="Username" required="" data-parsley-trigger="keyup">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            ID
                        </label>
                        <input class=" apperance-none border rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="id" name="id" type="text" placeholder="id" required="" data-parsley-trigger="keyup">
                    </div>

                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            password
                        </label>
                        <input class=" apperance-none border rounded w-full py-3 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="******************" required="" data-parsley-trigger="keyup">
                        <p class=" hidden text-red-500 text-xs italic">Please choose a password.</p>
                    </div>
                    <div class="">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Confirm Password
                        </label>
                        <input class=" apperance-none border rounded w-full py-3 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="cpassword" name="cpassword" type="password" placeholder="******************" required="" data-parsley-trigger="keyup">
                        <p class=" hidden text-red-500 text-xs italic">Please choose a password.</p>
                    </div>
                </div>
                <div class=" mb-3">
                    <div> <input type="checkbox" onclick="myFunction1()"><span class="px-1">Show Password</span></div>
                </div>
                <div class="flex items-center justify-between">
                    <button name="submit" class="bg-blue-500 w-full hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Submit
                    </button>
                </div>
                <p class="mt-2 text-black-500 text-xs">
                    Already have an account, <a href="index.php" class="text-black-700 font-bold">Login</a>.
                </p>
            </form>
        </div>
    </div>
    <script>
        $('#validate_form').parsley();

        function myFunction1() {
            var x = document.getElementById("password");
            var y = document.getElementById("cpassword");
            if (x.type === "password" || y.type === "password") {
                x.type = "text";
                y.type = "text";
            } else {
                x.type = "password";
                y.type = "password";
            }
        }
    </script>


</body>

</html>