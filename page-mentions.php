<?php /*
Template name: Page pour les mentions
 */
?>
<?php get_header(); ?>
<div id="single" class="row">
	<section id="info" class="col-lg-3 col-md-3 col-sm-4">
	    <h1><?php the_title(); ?></h1>
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
</div>

<?php get_footer(); ?>