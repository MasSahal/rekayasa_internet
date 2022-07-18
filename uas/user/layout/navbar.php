<nav class="navbar navbar-expand-sm navbar-dark bg-twitter m-0">
    <a class="navbar-brand" href="index.php">E-Ticket</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="data_events.php">Events</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="data_tickets.php">Ticket Saya</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../logout.php">Logout</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">-</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Halo, <?= $_SESSION['fullname']; ?></a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="get">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" name="cari">
            <button class="btn btn-secondary btn-sm my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>