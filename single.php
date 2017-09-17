<?php get_header(); ?>
<div id="single" class="row">
	<section id="info" class="col-lg-3 col-md-3 col-sm-4">
	    <h1><?php the_title(); ?></h1>
	    <time datetime="<?php echo get_the_date(); ?>"><?php the_date(); ?></time>
	    <aside class="hidden-xs">
	    	<?php get_sidebar(); ?>
	    </aside>
	</section>
	<section id="event" class="col-lg-9 col-md-9 col-sm-8">
<picture>
    <?php the_post_thumbnail('full'); ?>
</picture>
<div id="single-content">
	<?php the_content(); ?>
</div>

</section>
<footer id="share">
	   <a onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','facebook-share-dialog','width=626,height=436');return false;" href="#" class="share pull-left" title="Cliquez pour partager sur Facebook"><i class="fa fa-facebook"></i></a>
        <a onclick="window.open(this.href,'twitter-share-dialog','width=626,height=436');return false;" rel="nofollow" class="share pull-right" href="http://twitter.com/home?status=<?php the_title(); ?> - <?php echo tribe_get_venue() ?> <?php the_permalink(); ?> via @disquaireday <?php if(get_field('bars-bars')){echo '@cafscultures';} //echo wp_get_attachment_image_src(get_post_thumbnail_id())[0]; ?>" title="Cliquez pour partager sur Twitter"><i class="fa fa-twitter"></i></a>
	</footer>
</div>

<?php get_footer(); ?>