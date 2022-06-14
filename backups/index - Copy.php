<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage sophia
 * @since sophia
 */
get_header(); ?>
	<section id="top-section">
		<div class="container-fluid">
			<div class="row" id="leafbanner">
				<div id="logo" class="navbar-brand text-center col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 float-start">
					<img src="<?php echo get_template_directory_uri(); ?>/images/logoimg.png" class="img-fluid " id="logoimg1">
					<img src="<?php echo get_template_directory_uri(); ?>/images/logo-writing.png" class="mx-auto img-fluid" id="logoimg2">
				</div>
		<!-----------------------nav-menu-bootstrap-start----------------->
			<div id="menue" class="specmen col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5">			
				<nav class="navbar navbar-expand-md" role="navigation">
							  <div class="container">
								<!-- Brand and toggle get grouped for better mobile display -->
								<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="main-menu">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'test',
                'container' => false,
                'menu_class' => '',
                'fallback_cb' => '__return_false',
                'items_wrap' => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
                'depth' => 2,
                'walker' => new bootstrap_5_wp_nav_menu_walker()
            ));
            ?>
        </div>
	  						  </div>
				</nav>
			</div>
		<!-----------------------nav-menu-bootstrap-end----------------->
				<div class="input-group rounded col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 float-end" id="searchbox">
					<div class="input-group">
					  <input type="search" class="form-control form-control-sm rounded-1 rounded" placeholder="Search" aria-label="Search"
					  aria-describedby="search-addon" />
					  <button type="button" class="btn btn-success">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
							<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
						</svg>  
					 </button>
					</div>
				</div>
			</div>
		</div>		
	</section>
	<section id="main-section">
		<img src="<?php echo get_template_directory_uri(); ?>/slidephotos/4.JPG" class="img-fluid saloon" alt="Sophia_Spa" id="mainpic" >
		<div class="firsttitle navbar-text">
			<?php the_title( '<span>', '</span>' )?>
		</div>
		<div class="secondtitle">
			<span class="navbar-text">
				Laser Hair Removal
			</span>
		</div>
		<div class="thirdtitle">
			<span class="navbar-text">
				Massage Therapy & Permanent Makeup
			</span>
		</div>
		<button class="scroll" id="pinkbtn" onclick="myFunction()">
				<svg height="100" width="100">
				  <circle cx="30" cy="30" r="25" stroke="black" stroke-width="3" fill="#d6a6a4" />
				  <polyline points="20,20 30,30 40,20" style="fill:none;stroke:black;stroke-width:3" />
				  <polyline points="20,30 30,40 40,30" style="fill:none;stroke:black;stroke-width:3" />
				</svg> 
		</button>
	</section>
	<section id="middleSection">
		<div class="row">
			<div class="data col-xl-11 col-lg-11 col-md-11 col-sm-11">
           	<?php
				if ( have_posts() ) :
						$content = apply_filters( 'the_content', get_the_content() );
						echo $content;
				else :
					_e( 'Welcome To Sophia Laser and Spa Clinic', 'devhub' );
				endif;
				?>
			</div>
		</div>
	</section>
	<section  id="cpright">
		<div class="row copyright d-flex justify-content-center">
			<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
		 		<span>All rights reserved to sophia laser and spa clinic.© Copyright 2021</span>
			</div>
		</div>
	</section>
	    <script>
			function myFunction(){
				var element = document.querySelector("#middleSection");
				// smooth scroll to element and align it at the bottom
				element.scrollIntoView({ behavior: 'smooth', block: 'end'});
			}
		</script>