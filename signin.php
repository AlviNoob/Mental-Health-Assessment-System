<?php
session_start();
if(isset($_POST['signin'])){
	include 'dbconnect.php';
	$username = $_POST['User_ID'];
	$sql = "select * from patient where User_ID='$_POST[User_ID]' and password='$_POST[password]'";
	$result = $conn->query($sql);
	if($result->num_rows==0){
		echo "Wrong username or password";
	}
	else{
		$_SESSION['User_ID'] = $username;
		header("Location: dashboard.php");
	}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Doctor Sign-In - Mental Health Assessment</title>
    <style>
        /* General Styles */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f4faff;
            color: #333;
            text-align: center;
        }

        /* Header Section */
        .main-header {
            background-color: #b0e0e6;
            padding: 20px;
            border-bottom: 2px solid #8aa8a1;
        }

        .main-header .logo h1 {
            font-size: 36px;
            color: #005073;
            margin: 0;
        }

        /* Form Section */
        .form-container {
            margin: 50px auto;
            padding: 20px;
            max-width: 400px;
            background-color: #e0f7fa;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .form-container h2 {
            margin-bottom: 20px;
            color: #005073;
        }

        .form-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #005073;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #00364d;
        }

        /* Footer Section */
        .main-footer {
            background-color: #b0e0e6;
            padding: 15px;
            margin-top: 50px;
            border-top: 2px solid #8aa8a1;
        }

        .main-footer ul {
            list-style: none;
            padding: 0;
        }

        .main-footer ul li {
            display: inline;
            margin: 0 15px;
        }

        .main-footer ul li a {
            text-decoration: none;
            color: #005073;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        .main-footer ul li a:hover {
            color: #00364d;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header class="main-header">
        <div class="logo">
            <h1>Mental Health Assessment</h1>
            <p>Your Journey to Better Mental Health Starts Here</p>
        </div>
    </header>

    <!-- Doctor Sign-In Form -->
    <div class="form-container">
        <h2>Patient Sign-In</h2>
		<form method="post" action="signin.php">
			User ID:<input type="text" name="User_ID">
			Password:<input type="text" name="password">
			<input type="submit" name="signin" value="Sign in">
        </form>
        <section class="action-buttons">
            <p>Not a member? Sign UP here...</p>
            <a href="signup.php" class="btn patient-btn">Patient Sign-UP</a>
        </section>
		<p><a href="index.html">Back to Home</a></p>
    </div>

    <!-- Footer Section -->
    <footer class="main-footer">
        <ul>
            <li><a href="#about">About Us</a></li>
            <li><a href="#privacy">Privacy Policy</a></li>
            <li><a href="#contact">Contact Information</a></li>
        </ul>
    </footer>
</body>
</html>
