<?php get_header(); ?>

<section id="events" class="row">
	<div class="col-lg-3 col-md-3 col-sm-6">
		
	<?php  
		$args = array(
		  'post_type'=>array(TribeEvents::POSTTYPE),
		  'posts_per_page'=>5,
		);
		$query = new WP_Query($args);
      if (!$query){ ?>
      	<h2>Pas d'événement à venir à la folie</h2>
      <?php }else{?>
      	<h2><a href="http://alafolie.paris/events/">à venir à la folie</a></h2>
      	<aside>
      	<?php }
         while ($query->have_posts()) : $query->the_post();
		 	//$time_format = get_option( 'time_format', Tribe__Events__Date_Utils::TIMEFORMAT );
		 	$time_format= "G\hi";
			$time_range_separator = tribe_get_option( 'timeRangeSeparator', ' - ' );
			//j F Y
			$start_datetime = tribe_get_start_date();
			$start_date = tribe_get_start_date( null, false );
			$start_time = tribe_get_start_date( null, false, $time_format );
			$start_time3 = tribe_get_start_date( null, false, "D" );
			$start_ts = tribe_get_start_date( null, false, Tribe__Events__Date_Utils::DBDATEFORMAT );
		?>
		<article>
			<?php if(!get_field('nolink')){?>
    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php } ?>
				<header>
					<h3><?php the_title(); ?></h3>
				</header>
				<time datetime="<?php echo tribe_get_start_date( null, false, Tribe__Events__Date_Utils::DBDATEFORMAT ); ?>"><?php echo $start_time3." ".$start_date." à ".$start_time; ?></time>
				<?php //the_excerpt(); ?>
			<?php if(!get_field('nolink')){?></a><?php } ?>
		</article>
		<?php endwhile; ?>
		</aside>
	</div>
	<div class="col-lg-9 col-md-9 col-sm-6 col-xs-12 picture">
		<?php if(get_option('link1')){echo '<a href="'.get_option('link1').'">';}?>
		<img src="<?php echo get_option('image1'); ?>" alt="<?php bloginfo( 'description' ); ?>"<?php if (get_option('nbP')==='oui'){echo ' class="nb"';}?>>
		<?php if(get_option('image1nb')){?><img src="<?php echo get_option('image1nb'); ?>" alt="<?php bloginfo( 'description' ); ?>" class="nbr hidden-xs hidden-sm"><?php }?>
		<?php if(get_option('link1')){echo '</a>';}?>
	</div>
