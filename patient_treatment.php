<?php
session_start();
if (isset($_POST['signout'])) {
    session_unset();
    session_destroy();
    header("Location: index.html"); 
    exit();
}

include 'dbconnect.php';


if (isset($_SESSION['User_ID'])) {
    $userID = $_SESSION['User_ID'];

    $stmt = $conn->prepare("SELECT * FROM patient WHERE User_ID = ?");
    $stmt->bind_param("s", $userID);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
} else {
    echo "User is not logged in.";
    exit();
}


$sql = "SELECT * FROM treatment WHERE patient_user_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $userID);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #4CAF50;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        button {
            padding: 10px 15px;
            margin-bottom: 20px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #45a049;
        }
        .message {
            text-align: center;
            font-size: 1.2em;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<h1>Welcome to Your Dashboard</h1>

<form method="POST" action="">
    <button type="submit" name="signout">Sign Out</button>
</form>

<h2>Your Treatments</h2>

<?php
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Medicine</th><th>Comments</th><th>Date</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['medicine']) . "</td>";
        echo "<td>" . htmlspecialchars($row['comments']) . "</td>";
        echo "<td>" . htmlspecialchars($row['date']) . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "<p class='message'>No treatments found.</p>";
}

$stmt->close();
?>

</body>
</html>
