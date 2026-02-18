<?php
if(isset($_POST['submit'])){
	include 'dbconnect.php';
	$sql = "insert into treatment (patient_user_id, medicine, comments, date, doctor_reg_id) values ('$_POST[patient_user_id]', '$_POST[medicine]', '$_POST[comments]', '$_POST[date]', '$_POST[doctor_reg_id]')";
	if($conn->query($sql)===TRUE){
		echo "Treatment is given,
		Click <a href='doctordashboard.php'>Dashboard</a>";
	}
	else {
		echo "Error. User not created.";
	}	
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Patient Information - Mental Health Assessment</title>
    <style>
        
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f4faff;
            color: #333;
            text-align: center;
        }

        
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

    <header class="main-header">
        <div class="logo">
            <h1>Mental Health Assessment</h1>
            <p>Your Journey to Better Mental Health Starts Here</p>
        </div>
    </header>


    <div class="form-container">
        <h2>Treatment</h2>
		<form method="post" action="doctor_treatment.php">
			<input type="text" name="patient_user_id" placeholder="Patient User ID" required>

			<input type="text" name="medicine" placeholder="Medicine" required>
			<textarea name="comments" placeholder="Comments" rows='4'></textarea>
			<input type="date" name="date" placeholder="Date" required>
			<input type="text" name="doctor_reg_id" placeholder="Doctor Registration ID" required>

			<input type="submit" name="submit" value="Submit">
		</form>
        <p><a href="doctordashboard.php">Back to Dashboard</a></p>
    </div>


    <footer class="main-footer">
        <ul>
            <li><a href="#about">About Us</a></li>
            <li><a href="#privacy">Privacy Policy</a></li>
            <li><a href="#contact">Contact Information</a></li>
        </ul>
    </footer>
</body>
</html>


