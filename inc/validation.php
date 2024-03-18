<?php
//////////////////////////////
// Validation PHP
//////////////////////////////

$name = $email = $telephone = $company_name = $message = "";
$nameErr = $emailErr = $telephoneErr = $company_nameErr = $messageErr = "";

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
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
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

    // Database insertion
    try {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "contact_form_nm";
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO contactus (name, company_name, email, telephone, message) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            throw new Exception(mysqli_error($conn));
        }
        mysqli_stmt_bind_param($stmt, "sssss", $name, $company_name, $email, $telephone, $message);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

        // Redirect to success page with success message in URL parameters
        header("Location: success.php?success=1");
        exit(); // Ensure that script execution stops after redirection
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Function to sanitize input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = preg_replace('/[^A-Za-z0-9\-]/', '', $data);
    return $data;
}
?>
