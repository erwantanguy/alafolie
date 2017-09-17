<?php
/**
 * Month View Content Template
 * The content template for the month view of events. This template is also used for
 * the response that is returned on month view ajax requests.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/month/content.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

	<!-- Month Grid -->
	<?php tribe_get_template_part( 'month/loop', 'grid2' ) ?>

	
	<!-- #tribe-events-footer -->
	<?php //do_action( 'tribe_events_after_footer' ) ?>

	<?php //tribe_get_template_part( 'month/mobile' ); ?>
	<?php //tribe_get_template_part( 'month/tooltip' ); ?>

<!-- #tribe-events-content -->
