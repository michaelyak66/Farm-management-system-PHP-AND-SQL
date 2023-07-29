<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start the session
session_start();

if (isset($_POST['submit'])) {
    // Connect to the database (Assuming you have already established a database connection)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "farm";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the database connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert the Investor data into the database
    $email = $_POST['email'];
    $password = $_POST['password'];
    $fullName = $_POST['full_name'];
    $position = $_POST['position'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $greenHouse = $_POST['green_house'];
    $profilePhoto = $_POST['profile_photo'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipcode = $_POST['zipcode'];


    // Check if the email or username already exists in the database
    $stmt = $conn->prepare("SELECT COUNT(*) AS count FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $count = $row['count'];

    if ($count > 0) {
        // An account with the same username or email already exists
        $_SESSION['error'] = "Username or email already exists.";
        // You can display this error message to the user or handle it as needed
        header("Location: investors.php");
        exit();
    } else {
        // Insert the new user into the database
        // Handle file upload
        if (!empty($_FILES['profile_photo']['name'])) {
            $targetDir = "../profile_photos/";
            $fileName = basename($_FILES['profile_photo']['name']);
            $targetPath = $targetDir . $fileName;
            $fileType = pathinfo($targetPath, PATHINFO_EXTENSION);

            // Generate a unique name for the file
            $profilePhoto = uniqid() . '_' . $fileName;

            // Check if file is a valid image
            $validImageTypes = array('jpg', 'jpeg', 'png', 'gif');
            if (in_array($fileType, $validImageTypes)) {
                // Move the uploaded file to the destination directory
                if (move_uploaded_file($_FILES['profile_photo']['tmp_name'], $targetDir . $profilePhoto)) {
                    // File upload successful
                } else {
                    echo "Error uploading file.";
                }
            } else {
                echo "Invalid file format. Only JPG, JPEG, PNG, and GIF files are allowed.";
            }
        } else {
            $profilePhoto = null; // If no file was uploaded, set the value to null
        }

        // Close the previous statement
        $stmt->close();

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert the new user into the database
        $stmt = $conn->prepare("INSERT INTO users (email, password, role, position, age, full_name, address, username, green_house, profile_photo, address2, city, state, zipcode)
                            VALUES (?, ?, 'investor', ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssssss", $email, $hashedPassword, $position, $age, $fullName, $address, $username, $greenHouse, $profilePhoto, $address2, $city, $state, $zipcode);

        if ($stmt->execute()) {
            // Set success message in session
            $_SESSION['success_message'] = "Investor added successfully.";

            // Redirect back to the Investor.php page
            header("Location: investors.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement and database connection
        $stmt->close();
        $conn->close();
    }
}
