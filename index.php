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
								<button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
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
					  	<?php echo do_shortcode( '[ivory-search id="62" title="search1"]' ); ?>
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
			<div class="row menu-cntnt">
					<div class="data col-xl-11 col-lg-11 col-md-11 col-sm-11">
				<?php
					if ( have_posts() ) :
							$content = apply_filters( 'the_content', get_the_content() );
							echo $content;
					else :
						_e( '<span class="not-found">Sorry, no posts matched your criteria in Sophia laser & Spa clinic website.</span>', 'devhub' );
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
