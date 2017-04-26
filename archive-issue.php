<?php
/**The template for displaying archive pages
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package WordPress
 * @subpackage IP_Site
 * @since IP Site 1.0 */
get_header(); ?>
	<div id="primary" class="content-area-fullpage">
		<main id="main" class="site-main no-sidebar" role="main">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post();
				ipsite_post_thumbnail();
				the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );
			endwhile;
			the_posts_pagination( array( // Previous/next page navigation.
				'prev_text'          => __( 'Previous page', 'ipsite' ),
				'next_text'          => __( 'Next page', 'ipsite' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'ipsite' ) . ' </span>',
			) );
		else : // If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content', 'none' );
		endif; ?>
		</main><!-- .site-main -->
	</div><!-- .content-area -->
<?php get_footer(); ?>