<?php
session_start();
$id = $_GET['id'];
// Start the session
// Connect to the database (Assuming you have already established a database connection)
$conn = new mysqli('localhost', 'root', '', 'farm');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the total count of workers/staff
$sqlWorkers = "SELECT COUNT(*) AS total_workers FROM users WHERE role = 'staff'";
$resultWorkers = $conn->query($sqlWorkers);
if ($resultWorkers && $resultWorkers->num_rows > 0) {
    $rowWorkers = $resultWorkers->fetch_assoc();
    $totalWorkers = $rowWorkers['total_workers'];
} else {
    $totalWorkers = 0;
}

// Get the total count of investors
$sqlInvestors = "SELECT COUNT(*) AS total_investors FROM users WHERE role = 'investor'";
$resultInvestors = $conn->query($sqlInvestors);
if ($resultInvestors && $resultInvestors->num_rows > 0) {
    $rowInvestors = $resultInvestors->fetch_assoc();
    $totalInvestors = $rowInvestors['total_investors'];
} else {
    $totalInvestors = 0;
}

$conn->close();
?>
<?php include('includes/header.php'); ?>
<link href="stylesheet/style.css" rel="stylesheet">


<body>

    <?php include('includes/sidebar.php'); ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">

                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Total Workers</h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6><?php echo $totalWorkers; ?></h6>
                                            <span class="text-success small pt-1 fw-bold">Last Three Months</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Total Investors</h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6><?php echo $totalInvestors; ?></h6>
                                            <span class="text-success small pt-1 fw-bold">Last Three Months</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->

                        <!-- Customers Card -->
                        <div class="col-xxl-4 col-xl-12">

                            <div class="card info-card customers-card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Total Attendants</h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-check-circle"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>1244</h6>
                                            <span class="text-danger small pt-1 fw-bold">Last Three Months</span>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Customers Card -->

                        <!-- Reports -->
                        <div class="col-12">
                            <div class="card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Reports <span>/Today</span></h5>

                                    <!-- Line Chart -->
                                    <div id="reportsChart"></div>

                                    <script>
                                        document.addEventListener("DOMContentLoaded", () => {
                                            new ApexCharts(document.querySelector("#reportsChart"), {
                                                series: [{
                                                    name: 'Sales',
                                                    data: [31, 40, 28, 51, 42, 82, 56],
                                                }, {
                                                    name: 'Revenue',
                                                    data: [11, 32, 45, 32, 34, 52, 41]
                                                }, {
                                                    name: 'Customers',
                                                    data: [15, 11, 32, 18, 9, 24, 11]
                                                }],
                                                chart: {
                                                    height: 350,
                                                    type: 'area',
                                                    toolbar: {
                                                        show: false
                                                    },
                                                },
                                                markers: {
                                                    size: 4
                                                },
                                                colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                                fill: {
                                                    type: "gradient",
                                                    gradient: {
                                                        shadeIntensity: 1,
                                                        opacityFrom: 0.3,
                                                        opacityTo: 0.4,
                                                        stops: [0, 90, 100]
                                                    }
                                                },
                                                dataLabels: {
                                                    enabled: false
                                                },
                                                stroke: {
                                                    curve: 'smooth',
                                                    width: 2
                                                },
                                                xaxis: {
                                                    type: 'datetime',
                                                    categories: ["2018-09-19T00:00:00.000Z",
                                                        "2018-09-19T01:30:00.000Z",
                                                        "2018-09-19T02:30:00.000Z",
                                                        "2018-09-19T03:30:00.000Z",
                                                        "2018-09-19T04:30:00.000Z",
                                                        "2018-09-19T05:30:00.000Z",
                                                        "2018-09-19T06:30:00.000Z"
                                                    ]
                                                },
                                                tooltip: {
                                                    x: {
                                                        format: 'dd/MM/yy HH:mm'
                                                    },
                                                }
                                            }).render();
                                        });
                                    </script>
                                    <!-- End Line Chart -->

                                </div>

                            </div>
                        </div><!-- End Reports -->


                        <!-- Top Selling -->
                        <div class="col-12">
                            <div class="card top-selling overflow-auto">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body pb-0">
                                    <h5 class="card-title">Recent Sales </h5>

                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col">Preview</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Sold</th>
                                                <th scope="col">Revenue</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row"><a href="#"><img src="" alt=""></a></th>
                                                <td><a href="#" class="text-primary fw-bold">No Recent Sale</a></td>
                                                <td>$0</td>
                                                <td class="fw-bold">0</td>
                                                <td>$0</td>
                                            </tr>
                                           
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div><!-- End Top Selling -->



                    </div>
                </div><!-- End Left side columns -->


                <!-- Right side columns -->
                <div class="col-lg-4">

                    <!-- Recent Activity -->
                    <div class="card">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>

                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Active Investors</h5>

                            <div class="container text-center">
                                <div class="row">
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
                                            <div class="col" style="padding-bottom:20px;">
                                            <a href="investors-single.php?id=' . $row["id"] . '">
                                                <img src="../profile_photos/' . $row['profile_photo'] . '" style="width:80px;border-radius:50%;" alt="Team Image">
                                                <h6> ' . $row['full_name'] . '</h6>
                                                </a>
                                        </div>';

                                            $count++;
                                        }
                                    } else {
                                        echo 'No staff members found.';
                                    }

                                    // Close the database connection
                                    mysqli_close($connection);
                                    ?>
                                </div>
                            </div>

                    </div>
                </div><!-- End Recent Activity -->

                <!-- Website Traffic -->
                <div class="card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>

                    <div class="card-body pb-0">
                        <h5 class="card-title">Website Traffic <span>| Today</span></h5>

                        <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                echarts.init(document.querySelector("#trafficChart")).setOption({
                                    tooltip: {
                                        trigger: 'item'
                                    },
                                    legend: {
                                        top: '5%',
                                        left: 'center'
                                    },
                                    series: [{
                                        name: 'Access From',
                                        type: 'pie',
                                        radius: ['40%', '70%'],
                                        avoidLabelOverlap: false,
                                        label: {
                                            show: false,
                                            position: 'center'
                                        },
                                        emphasis: {
                                            label: {
                                                show: true,
                                                fontSize: '18',
                                                fontWeight: 'bold'
                                            }
                                        },
                                        labelLine: {
                                            show: false
                                        },
                                        data: [{
                                                value: 0,
                                                name: 'Search Engine'
                                            },
                                            {
                                                value: 0,
                                                name: 'Direct'
                                            },
                                            {
                                                value: 0,
                                                name: 'Email'
                                            },
                                            {
                                                value: 0,
                                                name: 'Union Ads'
                                            },
                                            {
                                                value: 0,
                                                name: 'Video Ads'
                                            }
                                        ]
                                    }]
                                });
                            });
                        </script>

                    </div>
                </div><!-- End Website Traffic -->

                <!-- Budget Report -->
                <div class="card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Active Workers</h5>

                        <div class="row">
                            <div class="container text-center">
                                <div class="row">
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
                                        // Iterate through each staff member and display their details
                                        $count = 1;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '
                                            <div class="col" style="padding-bottom:20px;">
                                            <a href="investors-single.php?id=' . $row["id"] . '">
                                                <img src="../profile_photos/' . $row['profile_photo'] . '" style="width:80px;border-radius:50%;" alt="Team Image">
                                                <h6> ' . $row['full_name'] . '</h6>
                                                </a>
                                        </div>';

                                            $count++;
                                        }
                                    } else {
                                        echo 'No staff members found.';
                                    }

                                    // Close the database connection
                                    mysqli_close($connection);
                                    ?>
                                </div>
                            </div>
                        </div>

                    </div><!-- End Budget Report -->
                </div><!-- End Right side columns -->

                <!-- News & Updates Traffic -->
                <div class="card">

                    <div class="card-body pb-0">
                        <h5 class="card-title">Recent Updates</h5>

                        <div class="news">

                            <div class="post-item clearfix" style="padding-bottom:20px;">
                                <img src="assets/img/news-5.jpg" alt="">
                                <h4><a href="#">Samuel Anigwo</a></h4>
                                <p>No reports for Samuel Anigwo</p>
                            </div>

                        </div><!-- End sidebar recent posts-->

                    </div>
                </div><!-- End News & Updates -->

                <!-- News & Updates Traffic -->
                <div class="card">

                    <div class="card-body pb-0">
                        <h5 class="card-title">Notifications</h5>

                        <div class="news">

                            <div class="post-item clearfix" style="padding-bottom:20px;">
                                <img src="assets/img/news-5.jpg" alt="">
                                <h4><a href="#">Total Attendants</a></h4>
                                <p>Total Attendants for today is twelve (12)</p>
                            </div>

                        </div><!-- End sidebar recent posts-->

                    </div>
                </div><!-- End News & Updates -->

            </div>


        </section>
        <style>
            .grid-list {
                text-align: center;
                margin-bottom: 15px;
                border-radius: 20px;
            }

            .list-setup-managers {
                background-color: #a5c5fe;
                border-radius: 20px;
            }

            .grid-list h3 {
                color: #012970;
                margin-top: 1.5rem;
                margin-bottom: 0;
                font-size: 20;
                overflow: hidden;
            }

            .grid-list a {
                color: #000;
                overflow: hidden;
                font-size: 15;
            }

            .grid-list img {
                border-radius: 100px;
                width: 100px;
            }
        </style>

    </main><?php include('includes/footer.php');
            ?>