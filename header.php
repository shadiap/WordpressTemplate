<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage sophia
 * @since sophia
 */
?>
<!doctype html>
<html>
	<head>
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
	<meta name="author" content="Shaud">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sophia Spa & Laser Clinic</title>
	<!--bootstrap-start-->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script data-require="bootstrap@*" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
	<!--bootstrap-end-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<link data-require="bootstrap@*" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo(get_template_directory_uri().'/style.css')?>" rel="stylesheet">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
	<script>
		// if viewportWidth width <= 991
		if(window.innerWidth >= 991){
		  $(document).ready(function(){
				$(".firsttitle").fadeIn(2000);
				$(".secondtitle").animate({
					  left: '250px',
					  bottom:'200px',
					  height: '50px',
					}, 4000);
				$(".thirdtitle").animate({
					  right: '250px',
					  bottom:'200px',
					  height: '50px',
					}, 4000);
			  $(".scroll").fadeIn(5000);
			  $("video").click(function(){ 
				  this.paused ? this.play() : this.pause();
					$("#subtle").animate({height: "500px", overflow: "auto"}, "slow");
				});
			});
		}
		else{ // viewportWidth width > 991
		  // load desktop script
			  $(document).ready(function(){
				$(".firsttitle").fadeIn(2000);
				$(".secondtitle").fadeIn(2000);
				$(".thirdtitle").fadeIn(2000);
			});
		}
		// loadScriptFile func
		
	</script>
		
	<?php wp_head(); ?>
</head>

<body>



