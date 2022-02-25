<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php twentysixteen_excerpt(); ?>

	<?php twentysixteen_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

			if ( '' !== get_the_author_meta( 'description' ) ) {
				get_template_part( 'template-parts/biography' );
			}
		?>
	</div><!-- .entry-content -->
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
	<footer class="entry-footer">
		<?php twentysixteen_entry_meta(); ?>
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
