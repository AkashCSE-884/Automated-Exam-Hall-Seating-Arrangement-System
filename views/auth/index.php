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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="http://parsleyjs.org/dist/parsley.js"></script>
	<link rel="stylesheet" href="../../contents/css/parsley.css">
	<link rel="stylesheet" href="">
	<title>Signin</title>
	<style type="text/css">
		body {
			background-color: #d7d5d5;
		}
	</style>
</head>

<body>
	<div class="container px-4 max-w-6xl mx-auto my-8">
		<div class="w-full max-w-xl mx-auto">

			<div class="LgnForm max-w-sm mx-auto  shadow-lg bg-white rounded-lg pt-6 pb-8 mb-4 px-8">

				<?php
				if (isset($_SESSION['errorMessageRegister'])) {
					echo $_SESSION['errorMessageRegister'];
					unset($_SESSION['errorMessageRegister']);
				}
				?>
				<form id="login_form" action="../process/dataProcess.php" method="POST">

					<div class="MskForm">
						<div class="mb-4">
							<label class="block text-gray-700 text-sm font-bold mb-2">
								Email
							</label>
							<input class="shadow apperance-none border rounded w-full py-4 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" id="email" type="email" placeholder="..@gmail.com" required="" data-parsley-trigger="keyup">
						</div>
						<div class="mb-4">
							<label class="block text-gray-700 text-sm font-bold mb-2">
								User Type
							</label>
							<select name="u_type" id="u_type" class="apperance-none border rounded w-full py-3 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
								<option value="" class="text-gray-400" required="" data-parsley-trigger="keyup">Select User Type</option>
								<option value="teacher">teacher</option>
								<option value="student">student</option>
								<option value="moderator">moderator</option>
								<!-- <option value="service provider">service provider</option>
                           		<option value="user">user</option>
								<option value="admin">admin</option> -->
							</select>
						</div>
						<div class="mb-6">
							<label class="block text-gray-700 text-sm font-bold mb-2">
								Password
							</label>
							<input class="shadow appearance-none border rounded w-full py-4 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="******************" required="" data-parsley-trigger="keyup">
							<p class=" hidden text-red-500 text-xs italic">Please choose a password.</p>
						</div>

						<div class="flex items-center justify-between">
							<button name="login" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
								Sign In
							</button>
							<a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="./f_email.php">
								Forgot Password?
							</a>
						</div>
						<p class="mt-2 text-black-500 text-xs">
							Don't have an account, <a href="signup.php" class="text-black-700 font-bold">Create an account</a>.
						</p>
						<div class="LgnSm my-4 max-w-sm text-center">
							<a href="<?php echo $login_url; ?> " class=" hidden LgnFb p-2 block bg-red-700 rounded-sm text-white md:hover:text-black-600 my-2">
								Sign up with Gmail
							</a>
						</div>
				</form>
			</div>
		</div>
	</div>

	</div>
	<script src="../../contents/js/script.js"></script>
	<script>
		$('#login_form').parsley();
	</script>
</body>

</html>