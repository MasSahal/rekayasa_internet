<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <img class="img-80 img-radius" src="../assets/images/avatar-4.jpg" alt="User-Profile-Image">
                <div class="user-details">
                    <span id="more-details">Mas Sahal<i class="fa fa-caret-down"></i></span>
                </div>
            </div>
            <div class="main-menu-content">
                <ul>
                    <li class="more-details">
                        <a href="user-profile.html"><i class="ti-user"></i>View Profile</a>
                        <a href="#!"><i class="ti-settings"></i>Settings</a>
                        <a href="auth-normal-sign-in.html"><i class="ti-layout-sidebar-left"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="pcoded-navigation-label">Navigation</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="<?= basename($_SERVER['PHP_SELF']) == "index.php" ? "active" : ""; ?>">
                <a href="index.php" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <div class="pcoded-navigation-label">MASTER DATA</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="<?= basename($_SERVER['PHP_SELF']) == "data_events.php" ? "active" : ""; ?>">
                <a href="data_events.php" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-calendar"></i><b>EV</b></span>
                    <span class="pcoded-mtext">Events</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="<?= basename($_SERVER['PHP_SELF']) == "data_tickets.php" ? "active" : ""; ?>">
                <a href="data_tickets.php" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-ticket"></i><b>TC</b></span>
                    <span class="pcoded-mtext">Tickets</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <div class="pcoded-navigation-label">EXTRAS</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="<?= basename($_SERVER['PHP_SELF']) == "data_users.php" ? "active" : ""; ?>">
                <a href="data_users.php" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-user"></i><b>U</b></span>
                    <span class="pcoded-mtext">Data Users</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="">
                <a href="data_vouchers.php" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-receipt"></i><b>B</b></span>
                    <span class="pcoded-mtext">Vouchers Discount</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <!-- <div class="pcoded-navigation-label">UI Element</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i><b>BC</b></span>
                    <span class="pcoded-mtext">Basic</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="breadcrumb.html" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Breadcrumbs</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="notification.html" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Notifications</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul> -->
    </div>
</nav>