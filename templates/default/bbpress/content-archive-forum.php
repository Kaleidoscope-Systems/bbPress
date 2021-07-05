<?php

/**
 * Archive Forum Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>

<div id="bbpress-forums" class="bbpress-wrapper">

	<?php
		$redirect_to = '/forums';
	if ( is_user_logged_in() ) { ?>
	<img id="forum-header-image" align="center" src="https://antiochfc.org/wp-content/uploads/2021/07/Forums-Header.png" />
	<img id="forum-header-image-mobile" align="center" src="https://antiochfc.org/wp-content/uploads/2021/07/Forums-Header-Mobile-1.png" />
	<div id="forum-header-buttons">
	<a class="forum-header-button-item" href="https://antiochfc.org/groups"><button class="button av_font_icon" style="width: inherit" data-av_icon="" data-av_iconfont="entypo-fontello"> Find My Life Group</button></a>
	<a class="forum-header-button-item" href="<?php echo wp_logout_url( $redirect_to ); ?>"><button class="button av_font_icon" style="width: inherit" data-av_icon="" data-av_iconfont="entypo-fontello"> Log Out</button></a>
	<a class="forum-header-button-item" href="<?php bbp_user_profile_url( bbp_get_current_user_id() ); ?>"><button class="button av_font_icon" style="width: inherit" data-av_icon="" data-av_iconfont="entypo-fontello"> My Profile</button></a>
	</div>
	<?php
	} else {
		/* 3883 is the ID of the /forums page. Change this number if you want to display content from a different page. */
	echo get_post_field('post_content', 3883);
	}
	?>

	<?php bbp_get_template_part( 'form', 'search' ); ?>

	<?php bbp_breadcrumb(); ?>

	<?php bbp_forum_subscription_link(); ?>

	<?php do_action( 'bbp_template_before_forums_index' ); ?>

	<?php if ( bbp_has_forums() ) : ?>

		<?php bbp_get_template_part( 'loop',     'forums'    ); ?>

	<?php else : ?>

		<?php bbp_get_template_part( 'feedback', 'no-forums' ); ?>

	<?php endif; ?>

	<?php do_action( 'bbp_template_after_forums_index' ); ?>

</div>
