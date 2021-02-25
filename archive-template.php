<?php
/**
 * Template Name: Archive Template
 *
 * @package    Arke
 * @copyright  Copyright (c) 2018, Danny Cooper
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

get_template_part( 'header' );
?>
				<header>
					<h1 class="archives__heading"><?php single_post_title(); ?></h1>
				</header>

				<?php

				$args = array(
					'post_type'      => 'post',
					'post_status'    => 'publish',
					'posts_per_page' => -1,
				);

				$arke_posts = new WP_Query( $args );

				if ( $arke_posts->have_posts() ) :

					echo '<ul class="archives__list">';

					while ( $arke_posts->have_posts() ) :
						$arke_posts->the_post();

						echo '<li><a href="' . esc_url( get_the_permalink() ) . '">' . get_the_title() . '</a><span>' . esc_attr( get_the_time( 'F j, Y' ) ) . '</span></li>';

					endwhile;

					echo '</ul>';

					wp_reset_postdata();

				else :
						echo '<p>' . esc_html__( 'Sorry, no posts matched your criteria.', 'arke' ) . '</p>';
				endif;
				?>


				</div><!-- .content-area -->
		</div><!-- .site-content -->
		<footer class="site-footer">
				<?php
				// translators: %1$s: theme name.
				// translators: %2$s: theme author.
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'arke' ), '<a href="https://wordpress.org/themes/arke/">Arke</a>', 'Danny Cooper' );
				?>
		</footer><!-- .site-footer -->
		<?php wp_footer(); ?>
	</body>
</html>
