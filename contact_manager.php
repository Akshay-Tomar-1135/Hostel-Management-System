
<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php

 require 'includes/config.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title> Contact: Manager </title>
	
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Intrend Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--// Meta tag Keywords -->
		<link href="web_home/css_home/slider.css" type="text/css" rel="stylesheet" media="all">
	<!-- css files -->
	<link rel="stylesheet" href="web_home/css_home/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="web_home/css_home/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
	<link rel="stylesheet" href="web_home/css_home/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->
	<link rel="stylesheet" href="web_home/css_home/flexslider.css" type="text/css" media="screen" property="" />
	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
	<!-- //web-fonts -->
	
</head>

<body>

<!-- banner -->
<?php include 'header_manager.php';?>
<!-- //banner --> 
<?php
$hostel_id = $_SESSION['man_hostel_id'];
$query6 = "SELECT * FROM Hostel WHERE Hostel_id = '$hostel_id'";
$result6 = mysqli_query($conn,$query6);
$row6 = mysqli_fetch_assoc($result6);
$hostel_name = $row6['Hostel_name'];
?>
<!-- contact -->
<section class="contact py-5">
	<div class="container">
		<h2 class="heading text-capitalize mb-sm-5 mb-4"> Reply Students </h2>
			<div class="mail_grid_w3l">
				<form action="contact_manager.php" method="post">
					<div class="row">
						<div class="col-md-6 contact_left_grid" data-aos="fade-right">
							<div class="contact-fields-w3ls">
								<input type="text" name="name" placeholder="Name"  value="<?php echo $_SESSION['username']; ?>" required disabled>
							</div>
							<div class="contact-fields-w3ls">
								<input type="text" name="hostel_name" placeholder="Hostel" value="<?php echo $hostel_name; ?>" required disabled>
							</div>
							<div class="contact-fields-w3ls">
								<input type="text" name="student_roll_no" 
								placeholder="Student Roll Number"
								<?php if(isset($_GET['roll'])){ ?>
									value="<?php echo $_GET['roll'];?>" disabled
								<?php }?> required>
							</div>
							<div class="contact-fields-w3ls">
								<input type="text" name="subject" 
								placeholder="Subject"
								<?php if(isset($_GET['subject'])){ ?>
									value="<?php echo $_GET['subject'];?>"
								<?php } ?> required>
							</div>
						</div>
						<div class="col-md-6 contact_left_grid" data-aos="fade-left">
							<div class="contact-fields-w3ls">
								<textarea name="message" placeholder="Message..." required=""></textarea>
							</div>
							<input type="submit" name="submit" value="Send">
						</div>
					</div>

				</form>
			</div>
		
	</div>
</section>
<!-- //contact -->


<!-- footer -->
<?php include 'footer_manager.php';?>
<!-- footer -->

<!-- js-scripts -->		

	<?php require 'js-scripts.php';?>
	
<!-- //js-scripts -->

</body>
</html>

<?php
if(isset($_POST['submit'])){
	/*echo "<script type='text/javascript'>alert('hello')</script>";*/
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	$hostel_name = $_POST['hostel_name'];
	$roll = $_POST['student_roll_no'];

    $man_id = $_SESSION['hostel_man_id'];

    $today_date =  date("Y-m-d");
    $time = date("h:i A");

	$query = "INSERT INTO Message (sender_id,receiver_id,hostel_id,subject_h,message,msg_date,msg_time) VALUES ('$man_id','$roll','$hostel_id','$subject','$message','$today_date','$time')";
    $result = mysqli_query($conn,$query);
    if($result){
		mysqli_commit($conn);
		echo "<script type='text/javascript'>alert('Message sent Successfully!')</script>";
    }
    else{
		mysqli_rollback($conn);
		echo "<script type='text/javascript'>alert('Error in sending message!!! Please try again.')</script>";	
   }
  }


?>