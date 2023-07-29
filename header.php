<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="./img/favicon.png" />

<!-- Core Stylesheet -->
<link rel="stylesheet" href="./style.css" />

<!-- Preloader -->
<div id="preloader">
    <div class="wrapper">
        <div class="cssload-loader"></div>
    </div>
</div>

<!-- ***** Top Search Area Start ***** -->
<div class="top-search-area">
    <!-- Search Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- Close Button -->
                    <button type="button" class="btn close-btn" data-dismiss="modal">
                        <i class="fa fa-times"></i>
                    </button>
                    <!-- Form -->
                    <form action="index.html" method="post">
                        <input type="search" name="top-search-bar" class="form-control"
                            placeholder="Search and hit enter..." />
                        <button type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Top Search Area End ***** -->

<!---***** Development Notice ***** --->


<header class="header-area">
    <!-- Main Header Start -->
    <div class="main-header-area">
        <div class="classy-nav-container breakpoint-off">
            <!-- Classy Menu -->

            <nav class="classy-navbar justify-content-between" id="uzaNav">
                <!-- Logo -->
                <a class="nav-brand" href="index.php"><img src="./img/core-img/logo.png" alt=""
                        style="width: 70px;margin-top: 20px;" /></a>

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Menu -->
                <div class="classy-menu">
                    <!-- Menu Close Button -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap">
                            <span class="top"></span><span class="bottom"></span>
                        </div>
                    </div>

                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul id="nav">
                            <li><a href="./index.php">Home</a></li>
                            <li><a href="./store.php">Store</a></li>
                            <li><a href="./about.php">About</a></li>
                            <li><a href="./blog.php">News</a></li>
                            <li><a href="./contact.php">Contact Us</a></li>
                        </ul>

                        <!-- Get A Quote -->
                        <div class="get-a-quote ml-4 mr-3">
                            <a href="store.php" class="btn uza-btn">Shop Now</a>
                        </div>

                        <!-- Login / Register -->
                        <div class="login-register-btn mx-3">
                            <a href="cart.php">My Cart <span
                                    class="badge bg-dark text-white ms-1 rounded-pill">0</span></a>&nbsp; &nbsp;
                            &nbsp;<a href="login.php">Login </a>
                        </div>

                        <!-- Search Icon -->
                        <div class="search-icon" data-toggle="modal" data-target="#searchModal">
                            <i class="icon_search"></i>
                        </div>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->