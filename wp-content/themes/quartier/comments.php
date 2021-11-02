<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<div class="group-title text-uppercase">
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				$comments_number = get_comments_number();
				if ( '1' === $comments_number ) {
					/* translators: %s: post title */
					printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'twentyseventeen' ), get_the_title() );
				} else {
					printf(
						/* translators: 1: number of comments, 2: post title */
						_nx(
							'%1$s Reply to &ldquo;%2$s&rdquo;',
							'%1$s'. _e('Commentaires ') .'&ldquo;%2$s&rdquo;',
							$comments_number,
							'comments title',
							'twentyseventeen'
						),
						number_format_i18n( $comments_number ),
						get_the_title()
					);
				}
			?>
		</h2>
	</div>

		<div class="comment-list comments-area">
			<div class="comment-box">
				<?php
					wp_list_comments( 'type=comment&callback=mytheme_comment' );
				?>
			</div>
		</div>

		<?php the_comments_pagination( array(
			'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous', 'twentyseventeen' ) . '</span>',
			'next_text' => '<span class="screen-reader-text">' . __( 'Next', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
		) );

	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php _e( 'Comments are closed.', 'twentyseventeen' ); ?></p>

	<?php
	endif;
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
		$fields = array(
				'author' =>
				    '<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 form-group"><label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' .
				    ( $req ? '<span class="required">*</span>' : '' ) .
				    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
				    '" size="30"' . $aria_req . ' /></div>',

				  'email' =>
				    '<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 form-group"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
				    ( $req ? '<span class="required">*</span>' : '' ) .
				    '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
				    '" size="30"' . $aria_req . ' /></div>',

				  'url' =>
				    '<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 form-group"><label for="url">' . __( 'Website', 'domainreference' ) . '</label>' .
				    '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
				    '" size="30" /></div>'
				    );
		$comments_args = array(
		        // change the title of send button 
		        'label_submit'=>'Envoyer',
		        // change the title of the reply section
		        'title_reply'=>'Commentez',
		        // remove "Text or HTML to be displayed after the set of comment fields"
		        'comment_notes_after' => '',
		        // redefine your own textarea (the comment body)
				'title_reply_before' => '<div class="group-title text-uppercase"><h2 id="reply-title" class="comment-reply-title">',
				'title_reply_after' => '</h2></div>',
				'class_submit' => 'theme-btn btn-style-two',
				'comment_field' =>  '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group form-group comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) .
			    '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
			    '</textarea></div>',
				'fields' => apply_filters( 'comment_form_default_fields', $fields )
		);
?>
	<div class="comment-form wow fadeInUp">
		<div class="row clearfix">
			<?php
					comment_form($comments_args);
				?>
			</div>
		</div>
</div><!-- #comments -->
