<?php

  if ( post_password_required() ) return; // if access denied
  if ( !comments_open() && !get_comments_number() ) return; // if closed and no comments
  if ( $post && !post_type_supports($post->post_type, 'comments')) return; // if no support
  
?>

<div class="clear fat"></div>
<div class="post group wrap">

  <hr class="nopad"><br>

  <?php if ( have_comments() ) : // if there are comments ?>

    <h3><strong><?php _e( 'Discussion', A_DOMAIN ) ?></strong></h3>

    <ol class="items posts commentlist">
    <?php wp_list_comments( array( 'callback' => 'comment_cb', 'style' => 'ol', 'type' => 'comment', 'max_depth' => 1, 'per_page' => -1 ) ); ?>
    </ol><!-- /commentlist -->

    <div class="clear fat"></div>
    <hr>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
      <?php $l = get_previous_comments_link(__('Older Comments', A_DOMAIN )); if ($l) : ?>
      <div class="clear"></div>
      <p>&larr; <?php echo $l ?></p></div>
      <?php endif; ?>
    <?php endif; // check for comment navigation ?>

    <?php if ( !comments_open() && get_comments_number() ) : // If there are no comments and comments are closed, let's leave a note ?>
    <p class="nocomments"><?php _e( 'Comments are closed for now.', A_DOMAIN ); ?></p>
    <?php endif; ?>

  <?php endif; // /have_comments()


/*--------------------------------------------------------------------------
  Comment Form
/*------------------------------------------------------------------------*/

  if ( comments_open() ) :

    $args = array(
      'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="5" aria-required="true"></textarea></p>',
      'must_log_in' => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', A_DOMAIN ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
      'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out &raquo;</a>', A_DOMAIN ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
      'comment_notes_before' => '',
      'comment_notes_after' => '',
      'title_reply' => __('Leave a Reply', A_DOMAIN),
      'title_reply_to' => __('Leave a Reply to %s', A_DOMAIN),
      'cancel_reply_link' => __('Cancel Reply', A_DOMAIN),
      'label_submit' => __('Submit Comment', A_DOMAIN)
    );

    add_action('comment_form_before', 'a_comment_form_before');
    add_action('comment_form_after', 'a_comment_form_after');
    comment_form($args); 

  endif; // end if comments open check ?>

</div><!-- /.post.group -->

<?php


/*--------------------------------------------------------------------------
  Custom Action Hooks
/*------------------------------------------------------------------------*/

function a_comment_form_before() { echo '<div class="fieldset">'; }
function a_comment_form_after() { echo '</div>'; }


/*--------------------------------------------------------------------------
  Comment Styling (Callback Function)
/*------------------------------------------------------------------------*/

function comment_cb ( $comment, $args, $depth ) {
  
  static $count; $third = (++$count%3 === 0);

  $GLOBALS['comment'] = $comment; ?>

  <li <?php comment_class() ?> id="comment-<?php comment_ID() ?>">

    <h4 class="bottom-pad"><span><?php printf('%1$02d', $count) ?>. </span><span><?php comment_author_link() ?></span> <span class="edit"><?php edit_comment_link( __( '(edit)', A_DOMAIN ) ) ?></span></h4>
    
    <?php if (!$comment->comment_approved) : ?>
    <p class="moderation"><?php _e( 'Your comment is awaiting moderation.', A_DOMAIN ) ?></p>
    <?php endif; ?>
    
    <?php comment_text() ?>

  <?php if ($third) : ?>
  </li><li class="clear">
  <?php endif; ?>

  <?php  // <li> will be auto-closed!
}
