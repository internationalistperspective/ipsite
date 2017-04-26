<?php
/**The template part for displaying content
 * @package WordPress
 * @subpackage IP_Site
 * @since IP Site 1.0 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php ipsite_post_thumbnail(); ?>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<span class="sticky-post"><?php _e( 'Featured', 'ipsite' ); ?></span>
		<?php endif; ?>
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php 
			the_content( sprintf( /* translators: %s: Name of current post */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'ipsite' ),
				get_the_title()
			) );
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'ipsite' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'ipsite' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php ipsite_entry_meta(); ?>
		<?php 
			edit_post_link( 
				sprintf( /* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'ipsite' ), get_the_title() ),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->