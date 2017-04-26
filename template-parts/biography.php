<?php
/**The template part for displaying an Author biography
 * @package WordPress
 * @subpackage IP_Site
 * @since IP Site 1.0 */
?>
<div class="author-info">
	<div class="author-description">
		<h2 class="author-title"><span class="author-heading"><?php _e( 'Author:', 'ipsite' ); ?></span> <?php echo get_the_author(); ?></h2>
	</div><!-- .author-description -->
</div><!-- .author-info -->