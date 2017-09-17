<?php
add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-background' );
//set_post_thumbnail_size( 50, 50, true );
set_post_thumbnail_size( 50, 50, array( 'center', 'center')  );
//wp_nav_menu( array( 'menu' => 'principal' ) );
add_theme_support( 'menus' );
/******** Mode maintenance *******/
function maintenance_mode(){
	if(!is_user_logged_in() || !current_user_can('administrator')){
		//die('Nous sommes en maintenance !');
		$content = file_get_contents(TEMPLATEPATH.'/maintenance.php');
		die($content);
	}
}
if (get_option('maintenance')==='oui'){
	add_action('get_header', 'maintenance_mode');
}

/******** SECURITE ***********/

remove_action("wp_head", "wp_generator");

function wpt_remove_version() {
	return ''; }
add_filter('the_generator', 'wpt_remove_version');

/******** ROBOTS.TXT *********/

function do_robots2() {

	header( 'Content-Type: text/plain; charset=utf-8' );

	do_action( 'do_robotstxt' );
	$output = "User-agent: *\n";
	$public = get_option( 'blog_public' );
	if ( '0' == $public ) {
		$output .= "Disallow: /\n";
	} else {
		$site_url = parse_url( site_url() );
		$path = ( !empty( $site_url['path'] ) ) ? $site_url['path'] : '';
		$output .= "Disallow: $path/wp-admin/\n";
		$output .= "Disallow: $path/wp-includes/\n";
		$output .= "Disallow: $path/wp-login.php\n";
		$output .= "Disallow: $path*/trackback\n";
	}

	echo apply_filters( 'robots_txt', $output, $public );
}

/******** SHORTCODES**********/
 
 add_shortcode('bouton', 'mon_bouton');
 function mon_bouton($atts, $content = null) {
 	$a = shortcode_atts( array(
 			'link' => '',
 	), $atts );
 	return '<a class="btn btn-default" href="' . esc_attr($a['link']) . '" target="_blank">' . do_shortcode($content) . '</a>';
 };
 add_shortcode('lienF', 'lien_formulaire');
 function lien_formulaire($atts, $content = null){
 	$a = shortcode_atts( array(
 			'link' => '',
 	), $atts );
 	return '<a class="fancybox-inline btn btn-default" href="' . esc_attr($a['link']) . '">' . do_shortcode($content) . '</a>';
 };
 add_shortcode('formulaire','mon_formulaire');
 function mon_formulaire($atts, $content = null){
 	$a = shortcode_atts( array(
 			'id' => '',
 	), $atts );
 	return '<aside class="hidden"><div id="' . esc_attr($a['id']) . '" class="fancybox-inline">' . do_shortcode($content) . '</div></aside>';
 };
 /*add_shortcode('modale','fenetre_modale');
 function fenetre_modale($atts, $content = null){
 	$a = shortcode_atts( array(
 			'id' => '',
 	), $atts );
 	return '<aside class="hidden"><div id="' . esc_attr($a['id']) . '" class="fancybox-inline">' . do_shortcode($content) . '</div></aside>';
 };*/

add_action('init', 'mylink_button');
function mylink_button() {
 
   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
     return;
   }
 
   if ( get_user_option('rich_editing') == 'true' ) {
     add_filter( 'mce_external_plugins', 'add_plugin' );
     add_filter( 'mce_buttons', 'register_button' );
   }
 
}
function register_button( $buttons ) {
 //array_push( $buttons, "|", "englishversion" );
 array_push( $buttons, "|", "bouton" );
 array_push( $buttons, "|", "lienF" );
 array_push( $buttons, "|", "formulaire" );
 return $buttons;
}
function add_plugin( $plugin_array ) {
   //$plugin_array['englishversion'] = get_bloginfo( 'template_url' ) . '/js/mybuttons.js';
   $plugin_array['bouton'] = get_bloginfo( 'template_url' ) . '/js/mybuttons.js';
   $plugin_array['lienF'] = get_bloginfo( 'template_url' ) . '/js/mybuttons.js';
   $plugin_array['formulaire'] = get_bloginfo( 'template_url' ) . '/js/mybuttons.js';
   return $plugin_array;
}

/********** THEME ****************/
//add_options_page(__('All Settings'), __('All Settings'), 'administrator', 'options.php');
//add_theme_page('éléments supllémentaires', 'Options', 'edit_themes_options', 'options', array(10,'themeUi'));
function menu_options(){
	add_submenu_page("themes.php", "Options du thème", "Options du thème", 9, "options", "custom_theme_options");
}
function custom_theme_options(){
	//echo "<h2>Options du thème</h2>test et tout le reste";
	require_once ( get_template_directory() . '/theme-options.php' );
};
add_action("admin_menu", "menu_options");


/* MENU */


register_nav_menus(array(
	'premier' => 'Menu principale',
	'deuxieme' => 'Petit menu optionnel',
	'troisieme' => 'Menu pied de page',
	//'oeuvres' => 'Menu pour les oeuvres quand il n\'y a pas d\'événements'
));


