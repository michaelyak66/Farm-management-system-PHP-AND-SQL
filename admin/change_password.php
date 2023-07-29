<?php
session_start(); // Start the session

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get the entered new password and re-entered password
    $newPassword = $_POST['newpassword'];
    $reenteredPassword = $_POST['renewpassword'];
    $workerId = $_POST['workerId'];


    // Validate the new password and re-entered password
    // You can add further validation if required

    if ($newPassword === $reenteredPassword) {
        // Connect to the database (Assuming you have already established a database connection)
        $conn = new mysqli('localhost', 'root', '', 'farm');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Hash the new password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update the worker's password in the database
        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
        $stmt->bind_param("si", $hashedPassword, $workerId);
        $stmt->execute();
        $stmt->close();

        // Close the database connection
        $conn->close();

        // Set success message in session variable
        $_SESSION['passmessage'] = "Password changed successfully.";

        // Redirect back to the workers-single.php page
        header("Location: workers-single.php?id=$workerId");
        exit();
    } else {
        // Set error message in session variable
        $_SESSION['passerror'] = "Passwords do not match.";

        // Redirect back to the workers-single.php page
        header("Location: workers-single.php?id=$workerId");
        exit();
    }
}
?>
