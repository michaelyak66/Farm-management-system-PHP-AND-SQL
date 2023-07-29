<?php 
session_start();
$id = $_GET['id'];
$user_id = $_SESSION['id'];



// Start the session
?>
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <?php echo '    
                <li class="nav-item">
                <a class="nav-link" href="index.php?id=' . $id . '">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
                </a>
                </li>


        <li class="nav-item">
            <a class="nav-link collapsed" href="investors.php?id=' . $id . '">
                <i class="bi bi-heart"></i>
                <span>Investors</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="store_default.php?id=' . $id . '" class="nav-link collapsed" data-bs-target="#message-nav" href="">
                <i class="bi bi-cart"></i><span>Manage Store</span>
            </a>
        
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="notification.php?id=' . $id . '">
                <i class="bi bi-bell"></i>
                <span>Notification</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="messages.php?id=' . $id . '">
                <i class="bi bi-chat-square"></i>
                <span>Messages</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="">
                <i class="bi bi-gem"></i><span>Green Houses</span>
            </a>
            
        </li><!-- End Icons Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="workers.php?id=' . $id . '">
                <i class="bi bi-people"></i>
                <span>Workers</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="reports.php?id=' . $id . '">
                <i class="bi bi-check-circle"></i>
                <span>Daily Reports</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.php?id=' . $id . '">
                <i class="bi bi-person"></i>
                <span>Account</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="settings.php?id=' . $id . '">
                <i class="bi bi-gear"></i>
                <span>Settings</span>
            </a>
        </li>
        ';?>
</aside>