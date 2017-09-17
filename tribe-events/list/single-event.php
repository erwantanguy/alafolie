<?php
/**
 * List View Single Event
 * This file contains one event in the list view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Setup an array of venue details for use later in the template
$venue_details = tribe_get_venue_details();

// Venue microformats
$has_venue_address = ( ! empty( $venue_details['address'] ) ) ? ' location' : '';

// Organizer
$organizer = tribe_get_organizer();

?>

<?php
	$time_format= "G\hi";
	//$time-day= "D";
			$time_range_separator = tribe_get_option( 'timeRangeSeparator', ' - ' );
			//j F Y
			$start_datetime = tribe_get_start_date();
			$start_date = tribe_get_start_date( null, false );
			$start_time = tribe_get_start_date( null, false, $time_format );
            $start_time2 = tribe_get_start_date( null, false, "d.m" );
            $start_time3 = tribe_get_start_date( null, false, "D" );
			$start_ts = tribe_get_start_date( null, false, Tribe__Events__Date_Utils::DBDATEFORMAT );
?>
<div class="marges20">
    <time><?php echo $start_time3.' '.$start_time2; ?></time>
    <div class="pull-right categorie">
    <?php
            echo tribe_get_event_categories(
                get_the_id(), array(
                    'before'       => '',
                    'sep'          => ', ',
                    'after'        => '',
                    'label'        => null, // An appropriate plural/singular label will be provided
                    'label_before' => '<div style="display:none;">',
                    'label_after'  => '</div>',
                    'wrap_before'  => '<span class="tribe-events-event-categories">',
                    'wrap_after'   => '</span>',
                )
            );
            ?>
    </div>
</div>
<div class="picture">
	<?php if(!get_field('nolink')){?>
    <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php } ?>
    <?php the_post_thumbnail('calendar'); ?>
    <?php if(!get_field('nolink')){?></a><?php } ?>
</div>
<article class="agendacontent marges20">
	<header class="article-header">
		<h1 class="H2 tribe-events-list-event-title entry-title summary">
			<?php if(!get_field('nolink')){?>
    <a href="<?php echo esc_url( tribe_get_event_link() ); ?>" rel="bookmark"><?php } ?>
								<?php the_title() ?>
			<?php if(!get_field('nolink')){?></a><?php } ?>
		</h1>
	</header>
	<?php if(get_the_excerpt()):?>
	<p><?php echo substr(get_the_excerpt(), 0,140); ?></p>
	<?php endif; ?>
</article>
