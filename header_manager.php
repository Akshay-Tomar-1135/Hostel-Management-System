<?php $activePage = basename($_SERVER['PHP_SELF'], ".php");?>
<div class="<?= ($activePage == 'home_manager') ? '':'inner-page-'; ?>banner" id="home"> 	   
	<!--Header-->
	<header>
		<div class="container agile-banner_nav">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				
				<h1><a class="navbar-brand" href="home_manager.php">IIITK<span class="display"></span></a></h1>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item <?= ($activePage == 'home_manager') ? 'active':''; ?>">
							<a class="nav-link " href="home_manager.php">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item <?= ($activePage == 'allocate_room') ? 'active':''; ?>">
							<a class="nav-link" href="allocate_room.php">Allocate Room</a>
						</li>
						<li class="dropdown nav-item <?= ($activePage == 'allocated_rooms' || $activePage =='empty_rooms' || $activePage =='vacate_rooms') ? 'active':''; ?>">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Rooms
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu agile_short_dropdown">
								<li>
									<a href="allocated_rooms.php">Allocated Rooms</a>
								</li>
								<li>
									<a href="empty_rooms.php">Empty Rooms</a>
								</li>
								<li>
									<a href="vacate_rooms.php">Vacate Rooms</a>
								</li>
							</ul>
						</li>
						<li class=" dropdown nav-item <?= ($activePage =='message_hostel_manager' || $activePage =='contact_manager') ? 'active':''; ?>">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Messages Received
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu agile_short_dropdown">
								<li>
									<a href="message_hostel_manager.php">Messages</a>
								</li>
								<li>
									<a href="contact_manager.php">Contact</a>
								</li>
							</ul>
						</li>
						<?php if($activePage !='admin/manager_profile'){?>
						<li class="dropdown nav-item">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><?php echo $_SESSION['username']; ?>
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu agile_short_dropdown">
								<li>
									<a href="admin/manager_profile.php">My Profile</a>
								</li>
								<li>
									<a href="includes/logout.inc.php">Logout</a>
								</li>
							</ul>
						</li>
						<?php } else{?>
						<li class="nav-item <?= ($activePage == 'allocate_room') ? 'active':''; ?>">
							<a class="nav-link" href="allocate_room.php">Allocate Room</a>
						</li>
						<?php }?>
					</ul>
				</div>
			</nav>
		</div>
	</header>
	<!--Header-->
</div>