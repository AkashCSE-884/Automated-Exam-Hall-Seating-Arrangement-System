<?php
// require_once "controllerUserData.php"; 
// require_once './vendor/autoload.php';

// $clientId = "558895773439-rr91uolk1sqoou65gp9go2sjr1gtcrn3.apps.googleusercontent.com";
// $clientSecret = "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";
// $redirectUri = "http://localhost:8877/project_a/index.php";

// $client = new Google_Client();
// $client->setClientId($clientId);
// $client->setClientSecret($clientSecret);
// $client->setRedirectUri($redirectUri);
// $client->addScope('email');
// $client->addScope('profile');

// if (isset($_GET['code'])) {
// 	$token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
// 	$client->setAccessToken($token['access_token']);
// 	$oAuth = new Google_Service_Oauth2($client);
// 	$userData = $oAuth->userinfo->get();


// 	$email = $userData->email;
// 	$_SESSION['email'] = $email;
// 	$name = $userData->name;
// 	$picture = $userData->picture;
// 	$_SESSION['name'] = $name;
// 	$_SESSION['pic'] = $picture;
// 	echo $picture;

// 	header('location:home.php');
// 	// echo "<h1>$picture</h1>";
// 	// echo "<h1>$name</h1>";
// 	// echo "<h1>$email</h1>";

// } else {
// 	$login_url = $client->createAuthUrl();

?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.16/tailwind.min.css" integrity="sha512-5D0ofs3AsWoKsspH9kCWlY7qGxnHvdN/Yz2rTNwD9L271Mno85s+5ERo03qk9SUNtdgOZ4A9t8kRDexkvnWByA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<title>Document</title>
	</head>

	<body>
		<style type="text/css">
			body {
				background-color: #d7d5d5;
			}
		</style>
		<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

		<div class="container px-4 max-w-6xl mx-auto my-8">
			<div class="w-full max-w-xl mx-auto">
				<form class="LgnForm max-w-sm mx-auto  shadow-lg bg-white rounded-lg pt-6 pb-8 mb-4 px-8" action="index.php" method="POST">
					<!-- <img class="h-16 w-16 md:h-24 md:w-24 rounded-full mx-auto" src="https://i.imgur.com/6NEUhor.jpg"> -->

        
					<div class="MskForm">
						<div class="mb-4">
							<label class="block text-gray-700 text-sm font-bold mb-2">
								Email
							</label>
							<input class="shadow apperance-none border rounded w-full py-4 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" id="email" type="email" placeholder="..@gmail.com">
						</div>
						<div class="mb-6">
							<label class="block text-gray-700 text-sm font-bold mb-2">
								Password
							</label>
							<input class="shadow appearance-none border rounded w-full py-4 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="******************">
							<p class=" hidden text-red-500 text-xs italic">Please choose a password.</p>
						</div>

						<div class="flex items-center justify-between">
							<button name="login" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
								Sign In
							</button>
							<a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
								Forgot Password?
							</a>
						</div>
						<p class="mt-2 text-black-500 text-xs">
							Don't have an account, <a href="signin.php" class="text-black-700 font-bold">Create an account</a>.
						</p>
						<div class="LgnSm my-4 max-w-sm text-center">
							<!-- <h2 class="underline my-2 font-bold">Login With Social Media</h2> -->
							<!-- <a href="#" class="LgnFb p-2 block bg-blue-700 rounded-sm text-white md:hover:text-black-600 my-2">
								Sign up with Facebook
							</a> -->
							<a href="<?php echo $login_url; ?> " class="LgnFb p-2 block bg-red-700 rounded-sm text-white md:hover:text-black-600 my-2">
								Sign up with Gmail
							</a>
						</div>
				</form>
			</div>
		</div>

		</div>
	</body>

	</html>
<?php  ?>