$args = array(
	'flex-width'    => true,
	'width'         => 1900,
	'flex-height'    => true,
	'height'        => 284,
	'default-image' => 'http://www.ticoet.fr/drmgalerie/wp-content/uploads/sites/12/2015/09/bandeau_defaut.png', //get_template_directory_uri() . 
	'uploads'       => true,
);
add_theme_support( 'custom-header', $args );


add_image_size( 'events', 300, 120, array( 'left', 'top' ) );
add_image_size( 'event', 300,120 );
add_image_size('mobile',768);
add_image_size('tablette',1000);
//add_image_size('vignette',225,225,array( 'left', 'top' ));
add_image_size('vignette',225,225,array( 'center', 'center' ));
add_image_size('vignetteAccueil',410,410,array( 'center', 'center' ));
add_image_size('calendar', 294,154);

class Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu {

   function start_lvl(&$output, $depth = 0, $args = array()) {
      $output .= "\n<ul class=\"dropdown-menu\">\n";
   }

   function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
       $element_html = '';
       parent::start_el($element_html, $item, $depth, $args);
       if ( $item->is_dropdown && $depth === 0 ) {
           $element_html = str_replace( '<a', '<a class="dropdown-toggle" data-toggle="dropdown"', $element_html );
           $element_html = str_replace( '</a>', ' <b class="caret"></b></a>', $element_html );
       }
       $output .= $element_html;
    }

    function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
        if ( $element->current ) {
            $element->classes[] = 'active';
        }
        $element->is_dropdown = !empty( $children_elements[$element->ID] );
        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}


/* WIDGETS *************/

