<?php get_header() ?>

	<div id="container">
		<div id="content">

<?php the_post() ?>

			<div id="nav-above" class="navigation">
				<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">&laquo;</span> %title' ) ?></div>
				<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">&raquo;</span>' ) ?></div>
			</div>

			<div id="post-<?php the_ID() ?>" class="<?php sandbox_post_class() ?>">
				<h2 class="entry-title"><?php the_title() ?></h2>
				<div class="entry-content">
<?php the_content() ?>
<!-- META HERE -->

	<div>

	<ul>

	<?php if (get_post_meta($post->ID,'Typ',true)) : echo "<li>Typ: " . get_post_meta($post->ID,'Typ',true) . "</li>"; ?>
	<?php endif;	?>

	<?php if (get_post_meta($post->ID,'Komponerad av',true)) : echo "<li>Komponerad av: " . get_post_meta($post->ID,'Komponerad av',true) . "</li>"; ?>
	<?php endif;	?>

	<?php if (get_post_meta($post->ID,'Efter',true)) : echo "<li>Efter: " . get_post_meta($post->ID,'Efter',true) . "</li>"; ?>
	<?php endif;	?>

	<?php if (get_post_meta($post->ID,'Ort',true)) : echo "<li>Ort: " . get_post_meta($post->ID,'Ort',true) . "</li>"; ?>
	<?php endif;	?>

	<?php if (get_post_meta($post->ID,'Landskap, Land',true)) : echo "<li>Landskap (Land): " . get_post_meta($post->ID,'Landskap, Land',true) . "</li>"; ?>
	<?php endif;	?>
	</ul>

	<?php if (get_post_meta($post->ID,'URL1',true)) :
	echo "<p>Melodi:<br/><a class='audio' style='display:block;width:750px;height:30px; background-color: #cccccc;' href='" . get_post_meta($post->ID,'URL1',true) . "'>" . get_post_meta($post->ID,'URL1',true) . "</a></p>"; ?>
	<?php endif;	?>

	<?php if (get_post_meta($post->ID,'URL2',true)) :
	echo "<p>Andrastämma:<br/><a class='audio' style='display:block;width:750px;height:30px; background-color: #cccccc;' href='" . get_post_meta($post->ID,'URL2',true) . "'>" . get_post_meta($post->ID,'URL2',true) . "</a></p>"; ?>
	<?php endif;	?>

	<?php if (get_post_meta($post->ID,'URL-K',true)) :
	echo "<p>Komp:<br/><a class='audio' style='display:block;width:750px;height:30px; background-color: #cccccc;' href='" . get_post_meta($post->ID,'URL-K',true) . "'>" . get_post_meta($post->ID,'URL-K',true) . "</a></p>"; ?>
	<?php endif;	?>

	<?php if (get_post_meta($post->ID,'URL-B',true)) :
	echo "<p>Basstämma:<br/><a class='audio' style='display:block;width:750px;height:30px; background-color: #cccccc;' href='" . get_post_meta($post->ID,'URL-B',true) . "'>" . get_post_meta($post->ID,'URL-B',true) . "</a></p>"; ?>
	<?php endif;	?>

	<?php if (get_post_meta($post->ID,'URL-T',true)) :
	echo "<p>Text:<br/><a class='audio' style='display:block;width:750px;height:30px; background-color: #cccccc;' href='" . get_post_meta($post->ID,'URL-T',true) . "'>" . get_post_meta($post->ID,'URL-T',true) . "</a></p>"; ?>
	<?php endif;	?>

	<?php if (get_post_meta($post->ID,'URL-A',true)) :	
	echo "<p>Arrangemang:<br/><a class='audio' style='display:block;width:750px;height:30px; background-color: #cccccc;' href='" . get_post_meta($post->ID,'URL-A',true) . "'>" . get_post_meta($post->ID,'URL-A',true) . "</a></p>"; ?>
	<?php endif;	?>
	</div>

<!-- END META HERE -->

<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'sandbox' ) . '&after=</div>') ?>
				</div>
				<div class="entry-meta">
					<?php printf( __( 'This entry was written by %1$s, posted on <abbr class="published" title="%2$sT%3$s">%4$s at %5$s</abbr>, filed under %6$s%7$s. Bookmark the <a href="%8$s" title="Permalink to %9$s" rel="bookmark">permalink</a>. Follow any comments here with the <a href="%10$s" title="Comments RSS to %9$s" rel="alternate" type="application/rss+xml">RSS feed for this post</a>.', 'sandbox' ),
						'<span class="author vcard"><a class="url fn n" href="' . get_author_link( false, $authordata->ID, $authordata->user_nicename ) . '" title="' . sprintf( __( 'View all posts by %s', 'sandbox' ), $authordata->display_name ) . '">' . get_the_author() . '</a></span>',
						get_the_time('Y-m-d'),
						get_the_time('H:i:sO'),
						the_date( '', '', '', false ),
						get_the_time(),
						get_the_category_list(', '),
						get_the_tag_list( __( ' and tagged ', 'sandbox' ), ', ', '' ),
						get_permalink(),
						the_title_attribute('echo=0'),
						comments_rss() ) ?>

<?php if ( ('open' == $post->comment_status) && ('open' == $post->ping_status) ) : // Comments and trackbacks open ?>
					<?php printf( __( '<a class="comment-link" href="#respond" title="Post a comment">Post a comment</a> or leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'sandbox' ), get_trackback_url() ) ?>
<?php elseif ( !('open' == $post->comment_status) && ('open' == $post->ping_status) ) : // Only trackbacks open ?>
					<?php printf( __( 'Comments are closed, but you can leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'sandbox' ), get_trackback_url() ) ?>
<?php elseif ( ('open' == $post->comment_status) && !('open' == $post->ping_status) ) : // Only comments open ?>
					<?php _e( 'Trackbacks are closed, but you can <a class="comment-link" href="#respond" title="Post a comment">post a comment</a>.', 'sandbox' ) ?>
<?php elseif ( !('open' == $post->comment_status) && !('open' == $post->ping_status) ) : // Comments and trackbacks closed ?>
					<?php _e( 'Both comments and trackbacks are currently closed.', 'sandbox' ) ?>
<?php endif; ?>
<?php edit_post_link( __( 'Edit', 'sandbox' ), "\n\t\t\t\t\t<span class=\"edit-link\">", "</span>" ) ?>

				</div>
			</div><!-- .post -->

			<div id="nav-below" class="navigation">
				<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">&laquo;</span> %title' ) ?></div>
				<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">&raquo;</span>' ) ?></div>
			</div>

<?php comments_template() ?>

		</div><!-- #content -->
	</div><!-- #container -->

<?php get_sidebar() ?>
<?php get_footer() ?>