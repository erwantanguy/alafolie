<?php
/**
 * List View Loop
 * This file sets up the structure for the list loop
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/loop.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<?php
global $post;
global $more;
$more = false;
?>


	<?php while ( have_posts() ) : the_post(); ?>
		<?php //do_action( 'tribe_events_inside_before_loop' ); ?>

		<!-- Month / Year Headers -->
		<?php //tribe_events_list_the_date_headers(); ?>

		<!-- Event  -->
		<?php
		$post_parent = '';
		if ( $post->post_parent ) {
			$post_parent = ' data-parent-post-id="' . absint( $post->post_parent ) . '"';
		}
		?>
		<section id="post-<?php the_ID(); ?>" <?php post_class( 'cf col-lg-3 col-md-4 col-sm-4' ); ?> role="article">
			<?php tribe_get_template_part( 'list/single', 'event' ) ?>
		</section><!-- .hentry .vevent -->


		<?php //do_action( 'tribe_events_inside_after_loop' ); ?>
	<?php endwhile; ?>

<!-- .tribe-events-loop -->
