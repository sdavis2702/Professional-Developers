<?php
/*
 * Template Name: EDD Purchase Confirmation
 */
 ?>

<?php get_header(); ?>

<div class="store-content">

	<?php 
		// start the loop
		while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'edd-members' ); ?>>	
				<header class="entry-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header>
				<div class="entry-content">
					<?php the_content(); ?>		
				</div>
			</article>
		
		<?php
		endwhile; // end the loop
	?>

</div>

<?php get_footer(); ?>