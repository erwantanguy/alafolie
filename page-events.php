<?php /*
Template name: Page pour les événements
 */
?>
<?php get_header(); ?>

<div id="page" class="row">
	<section id="col_gauche" class="col-lg-3 col-md-2 col-sm-4 text-right">
		<header>
			<?php 
			

$category = sp_meta_event_cats(); print_r($category);
//echo $category[0]->cat_ID;
echo "<hr>";
			if(sp_meta_event_category_name()){?>
				<h1 class="alafolie"><?php echo sp_meta_event_category_name();?></h1>
				<h2>programmation à la folie</h2>
				<?php print_r(tribe_get_event_cat_slugs()); ?>
			<?php } ?>
			<?php if(is_page){?>
				<h1><?php the_title();?></h1>
				<?php //the_excerpt(); ?>
			<?php } ?>
			
		</header>
	</section>
	<section id="col_droite" class="col-lg-6 col-md-7 col-sm-8">
		<nav class="text-right">
			<?php if ( function_exists('yoast_breadcrumb') ) 
	{yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumb">','</div>');} ?>
		</nav>
		<?php
		$args = array(
		  'post_type'=>array(TribeEvents::POSTTYPE),
		  'posts_per_page'=>5,
		  'tax_query' => array(
			array(
					'taxonomy' => 'tribe_events_cat',
					'field' => 'slug',
					'terms' => 'soirees'
				)
			),
		  //'taxonomy' => 'soirées'
		  //'taxonomy'=>'tribe_events_cat'
		);
		print_r($args);
		$query = new WP_Query($args);
         while ($query->have_posts()) : $query->the_post();
		 	//$time_format = get_option( 'time_format', Tribe__Events__Date_Utils::TIMEFORMAT );
		 	$time_format= "G\hi";
			$time_range_separator = tribe_get_option( 'timeRangeSeparator', ' - ' );
			//j F Y
			$start_datetime = tribe_get_start_date();
			$start_date = tribe_get_start_date( null, false );
			$start_time = tribe_get_start_date( null, false, $time_format );
			$start_ts = tribe_get_start_date( null, false, Tribe__Events__Date_Utils::DBDATEFORMAT );
		?>
		<article>
			<a href="<?php the_permalink(); ?>">
				<header>
					<h3><?php the_title(); ?></h3>
				</header>
				<?php echo "Le ".$start_date." à ".$start_time; ?>
				<?php //the_excerpt(); ?>
			</a>
		</article>
		<?php endwhile; ?>
	</section>
	<aside id="sidebar" class="col-lg-3 col-md-3 hidden-xs hidden-sm">
		<?php get_sidebar(); ?>
	</aside>
</div>

<?php get_footer(); ?>

<img src="https://secure.adnxs.com/seg?add=8984108&t=2" width="1" height="1" />