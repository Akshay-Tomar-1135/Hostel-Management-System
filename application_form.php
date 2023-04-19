<?php
  require 'includes/config.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title> Intrend Interior Category Flat Bootstrap Responsive Website Template | Services : W3layouts</title>
	
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
		
	<!-- css files -->
	<link rel="stylesheet" href="web_home/css_home/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="web_home/css_home/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
	<link rel="stylesheet" href="web_home/css_home/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->
	
	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<!-- //web-fonts -->
	
</head>

<body>

<!-- banner -->
<?php include 'header.php';?>
<!-- //banner --> 

<section class="contact py-5">
	<div class="container">
		<h2 class="heading text-capitalize mb-sm-5 mb-4"> Application Form </h2>
			<div class="mail_grid_w3l">
				<form action="application_form.php?id=<?php echo $_GET['id']?>" method="post">
					<div class="row">
						<div class="col-md-6 contact_left_grid" data-aos="fade-right">
							<div class="contact-fields-w3ls">
								<input type="text" name="Name" placeholder="Name" value="<?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?>" required="" disabled="disabled">
							</div>
							<div class="contact-fields-w3ls">
								<input type="text" name="roll_no" placeholder="Roll Number" value="<?php echo $_SESSION['roll']?>" required="" disabled="disabled">
							</div>
							<div class="contact-fields-w3ls">
								<input type="text" name="hostel" placeholder="Hostel" value="<?php echo $_GET['id']?>" required="" disabled="disabled">
							</div>
							<div class="contact-fields-w3ls">
								<input type="password" name="pwd" placeholder="Password" required="">
							</div>
						</div>
						<div class="col-md-6 contact_left_grid" data-aos="fade-left">
							<div class="contact-fields-w3ls">
								<textarea name="Message" placeholder="Message..." ></textarea>
							</div>
							<input type="submit" name="submit" value="Click to Apply">
						</div>
					</div>

				</form>
			</div>
		
	</div>
</section>

<!--footer-->
<?php include 'footer.php';?>
<!-- footer -->

<!-- js-scripts -->		

	<?php require 'js-scripts.php';?>
	
<!-- //js-scripts -->

</body>
</html>

<?php
   //echo 'Hello';
   
   if(isset($_POST['submit'])){
     $roll = $_SESSION['roll'];
     $password = $_POST['pwd'];
     $hostel = $_GET['id'];
     $message = $_POST['Message'];

     /*echo "<script type='text/javascript'>alert('<?php echo $roll ?>')</script>";*/
     $query_imp = "SELECT * FROM Student WHERE Student_id = '$roll'";
     $result_imp = mysqli_query($conn,$query_imp);
     $row_imp = mysqli_fetch_assoc($result_imp);
     $room_id = $row_imp['Room_id'];
     /*echo "<script type='text/javascript'>alert('<?php echo $room_id ?>')</script>";*/
     if(is_null($room_id)){
     
     $query_imp2 = "SELECT * FROM Application WHERE Student_id = '$roll'";
     $result_imp2 = mysqli_query($conn,$query_imp2);
     if(mysqli_num_rows($result_imp2)==0){


     $query = "SELECT * FROM Student WHERE Student_id = '$roll'";
     $result = mysqli_query($conn,$query);
     if($row = mysqli_fetch_assoc($result)){
     	$pwdCheck = password_verify($password, $row['Pwd']);
     	
        if($pwdCheck == false){
            echo "<script type='text/javascript'>alert('Incorrect Password!!')</script>";
      }
      else if($pwdCheck == true) {

      	    $query2 = "SELECT * FROM Hostel WHERE Hostel_name = '$hostel'";
      	    $result2 = mysqli_query($conn,$query2);
      	    $row2 = mysqli_fetch_assoc($result2);
      	    $hostel_id = $row2['Hostel_id'];
            $query3 = "INSERT INTO Application (Student_id,Hostel_id,Application_status,Message) VALUES ('$roll','$hostel_id',true,'$message')";
            $result3 = mysqli_query($conn,$query3);

            if($result3){
            	 echo "<script type='text/javascript'>alert('Application sent successfully')</script>";
            }
      }
     }

     }
     else{
     	echo "<script type='text/javascript'>alert('You have Already applied for a Room')</script>";
     }
    
     }
     else{
          echo "<script type='text/javascript'>alert('You have Already been alloted a Room')</script>";   
      }


}
?>