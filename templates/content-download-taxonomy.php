<?php
/**
 * the template part for download categories and tags
 *****
 ***** THIS TEMPLATE IS ALMOST EXACTLY THE SAME AS THE content-store-front.php
 ***** TEMPLATE. BE SURE TO MAKE CHANGES TO BOTH TEMPLATES IF YOU EDIT ONE.
 *****
 */
if ( have_posts() ) { $i = 1; ?>
	<div class="store-info">
		<?php if ( get_theme_mod( 'pdt_edd_store_archives_title' ) ) : ?>
			<h1 class="store-title"><?php echo get_theme_mod( 'pdt_edd_store_archives_title' ); ?></h1>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'pdt_edd_store_archives_description' ) ) : ?>
			<div class="store-description">
				<?php echo wpautop( get_theme_mod( 'pdt_edd_store_archives_description' ) ); ?>
			</div>
		<?php endif; ?>
	</div>
	<div class="store-front clear-pdt">
		<?php while ( have_posts() ) : the_post(); ?>			
			<div class="threecol product">
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="product-image">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail( 'product-img' ); ?>
						</a>
					</div>
				<?php endif; ?>
				<div class="product-description">
					<a class="product-title" href="<?php the_permalink(); ?>">
						<?php the_title( '<h3>', '</h3>' ); ?>
					</a>
					<div class="product-info">
						<?php the_excerpt(); ?>
					</div>
				</div>
				<?php if ( get_theme_mod( 'pdt_product_view_details' ) ) : ?>
					<a class="view-details" href="<?php the_permalink(); ?>"><?php echo get_theme_mod( 'pdt_product_view_details' ); ?></a>
				<?php endif; ?>
			</div>

			<?php $i+=1; ?>
		<?php endwhile; ?>
	</div>			
	<div class="store-pagination">
		<?php 					
			$big = 999999999; // need an unlikely intege					
			echo paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var( 'paged' ) ),
				'total' => $wp_query->max_num_pages
			) );
		?>
	</div>
	<?php
} else { ?>
	<h2 class="center"><?php _e( 'Not Found', 'pdt' ); ?></h2>
	<p class="center"><?php _e( 'Sorry, but you are looking for something that isn\'t here.', 'pdt' ); ?></p>
	<?php
	get_search_form();
}