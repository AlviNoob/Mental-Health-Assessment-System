<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .header {
            background-color: #4CAF50;
            padding: 10px;
            color: white;
            text-align: center;
        }

        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #333;
            padding-top: 20px;
        }

        .sidebar a {
            padding: 15px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
        }

        .sidebar a:hover {
            background-color: #575757;
        }

        .main-content {
            margin-left: 260px;
            padding: 20px;
        }

        .card {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card h3 {
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
<?php
session_start();
if(isset($_POST['signout'])){
    session_unset();
    session_destroy();
    
}

?>

<?php

include 'dbconnect.php';




if(isset($_SESSION['User_ID'])) {
    $userID = $_SESSION['User_ID'];

    $stmt = $conn->prepare("SELECT * FROM patient WHERE User_ID = ?");
    

    $stmt->bind_param("s", $userID);  
    
    $stmt->execute();
    
    $result = $stmt->get_result();

    $name= "";
    $height ='';
    $gender = '';
    $dob ='';
    $dreg='';
    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();
        $name = htmlspecialchars($row["name"]);  
        $height = htmlspecialchars($row["height"]);
        $gender= htmlspecialchars($row["gender"]);
        $dob = htmlspecialchars($row["date_of_birth"]);
        $dreg = htmlspecialchars($row["doctor_reg_id"]);
    } else {
        echo "No patient data found.";
    }


    $stmt->close();
} else {
    echo "User is not logged in.";
}



$sql = "SELECT name FROM doctor WHERE reg_id = ?";
$stmt = $conn->prepare($sql);


if ($stmt === false) {
    die("Error preparing statement: " . htmlspecialchars($conn->error));
}


$stmt->bind_param("i", $dreg); 


if (!$stmt->execute()) {
    die("Error executing statement: " . htmlspecialchars($stmt->error));
}

$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $dname = htmlspecialchars($row["name"]);
} else {
    $dname = "Doctor not found."; 

}

$conn->close();
?>
<?php


$dob1 = new DateTime($dob);


$today = new DateTime('today');


$age = $dob1->diff($today)->y;


?>

  
    <div class="header">
        <h1>Welcome <?php echo $_SESSION['User_ID']; ?></h1>
    </div>

    
    <div class="sidebar">
        <a href="dashboard.php">Dashboard</a>
        <a href="evaluation.php">Take Evaluation</a>

        <a href="patient_treatment.php">Treatment</a>
        <a href="index.html" name="signout">Sign Out</a>
    </div>


    <div class="main-content">


        <div class="card">
            <h3>Profile Overview</h3>
            <p><strong>Name: </strong><?php echo $name; ?></p>
            <p><strong>Height: </strong><?php echo $height; ?></p>
            <p><strong>Age: </strong><?php echo $age; ?></p>
            <p><strong>Gender: </strong><?php echo $gender; ?></p>
            <p><strong>Assigned Doctor: </strong><?php echo $dname; ?></p>
        </div>



        <div class="card">
            <h3>Messages</h3>
            <p>You have no new messages.</p>
        </div>

    </div>

</body>
</html>