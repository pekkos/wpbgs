=== WP Simple Sitemap ===
Tags: sitemap, seo, posts, post
Requires at least: 2.3
Tested up to: 2.5
Stable tag: 0.2

A sitemap is good for users and perfect for search engines. WP Simple Sitemap is a Wordpress plugin that automatically lists all your posts.

== Description ==

= Benefits of WP Simple Sitemap =
* It will not display a link to my homepage in your blog
* It will not display any categories, just the posts
* If you already use WP Page Numbers that will be used as your page navigation
* It should work with most versions of Wordpress because it's built only around Wordpress own functions (not with SQL-querys)
* You have sitemap themes to choose from

= Updates 0.2 =
* Added sitemap themes
* Added feature to delete the settings from the database
* The sitemap post counter is now correct

= Settings / Options =
* Choose sitemap theme
* Delete settings from the database
* Set a maximum posts per page
* Set a text if no posts are found
* Exclude categories that you don't want to view in the sitemap
* Turn off the the stylesheet if you want
	
<a href="http://www.jenst.se/sajtkarta">Sitemap demo!</a>

== Installation ==

Download: <a href="http://www.jenst.se/2008/03/29/wp-page-numbers">WP Page Numbers</a> (for the paging)

1. Upload the FOLDER 'wp-simple-sitemap' to the '/wp-content/plugins/'
2. Upload the FOLDER 'wp-page-numbers' to the '/wp-content/plugins/'
3. Activate the plugin 'WP Simple Sitemap' through the 'Plugins' menu in admin
4. Activate the plugin 'WP Page Numbers' through the 'Plugins' menu in admin
5. Go to 'Options' or 'Settings' and then 'Simple Sitemap' to change the options

= Usage =

<code>
<?php
/*
Template Name: Simple Sitemap
*/
?>
<?php the_sitemap_post_counter(); ?>
<?php wp_simple_sitemap(); ?>
</code>

1. You need to create a <a href="http://codex.wordpress.org/Pages#Creating_your_own_Page_Templates">page template</a> that looks something like above
2. Copy the tags you use in your 'page.php' into the template file, to make it fit your theme
3. Upload it to your server via FTP into your template folder with a name of your choice
4. Create a page 'Write / Page' called 'Sitemap' or whatever you want
5. Choose your 'Page Template'
6. Publish

== Frequently Asked Questions ==

= How do I report a bug? =

Contact me <a href="http://www.jenst.se/2008/03/30/wp-simple-sitemap">here</a>. Describe the problem as good as you can, your plugin version, Wordpress version and possible conflicting plugins and so on.

= How can I support this plugin? =

The best way to contribute is to spread the word, link to this page, blog about WP Simple Sitemap or give me feedback. All kinds of feedback are helpful to me. Suggestions and bug report are also welcome.

== Screenshots ==

1. This is a part of WP Simple Sitemap admin where you can choose a theme.