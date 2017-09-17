<?php //do_action( 'tribe_events_inside_before_loop' ); ?>
				<!-- Month / Year Headers -->
		<?php //tribe_events_list_the_date_headers(); ?>
				<div class="col-lg-4 picture">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
				</div>
				<div class="col-lg-8">
					<header class="article-header">
						<h1 class="H2 tribe-events-list-event-title entry-title summary">
							<a class="url" href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title() ?>" rel="bookmark">
								<?php the_title() ?>
							</a>
						</h1>
					</header>

					<section class="entry-content cf">

						<div class="tribe-events-event-meta vcard">
	<div class="author <?php echo esc_attr( $has_venue_address ); ?>">

		<!-- Schedule & Recurrence Details -->
		<div class="updated published time-details">
			
			<?php
				//$time_format = get_option( 'time_format', Tribe__Events__Date_Utils::TIMEFORMAT );
				//$time_range_separator = tribe_get_option( 'timeRangeSeparator', ' - ' );
				
				$start_datetime = tribe_get_start_date();
				//$start_date = tribe_get_start_date( null, false );
				//$start_time = tribe_get_start_date( null, false, $time_format );
				//$start_ts = tribe_get_start_date( null, false, Tribe__Events__Date_Utils::DBDATEFORMAT );
				
				$end_datetime = tribe_get_end_date();
				//$end_date = tribe_get_end_date( null, false );
				//$end_time = tribe_get_end_date( null, false, $time_format );
				//$end_ts = tribe_get_end_date( null, false, Tribe__Events__Date_Utils::DBDATEFORMAT );
				
				//$cost = tribe_get_formatted_cost();
				//$website = tribe_get_event_website_link();
			?>
			<?php
				do_action( 'tribe_events_single_meta_details_section_start' );
		
				// All day (multiday) events
				if ( tribe_event_is_all_day() && tribe_event_is_multiday() ) :
			?>
			du <?php esc_html_e( $start_date ) ?><?php esc_html_e( $start_datetime ) ?> au <?php esc_html_e( $end_datetime ) ?>
			<?php endif ?>
			<?php //echo tribe_events_event_schedule_details() ?>
		</div>

		<?php if ( $venue_details ) : ?>
			<!-- Venue Display Info -->
			<div class="tribe-events-venue-details">
				<?php echo implode( ', ', $venue_details ); ?>
			</div> <!-- .tribe-events-venue-details -->
		<?php endif; ?>

	</div>
</div><!-- .tribe-events-event-meta -->
<?php
	$time_format= "G\hi";
			$time_range_separator = tribe_get_option( 'timeRangeSeparator', ' - ' );
			//j F Y
			$start_datetime = tribe_get_start_date();
			$start_date = tribe_get_start_date( null, false );
			$start_time = tribe_get_start_date( null, false, $time_format );
			$start_ts = tribe_get_start_date( null, false, Tribe__Events__Date_Utils::DBDATEFORMAT );
?>
<time><?php echo "Le ".$start_date." à ".$start_time; ?></time>
				</section>

					<!--<footer class="article-footer">
<a href="<?php echo esc_url( tribe_get_event_link() ); ?>" class="tribe-events-read-more" rel="bookmark"><?php esc_html_e( 'Pour en savoir plus', 'tribe-events-calendar' ) ?> &raquo;</a>
					</footer>-->
				</div>