add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => 'ma_sidebar',
        //'id' => 1,
		'before_widget' => '<div class="widget_sidebar">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
	register_sidebar( array(
        'name' => 'recherche',
        //'id' => 4,
        //'title' => 'Recherche',
		'before_widget' => '<div class="widget_sidebar">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
}

/************************* META BOXES ************************/

add_action('add_meta_boxes','init_metabox');
function init_metabox(){
  add_meta_box('homepage', 'Accueil', 'home_page', 'oeuvre', 'side');
}

function home_page($post){
  $dispo = get_post_meta($post->ID,'_home_page',true);
  echo '<label for="home_page_meta">Mise en avant de l\'oeuvre sur la page d\'accueil :</label>';
  echo '<select name="home_page">';
  echo '<option ' . selected( 'oui', $dispo, false ) . ' value="oui">Oui</option>';
  echo '<option ' . selected( 'non', $dispo, false ) . ' value="non">Non</option>';
  echo '</select>';

}

add_action('save_post','save_metabox');
function save_metabox($post_id){
if(isset($_POST['home_page']))
  update_post_meta($post_id, '_home_page', $_POST['home_page']);
}


/**************************** JS *****************************/
    add_action('init', 'gkp_insert_js_in_footer');
    function gkp_insert_js_in_footer() {
     
    // On verifie si on est pas dans l'admin
    if( !is_admin() ) :
     
        // On annule jQuery installer par WordPress (version 1.4.4
        wp_deregister_script( 'jquery' );
     
        // On declare un nouveau jQuery dernière version grace au CDN de Google
        wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js','',false,true);
        wp_enqueue_script( 'jquery' );
     
        // On insere le fichier de ses propres fonctions javascript
        wp_register_script('functions', get_bloginfo( 'template_directory' ).'/js/bootstrap.min.js','',false,true);
		wp_enqueue_script( 'functions' );
		wp_register_script('docs', get_bloginfo( 'template_directory' ).'/js/docs.min.js','',false,true);
		wp_enqueue_script( 'docs' );
		wp_register_script('collapse', get_bloginfo( 'template_directory' ).'/js/collapse.js','',false,true);
		wp_enqueue_script( 'collapse' );
		wp_register_script('carousel', get_bloginfo( 'template_directory' ).'/js/carousel.js','',false,true);
        wp_enqueue_script( 'carousel' );
		wp_register_script('tab', get_bloginfo( 'template_directory' ).'/js/tab.js','',false,true);
        wp_enqueue_script( 'tab' );
		/*wp_register_script('masonry', get_bloginfo( 'template_directory' ).'/js/masonry.js','',false,true);
        wp_enqueue_script( 'masonry' );
		wp_register_script('myMasonry', get_bloginfo( 'template_directory' ).'/js/my-masonry.js','',false,true);
        wp_enqueue_script( 'myMasonry' );*/
     
    endif;
    }



/********************* ical **************/

// Changes the text labels for Google Calendar and iCal buttons on a single event page
remove_action('tribe_events_single_event_after_the_content', array('Tribe__Events__iCal', 'single_event_links'));
add_action('tribe_events_single_event_after_the_content', 'customized_tribe_single_event_links');
  
function customized_tribe_single_event_links()    {
    if (is_single() && post_password_required()) {
        return;
    }
  
    echo '<div class="tribe-events-cal-links">';
    echo '<a class="btn btn-default btn-xs" href="' . tribe_get_gcal_link() . '" title="' . __( 'Add to Google Calendar', 'tribe-events-calendar-pro' ) . '">Google Agenda</a>';
    echo ' <a class="btn btn-default btn-xs" href="' . tribe_get_single_ical_link() . '">Exporter vers iCal</a>';
    echo '</div><!-- .tribe-events-cal-links -->';
}

//+ Google Agenda+ Exporter vers iCal
add_action('event_calendar', 'customized_tribe_single_event_links2');

function customized_tribe_single_event_links2()    {
	if (is_single() && post_password_required()) {
		return;
	}

	//echo '<ul class="nav navbar-nav">';
	//echo '<li><a class="share" href="' . tribe_get_gcal_link() . '" title="' . __( 'Ajouter à Google Calendar', 'tribe-events-calendar-pro' ) . '"><i class="fa fa-calendar-plus-o"></i></a></li>';
	//echo '<li><a class="share" href="' . tribe_get_single_ical_link() . '" title="Exporter vers iCal"><i class="fa fa-calendar"></i></a></li>';
	//echo '</ul>';
	echo '<a class="share" href="' . tribe_get_gcal_link() . '" title="' . __( 'Ajouter à Google Calendar', 'tribe-events-calendar-pro' ) . '"><i class="fa fa-calendar-plus-o"></i></a> ';
	echo '<a class="share" href="' . tribe_get_single_ical_link() . '" title="Exporter vers iCal"><i class="fa fa-calendar"></i></a>';
	//echo '<a class="share" href="' . tribe_get_single_ical_link() . '" title="Exporter vers iCal"><i class="fa fa-calendar"></i></a>'';
}


/************* ROLES ****************/

/*
Objectif : Permettre à toutes les personnes du role "Editeur" de pouvoir manipuler le menu de son site Internet
            - Etape 1 : Ajouter au role Editeur l'accès à l'Apparence du site
            - Etape 2 : Retirer tous les sous menu du menu "Apparence" saus le sous menu "Menus"
*/
$roleObject = get_role( 'editor' );
if (!$roleObject->has_cap( 'edit_theme_options' ) ) {
    $roleObject->add_cap( 'edit_theme_options' );
}
 
function hide_menu() {
    // Si le role de l'utilisatieur ne lui permet pas d'ajouter des comptes (autrement dit si il n'est pas admin)
    if(!current_user_can('add_users')) {
      remove_submenu_page( 'themes.php', 'themes.php' ); // hide the theme selection submenu
      //remove_submenu_page( 'themes.php', 'widgets.php' ); // hide the widgets submenu
      remove_submenu_page( 'themes.php', 'theme-editor.php' ); // hide the editor menu
 
      // Le code suisant c'est juste poure retirer le sous menu "Personnaliser"
      $customize_url_arr = array();
      $customize_url_arr[] = 'customize.php'; // 3.x
      $customize_url = add_query_arg( 'return', urlencode( wp_unslash( $_SERVER['REQUEST_URI'] ) ), 'customize.php' );
      $customize_url_arr[] = $customize_url; // 4.0 & 4.1
      if ( current_theme_supports( 'custom-header' ) && current_user_can( 'customize') ) {
          $customize_url_arr[] = add_query_arg( 'autofocus[control]', 'header_image', $customize_url ); // 4.1
          $customize_url_arr[] = 'custom-header'; // 4.0
      }
      if ( current_theme_supports( 'custom-background' ) && current_user_can( 'customize') ) {
          $customize_url_arr[] = add_query_arg( 'autofocus[control]', 'background_image', $customize_url ); // 4.1
          $customize_url_arr[] = 'custom-background'; // 4.0
      }
      foreach ( $customize_url_arr as $customize_url ) {
          remove_submenu_page( 'themes.php', $customize_url );
      }
 
    }
 
}
add_action('admin_head', 'hide_menu');

/************* bar admin ****************/
function my_admin_bar_link() {
	global $wp_admin_bar;
	if ( !is_super_admin() || !is_admin_bar_showing() )
		return;
	$wp_admin_bar->add_menu( array(
	'id' => 'diww',
	'parent' => 'site-name',
	'title' => __( 'Oeuvres'),
	'href' => admin_url( '/edit.php?post_type=oeuvre' )
	) );
}
//add_action('admin_bar_menu', 'my_admin_bar_link', 1000);
function mes_options(){
	global $wp_admin_bar;
	if ( !is_super_admin() || !is_admin_bar_showing() )
		return;
	$wp_admin_bar->add_menu( array(
	'id' => 'diww',
	'parent' => 'site-name',
	'title' => __( 'Mes options'),
	'href' => admin_url( '/themes.php?page=options' )
	) );
}
add_action('admin_bar_menu', 'mes_options', 999);

/********** FLUX RSS IMAGES *****************/

function wpc_rss_miniature($excerpt) {
global $post;

$content = '<p>' . get_the_post_thumbnail($post->ID) .
'</p>' . get_the_excerpt();

return $content;
}
add_filter('the_excerpt_rss', 'wpc_rss_miniature');
add_filter('the_content_feed', 'wpc_rss_miniature');

function stop_plugin_update( $value ) {
 unset( $value->response['events-calendar-pro/events-calendar-pro.php'] );
 return $value;
}
add_filter( 'site_transient_update_plugins', 'stop_plugin_update' );
?>