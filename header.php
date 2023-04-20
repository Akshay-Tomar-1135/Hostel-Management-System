<?php $activePage = basename($_SERVER['PHP_SELF'], ".php");?>
<div class="<?= ($activePage == 'home') ? '':'inner-page-'; ?>banner" id="home">
    <header>
        <div class="container agile-banner_nav">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">

                <h1><a class="navbar-brand" href="home.php">IIITK<span class="display"></span></a></h1>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item <?= ($activePage == 'home') ? 'active':''; ?>">
                            <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link <?= ($activePage == 'services') ? 'active':''; ?>" href="services.php">Hostels</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link <?= ($activePage == 'contact') ? 'active':''; ?>" href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($activePage == 'message_user') ? 'active':''; ?>" href="message_user.php">Message Received</a>
                        </li>
                        <?php 
                        $student_id = $_SESSION['roll'];
                        // $query = "SELECT * FROM Application WHERE Student_id='$student_id' and Application_status='0' and Room_No IS NOT NULL 
                        // ORDER BY Application_id DESC LIMIT 1";
                        $query = "SELECT * FROM Student WHERE Student_id='$student_id' and Hostel_id IS NOT NULL and Room_id IS NOT NULL";
                        $result = mysqli_query($conn, $query);
                        if($row = mysqli_fetch_assoc($result)){
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="invoice.php" target='_blank'>Print Invoice</a>
                        </li>
                        <?php } ?>
                        <?php if($activePage!='profile'){?>
                        <li class="dropdown nav-item">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><?php echo $_SESSION['roll']; ?>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu agile_short_dropdown">
                                <li>
                                    <a href="profile.php">My Profile</a>
                                </li>
                            <?php } ?>
                                <li>
                                    <a <?php if($activePage=='profile'){?>class = "nav-link"<?php }?> href="includes/logout.inc.php">Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </nav>
        </div>
    </header>
</div>