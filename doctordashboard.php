
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
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



if(isset($_SESSION['reg_id'])) {
    $userID = $_SESSION['reg_id'];

    $stmt = $conn->prepare("SELECT * FROM doctor WHERE reg_id = ?");
    
    $stmt->bind_param("s", $userID); 
    
    $stmt->execute();
    

    $result = $stmt->get_result();

    $dname= "";
    $reg="";
    $speciality= "";
    $hname='';
    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();
        $dname = htmlspecialchars($row["name"]);  
        $reg= htmlspecialchars($row["reg_id"]);
        $speciality= htmlspecialchars($row["speciality"]);
        $hname = htmlspecialchars($row["hospital_name"]);
    } else {
        echo "No patient data found.";
    }

    $stmt->close();
} else {
    echo "User is not logged in.";
}

$sql = "SELECT User_ID, name, date_of_birth FROM patient WHERE doctor_reg_id=?";
$stmt = $conn->prepare($sql);


$stmt->bind_param("i", $userID); 


$stmt->execute();

$result = $stmt->get_result();

$conn->close();
?>


    <div class="header">
        <h1>Welcome Doctor <?php echo $dname; ?></h1>
    </div>


    <div class="sidebar">
        <a href="doctordashboard.php">Dashboard</a>
        <a href="demo.php">View Patient Evaluation</a>
        <a href="doctor_treatment.php">Treatment</a>
        <a href="index.html" name="signout">Sign Out</a>
    </div>


    <div class="main-content">


        <div class="card">
            <h3>Profile Overview</h3>
            <p><strong>Doctor Name: </strong><?php echo $dname; ?></p>
            <p><strong>Registration ID: </strong><?php echo $reg; ?></p>
            <p><strong>speciality: </strong><?php echo $speciality; ?></p>
            <p><strong>Hospital Name: </strong><?php echo $hname; ?></p>

        </div>

        <div class="card">
            <h3>My Patients</h3>
            <table>
                <tr>
                    <th>User ID</th>
                    <th>Patient Name</th>
                    <th>Age</th>

                </tr>


                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['User_ID']); ?></td>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td>
                                <?php

                                $dob = new DateTime($row['date_of_birth']);
                                $today = new DateTime('today');
                                $age = $dob->diff($today)->y;
                                echo $age;
                                ?>
                            </td>


                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="5">No patients found</td></tr>
                <?php endif; ?>

            </table>
        </div>


    </div>

</body>
</html>