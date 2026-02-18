<?php
if(isset($_POST['signup'])){
	include 'dbconnect.php';
	$sql = "insert into patient (User_ID, height, date_of_birth, password, phone_no, name, address, medical_record, gender) values ('$_POST[User_ID]', '$_POST[height]', '$_POST[date_of_birth]', '$_POST[password]', '$_POST[phone_no]', '$_POST[name]', '$_POST[address]', '$_POST[medical_record]', '$_POST[gender]')";
	if($conn->query($sql)===TRUE){
		echo "New user created. You can sign in now,
		Click <a href='signin.php'> Sign in</a>";
	}
	else {
		echo "Error. User not created.";
	}	
}

?>


<!-- <html>
	<body>
		<form method="post" action="signup.php">
			User ID:<input type="text" name="User_ID">
			Name:<input type="text" name="name">
			Height:<input type="text" name="height">
			Date Of Birth:<input type="date" name="date_of_birth">
			Phone Number:<input type="text" name="phone_no">
			Address:<input type="text" name="address">
			Medical Record(If Any):<input type="text" name="medical_record">
			Password:<input type="text" name="password">
			<input type="submit" name="signup" value="Sign up">
		</form>
	 </body>
</html> -->
			<!-- <input type="text" placeholder="Patient Name" required>
            <input type="text" placeholder="User ID" required>
            <input type="date" placeholder="Date of Birth" required>
            <input type="number" placeholder="Weight (kg)" required>
            <input type="number" placeholder="Height (cm)" required>
            <textarea placeholder="Medical Records (if any)" rows="4"></textarea>
            <input type="tel" placeholder="Mobile Number" required>
            <input type="email" placeholder="Email Address" required>
            <button type="submit">Submit</button> --> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Patient Information - Mental Health Assessment</title>
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
            max-width: 500px;
            background-color: #e0f7fa;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .form-container h2 {
            margin-bottom: 20px;
            color: #005073;
        }

        .form-container input,
        .form-container textarea {
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

    <!-- Patient Information Form -->
    <div class="form-container">
        <h2>Patient Information</h2>
		<form method="post" action="signup.php">
			<input type="text" name="User_ID" placeholder="User ID" required>
			<input type="text" name="name" placeholder="Patient Name" required>
			<input type="text" name="height" placeholder="Height" required>
			<input type="text" name="gender" placeholder="Gender" required>
			<input type="date" name="date_of_birth" placeholder="Date of Birth" required>
			<input type="text" name="phone_no" placeholder="Phone Number" required>
			<input type="text" name="address" placeholder="Address" required>
			<input type="text" name="medical_record" placeholder="Medical Records (If Any)" required>
			<input type="text" name="password" placeholder="Create a password" required>
			<input type="submit" name="signup" value="Sign up">
		</form>
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


