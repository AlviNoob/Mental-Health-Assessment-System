<?php
include "dbconnect.php"; // Include database connection
session_start(); // Start session management

// Handle form submission to redirect to the dashboard
if (isset($_POST['dashboard'])) {
    header("Location: doctordashboard.php");
    exit(); // Ensure no further code executes after redirection
}

// Ensure the doctor ID is set from the session before querying
if (isset($_SESSION['reg_id'])) {
    $doctor_id = $_SESSION['reg_id'];

    // SQL query to fetch patient evaluations for the specific doctor
    $sql = "SELECT p.User_ID, p.name, e.questions, e.answers 
            FROM patient p 
            JOIN evaluation e ON p.User_ID = e.patient_id 
            WHERE p.doctor_reg_id = '$doctor_id'";
    
    // Execute the query
    $result = $conn->query($sql);

    // Check for SQL errors
    if (!$result) {
        echo "Error executing query: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
    <link rel="stylesheet" href="doctorview.css"> <!-- Optional external CSS -->
</head>
<body>
    <h1>Patient Evaluations</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Patient ID</th>
                <th>Patient Name</th>
                <th>Question</th>
                <th>Answer</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Only display results if the query executed successfully and returned rows
            if (isset($result) && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['User_ID']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['questions']}</td>
                            <td>{$row['answers']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No evaluations found.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Fixed form to handle dashboard redirection -->
    <form method="post" action="demo.php">
        <button type="submit" name="dashboard">Dashboard</button>
    </form>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
