<?php
/**The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * @link http://codex.wordpress.org/Template_Hierarchy
 * @package WordPress
 * @subpackage IP_Site
 * @since IP Site 1.0  */
get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php if ( have_posts() ) : ?>
			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>
			<?php while ( have_posts() ) : the_post();
				/* Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead. */
				get_template_part( 'template-parts/content', get_post_format() );
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
<?php get_sidebar(); ?>
<?php get_footer(); ?>