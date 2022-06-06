<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <!-- User Profile-->
                    <div class="user-profile d-flex no-block dropdown m-t-20">
                        <div class="user-pic"><img src="assets/images/users/1.jpg" alt="users" class="rounded-circle" width="40" /></div>
                        <div class="user-content hide-menu m-l-10">
                            <a href="#" class="" id="Userdd" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <h5 class="m-b-0 user-name font-medium">Administrator <i class="fa fa-angle-down"></i></h5>
                                <span class="op-5 user-email">admin@hotelprima.com</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="Userdd">
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                    <!-- End User Profile-->
                </li>
                <!-- User Profile-->
                <?php
                $link = array('', 'index.php', 'data-reservasi.php', 'data-pengunjung.php', 'data-kamar.php',);
                ?>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" <?= (in_array(basename(__FILE__), $link) ? "active" : "") ?>href="index.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Home</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" <?= (in_array(basename(__FILE__), $link) ? "active" : "") ?>href="data-reservasi.php" aria-expanded="false"><i class="mdi mdi-contact-mail"></i><span class="hide-menu">Data Reservasi</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" <?= (in_array(basename(__FILE__), $link) ? "active" : "") ?>href="data-pengunjung.php" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Data Pengunjung</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" <?= (in_array(basename(__FILE__), $link) ? "active" : "") ?>href="data-kamar.php" aria-expanded="false"><i class="mdi mdi-hotel"></i><span class="hide-menu">Data Kamar</span></a></li>

            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>