<?php get_header() ?>

	<div id="container">
		<div id="content">

			<div id="nav-above" class="navigation">
<?php if(function_exists('wp_page_numbers')) { wp_page_numbers(); } ?>
			</div>

<?php while ( have_posts() ) : the_post() ?>

			<div id="post-<?php the_ID() ?>" class="<?php sandbox_post_class() ?>">
				<h2 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php printf( __('Permalink to %s', 'sandbox'), the_title_attribute('echo=0') ) ?>" rel="bookmark"><?php the_title() ?></a></h2>
				<div class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php unset($previousday); printf( __( '%1$s &#8211; %2$s', 'sandbox' ), the_date( '', '', '', false ), get_the_time() ) ?></abbr></div>
				<div class="entry-content">
<?php the_content( __( 'Read More <span class="meta-nav">&raquo;</span>', 'sandbox' ) ) ?>


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
					<span class="author vcard"><?php printf( __( 'By %s', 'sandbox' ), '<a class="url fn n" href="' . get_author_link( false, $authordata->ID, $authordata->user_nicename ) . '" title="' . sprintf( __( 'View all posts by %s', 'sandbox' ), $authordata->display_name ) . '">' . get_the_author() . '</a>' ) ?></span>
					<span class="meta-sep">|</span>
					<span class="cat-links"><?php printf( __( 'Posted in %s', 'sandbox' ), get_the_category_list(', ') ) ?></span>
					<span class="meta-sep">|</span>
					<?php the_tags( __( '<span class="tag-links">Tagged ', 'sandbox' ), ", ", "</span>\n\t\t\t\t\t<span class=\"meta-sep\">|</span>\n" ) ?>
<?php edit_post_link( __( 'Edit', 'sandbox' ), "\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t<span class=\"meta-sep\">|</span>\n" ) ?>
					<span class="comments-link"><?php comments_popup_link( __( 'Comments (0)', 'sandbox' ), __( 'Comments (1)', 'sandbox' ), __( 'Comments (%)', 'sandbox' ) ) ?></span>
				</div>
			</div><!-- .post -->

<?php comments_template() ?>

<?php endwhile; ?>

			<div id="nav-below" class="navigation">
<?php if(function_exists('wp_page_numbers')) { wp_page_numbers(); } ?>
			</div>

		</div><!-- #content -->
	</div><!-- #container -->

<?php get_sidebar() ?>

<?php get_footer() ?>