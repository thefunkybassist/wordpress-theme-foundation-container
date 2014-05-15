<?php

$paged = 1;
if ( get_query_var('paged') ) $paged = get_query_var('paged');
if ( get_query_var('page') ) $paged = get_query_var('page');

//die($paged);

$temp = $wp_query;
$wp_query = null;

$i = 0;

if(!isset($template)) $template = "index";

if($template=="index") {
	//die("front page");
	$wp_query = new WP_Query( array( 'post_type' => array('nugget','quote','artikelen','boeken','muziek','preken','getuigenissen','events','trouwtoegewijd'), 'paged' => $paged, 'posts_per_page' => 20 ) );
} elseif($template=="getuigenissen") {
	$wp_query = new WP_Query( array( 'post_type' => 'getuigenissen', 'paged' => $paged, 'posts_per_page' => 8 ) );
} elseif($template=="preken") {
	$wp_query = new WP_Query( array( 'post_type' => 'preken', 'paged' => $paged, 'posts_per_page' => 8 ) );
} elseif($template=="muziek") {
	$wp_query = new WP_Query( array( 'post_type' => 'muziek', 'paged' => $paged, 'posts_per_page' => 8 ) );
} elseif($template=="boeken") {
	$wp_query = new WP_Query( array( 'post_type' => 'boeken', 'paged' => $paged, 'posts_per_page' => 8 ) );
	$auteur = true;
	$bookshelf = true;
} elseif($template=="events") {
	$wp_query = new WP_Query( array( 'post_type' => 'events', 'paged' => $paged, 'posts_per_page' => 8 ) );
	$thumbnail = true;
} elseif($template=="trouwtoegewijd") {
	$wp_query = new WP_Query( array( 'post_type' => 'trouwtoegewijd', 'paged' => $paged, 'posts_per_page' => 8 ) );
} elseif($template=="artikelen") {
	$wp_query = new WP_Query( array( 'post_type' => 'artikelen', 'paged' => $paged, 'posts_per_page' => 8 ) );
	$thumbnail = true;
}

while ( $wp_query->have_posts() ) : $wp_query->the_post();
	
	global $more;
	$more = 0; 
	
	$nolabel = false;
	$notitle = false;
	$nothumblink = false;
	$onlynugget = false;
	$morelabel = "Lees verder...";
	$thumbnail = false;
	$date = false;
	$auteur = false;
	$bookshelf = false;
	$soundcloud = "";
	
	if(strstr(get_custom_field('Youtube'),"youtube")!=FALSE) {
		$youtube_href = get_custom_field('Youtube');
		$youtube = apply_filters("the_content",str_replace("https://","httpv://",str_replace("http://","httpv://",$youtube_href)));
	} 	else { $youtube = ""; }
	
	$posttype = get_post_type(get_the_ID());
	
	if(get_custom_field('soundcloud')!="") $soundcloud = '<iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/'.get_custom_field('soundcloud').'&color=F60&auto_play=false&hide_related=true&show_artwork=false"></iframe>';
	
	if($posttype=="nugget") { $morelabel = ""; $nolabel = true; $notitle = true; $nothumblink = true; $thumbnail = true; $onlynugget = true; }
	if($posttype=="preken") { $morelabel = "Groot formaat..."; $auteur = ucwords(convert_spreker_url_to_name(get_custom_field('Spreker')));}
	if($posttype=="muziek") { $morelabel = "Beluister..."; $auteur = get_custom_field('Artiest:get_post'); $auteur = $auteur['post_title']; }//$auteur = ucwords(convert_spreker_url_to_name(get_custom_field('Spreker')));}
	if($posttype=="getuigenissen") { $morelabel = "Bekijk getuigenis"; }
	if($posttype=="events") { $morelabel = "Bekijk info..."; $thumbnail = true; $date = true; $youtube = ""; }
	if($posttype=="boeken") { $morelabel = "Lees recensie..."; $auteur = get_custom_field('Auteur'); $bookshelf = true; }
	if($posttype=="trouwtoegewijd" || $posttype=="artikelen") { $morelabel = "Lees verder..."; $thumbnail = true; }
	if($posttype=="quote") {
		
	?>
	<div class="content-entry item <?php echo $posttype; ?> id="post-<?php the_ID(); ?>"><h2>"<?php the_title(); ?>"</h2><h3><?php print_custom_field('Auteur'); ?></h3><div class="share-button quote" text="<?php the_title(); ?>" text2="<?php print_custom_field('Auteur'); ?>" type="<?php echo $posttype; ?>" href="<?php the_permalink(); ?>"><a href="#">Deel<i class="fa fa-share-square-o"></i></a></div></div>
	<?php
	} elseif($posttype=="nugget") { ?>
	<div class="content-entry item <?php echo $posttype; ?>">
			<?php echo $soundcloud; ?>
			<?php $share_href = get_permalink(); ?>
			<?php if($thumbnail==true) { the_post_thumbnail(); /*$share_href = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID())); */ } ?>
			<?php if($youtube) { echo $youtube; /*$share_href = $youtube_href;*/ } ?>

			<div class="share-button nugget" text="<?php the_title() ?>" text2="" type="<?php echo $posttype; ?>" href="<?php echo $share_href; ?>" title="Delen">Delen <i class="fa fa-share-square-o"></i></div></div>
	<?php
	} else {
		
	?>
	<div class="content-entry item <?php echo $posttype; ?>" id="post-<?php the_ID(); ?>"><span class="label"><?php $posttype = get_post_type_object( get_post_type() )->labels; echo strtolower($posttype->name); ?></span>
			<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
			<?php if($auteur) echo "<h3>".$auteur."</h3>"; ?>
			<?php echo $soundcloud; ?>
			<?php if($youtube) echo $youtube; ?>
			<?php if($date) echo '<h3><i class="fa fa-calendar-o"></i>'.strtoupper(get_custom_field('Datum:datef', 'd M Y')).'</h3>'; ?>
			<?php if($bookshelf) echo "<div class='bookshelf'><a href='".get_permalink()."'>".get_the_post_thumbnail(get_the_ID(),'miniboek')."</a></div>"; ?>
			<a href="<?php the_permalink(); ?>" class="thumbnail"><?php if($thumbnail==true) the_post_thumbnail(); ?></a>
			
			<?php if(get_the_excerpt()!="") { ?><div class="content"><?php the_excerpt(); ?></div><?php } ?>
			<div class="content-footer"><a class="read-more" href="<?php the_permalink(); ?>"><?php echo $morelabel; ?></a><div class="comments-indicator"><?php  if(get_comments_number()>0) { ?><a href="<?php the_permalink(); ?>#comments"><i class="fa fa-comment"></i><span class="nr"><?php echo comments_number( '', '1', '%' ); ?></span></a><?php } ?></div><div class="share-button" type="<?php echo $posttype->name; ?>"href="<?php the_permalink(); ?>" title="Delen"><i class="fa fa-share-square-o"></i></div></div>
	</div>
	<?php
	
	}
	$i++; endwhile;
	
	if ( function_exists( 'wp_pagenavi' ) ) {
		wp_pagenavi( array( 'query' => $wp_query ) );
		wp_reset_postdata();
	}
	$wp_query = null;
	$wp_query = $temp;
?>