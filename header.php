<?php
/**
 * the template for the document <head>
 */
$title = get_bloginfo('name');
$tagline = get_bloginfo('description');
$char = get_bloginfo('charset');
$ping = get_bloginfo('pingback_url');
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php echo $char; ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>
		
		<?php 
			// page title configuration
			echo
			wp_title( '|', true, 'right' ),
			$title,

			// Add the blog description for the home/front page.
			(!empty($tagline) && (is_home() || is_front_page()) ? " | $tagline" : ''),

			// Add a page number if necessary:
			($paged >= 2 || $page >= 2 ? ' | ' . sprintf(__('Page %s', 'sdm'), max($paged, $page)) : ''); 
		?>
		
		</title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php echo $ping; ?>" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		
		<?php // site wide ehader area ?>
		<div class="header-area full">
			<div class="main">
				<header class="site-header inner">
					<span class="site-title">
						<?php if ( get_theme_mod( 'sdm_logo' ) ) : ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<img src="<?php echo get_theme_mod( 'sdm_logo' ); ?>" alt="<?php echo esc_attr( $title ); ?>">
							</a>
						<?php else : ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( $title ); ?>">
								<?php echo $title; ?>
							</a>
						<?php endif; ?>
					</span>
					<h1 class="site-description"><?php echo $tagline; ?></h1>
					<div class="social-nav">
				
						<?php 
							/**
							 * Built into the Customizer are a fields for social profiles. 
							 * Using the following array, check to see if the field
							 * has a URL. If so, create a link for that profile in the post
							 * footer. If not, do nothing.
							 */
							$profiles_menu = array( 
								'twitter'	=> array(
									'name' 		=> 'Twitter',
									'option'	=> get_theme_mod( 'sdm_twitter' ),
									'icon'		=> '<i class="fa fa-twitter"></i>'
								),
								'facebook'	=> array(
									'name' 		=> 'Facebook',
									'option'	=> get_theme_mod( 'sdm_facebook' ),
									'icon'		=> '<i class="fa fa-facebook-square"></i>'
								),
								'gplus'	=> array(
									'name' 		=> 'Google+',
									'option'	=> get_theme_mod( 'sdm_gplus' ),
									'icon'		=> '<i class="fa fa-google-plus-square"></i>'
								),
								'github'	=> array(
									'name' 		=> 'Github',
									'option'	=> get_theme_mod( 'sdm_github' ),
									'icon'		=> '<i class="fa fa-github-alt"></i>'
								),
							);
							// Build the social networking profile links based on the $social_profiles
							foreach ( $profiles_menu as $profile ) {
								if ( '' != $profile[ 'option' ] ) :
									echo '<a class="social-nav-item" href="', $profile[ 'option' ], '" title="', $profile[ 'name' ], '">', $profile[ 'icon' ], '</a>'; 
								endif;
							}
						?>
						
					</div>
				</header>
			</div>
		</div>
	
		<?php // site wide main menu area ?>
		<div class="menu-area full">
			<div class="main">
				<nav id="site-navigation" class="main-navigation menu inner clear-sdm" role="navigation">
					<?php
						// main menu configuration 
						$menu_args = array( 
							'theme_location' => 'main',
							'container_class' => 'main-menu',
							'fallback_cb' => '' 
						);
						wp_nav_menu( $menu_args );
					?>
					<div class="search-container">
						<?php get_search_form(); ?>
					</div>
				</nav>
			</div>
		</div>
	
		<?php // site wide feature box area ?>
		<div class="feature-area full">
			<div class="main">
				<div class="feature-box inner clear-sdm">
					<?php
						// call the templates/content-feature-box.php
						get_template_part( 'templates/content', 'feature-box' );
					?>
				</div>
			</div>
		</div>
		
		<?php // site wide content area... closes in footer.php ?>
		<div class="content-area full">
			<div class="main">
				<div class="site-content clear-sdm">