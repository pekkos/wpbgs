<?php
/*
Plugin Name: WP Simple Sitemap
Plugin URI: http://www.jenst.se/2008/03/30/wp-simple-sitemap
Description: Simple sitemap for posts. It can be good for visitors as well as for search engines.
Version: 0.2
Author: Jens T&ouml;rnell
Author URI: http://www.jenst.se
*/

function wp_simple_sitemap_stylesheet()
{
	$settings = get_option('wp_simple_sitemap_array');
	$head_stylesheet = $settings["head_stylesheet"];
	$head_stylesheet_folder_name = $settings["head_stylesheet_folder_name"];
	$style_theme = $settings["style_theme"];
	
	if(($head_stylesheet == "on" || $head_stylesheet == "") && is_page())
	{
		echo '<link rel="stylesheet" href="'.get_settings('siteurl') . '/wp-content/plugins/wp-simple-sitemap/';
		if($head_stylesheet_folder_name == "")
		{
			if($style_theme == "default")
				echo 'default';
			elseif($style_theme == "stripey")
				echo 'stripey';
			else
				echo 'default';
		}
		else
			echo $head_stylesheet_folder_name;
		echo '/wp-simple-sitemap.css" type="text/css" media="screen" />';
	}
}
add_action('wp_head', 'wp_simple_sitemap_stylesheet');

function the_sitemap_post_counter()
{
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	
	$settings = get_option('wp_simple_sitemap_array');
	$exclude_categories = $settings["exclude_categories"];
	$exclude_categories = str_replace(',',',-',$exclude_categories);
	$exclude_categories = "-".$exclude_categories;

	$counter_query = new WP_Query("cat=".$exclude_categories);
	
	$i = 0;
	
	while ($counter_query->have_posts()) : $counter_query->the_post();
		$i++;
	endwhile;
	echo $i;
}

function wp_simple_sitemap()
{	
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	
	$settings = get_option('wp_simple_sitemap_array');
	$not_found_text = $settings["not_found_text"];
	$exclude_categories = $settings["exclude_categories"];
	$exclude_categories = str_replace(',',',-',$exclude_categories);
	$exclude_categories = "-".$exclude_categories;
	
	$maximum_posts = $settings["maximum_posts"];
	
	if($maximum_posts == "")
		$maximum_posts = "50";
	
	query_posts("cat=".$exclude_categories."&showposts=".$maximum_posts."&paged=$paged");
	$i=0;
	if (have_posts())
	{
		echo '<div id="wp_simple_sitemap">'."\n";
		echo '<ul>'."\n";
		while (have_posts()) : the_post();
			echo '<li';
			
			if ($i == 0)
				$i = 1;
			else
			{
				echo ' class="line"';
				$i = 0;
			}
			
			echo '><a href="';
			the_permalink();
			echo '">';
			the_title();
			echo "</a></li>\n";
		endwhile;
		echo '</ul>';
		echo '</div>';
		
		if(function_exists('wp_page_numbers'))
			wp_page_numbers();
		else
		{
			echo "<div class=\"navigation\">";
			echo "<div class=\"alignleft\">";
			next_posts_link('&laquo; Older Entries');
			echo "</div>";
			echo "<div class=\"alignright\">";
			previous_posts_link('Newer Entries &raquo;');
			echo "</div>";
		}
	}
	else
		echo '<p>' . $not_found_text . '</p>';
}

function wp_simple_sitemap_remove_settings() {
	delete_option("wp_simple_sitemap_array");
}

