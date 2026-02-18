<?php
include "dbconnect.php";
session_start();
if(isset($_POST['submit'])){

    header("Location: dashboard.php");  
}
?>
<html>
<head>
<link rel="stylesheet" href="evaluationstyle.css">
</head>
<form method="post" action="evaluation.php" >
    <table>
        <tr>
            <th>Question</th>
            <th>Answer Options</th>
            <th>Answer</th>
        </tr>
        <tr>
            <td>How often do you feel overwhelmed or stressed?</td>
            <td>Never, Rarely, Sometimes, Often, Always</td>
            <td>
                <select name="question1">
                    <option value="Never">Never</option>
                    <option value="Rarely">Rarely</option>
                    <option value="Sometimes">Sometimes</option>
                    <option value="Often">Often</option>
                    <option value="Always">Always</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>How often do you feel sad or depressed?</td>
            <td>Never, Rarely, Sometimes, Often, Always</td>
            <td>
                <select name="question2">
                    <option value="Never">Never</option>
                    <option value="Rarely">Rarely</option>
                    <option value="Sometimes">Sometimes</option>
                    <option value="Often">Often</option>
                    <option value="Always">Always</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>How often do you have trouble sleeping or experience disturbed sleep?</td>
            <td>Never, Rarely, Sometimes, Often, Always</td>
            <td>
                <select name="question3">
                    <option value="Never">Never</option>
                    <option value="Rarely">Rarely</option>
                    <option value="Sometimes">Sometimes</option>
                    <option value="Often">Often</option>
                    <option value="Always">Always</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>How often do you find it difficult to concentrate or stay focused?</td>
            <td>Never, Rarely, Sometimes, Often, Always</td>
            <td>
                <select name="question4">
                    <option value="Never">Never</option>
                    <option value="Rarely">Rarely</option>
                    <option value="Sometimes">Sometimes</option>
                    <option value="Often">Often</option>
                    <option value="Always">Always</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>How often do you feel anxious or nervous for no specific reason?</td>
            <td>Never, Rarely, Sometimes, Often, Always</td>
            <td>
                <select name="question5">
                    <option value="Never">Never</option>
                    <option value="Rarely">Rarely</option>
                    <option value="Sometimes">Sometimes</option>
                    <option value="Often">Often</option>
                    <option value="Always">Always</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>How often do you experience irrational fears or phobias?</td>
            <td>Never, Rarely, Sometimes, Often, Always</td>
            <td>
                <select name="question6">
                    <option value="Never">Never</option>
                    <option value="Rarely">Rarely</option>
                    <option value="Sometimes">Sometimes</option>
                    <option value="Often">Often</option>
                    <option value="Always">Always</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>How often do you have thoughts of self-harm or harming others?</td>
            <td>Never, Rarely, Sometimes, Often, Always</td>
            <td>
                <select name="question7">
                    <option value="Never">Never</option>
                    <option value="Rarely">Rarely</option>
                    <option value="Sometimes">Sometimes</option>
                    <option value="Often">Often</option>
                    <option value="Always">Always</option>
                </select>
            </td>
        </tr>

        <!-- Add other questions here following the same pattern -->
        <tr>
            <td><input type="submit" name='submit' value="Submit Answers"></td>
        </tr>
  <table>
</form>

</html>

<?php

// Assuming you have a user ID, use it here, or capture session data
// Check if user_id is set in the session

// another_file.php

if (isset($_SESSION['User_ID'])) {
    $user_id = $_SESSION['User_ID'];
    echo "User ID from session is: " . $user_id;
} else {
    echo "No User ID in session.";
}



$question1 = isset($_POST['question1']) ? $_POST['question1'] : '';
$question2 = isset($_POST['question2']) ? $_POST['question2'] : '';
$question3 = isset($_POST['question3']) ? $_POST['question3'] : '';
$question4 = isset($_POST['question4']) ? $_POST['question4'] : '';
$question5 = isset($_POST['question5']) ? $_POST['question5'] : '';
$question6 = isset($_POST['question6']) ? $_POST['question6'] : '';
$question7 = isset($_POST['question7']) ? $_POST['question7'] : '';
// Add more questions similarly

