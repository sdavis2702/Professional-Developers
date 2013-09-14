<?php
/**
 * the front page sidebar widget area
 */
?>

<div class="sidebar">

	<?php do_action( 'before_sidebar' ); ?>
	
	<?php 
	if ( is_active_sidebar( 'sidebar-front' ) ) :
		dynamic_sidebar( 'sidebar-front' );
	else :
		dynamic_sidebar( 'sidebar-primary' );		
	endif;
	?>
	
</div>