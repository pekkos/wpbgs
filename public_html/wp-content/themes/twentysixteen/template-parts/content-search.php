<?php
/**
 * The template part for displaying results in search pages
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<?php twentysixteen_post_thumbnail(); ?>

	<?php twentysixteen_excerpt(); ?>

            <!-- META HERE -->

	<div class="entry-summary">

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
	echo "<p>Melodi:<br/><audio controls><source src='" . get_post_meta($post->ID,'URL1',true) . "' /></audio><br/><a href='" . get_post_meta($post->ID,'URL1',true) . "'>Ladda ned</a></p>"; ?>
	<?php endif;	?>

	<?php if (get_post_meta($post->ID,'URL2',true)) :
	echo "<p>Andrastämma:<br/><audio controls><source src='" . get_post_meta($post->ID,'URL2',true) . "' /></audio><br/><a href='" . get_post_meta($post->ID,'URL2',true) . "'>Ladda ned</a></p>"; ?>
	<?php endif;	?>

	<?php if (get_post_meta($post->ID,'URL-K',true)) :
	echo "<p>Komp:<br/><audio controls><source src='" . get_post_meta($post->ID,'URL-K',true) . "' /></audio><br/><a href='" . get_post_meta($post->ID,'URL-K',true) . "'>Ladda ned</a></p>"; ?>
	<?php endif;	?>

	<?php if (get_post_meta($post->ID,'URL-B',true)) :
	echo "<p>Basstämma:<br/><audio controls><source src='" . get_post_meta($post->ID,'URL-B',true) . "' /></audio><br/><a href='" . get_post_meta($post->ID,'URL-B',true) . "'>Ladda ned</a></p>"; ?>
	<?php endif;	?>

	<?php if (get_post_meta($post->ID,'URL-T',true)) :
	echo "<p>Text:<br/><audio controls><source src='" . get_post_meta($post->ID,'URL-T',true) . "' /></audio><br/><a href='" . get_post_meta($post->ID,'URL-T',true) . "'>Ladda ned</a></p>"; ?>
	<?php endif;	?>

	<?php if (get_post_meta($post->ID,'URL-A',true)) :	
	echo "<p>Arrangemang:<br/><audio controls><source src='" . get_post_meta($post->ID,'URL-A',true) . "' /></audio><br/><a href='" . get_post_meta($post->ID,'URL-A',true) . "'>Ladda ned</a></p>"; ?>
	<?php endif;	?>
	</div>

<!-- END META HERE -->




	<?php if ( 'post' === get_post_type() ) : ?>

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

	<?php else : ?>

		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
					get_the_title()
				),
				'<footer class="entry-footer"><span class="edit-link">',
				'</span></footer><!-- .entry-footer -->'
			);
		?>

	<?php endif; ?>
</article><!-- #post-## -->

