<?php 

	session_start();
	include("../../backend/conn.php");

	// if (isset($_SESSION["ID"])) {
	// 	header("Location:index.php");
	// }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login ❖ Philippine Carabao Center</title>
    <link rel="shortcut icon" href="../assets/img/logo.jpg" type="image/x-icon">
    <link href="../../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/login.css">

</head>

<body>
    <div class="content-wrapper">
        <div class="hero-img">
            <img src="../assets/img/pcc-logo-header.png" class="w-100" alt="hero">
        </div>
        <div class="login-wrapper p-4">

            <form class="px-3 py-4" action="../../backend/be_login.php" method="POST">

                <div class="form-group mb-3">
                    <label for="username" class="mb-2">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group mb-3">
                    <label for="password" class="mb-2">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group mb-3">
                    <label for="state" class="mb-2">State</label>
                    <select class="form-control" id="state" name="state" required>
                        <option value="1">Staff</option>
                        <option value="2">Admin</option>
                    </select>
                </div>
                <div class="text-end mt-3 mb-2">
                    <a href="#forgotpassword">Forgot password?</a>
                </div>
                <button type="submit" class="btn btn-primary w-100 py-3 mt-3" name="btnlogin">Login</button>
            </form>

        </div>
    </div>



</body>

</html>