function wp_simple_sitemap_options()
{
    if(isset($_POST['submitted']))
	{
		if($_POST["head_stylesheet"] == "")
			$_POST["head_stylesheet"] = "no";
		if($_POST["style_theme"] == "")
			$_POST["style_theme"] = "default";
	
		$settings = array (
			"maximum_posts"					=> $_POST["maximum_posts"],
			"not_found_text"				=> $_POST["not_found_text"],
			"head_stylesheet"				=> $_POST["head_stylesheet"],
			"head_stylesheet_folder_name"	=> $_POST["head_stylesheet_folder_name"],
			"exclude_categories"			=> $_POST["exclude_categories"],
			"style_theme"					=> $_POST["style_theme"],
		);
		update_option('wp_simple_sitemap_array', $settings);
		
		echo "<div id=\"message\" class=\"updated fade\"><p><strong>WP Simple Sitemap plugin options updated.</strong></p></div>";
    }
	
	if(isset($_POST['wp_simple_sitemap_remove'])) {
		wp_simple_sitemap_remove_settings();
		echo "<div id=\"message\" class=\"updated fade\"><p><strong>WP Simple Sitemap settings data deleted</strong></p></div>"."\n";
	}
	
    $settings = get_option('wp_simple_sitemap_array');
	
	$style_theme = $settings["style_theme"];
	
	$maximum_posts = $settings["maximum_posts"];
	$not_found_text = $settings["not_found_text"];
	$head_stylesheet = $settings["head_stylesheet"];
	$head_stylesheet_folder_name = $settings["head_stylesheet_folder_name"];
	$exclude_categories = $settings["exclude_categories"];
	
    ?>
	
	<form method="post" name="options" target="_self">
	
	<div class="wrap">
		<h2>WP Simple Sitemap options</h2>
		
	<table style="width: 100%;" border="0" class="form-table">
	
	<tr>
		<td style="width: 400px;"><strong>Default</strong></td>
		<td style="padding-top: 5px; padding-bottom: 5px;">
			<input type="radio" name="style_theme" value="default" <?php
			if( ( $style_theme == "default" || $style_theme == "" ) && $head_stylesheet_folder_name == "" )
			{
				echo 'checked="checked"';
			}
			?>/>
			<img src="<?php echo get_option('siteurl'); ?>/wp-content/plugins/wp-simple-sitemap/default/preview.gif" alt="" />
		</td>
	</tr>
	
	
	<tr>
		<td><strong>Stripey</strong></td>
		<td style="padding-top: 5px; padding-bottom: 5px;">
			<input type="radio" name="style_theme" value="stripey" <?php
			if($style_theme == "stripey" && $head_stylesheet_folder_name == "")
			{
				echo 'checked="checked"';
			}
			?>/>
			<img src="<?php echo get_option('siteurl'); ?>/wp-content/plugins/wp-simple-sitemap/stripey/preview.gif" alt="" />
		</td>
	</tr>
	</table>
		
		<table style="width: 800px;" border="0">
			<tr>
				<td style="width: 400px;"><strong>Maximum posts per page</strong> (set to 50 if empty)</td>
				<td><input name="maximum_posts" type="text" style="width:100%;" value="<?php echo $maximum_posts; ?>" /></td>
			</tr>
			<tr>
				<td><strong>Text if no posts are found</strong></td>
				<td><input name="not_found_text" type="text" style="width:100%;" value="<?php echo $not_found_text; ?>" /></td>
			</tr>

			<tr>
				<td><strong>Exclude categories</strong> (Example: 3,5,9)</td>
				<td><input name="exclude_categories" type="text" style="width:100%;" value="<?php echo $exclude_categories; ?>" /></td>
			</tr>
			
			
			<tr>
				<td><strong>Stylesheet folder name</strong> (Default: Leave blank)</td>
				<td><input name="head_stylesheet_folder_name" type="text" style="width:100%;" value="<?php echo $head_stylesheet_folder_name; ?>" /></td>
			</tr>
			
			
			<tr>
				<td><strong>Use stylesheet</strong></td>
				<td>
					<input type="checkbox" name="head_stylesheet" <?php
					if($head_stylesheet == "on" || $head_stylesheet == "")
					{
						echo 'checked="checked"';
					}
					?>/> On /off &nbsp;
				</td>
			</tr>
		</table>

		<p class="submit">
			<input type="submit" name="wp_simple_sitemap_remove" class="button delete" value="Delete Settings" onclick="return confirm('Remove WP Simple Sitemap settings from database? (cannot be undone)')" /><input type="submit" name="submitted" value="Update Options &raquo;" />
		</p>
	</form>
</div><?php 
}

function wp_simple_sitemap_add_to_menu()
{
    add_submenu_page('options-general.php', 'Sitemap Settings', 'Simple Sitemap', 10, __FILE__, 'wp_simple_sitemap_options');
}
add_action('admin_menu', 'wp_simple_sitemap_add_to_menu');
?>