</section>
<section id="lesinfos" class="row">
	<!-- Cadre 1 -->
	<?php if(get_option('cadre1ID')||get_option('cadre1LINK')){?>
	<div class="col-lg-4 col-md-4 col-sm-4 cadreGauche">
		<?php
		$class1="";$class1t=""; 
		if (get_option('nb1')==='oui'){$class1=' class="nb"';$class1t="array ( 'class' => 'nb' )";}
		if(get_option('cadre1ID')){$id = get_option('cadre1ID');$url = get_permalink($id);}
		if(get_option('cadre1LINK')){$url = get_option('cadre1LINK');}
		if(get_option('cadre1Titre')){$titre = get_option('cadre1Titre');}else{$titre = get_post($id)->post_title;}
		if(get_option('cadre1IMG')){$img = '<img width="379" height="253" alt="brochette" src="'.get_option('cadre1IMG').'"'.$class1.'>';}else{$img = get_the_post_thumbnail( $id, 'medium', $class1t );}
		if(get_option('cadre1IMGnb')){$img1nb = '<img width="379" height="253" alt="brochette" src="'.get_option('cadre1IMGnb').'" class="nbr hidden-xs hidden-sm">';}
		?>
		<a href="<?php echo $url; ?>">
		<?php echo $img; if($img1nb){echo $img1nb;}?>
		<h3 class="col-lg-9 col-md-9"><?php echo apply_filters( 'the_title', $titre, $id ); ?></h3>
		</a>
	</div>
	<?php }else {?>
	<div class="col-lg-4 col-md-4 col-sm-4 cadreG">
		<?php dynamic_sidebar('home_sidebar1') ?>
	</div>
	<?php }?>
	
	<!-- Cadre 2 -->
	<?php if(get_option('cadre2ID')||get_option('cadre2LINK')){?>
	<div class="col-lg-4 col-md-4 col-sm-4 cadreMilieu">
		<?php
		$class2="";$class2t="";
		if (get_option('nb2')==='oui'){$class2=' class="nb"';$class2t="array ( 'class' => 'nb' )";}
		if(get_option('cadre2ID')){$id = get_option('cadre2ID');$url = get_permalink($id);}
		if(get_option('cadre2LINK')){$url = get_option('cadre2LINK');}
		if(get_option('cadre2Titre')){$titre = get_option('cadre2Titre');}else{$titre = get_post($id)->post_title;}
		if(get_option('cadre2IMG')){$img = '<img width="379" height="253" alt="brochette" src="'.get_option('cadre2IMG').'"'.$class2.'>';}else{$img = get_the_post_thumbnail( $id, 'medium', $class2t );}
		if(get_option('cadre2IMGnb')){$img2nb = '<img width="379" height="253" alt="brochette" src="'.get_option('cadre2IMGnb').'" class="nbr hidden-xs hidden-sm">';}
		?>
		<a href="<?php echo $url; ?>">
		<?php echo $img; if($img2nb){echo $img2nb;} ?>
		<h3 class="col-lg-9 col-md-9"><?php echo apply_filters( 'the_title', $titre, $id ); ?></h3>
		</a>
	</div>
	<?php }else {?>
	<div class="col-lg-4 col-md-4 col-sm-4 cadreM">
		<?php dynamic_sidebar('home_sidebar2') ?>
	</div>
	<?php }?>
	
	<!-- Cadre 3 -->
	<?php 
	if(get_option('sticky_posts')){
		$my_query = new WP_Query(array(
			'post__in' => get_option('sticky_posts'),
			'ignore_sticky_posts' => 1,
			'posts_per_page' => '1',
		));
	if ( have_posts() ) {
		while ($my_query->have_posts()) : $my_query->the_post(); ?>
	<div class="col-lg-4 col-md-4 col-sm-4 cadreDroit">
		<?php 
		$class4="";$class4t="";
		if (get_option('nb4')==='oui'){$class4=' class="nb"';$class4t="array ( 'class' => 'nb' )";}
		if(get_option('cadre4LINK')){$url = get_option('cadre4LINK');}
		if(get_option('cadre4IMG')){$img = '<img width="379" height="253" alt="brochette" src="'.get_option('cadre4IMG').'"'.$class4.'>';}else{$img = get_the_post_thumbnail( $id, 'large', $class4t );}
		if(get_option('cadre4IMGnb')){$img4nb = '<img width="379" height="253" alt="brochette" src="'.get_option('cadre4IMGnb').'" class="nbr hidden-xs hidden-sm">';}
		?>
		<a href="<?php if($url){echo $url;}else{the_permalink();} ?>">
			<?php echo $img; if($img4nb){echo $img4nb;}//the_post_thumbnail('large'); ?>
			<h3><?php if(get_option('cadre4Titre')){echo get_option('cadre4Titre');}else{the_title();} ?></h3>
		</a>
	</div>
	<?php endwhile; }?>	
	<?php }else{?>
	<div class="col-lg-4 col-md-4 col-sm-4 hidden-xs cadreD">
		<?php dynamic_sidebar('home_sidebar4'); ?>
	</div>
	<?php } ?>
	
</section>

<?php get_footer(); ?>

<img src="https://secure.adnxs.com/seg?add=8984096&t=2" width="1" height="1" style="position:absolute;visibility:hidden" />

<img src="https://secure.adnxs.com/px?id=871915&seg=9003562&t=2" width="1" height="1" style="position:absolute;visibility:hidden" />