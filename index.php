<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage foundation-theme
 * @since foundation-theme 0.1.0
 */

get_header();


?>

<div class="row" id="index">
	<div class="large-12 columns" id="content-area">

	<?php
	include(locate_template('index-loop.php')); 
	?>
	
	</div>
</div>

<?php get_footer(); ?>