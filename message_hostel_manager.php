<?php
  require 'includes/config.inc.php';
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title> Recieved Message</title>
	
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
	<!--bootsrap -->

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
<style type="text/css">
	.card-header{
		padding: 15px;
		font-size: 30px;
	}
	.card-body{
		padding: 15px;
	}
	.card-footer{
		text-align: left;
		padding: 15px;
	}
	.button{
    background-color: rgb(247, 84, 84);
    height: 50px;
    width: 100px;
    text-align: center;
    vertical-align: middle;
    font-size: 25px;
    color: rgb(255, 255, 255);
}
</style>


<body>

<!-- banner -->
<?php include 'header_manager.php';?>
<!-- //banner -->

<?php
    $username = $_SESSION['username'];
    $hostel_man_id = $_SESSION['hostel_man_id'];
	$query = "SELECT * FROM Message WHERE receiver_id ='$hostel_man_id'";
    $result = mysqli_query($conn,$query);

    while ($row = mysqli_fetch_assoc($result)){  
          ?> 

    <div class="container">
		<div class="card">
		<div class="card-header"><b><?php echo $row['subject_h']; ?></b></div>
		<div class="card-body"><?php echo $row['message']; ?></div> 
		<div class="card-footer"><?php echo $row['sender_id'] ?><span style="float: right"><?php echo $row['msg_date']." ".$row['msg_time']; ?></span></div>
  		</div>
		<div class="button">
			<a class="button" href="contact_manager.php?roll=<?php echo $row['sender_id'];?>&subject=<?php echo $row['subject_h'];?>">
				Reply
			</a>
		</div>

	</div>
<br><br>
             
    <?php
    } 

?>

<br>
<br>


<!-- footer -->
<?php include 'footer_manager.php';?>
<!-- footer -->

<!-- js-scripts -->

	<?php require 'js-scripts.php';?>

<!-- //js-scripts -->

</body>
</html>

