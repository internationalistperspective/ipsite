<?php
/**The template for displaying all single posts and attachments
 * @package WordPress
 * @subpackage IP_Site
 * @since IP Site 1.0 */
get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); 
			get_template_part( 'template-parts/content', 'single' ); 
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
			if ( is_singular( 'attachment' ) ) { // Parent post navigation.
				the_post_navigation( array(
					'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'ipsite' ),
				) );
			} elseif ( is_singular( 'post' ) ) { // Previous/next post navigation.
				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'ipsite' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Next post:', 'ipsite' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'ipsite' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Previous post:', 'ipsite' ) . '</span> ' .
						'<span class="post-title">%title</span>',
				) );
			}
		endwhile; ?>
	</main><!-- .site-main -->
	<?php get_sidebar( 'content-bottom' ); ?>
</div><!-- .content-area -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>