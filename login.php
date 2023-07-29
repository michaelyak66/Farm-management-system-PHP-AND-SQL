<?php
session_start(); // Start the session

// Check if the login form is submitted
if (isset($_POST['login'])) {
  // Get the entered email/username and password
  $emailOrUsername = $_POST['emailOrUsername'];
  $password = $_POST['password'];
  $workerId = $_POST['workerId'];

  // Validate the entered email/username and password
  // You can add further validation if required

  // Connect to the database (Assuming you have already established a database connection)
  $conn = new mysqli('localhost', 'root', '', 'farm');
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Prepare the SQL statement to check the email or username
  $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
  $stmt->bind_param("ss", $emailOrUsername, $emailOrUsername);
  $stmt->execute();
  $result = $stmt->get_result();

  // Check if a user is found with the entered email/username
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hashedPassword = $row['password'];

    // Verify the entered password against the hashed password
    if (password_verify($password, $hashedPassword)) {
      $role = $row['role'];
      $full_name = $row['full_name'];
      $id = $row['id'];


      // Set the session variables for full name and role
      $_SESSION['full_name'] = $full_name;
      $_SESSION['role'] = $role;
      $_SESSION['id'] = $user_id; // Replace $user_id with the actual user ID value



      // Redirect the user based on their role
      if ($role == 'admin') {
        header("Location: admin/index.php?id=$id");
      } elseif ($role == 'staff') {
        header("Location: staff/index.php?id=$id");
      } elseif ($role == 'investor') {
        header("Location: investor/index.php?id=$id");
      }
      exit();
    } else {
      $error = "Invalid password.";
    }
  } else {
    $error = "Invalid email/username.";
  }

  $stmt->close();
  $conn->close();
}
?>


<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Login - Green and Stretch 77 Farms</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="./img/favicon.png" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="./admin/store-assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="./admin/store-assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="./admin/store-assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="./admin/store-assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="./admin/store-assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <!-- Page CSS -->
  <!-- Page -->
  <link rel="stylesheet" href="./admin/store-assets/vendor/css/pages/page-auth.css" />
  <!-- Helpers -->
  <script src="./admin/store-assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="./admin/store-assets/js/config.js"></script>
</head>

<body>
  <!-- Content -->

  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
              <a href="index.php" class="app-brand-link gap-2">
                <span class="app-brand-logo demo">
                  <img src="./img/logo.png" style="width:50px;" alt="">
                </span>
                <span class="app-brand-text demo text-body fw-bolder">Green and Stretch</span>
              </a>
            </div>
            <!-- /Logo -->
            <h4 class="mb-2">Welcome to Our Farm! 👋</h4>
            <p class="mb-4">Please sign-in to your account to access your dashboard.</p>

            <form id="formAuthentication" class="mb-3" action="" method="POST">
              <!-- Error message section -->
              <?php if (isset($error) && !empty($error)) : ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
              <?php endif; ?>
              <input type="hidden" name="workerId" value="<?php echo $workerId; ?>">
              <div class="mb-3">
                <label for="email" class="form-label">Email or Username</label>
                <input type="text" class="form-control" id="email" name="emailOrUsername" placeholder="Enter your email or username" autofocus />
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="password">Password</label>
                  <a href="forgot-password.php">
                    <small>Forgot Password?</small>
                  </a>
                </div>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>
              <div class="mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="remember-me" />
                  <label class="form-check-label" for="remember-me"> Remember Me </label>
                </div>
              </div>
              <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" type="submit" name="login">Sign in</button>
              </div>
            </form>

            <p class="text-center">
              <span>New on our platform?</span>
              <a href="store.php">
                <span>Start Shopping</span>
              </a>
            </p>
          </div>
        </div>
        <!-- /Register -->
      </div>
    </div>
  </div>

  <!-- / Content -->

  <div class="buy-now">
    <a href="https://jto.drauig.com" target="_blank" class="btn btn-danger btn-buy-now">Designed by Drauig</a>
  </div>

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../assets/vendor/libs/popper/popper.js"></script>
  <script src="../assets/vendor/js/bootstrap.js"></script>
  <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="../assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->

  <!-- Main JS -->
  <script src="../assets/js/main.js"></script>

  <!-- Page JS -->

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>