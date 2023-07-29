<?php session_start(); ?>
<?php include('includes/header.php'); ?>
<link href="stylesheet/style.css" rel="stylesheet">

<body>
    <!-- SIDEBAR -->
    <?php include('includes/sidebar.php'); ?>
    <!-- END OF SIDEBAR -->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Staffs</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">All Staffs</li>
                </ol>
            </nav>
        </div>
        <section class="section profile">
            <div class="row">

                <div class="col-xl-4">
                    <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                        Add new Staff to view all Active Staff!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add New Staff</h5>

                            <!-- Multi Columns Form -->

                            <form class="row g-3" method="POST" action="create_worker.php" enctype="multipart/form-data">
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
                                    <input type="text" class="form-control" id="inputName5" name="full_name" >
                                </div>

                                <div class="col-md-6">
                                    <label for="inputEmail5" class="form-label">Age</label>
                                    <input type="text" class="form-control" id="inputEmail5" name="age" >
                                </div>

                                <div class="col-md-6">
                                    <label for="inputEmail5" class="form-label">Position</label>
                                    <input type="text" class="form-control" id="inputEmail5" name="position" >
                                </div>


                                <div class="col-md-6">
                                    <label for="inputEmail5" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="inputEmail5" name="email" >
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword5" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="inputPassword5" name="password" >
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress5" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="inputAddres5s" placeholder="1234 Main St" name="address" >
                                </div>
                                <div class="col-12">
                                    <label for="validationDefaultUsername" class="form-label">Username</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                        <input type="text" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2"  name="username">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="inputGreenHouse5" class="form-label">Green House</label>
                                    <input type="text" class="form-control" id="inputGreenHouse5" placeholder="e.g. Green House 1" name="green_house" >
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
                                    <input type="text" class="form-control" id="inputCity" name="city" >
                                </div>
                                <div class="col-md-4">
                                    <label for="inputState" class="form-label">State</label>
                                    <select id="inputState" class="form-select" name="state" >
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
                                    <input type="text" class="form-control" id="inputZip" name="zipcode" >
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

                        </div>
                    </div>

                </div>

                <div class="col-xl-8">
                    <!-- Team #9 Start -->
                    <section class="section">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Active Staffs</h5>
                                        <p>Overview of active staffs in Green and Stretch. Designated Staffs with
                                            <span style="color:red;">Red</span>
                                        </p>

                                        <!-- Table with stripped rows -->
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
                                        $query = "SELECT * FROM users WHERE role = 'staff' ORDER BY id DESC";
                                        $result = mysqli_query($connection, $query);

                                        // Check if there are any staff members
                                        if (mysqli_num_rows($result) > 0) {
                                            echo '<table class="table datatable">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Position</th>
                                                            <th scope="col">Age</th>
                                                            <th scope="col">Green House</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>';

                                            // Iterate through each staff member and display their details
                                            $count = 1;
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo '<tr>
                                                            <th scope="row">' . $count . '</th>
                                                            <td><a href="workers-single.php?id='. $row["id"] .'">' . $row['full_name'] . '</a></td>
                                                            <td>' . $row['position'] . '</td>
                                                            <td>' . $row['age'] . '</td>
                                                            <td>' . $row['green_house'] . '</td>
                                                      </tr>';

                                                $count++;
                                            }

                                            echo '</tbody>
                                            </table>';
                                        } else {
                                            echo 'No staff members found.';
                                        }

                                        // Close the database connection
                                        mysqli_close($connection);
                                        ?>
                                        <!-- End Table with stripped rows -->

                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>
        </section>




    </main>
    <?php include('includes/footer.php'); ?>