<?php
/**The template part for displaying a message that posts cannot be found
 * @package WordPress
 * @subpackage IP_Site
 * @since IP Site 1.0 */
?>
<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php _e( 'Nothing Found', 'ipsite' ); ?></h1>
	</header><!-- .page-header -->
	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
			<p><?php printf( __( '<a href="%1$s">Create a post</a>.', 'ipsite' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
		<?php elseif ( is_search() ) : ?>
			<p><?php _e( 'Nothing matched your search terms.', 'ipsite' ); ?></p>
			<?php get_search_form(); ?>
		<?php else : ?>
			<p><?php _e( 'Nothing found.', 'ipsite' ); ?></p>
			<?php get_search_form(); ?>
		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->