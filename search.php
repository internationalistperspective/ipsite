<?php
/**The template for displaying search results pages
 * @package WordPress
 * @subpackage IP_Site
 * @since IP Site 1.0 */
get_header(); ?>
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'ipsite' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
			</header><!-- .page-header -->
			<?php while ( have_posts() ) : the_post();
				/**Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead. */
				get_template_part( 'template-parts/content', 'search' );
			endwhile;
			the_posts_pagination( array( // Previous/next page navigation.
				'prev_text'          => __( 'Previous page', 'ipsite' ),
				'next_text'          => __( 'Next page', 'ipsite' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'ipsite' ) . ' </span>',
			) );
		else : // If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
		</main><!-- .site-main -->
	</section><!-- .content-area -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>