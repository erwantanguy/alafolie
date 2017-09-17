<?php
/**
 * Single Event Meta (Details) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/details.php
 *
 * @package TribeEventsCalendar
 */


$time_format = get_option( 'time_format', Tribe__Events__Date_Utils::TIMEFORMAT );
$time_range_separator = tribe_get_option( 'timeRangeSeparator', ' - ' );

$start_datetime = tribe_get_start_date();
$start_date = tribe_get_start_date( null, false );
$start_time = tribe_get_start_date( null, false, $time_format );
$start_ts = tribe_get_start_date( null, false, Tribe__Events__Date_Utils::DBDATEFORMAT );

$end_datetime = tribe_get_end_date();
$end_date = tribe_get_end_date( null, false );
$end_time = tribe_get_end_date( null, false, $time_format );
$end_ts = tribe_get_end_date( null, false, Tribe__Events__Date_Utils::DBDATEFORMAT );

$cost = tribe_get_formatted_cost();
$website = tribe_get_event_website_link();
?>
<div class="tribe-events-meta-group tribe-events-meta-group-details">
	<dl>

		<?php
		do_action( 'tribe_events_single_meta_details_section_start' );

		?>

		<?php
		// Event Cost
		if ( ! empty( $cost ) ) : ?>

			<dt><?php esc_html_e( 'Réservez vos places', 'tribe-events-calendar' ) ?></dt>
			<dd class="tribe-events-event-cost">
			<?php if ( ! empty( $website ) ): ?><a href="<?php echo strip_tags($website); ?>"><?php esc_html_e( $cost ); ?></a>
			<?php else: ?><?php esc_html_e( $cost ); ?><?php endif ?>
			<?php if ( ! empty( $website ) ): ?>
			<?php if($websitevent){$siteweb=strip_tags($websitevent);}else{$siteweb = strip_tags($website);} ?> <a href="<?php echo $siteweb; ?>"><i class="fa fa-ticket"></i>
			</a>
					<?php endif ?></dd>
		<?php endif ?>
        
		<?php
		/*echo tribe_get_event_categories(
			get_the_id(), array(
				'before'       => '',
				'sep'          => ', ',
				'after'        => '',
				'label'        => null, // An appropriate plural/singular label will be provided
				'label_before' => '<dt>',
				'label_after'  => '</dt>',
				'wrap_before'  => '<dd class="tribe-events-event-categories">',
				'wrap_after'   => '</dd>',
			)
		);*/
		?>
<?php
if( have_rows('groupes') ):
    while ( have_rows('groupes') ) : the_row();?>
    <dt class="groupe">
        <?php the_sub_field('nom_du_groupe'); ?>
    </dt>
    <?php if (get_sub_field('origine_du_groupe')){?>
    <dd class="origine">
        <?php the_sub_field('origine_du_groupe'); ?>
    </dd>
    <?php }?>
    <?php if (get_sub_field('description')){?>
    <dd class="description">
        <?php the_sub_field('description'); ?>
    </dd>
    <?php }?>
    <?php if (get_sub_field('site_web')){?>
    <dd class="sociallink">
        <a href="<?php the_sub_field('site_web'); ?>">site web</a>
    </dd>
    <?php }?>
    <?php if (get_sub_field('soundcloud')){?>
    <dd class="sociallink">
        <a href="<?php the_sub_field('soundcloud'); ?>">soundcloud</a>
    </dd>
    <?php }?>
    <?php if (get_sub_field('facebook')){?>
    <dd class="sociallink">
        <a href="<?php the_sub_field('facebook'); ?>">facebook</a>
    </dd>
    <?php }?>
    <?php endwhile;

else :

    // no rows found

endif;

?>
		<?php echo tribe_meta_event_tags( sprintf( __( '%s Tags:', 'tribe-events-calendar' ), tribe_get_event_label_singular() ), ', ', false ) ?>

		

		<?php do_action( 'tribe_events_single_meta_details_section_end' ) ?>
	</dl>
</div>
