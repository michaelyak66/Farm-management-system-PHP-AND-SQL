<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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

// Retrieve the worker ID from the URL parameter
$workerId = $_GET['id'];

// Retrieve the worker details from the database
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $workerId);
$stmt->execute();
$result = $stmt->get_result();
$worker = $result->fetch_assoc();
$stmt->close();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $fullName = $_POST['fullName'];
    $username = $_POST['username'];
    $profilePhoto = $_POST['profile_photo'];
    $company = $_POST['company'];
    $job = $_POST['job'];
    $country = $_POST['country'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];




    // field is too long, display an error message

    if (strlen($job) > 20) {
        $error_message = "Job field should not exceed 20 characters.";
    } elseif (strlen($country) > 20) {
        $error_message = "Country field should not exceed 20 characters.";
    } elseif (strlen($phone) > 20) {
        $error_message = "Phone Number field should not exceed 20 characters.";
    } else {

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
        }
        // Update the worker details in the database
        $stmt = $conn->prepare("UPDATE users SET full_name = ?, username = ?, company = ?, job = ?, country = ?, address = ?, phone = ?, email = ?, profile_photo = ? WHERE id = ?");
        $stmt->bind_param("sssssssssi", $fullName, $username, $company, $job, $country, $address, $phone, $email, $profilePhoto, $workerId);
        $stmt->execute();
        $stmt->close();

        session_start();
        $_SESSION['success_message'] = "workers details updated successfully.";


        // Redirect back to the workers-single.php page
        header("Location: users-profile.php?id=$workerId");
        exit();
    }
}

// Close the database connection
$conn->close();
?>
<?php
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

// Retrieve the worker ID from the URL parameter
$workerId = $_GET['id'];

// Retrieve the profile photo file name for the worker
$stmt = $conn->prepare("SELECT profile_photo, position, full_name, username, email, green_house, address, company, country, phone FROM users WHERE id = ?");
$stmt->bind_param("i", $workerId);
$stmt->execute();
$stmt->bind_result($profilePhoto, $Position, $fullName, $username, $email, $Greenhouse, $address, $company, $country, $phone);
$stmt->fetch();
$stmt->close();

// Close the database connection
$conn->close();
?>
<?php include('includes/header.php'); ?>

<body>

    <!-- ======= Sidebar ======= -->
    <?php include('includes/sidebar.php'); ?>

    <!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1><?php echo $fullName; ?></h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Staff</li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <img src="../profile_photos/<?php echo $profilePhoto; ?>" alt="Profile" class="rounded-circle">
                            <h2><?php echo $fullName; ?></h2>
                            <h3><?php echo $Position; ?></h3>
                            <div class="social-links mt-2">
                                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                   

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                        Profile</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Password</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                    <!-- Display the success message if available -->
                                    <?php
                                    if (isset($_SESSION['success_message'])) {
                                        echo '<div class="alert alert-success">' . $_SESSION['success_message'] . '</div>';
                                        unset($_SESSION['success_message']); // Clear the success message from session
                                    }
                                    ?>

                                    <?php
                                    if (isset($error_message)) {
                                        echo '<div class="alert alert-danger">' . $error_message . '</div>';
                                        unset($error_message); // Clear the success message from session
                                    }
                                    ?>
                                    <?php
                                    if (isset($_SESSION['passmessage'])) {
                                        echo '<div class="alert alert-success">' . $_SESSION['passmessage'] . '</div>';
                                        unset($_SESSION['passmessage']); // Clear the success message from session
                                    }
                                    ?>
                                    <?php
                                    if (isset($_SESSION['passerror'])) {
                                        echo '<div class="alert alert-danger">' . $_SESSION['passerror'] . '</div>';
                                        unset($_SESSION['passerror']); // Clear the success message from session
                                    }
                                    ?>
                                    <h5 class="card-title">Profile Details</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $fullName; ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Username</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $username; ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Company</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $company; ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Job</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $Position; ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Country</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $country; ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Address</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $address; ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Phone</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $phone; ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $email; ?></div>
                                    </div>

                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit Form -->
                                    <!-- Display the worker details in an editable form -->
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="row mb-3">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                            <div class="col-md-8 col-lg-9">
                                                <img src="../profile_photos/<?php echo $worker['profile_photo']; ?>" alt="Profile">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                        <label for="inputNumber" class="col-md-4 col-lg-3 col-form-label">Photo</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input class="form-control" type="file" id="formFile" name="profile_photo" accept="image/*">
                                            </div>
                                        </div>
                                        <input name="profile_photo" type="hidden" value="<?php echo $worker['profile_photo']; ?>">


                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="fullName" type="text" class="form-control" id="fullName" value="<?php echo $worker['full_name']; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="username" type="text" class="form-control" id="username" value="<?php echo $worker['username']; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="company" type="text" class="form-control" id="company" value="<?php echo $worker['company']; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="job" type="text" class="form-control" id="Job" value="<?php echo $worker['job']; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="country" type="text" class="form-control" id="Country" value="<?php echo $worker['country']; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="address" type="text" class="form-control" id="Address" value="<?php echo $worker['address']; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="phone" type="text" class="form-control" id="Phone" value="<?php echo $worker['phone']; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="email" type="email" class="form-control" id="Email" value="<?php echo $worker['email']; ?>">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form><!-- End Profile Edit Form -->

                                </div>

                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form method="POST" action="change_password2.php">
                                        <input type="hidden" name="workerId" value="<?php echo $workerId; ?>">
                                        <div class="row mb-3">
                                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                                Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="newpassword" type="password" class="form-control" id="newPassword">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter
                                                New Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" name="submit" class="btn btn-primary">Change Password</button>
                                        </div>
                                    </form><!-- End Change Password Form -->

                                </div>
                                <div class="tab-pane fade pt-3" id="profile-settings">

                                    <!-- Settings Form -->
                                    <form>

                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email
                                                Notifications</label>
                                            <div class="col-md-8 col-lg-9">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="changesMade" checked>
                                                    <label class="form-check-label" for="changesMade">
                                                        Changes made to your account
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="newProducts" checked>
                                                    <label class="form-check-label" for="newProducts">
                                                        Information on new products and services
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="proOffers">
                                                    <label class="form-check-label" for="proOffers">
                                                        Marketing and promo offers
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                                                    <label class="form-check-label" for="securityNotify">
                                                        Security alerts
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form><!-- End settings Form -->



                                </div>
                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include('includes/footer.php'); ?>