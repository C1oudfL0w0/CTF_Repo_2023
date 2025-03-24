<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
		}

		.container {
			background-color: #ffffff;
			border-radius: 5px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
			padding: 20px;
			margin: 50px auto;
			max-width: 400px;
			text-align: center;
		}

		h1 {
			font-size: 24px;
			margin-bottom: 20px;
		}

		input[type="text"], input[type="password"] {
			padding: 5px;
			border: 1px solid #ccc;
			border-radius: 3px;
			width: 100%;
			box-sizing: border-box;
			margin-bottom: 10px;
			font-size: 16px;
		}

		input[type="submit"] {
			background-color: #4CAF50;
			color: #ffffff;
			padding: 10px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}

		input[type="submit"]:hover {
			background-color: #3e8e41;
		}

		.error {
			color: red;
			margin-bottom: 20px;
		}

		.link {
			color: #1e90ff;
			text-decoration: none;
		}

		.link:hover {
			text-decoration: underline;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Login</h1>
		<?php
			// Code for login validation here
			if (isset($_POST["submit"])) {
				// Check if the username and password are valid
				$username = $_POST["username"];
				$password = $_POST["password"];

                if($username=='admin' and $password=='password'){
                    echo "source in www.zip";
                }else{
                    echo "Login Failed";
                }

			}
		?>
		<form method="post">
			<input type="text" name="username" placeholder="Username" required>
			<input type="password" name="password" placeholder="Password" required>
			<input type="submit" name="submit" value="Login">
		</form>
	</div>
</body>
</html>
