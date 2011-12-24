<?php

if ( post_password_required() ) : ?>
	<p><?php _e('Enter your password to view comments.'); ?></p>
<?php return; endif; ?>

<h2><?php comments_number(__('No Comments'), __('1 Comment'), __('% Comments')); ?>
	<?php if ( comments_open() ) : ?>
		<a href="#postcomment" title="<?php _e("Leave a comment"); ?>">&raquo;</a>
	<?php endif; ?></h2>

<?php if ( $comments ) : ?>
	<ol id="commentlist">
		<?php foreach ($comments as $comment) : ?>
			<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
				<?php echo get_avatar( $comment, 48 ); ?>
				<div id="comment-text"><div class="comment-author"><em><?php comment_author_link() ?> wrote:</em></div><?php comment_text() ?></div>
				<cite><?php comment_type(_c('Comment|noun'), __('Trackback'), __('Pingback')); ?>  &#8212; <?php comment_date() ?> @ <a href="#comment-<?php comment_ID() ?>"><?php comment_time() ?></a> <?php edit_comment_link(__("Edit This"), '| '); ?></cite>
				<div class="clearfix"></div>
			</li>
		<?php endforeach; ?>
	</ol>
<?php elseif ( comments_open() ) : // If there are no comments yet ?>
	<p id="no-comments"><?php _e('No comments yet.'); ?><br /><a href="#postcomment" title="<?php _e("Leave a comment"); ?>">Start the conversation by leaving a comment!</a></p>
<?php else : // No comments, not open. ?>
	<p id="no-comments"><?php _e('No comments.'); ?></p>
<?php endif; ?>


<!-- <p><?php post_comments_feed_link(__('<abbr title="Really Simple Syndication">RSS</abbr> feed for comments on this post.')); ?>
<?php if ( pings_open() ) : ?>
	<a href="<?php trackback_url() ?>" rel="trackback"><?php _e('TrackBack <abbr title="Universal Resource Locator">URL</abbr>'); ?></a>
<?php endif; ?>
</p> -->

<?php if ( comments_open() ) : ?>

	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
		<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.'), get_option('siteurl')."/wp-login.php?redirect_to=".urlencode(get_permalink()));?></p>
	<?php else : ?>
		<h2 id="postcomment"><?php _e('Leave a comment'); ?></h2>
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">		
		<?php if ( $user_ID ) : ?>
			<p id="loggedin"><?php printf(__('Logged in as %s.'), '<a href="'.get_option('siteurl').'/wp-admin/profile.php">'.$user_identity.'</a>'); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account') ?>"><?php _e('Log out &raquo;'); ?></a></p>
		<?php else : ?>
			<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
			<label for="author"><small><?php _e('Name'); ?> <?php if ($req) _e('(required)'); ?></small></label></p>
			<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
			<label for="email"><small><?php _e('Mail (will not be published)');?> <?php if ($req) _e('(required)'); ?></small></label></p>
			<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
			<label for="url"><small><?php _e('Website'); ?></small></label></p>
		<?php endif; ?>

			<!--<p><small><strong>XHTML:</strong> <?php printf(__('You can use these tags: %s'), allowed_tags()); ?></small></p>-->
			<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>
			<p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php echo attribute_escape(__('Submit Comment')); ?>" />
			<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></p>
	
		<?php do_action('comment_form', $post->ID); ?>

			<div class="clear"></div>
		</form>
	<?php endif; // If registration required and not logged in ?>

<?php else : // Comments are closed ?>

<?php endif; ?>