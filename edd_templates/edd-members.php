<?php
/*
 * Template Name: EDD Members
 */
get_header();
	?>
	<div class="store-content">	
		<?php 
			while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'pdt-members' ); ?>>	
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header>
					<div class="entry-content">
						<?php
							the_content();
							echo do_shortcode( '[purchase_history]' );
							echo do_shortcode( '[edd_profile_editor]' );
						?>
					</div>
				</article>		
				<?php
			endwhile;
		?>	
	</div>
	<?php
get_footer();