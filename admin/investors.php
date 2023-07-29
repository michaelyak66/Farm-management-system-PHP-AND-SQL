<?php include('includes/header.php'); ?>
<link href="stylesheet/style.css" rel="stylesheet">


<body>
    <!-- SIDEBAR -->
    <?php include('includes/sidebar.php'); ?>
    <!-- END OF SIDEBAR -->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Investors</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">All Investors</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        Add investor to view Active Investors!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add New Investors</h5>

                            <form class="row g-3" method="POST" action="add_investor.php" enctype="multipart/form-data">
                                <?php if (isset($_SESSION['success_message'])) : ?>
                                    <div class="alert alert-success">
                                        <?php echo $_SESSION['success_message']; ?>
                                    </div>
                                    <?php unset($_SESSION['success_message']); // Remove the success message from the session 
                                    ?>
                                <?php endif; ?>

                                <?php if (isset($_SESSION['error'])) : ?>
                                    <div class="alert alert-danger">
                                        <?php echo $_SESSION['error']; ?>
                                    </div>
                                    <?php unset($_SESSION['error']); // Remove the success message from the session 
                                    ?>
                                <?php endif; ?>

                                <div class="col-md-12">
                                    <label for="inputName5" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="inputName5" name="full_name">
                                </div>

                                <div class="col-md-6">
                                    <label for="inputEmail5" class="form-label">Age</label>
                                    <input type="text" class="form-control" id="inputEmail5" name="age">
                                </div>

                                <div class="col-md-6">
                                    <label for="inputEmail5" class="form-label">Position</label>
                                    <input type="text" class="form-control" id="inputEmail5" name="position">
                                </div>


                                <div class="col-md-6">
                                    <label for="inputEmail5" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="inputEmail5" name="email">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword5" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="inputPassword5" name="password">
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress5" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="inputAddres5s" placeholder="1234 Main St" name="address">
                                </div>
                                <div class="col-12">
                                    <label for="validationDefaultUsername" class="form-label">Username</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                        <input type="text" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" name="username">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="inputGreenHouse5" class="form-label">Green House</label>
                                    <input type="text" class="form-control" id="inputGreenHouse5" placeholder="e.g. Green House 1" name="green_house">
                                </div>
                                <div class="col-12">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Photo</label>
                                    <input class="form-control" type="file" id="formFile" name="profile_photo" accept="image/*">
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress2" class="form-label">Address 2</label>
                                    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" name="address2">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputCity" class="form-label">City</label>
                                    <input type="text" class="form-control" id="inputCity" name="city">
                                </div>
                                <div class="col-md-4">
                                    <label for="inputState" class="form-label">State</label>
                                    <select id="inputState" class="form-select" name="state">
                                        <option selected>Choose...</option>
                                        <!-- Options for states -->
                                        <option>Abia</option>
                                        <option>Adamawa</option>
                                        <option>Akwa Ibom</option>
                                        <option>Anambra</option>
                                        <option>Bauchi</option>
                                        <option>Bayesa</option>
                                        <option>Benue</option>
                                        <option>Borno</option>
                                        <option>Cross River</option>
                                        <option>Delta</option>
                                        <option>Ebonyi</option>
                                        <option>Edo</option>
                                        <option>Ekiti</option>
                                        <option>Enugu</option>
                                        <option>Federal Capital Territory</option>
                                        <option>Gombe</option>
                                        <option>Imo</option>
                                        <option>Jigawa</option>
                                        <option>Kaduna</option>
                                        <option>Kano</option>
                                        <option>Katsina</option>
                                        <option>Kebbi</option>
                                        <option>Kogi</option>
                                        <option>Kwara</option>
                                        <option>Lagos</option>
                                        <option>Nassarawa</option>
                                        <option>Niger</option>
                                        <option>Ogun</option>
                                        <option>ondo</option>
                                        <option>Osun</option>
                                        <option>Oyo</option>
                                        <option>Plateau</option>
                                        <option>River</option>
                                        <option>Sokoto</option>
                                        <option>Taraba</option>
                                        <option>Yobe</option>
                                        <option>Zamfara</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="inputZip" class="form-label">Zip</label>
                                    <input type="text" class="form-control" id="inputZip" name="zipcode">
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Terms and Conditions
                                        </label>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form><!-- End Multi Columns Form -->
                            <!-- End Browser Default Validation -->

                        </div>
                    </div>

                </div>

                <!-- Team #6 Start -->
                <div class="col-xl-8">
                    <div class="container">
                        <div class="row">
                            <!-- Team #5 Start -->
                            <?php
                            // Replace the placeholders with your actual database connection details
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "farm";

                            // Create a connection to the database
                            $connection = mysqli_connect($servername, $username, $password, $dbname);

                            // Check if the connection was successful
                            if (!$connection) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            // Fetch all staff members from the database
                            $query = "SELECT * FROM users WHERE role = 'investor' ORDER BY id DESC";
                            $result = mysqli_query($connection, $query);

                            // Check if there are any staff members
                            if (mysqli_num_rows($result) > 0) {
                                // Iterate through each staff member and display their details
                                $count = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '
                                            <div class="column">
                                                <div class="team-5">
                                                    <div class="team-img">
                                                        <img src="../profile_photos/'. $row['profile_photo'] .'" alt="Team Image">
                                                    </div>
                                                    <div class="team-content">
                                                    <a href="investors-single.php?id='. $row["id"] .'">
                                                            <h3> ' . $row['full_name'] . '</h3>
                                                            <h4>' . $row['green_house'] . '</h4>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>';

                                    $count++;
                                }
                            } else {
                                echo 'No staff members found.';
                            }

                            // Close the database connection
                            mysqli_close($connection);
                            ?>
                            <!-- Team #5 End -->
                            <style>
                                /**********************************/
                                .team-5 {
                                    margin-bottom: 30px;
                                }

                                .team-5 .team-img {
                                    position: relative;
                                    font-size: 0;
                                    text-align: center;
                                }

                                .team-5 .team-img img {
                                    width: 160px;
                                    height: auto;
                                    margin-bottom: 10px;
                                    border-radius: 100%;
                                    border: 20px solid #ffffff;
                                    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                                }

                                .team-5 .team-content {
                                    padding: 80px 20px 20px 20px;
                                    margin-top: -80px;
                                    text-align: center;
                                    background: #ffffff;
                                    border-radius: 10px;
                                    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                                }

                                .team-5 .team-content h2 {
                                    font-size: 25px;
                                    font-weight: 400;
                                    letter-spacing: 2px;
                                }

                                .team-5 .team-content h3 {
                                    font-size: 16px;
                                    font-weight: 600;
                                }

                                .team-5 .team-content h4 {
                                    font-size: 16px;
                                    font-weight: 300;
                                    font-style: italic;
                                    letter-spacing: 1px;
                                    margin-bottom: 0;
                                }

                                .team-5 .team-content p {
                                    font-size: 16px;
                                    font-weight: 400;
                                    line-height: 22px;
                                }
                            </style>
                        </div>
                    </div>
                    <!-- Team #5 End -->
                </div>
            </div>

        </section>

    </main>
    <?php include('includes/footer.php'); ?>