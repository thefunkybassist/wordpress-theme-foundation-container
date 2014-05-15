<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<header class="search-header">
	<h2><?php printf( __( 'Zoekresultaten voor "%s"', 'cwol' ), get_search_query() ); ?></h2>
</header>

<div class="row index">
	<div class="large-12 columns" id="content-area">

		<?php if ( have_posts() ) : ?>

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
		<div class="content-entry item <?php echo get_post_type(get_the_ID()) ?>"> <span class="label"><?php echo get_post_type(get_the_ID()) ?></span>
			<h2><?php the_title(); ?></h2>
			<div class="content"><?php the_excerpt(); ?></div>
			<div class="content-footer"><a class="read-more" href="<?php the_permalink(); ?>">Lees verder...</a><div class="comments-indicator"><a href="/"><i class="fa fa-comment"></i><span class="nr">0</span></a></div><div class="share-button"><a href="/"><i class="fa fa-share-square-o"></i></a></div></div>
		</div>			
			<?php endwhile; ?>

		<?php else : ?>
		<div class="dialog-message"><h2>Helaas, we hebben niks over '<?php echo get_search_query(); ?>' geplaatst.</h2></div>
		<?php endif; ?>

	</div>
</div>

<?php get_footer(); ?>