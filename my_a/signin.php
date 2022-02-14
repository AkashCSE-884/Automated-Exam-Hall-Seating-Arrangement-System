<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.16/tailwind.min.css" integrity="sha512-5D0ofs3AsWoKsspH9kCWlY7qGxnHvdN/Yz2rTNwD9L271Mno85s+5ERo03qk9SUNtdgOZ4A9t8kRDexkvnWByA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <title>Document</title>
</head>

<body>
    <style type="text/css">
        body {
            background-color: #d7d5d5;
        }
    </style>


    <div class="container px-4 max-w-6xl mx-auto my-8">
        <div class="w-full max-w-xl mx-auto">
            <form class="LgnForm max-w-sm mx-auto  shadow-lg bg-white rounded-lg pt-6 pb-8 mb-4 px-5" action="signin.php" onsubmit="return validateForm()" method="POST" autocomplete="" enctype="multipart/form-data">
                <!-- <img class="h-16 w-16 md:h-24 md:w-24 rounded-full mx-auto" src="https://i.imgur.com/6NEUhor.jpg"> -->
                <p class="text-xl font-bold  text-center">Create Account</p>
                <div class="MskForm">
                <?php
                            if (count($errors) == 1) {
                            ?>
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded text-center">
                                    <?php
                                    foreach ($errors as $showerror) {
                                        echo $showerror;
                                    }
                                    ?>
                                </div>
                            <?php
                            } elseif (count($errors) > 1) {
                            ?>
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                                    <?php
                                    foreach ($errors as $showerror) {
                                    ?>
                                        <li><?php echo $showerror; ?></li>
                                    <?php
                                    }
                                    ?>
                                </div>
                            <?php
                            }
                            ?>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Email
                        </label>
                        <input class="shadow apperance-none border rounded w-full py-4 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" id="email" type="email" placeholder="..@gmail.com">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            User Type
                        </label>
                        <select name="u_type" id="u_type" class="shadow appearance-none border rounded w-full py-4 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="" class="text-gray-400">Select User Type</option>
                            <option value="admin">admin</option>
                            <option value="service provider">Service Provider</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Username
                        </label>
                        <input class="shadow apperance-none border rounded w-full py-4 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" name="username" type="text" placeholder="Username">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            password
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-4 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="******************">
                        <p class=" hidden text-red-500 text-xs italic">Please choose a password.</p>
                    </div>
                    <div class="">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Confirm Password
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-4 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="cpassword" name="cpassword" type="password" placeholder="******************">
                        <p class=" hidden text-red-500 text-xs italic">Please choose a password.</p>
                    </div>
                    <div class=" mb-3">
                        <div> <input type="checkbox" onclick="myFunction1()"><span class="px-1">Show Password</span></div>
                    </div>
                    <div class="flex items-center justify-between">
                        <button name="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Submit
                        </button>
                    </div>
                    <p class="mt-2 text-black-500 text-xs">
                        Already have an account, <a href="index.php" class="text-black-700 font-bold">Login</a>.
                    </p>
            </form>
        </div>
    </div>
    </div>
    <script>
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