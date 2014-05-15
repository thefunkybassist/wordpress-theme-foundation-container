<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<div class="row">
<div class="large-12 columns">
	<div class="cat-nav <?php echo get_post_type(); ?>">
	<div class="prev"><?php
		$prev_post = get_previous_post();
		if (!empty( $prev_post )): ?>
		<a href="<?php echo get_permalink( $prev_post->ID ); ?>">« <?php echo $prev_post->post_title; ?></a>
		<?php endif; ?>
	</div>
	<div class="title"><a href="/<?php echo get_post_type(); ?>"><h2><?php $posttype = get_post_type_object( get_post_type() )->labels; echo $posttype->name; ?></h2></a></div>
	<div class="next"><?php
		$next_post = get_next_post();
		if (!empty( $next_post )): ?>
		<a href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo $next_post->post_title; ?> »</a>
		<?php endif; ?>
	</div>
	<div class="clear"></div>
	</div>
</div>
</div>

<div class="row page">
	<div class="large-9 columns" id="content-area">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post();
				$ids = array(get_the_ID());
			?>

		<div class="content-entry item artikelen">
			<h1><?php the_title(); ?></h1>
			<div class="share-buttons">DELEN: &nbsp;&nbsp;<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-facebook"></i></a><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-google-plus"></i></a><a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-pinterest"></i></a><a href="http://twitter.com/home?status=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-twitter"></i></a></div>
			<div class="content"><?php the_content(); ?></div>
			<div class="content-footer"><?php comments_template(); ?></div>
		</div>

			<?php endwhile; ?>

	</div>
<div class="large-3 columns" id="sidebar-area">
<div class="sidebar artikelen">
<h3>Andere artikelen</h3>
	<?php
	//echo $speaker['ID'];
	query_posts(array('post__not_in' => $ids, 'post_type' => 'artikelen'));
	while (have_posts()) : the_post();
	//echo get_the_post_meta("Spreker");
	echo "<hr><a href='".get_permalink()."'>".get_the_title()."</a>";
	endwhile;
	wp_reset_query();
	?>
	<div class="clear"></div>
</div>
</div>
<?php get_footer(); ?>