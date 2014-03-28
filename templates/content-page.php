<?php
/**
 * the template part for standard pages
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>
	<header class="entry-header">
		<span class="entry-title">
			<h1><?php the_title(); ?></h1>
		</span>
	</header>

	<section class="entry-content">
	
		<?php 
			// display page content with pages if necessary
			the_content(); 
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'pdt' ),
				'after'  => '</div>',
			) );
		?>
		
	</section>
</article>
