<?php
//////////////////////////////
// Validation PHP
//////////////////////////////

$name = $email = $telephone = $company_name = $message = "";
$nameErr = $emailErr = $telephoneErr = $company_nameErr = $messageErr = "";
$successMessage = ""; // Initialize success message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $company_name = test_input($_POST["company_name"]); // Sanitize company name
    $message = test_input($_POST["message"]);
    $telephone = test_input($_POST["telephone"]);

    // Validate name
    if (empty($name)) {
        $nameErr = "Name is required";
    }

    // Validate email
    if (empty($email)) {
        $emailErr = "Email is required";
    } elseif (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
        $emailErr = "Invalid email format";
    }

    // Validate telephone
    if (empty($telephone)) {
        $telephoneErr = "Telephone number is required";
    } elseif (!preg_match("/^\d+$/", $telephone)) {
        $telephoneErr = "The telephone format is incorrect.";
    }

    // Validate message
    if (strlen($message) < 5) {
        $messageErr = "The message must be at least 5 characters long";
    }

    // Proceed with database insertion if there are no errors
    if (empty($nameErr) && empty($emailErr) && empty($telephoneErr) && empty($messageErr)) {
        try {
            include "dbCon.php";

            $sql = "INSERT INTO contactus (name, company_name, email, telephone, message) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                throw new Exception(mysqli_error($conn));
            }
            mysqli_stmt_bind_param($stmt, "sssss", $name, $company_name, $email, $telephone, $message);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            mysqli_close($conn);

            $successMessage = "Your Enquiry has been submitted.";
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

// Function to sanitize input
function test_input($data, $excludeEmail = false) {
    $data = trim($data);
    $data = stripslashes($data);
    if (!$excludeEmail) {
        $data = preg_replace('/[^A-Za-z0-9\-@._+%]/', '', $data);
    }
    return $data;
}
function specialCharsEncode($data) {
    $data = htmlspecialchars($data, ENT_QUOTES | ENT_HTML5, 'UTF-8', false);
    return $data;
}
?>