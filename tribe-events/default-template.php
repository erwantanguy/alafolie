<?php
/**
 * Default Events Template
 * This file is the basic wrapper template for all the views if 'Default Events Template'
 * is selected in Events -> Settings -> Template -> Events Template.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/default-template.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

get_header();
?>
<div id="cal" class="row">
    <?php if(is_single()):?>
        <?php tribe_get_view(); ?>
    <?php else: ?>
     <section id="agenda" class="col-lg-3 col-md-4 col-sm-4">
       <?php 
            //print_r(tribe_get_current_month_text());
            if(tribe_get_current_month_text() == January):
                $month = "Janvier";
            elseif(tribe_get_current_month_text() == February):
                $month = "Février";
            elseif(tribe_get_current_month_text() == March):
                $month = "Mars";
            elseif(tribe_get_current_month_text() == April):
                $month = "Avril";
            elseif(tribe_get_current_month_text() == May):
                $month = "Mai";
            elseif(tribe_get_current_month_text() == June):
                $month = "Juin";
            elseif(tribe_get_current_month_text() == July):
                $month = "Juillet";         
            elseif(tribe_get_current_month_text() == August):
                $month = "Août";
            elseif(tribe_get_current_month_text() == September):
                $month = "Septembre";
            elseif(tribe_get_current_month_text() == October):
                $month = "Octobre";
            elseif(tribe_get_current_month_text() == November):
                $month = "Novembre";
            elseif(tribe_get_current_month_text() == December):
                $month = "Décembre";
            endif;?>
        <h2><?php echo $month." ".sp_month_year_dropdowns(); ?></h2>
        <?php //echo sp_calendar_grid();
         //echo tribe_calendar_grid();
		 //var_dump(sp_calendar_grid());
		 echo tribe_show_month();
         ?>
        <footer>
        <?php
            $previous = tribe_get_previous_month_link();
            $linkprevious = substr($previous, 0,-1);
            $linkprevious = substr($linkprevious, 0,-7)."?tribe_event_display=list&tribe-bar-date=".substr($linkprevious, -7);
            $next = tribe_get_next_month_link();
            $linknext = substr($next, 0,-1);
            $linknext = substr($linknext, 0,-7)."?tribe_event_display=list&tribe-bar-date=".substr($linknext, -7);
            //print_r($linknext);
            //echo preg_replace($un, $deux, $previous);
            //print_r(tribe_get_previous_month_link()); ?>
        <a href="<?php echo $linkprevious; ?>" class="pull-left">
    « <?php echo tribe_get_previous_month_text(); ?></a>
        <a href="<?php echo $linknext; ?>" class="pull-right"><?php echo tribe_get_next_month_text(); ?> »</a>
    </footer>
    </section>
    <?php tribe_get_view(); ?>
    <?php endif; ?>
</div>
<?php
get_footer();
