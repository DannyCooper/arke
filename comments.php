<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link       https://codex.wordpress.org/Template_Hierarchy
 *
 * @package    Arke
 * @copyright  Copyright (c) 2018, Danny Cooper
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
} ?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h4 class="comments-title">
			<?php
				$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				// translators: %s: post title.
				printf( esc_html_x( 'One Comment', 'comments title', 'arke' ), get_the_title() );
			} else {
				printf(
					/* translators: 1: number of comments, 2: post title */
					esc_html( _nx(
						'%1$s Comment;',
						'%1$s Comments',
						$comments_number,
						'comments title',
						'arke'
					) ),
					esc_html( number_format_i18n( $comments_number ) ),
					get_the_title()
				);
			}
			?>
		</h2><!-- .comments-title -->

		<ol class="comment-list">
			<?php wp_list_comments(); ?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>

			<nav id="comment-nav-below" class="navigation comment-navigation clear">
				<div class="nav-links">

					<div class="nav-previous">
						<?php previous_comments_link( esc_html__( '&larr; Older Comments', 'arke' ) ); ?>
					</div>
					<div class="nav-next">
						<?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'arke' ) ); ?>
					</div>

				</div><!-- .nav-links -->
			</nav><!-- #comment-nav-below -->

		<?php endif; // Check for comment navigation. ?>

		<?php if ( ! comments_open() ) : // If comments are closed and there are comments, output a message? ?>

			<p class="no-comments">
				<?php esc_html_e( 'Comments are closed.', 'arke' ); ?>
			</p>

		<?php
		endif;

	endif; // Check for have_comments().

	comment_form();
	?>

</div><!-- #comments -->