// Insert answers into the database
$sum=0;
if (!empty($question1)) {
    $sql1 = "INSERT INTO evaluation(num, patient_id, questions, answers) VALUES (1,'$user_id', 'How often do you feel overwhelmed or stressed?', '$question1') ON DUPLICATE KEY UPDATE answers = '$question1'";
    if ($conn->query($sql1) !== TRUE) {
        echo "Error: " . $conn->error;

    }
    if ($question1==="Never") {
        $sum=$sum+0;
    }        
    elseif ($question1==="Rarely") {
        $sum=$sum+1;    
}
    elseif ($question1==="Sometimes") {
        $sum=$sum+2;    
}    
    elseif ($question1==="Often") {
        $sum=$sum+3;    
}    
    elseif ($question1==="Always") {
        $sum=$sum+4;    
}

if (!empty($question2)) {
    $sql2 = "INSERT INTO evaluation (num, patient_id, questions, answers) VALUES (2,'$user_id', 'How often do you feel sad or depressed?', '$question2') ON DUPLICATE KEY UPDATE answers = '$question2'";
    if ($conn->query($sql2) !== TRUE) {
        echo "Error: " . $conn->error;
    }
}
    if ($question2==="Never") {
        $sum=$sum+0;
    }        
    elseif ($question2==="Rarely") {
        $sum=$sum+1;    
    }
    elseif ($question2==="Sometimes") {
        $sum=$sum+2;    
    }    
    elseif ($question2==="Often") {
        $sum=$sum+3;    
    }    
    elseif ($question2==="Always") {
        $sum=$sum+4;    
    }
if (!empty($question3)) {
    $sql3 = "INSERT INTO evaluation(num, patient_id, questions, answers) VALUES (3,'$user_id', 'How often do you have trouble sleeping or experience disturbed sleep?', '$question3') ON DUPLICATE KEY UPDATE answers = '$question3'";
    if ($conn->query($sql3) !== TRUE) {
        echo "Error: " . $conn->error;

    }
    if ($question3==="Never") {
        $sum=$sum+0;
    }        
    elseif ($question3==="Rarely") {
        $sum=$sum+1;    
}
    elseif ($question3==="Sometimes") {
        $sum=$sum+2;    
}    
    elseif ($question3==="Often") {
        $sum=$sum+3;    
}    
    elseif ($question3==="Always") {
        $sum=$sum+4;    
}
if (!empty($question4)) {
    $sql4 = "INSERT INTO evaluation(num, patient_id, questions, answers) VALUES (4,'$user_id', 'How often do you find it difficult to concentrate or stay focused?', '$question4') ON DUPLICATE KEY UPDATE answers = '$question4'";
    if ($conn->query($sql4) !== TRUE) {
        echo "Error: " . $conn->error;

    }
    if ($question4==="Never") {
        $sum=$sum+0;
    }        
    elseif ($question4==="Rarely") {
        $sum=$sum+1;    
}
    elseif ($question4==="Sometimes") {
        $sum=$sum+2;    
}    
    elseif ($question4==="Often") {
        $sum=$sum+3;    
}    
    elseif ($question4==="Always") {
        $sum=$sum+4;    
}
if (!empty($question5)) {
    $sql5 = "INSERT INTO evaluation(num, patient_id, questions, answers) VALUES (5,'$user_id', 'How often do you feel anxious or nervous for no specific reason?', '$question5') ON DUPLICATE KEY UPDATE answers = '$question5'";
    if ($conn->query($sql5) !== TRUE) {
        echo "Error: " . $conn->error;

    }
    if ($question5==="Never") {
        $sum=$sum+0;
    }        
    elseif ($question5==="Rarely") {
        $sum=$sum+1;    
}
    elseif ($question5==="Sometimes") {
        $sum=$sum+2;    
}    
    elseif ($question5==="Often") {
        $sum=$sum+3;    
}    
    elseif ($question5==="Always") {
        $sum=$sum+4;    
}
if (!empty($question6)) {
    $sql6 = "INSERT INTO evaluation(num, patient_id, questions, answers) VALUES (6,'$user_id', 'How often do you experience irrational fears or phobias?', '$question6') ON DUPLICATE KEY UPDATE answers = '$question6'";
    if ($conn->query($sql6) !== TRUE) {
        echo "Error: " . $conn->error;

    }
    if ($question6==="Never") {
        $sum=$sum+0;
    }        
    elseif ($question6==="Rarely") {
        $sum=$sum+1;    
}
    elseif ($question6==="Sometimes") {
        $sum=$sum+2;    
}    
    elseif ($question6==="Often") {
        $sum=$sum+3;    
}    
    elseif ($question6==="Always") {
        $sum=$sum+4;    
}
if (!empty($question7)) {
    $sql7 = "INSERT INTO evaluation(num, patient_id, questions, answers) VALUES (7,'$user_id', 'How often do you have thoughts of self-harm or harming others?', '$question7') ON DUPLICATE KEY UPDATE answers = '$question7'";
    if ($conn->query($sql7) !== TRUE) {
        echo "Error: " . $conn->error;

    }
    if ($question7==="Never") {
        $sum=$sum+0;
    }        
    elseif ($question7==="Rarely") {
        $sum=$sum+1;    
}
    elseif ($question7==="Sometimes") {
        $sum=$sum+2;    
}    
    elseif ($question7==="Often") {
        $sum=$sum+3;    
}    
    elseif ($question7==="Always") {
        $sum=$sum+4;    
}
                

$sql8 = "INSERT INTO patient (User_ID, sum) VALUES ('$user_id', '$sum') ON DUPLICATE KEY UPDATE sum = '$sum'";
if ($conn->query($sql8) !== TRUE) {
    echo "Error: " . $conn->error;
}



// Determine the condition based on the value of sum

if ($sum >= 3 && $sum <= 10) {
    $sql8 = "UPDATE patient SET doctor_reg_id = 105 WHERE User_ID = '$user_id'";
    if ($conn->query($sql8) !== TRUE) {
        echo "Error: " . $conn->error;
    }

} elseif ($sum >= 11 && $sum <= 17) {
    $sql8 = "UPDATE patient SET doctor_reg_id = 101 WHERE User_ID = '$user_id'";
    if ($conn->query($sql8) !== TRUE) {
        echo "Error: " . $conn->error;
    }

} elseif ($sum >= 18 && $sum <= 23) {
    $sql8 = "UPDATE patient SET doctor_reg_id = 102 WHERE User_ID = '$user_id'";
    if ($conn->query($sql8) !== TRUE) {
        echo "Error: " . $conn->error;
    }

} elseif ($sum >= 24 && $sum <= 28) {
    $sql8 = "UPDATE patient SET doctor_reg_id = 103 WHERE User_ID = '$user_id'";
    if ($conn->query($sql8) !== TRUE) {
        echo "Error: " . $conn->error;
    }

} else {
    echo "No Doctor is assigned"; // If the sum is out of the expected range
}






}}}}}}

$conn->close();
?>
