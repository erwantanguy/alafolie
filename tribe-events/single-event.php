<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural = tribe_get_event_label_plural();

$event_id = get_the_ID();

?>
<section id="info" class="col-lg-3 col-md-3 col-sm-4">
    <time datetime="<?php echo tribe_get_start_date( null, false, Tribe__Events__Date_Utils::DBDATEFORMAT ); ?>" class="date"><?php echo tribe_get_start_date( null, false, "D" ).' '.tribe_get_start_date( null, false, "d.m" ); ?></time>
    <h1><?php the_title(); ?></h1>
    <time datetime="<?php echo tribe_get_start_date( null, false, "G\hi" ); ?>"><?php echo tribe_get_start_date( null, false, "G\hi" ); ?><?php if(tribe_get_end_date()!=tribe_get_start_date()){echo " - ".tribe_get_end_date( null, false, "H\hi" );} ?></time>
    <?php while ( have_posts() ) :  the_post(); ?>
		<div id="infos-<?php the_ID(); ?>" <?php post_class(); ?>>
			<!-- Event meta -->
			<?php //do_action( 'tribe_events_single_event_before_the_meta' ) ?>
			<?php
			/**
			 * The tribe_events_single_event_meta() function has been deprecated and has been
			 * left in place only to help customers with existing meta factory customizations
			 * to transition: if you are one of those users, please review the new meta templates
			 * and make the switch!
			 */
			if ( ! apply_filters( 'tribe_events_single_event_meta_legacy_mode', false ) ) {
				tribe_get_template_part( 'modules/meta' );
			} else {
				echo tribe_events_single_event_meta();
			}
			?>
			<?php //do_action( 'tribe_events_single_event_after_the_meta' ) ?>
		</div> <!-- #post-x -->
		<?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
	<?php endwhile; ?>
	<p><strong>Sur vos agendas :</strong> <?php do_action( 'event_calendar' ) ?></p>
	<?php if (get_field('facebook')){?>
    <p id="facebook"><strong><a href="<?php the_field('facebook'); ?>">Event Facebook</a></strong></p>
    <?php }?>
</section>
<section id="event" class="col-lg-9 col-md-9 col-sm-8">
<picture>
    <?php the_post_thumbnail('full'); ?>
</picture>
<div id="tribe-events-content" class="tribe-events-single vevent hentry">
	<!-- <p class="tribe-events-back">
		<a href="<?php echo esc_url( tribe_get_events_link() ); ?>"> <?php printf( __( '&laquo; All %s', 'tribe-events-calendar' ), $events_label_plural ); ?></a>
	</p>-->

	<!-- Notices -->
	<?php tribe_events_the_notices() ?>


	<!-- Event header -->
	<div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>
		<!-- Navigation -->
		<h3 class="tribe-events-visuallyhidden"><?php printf( __( '%s Navigation', 'tribe-events-calendar' ), $events_label_singular ); ?></h3>
		<ul class="tribe-events-sub-nav">
			<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
			<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
		</ul>
		<!-- .tribe-events-sub-nav -->
	</div>
	<!-- #tribe-events-header -->

	<?php while ( have_posts() ) :  the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<!-- Event featured image, but exclude link -->
			<?php //echo tribe_event_featured_image( $event_id, 'full', false ); ?>

			<!-- Event content -->
			<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
			<div class="tribe-events-single-event-description tribe-events-content entry-content description">
				<?php the_content(); ?>
			</div>
			<!-- .tribe-events-single-event-description -->
			<?php //do_action( 'tribe_events_single_event_after_the_content' ) ?>
		</div> <!-- #post-x -->
		<?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
	<?php endwhile; ?>

	<!-- Event footer -->
	
	<!-- #tribe-events-footer -->
	<a href="<?php bloginfo('url'); ?>/events" id="back" title="retour à la programmation"><i class="fa fa-arrow-circle-left"></i>
	</a>
</div>

</section>
<footer id="share">
	   <a onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','facebook-share-dialog','width=626,height=436');return false;" href="#" class="share pull-left fb" title="Cliquez pour partager sur Facebook"><i class="fa fa-facebook"></i></a>
        <a onclick="window.open(this.href,'twitter-share-dialog','width=626,height=436');return false;" rel="nofollow" class="share pull-right" href="http://twitter.com/home?status=<?php the_title(); ?> - <?php echo tribe_get_venue() ?> <?php the_permalink(); ?> via @disquaireday <?php if(get_field('bars-bars')){echo '@cafscultures';} //echo wp_get_attachment_image_src(get_post_thumbnail_id())[0]; ?>" title="Cliquez pour partager sur Twitter"><i class="fa fa-twitter"></i></a>
	</footer>
<!-- #tribe-events-content -->