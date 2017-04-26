<?php
/**The template part for displaying single issues
 * @package WordPress
 * @subpackage IP_Site
 * @since IP Site 1.0 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header no-sidebar">
	</header><!-- .entry-header -->
	<!-- <div class="entry-content"> -->
	<div class="entry-content no-sidebar">
		<div><?php the_title( '<h3 class="entry-title">', '</h3>' ); ?></div>
		<div><?php ipsite_post_thumbnail(); ?></div>
		<?php
			$issue_terms = wp_get_object_terms( $post->ID,  'category' );
			if ( ! empty( $issue_terms ) ) {
				if ( ! is_wp_error( $issue_terms ) ) {
					$category = (string) $issue_terms[0]->name;
					$args = array(
      					'post_type' => 'article',
      					'orderby' => 'menu_order',
      					'order'		=> 'ASC',
      					'tax_query' => array(
        					array(
          						'taxonomy' => 'category',
          						'field' => 'slug',
          						'terms' => $category,
        					),
      					),
    				);
					$query = new WP_Query( $args );
					if( $query->have_posts() ) {
						echo '<div>';
						while( $query->have_posts() ) {
							$query->the_post();
							echo '<div>';
							echo '<h4 class="entry-title"><a href="';
							echo the_permalink(); 
							echo '">';
							echo the_title();
							echo '</a></h4>';
							echo '</div><div>';
							echo the_excerpt();
							echo '</div>';
						}
						echo '</div>';
					}
				}
			}
			//$category = get_the_category();
			/*
    		$query = new WP_Query( $args );
    		if( $query->have_posts() ) {
    			echo '<ul>';
    			while( $products->have_posts() ) {
    				$products->the_post();
    				echo '<li>' . the_title() . '</li>';
    				//<h3><?php the_title() </h3>
    			}
    			echo '</ul>';
    		}*/
		?>

		<?php
			//the_content();
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'ipsite' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'ipsite' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
			if ( '' !== get_the_author_meta( 'description' ) ) {
				get_template_part( 'template-parts/biography' );
			}
		?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php ipsite_entry_meta(); ?>
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