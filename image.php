<?php
/**The template for displaying image attachments
 * @package WordPress
 * @subpackage IP_Site
 * @since IP Site 1.0 */
get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<nav id="image-navigation" class="navigation image-navigation">
						<div class="nav-links">
							<div class="nav-previous"><?php previous_image_link( false, __( 'Previous Image', 'ipsite' ) ); ?></div>
							<div class="nav-next"><?php next_image_link( false, __( 'Next Image', 'ipsite' ) ); ?></div>
						</div><!-- .nav-links -->
					</nav><!-- .image-navigation -->
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->
					<div class="entry-content">
						<div class="entry-attachment">
							<?php
								/**Filter the default ipsite image attachment size.
								 * @since IP Site 1.0
								 * @param string $image_size Image size. Default 'large'. */
								$image_size = apply_filters( 'ipsite_attachment_size', 'large' );
								echo wp_get_attachment_image( get_the_ID(), $image_size );
							?>
							<?php ipsite_excerpt( 'entry-caption' ); ?>
						</div><!-- .entry-attachment -->
						<?php
							the_content();
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
							$metadata = wp_get_attachment_metadata(); // Retrieve attachment metadata.
							if ( $metadata ) {
								printf( '<span class="full-size-link"><span class="screen-reader-text">%1$s </span><a href="%2$s">%3$s &times; %4$s</a></span>',
									esc_html_x( 'Full size', 'Used before full size attachment link.', 'ipsite' ),
									esc_url( wp_get_attachment_url() ),
									absint( $metadata['width'] ),
									absint( $metadata['height'] )
								);
							}
						?>
						<?php
							edit_post_link(
								sprintf( /* translators: %s: Name of current post */
									__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'ipsite' ),
									get_the_title()
								),
								'<span class="edit-link">',
								'</span>'
							);
						?>
					</footer><!-- .entry-footer -->
				</article><!-- #post-## -->
				<?php
					if ( comments_open() || get_comments_number() ) { // Load up the comment template.
						comments_template();
					}
					the_post_navigation( array( // Parent post navigation
						'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'ipsite' ),
					) );
				endwhile; ?>
		</main><!-- .site-main -->
	</div><!-- .content-area -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>