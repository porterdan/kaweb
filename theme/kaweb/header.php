<?php
/**
 * Theme Header
 *
 * This template contains everything up to the main content area tag.
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<title><?php wp_title();?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<div id="header-main" class="site">
		<header id="masthead" class="site-header" role="banner">
			<div class="nav-container">
				
				<div class="container nav-bar">
					<div class="row">
						
						<div id="site-logo" class="col col-12 col-md-3 text-center text-md-start">
							<a href="<?php echo home_url();?>"><img src="<?php echo get_template_directory_uri();?>/inc/images/klogo.png" alt="Kaweb"/></a>
						</div>

						<nav id="site-navigation" class="col col-12 col-md-9 navbar navbar-expand-xs navbar-light main-navigation justify-content-center justify-content-md-end">

							<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
								<span class="navbar-toggler-icon"></span>
							</button>

							<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

								<div class="offcanvas-header">
									<img src="<?php echo get_template_directory_uri();?>/inc/images/klogo.png" alt="Kaweb" class="text-center mt-10" style="max-width:100px"/>
									<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
								</div>

								<div class="offcanvas-body">
									<?php wp_nav_menu( array( 
										'menu_id' => 'main-navigation',
										'theme_location' => 'main-nav', 
										'container_class'=> 'ms-auto ',
										'menu_class'=>'navbar-nav' ) );
										?>
									</div>

								</div>
							</nav><!-- #site-navigation -->

						</div>				
					</div>
				</div>

			</div>

		</header><!-- #masthead -->
		<div id="main-container">
