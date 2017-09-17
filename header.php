<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>
			<?php 
				if(is_home() || is_front_page()) :
					bloginfo('name');
				else :
					wp_title("", true);
				endif;
			?>
		</title>
		<!--<?php if(is_home) :?>
		
		<?php endif; ?>-->
		<meta name="author" content="Ticoët team">
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
		<!--<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); echo '?ver=' . filemtime( get_bloginfo( 'stylesheet_url' ) ); ?>" type="text/css" media="screen" />-->
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
		<?php wp_head(); ?>
		
	</head>

	<body <?php body_class(); ?>>
		<div id="entete" class="container">
			<header id="top" class="row">
				<div id="alafolie" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
			    </div>
			    <!-- <iframe style="border: 0; width: 300px; height: 42px;" src="https://bandcamp.com/EmbeddedPlayer/album=1986004305/size=small/bgcol=ffffff/linkcol=de270f/artwork=none/transparent=true/" seamless><a href="http://matiasgrenn.bandcamp.com/album/les-travers-es">Les Traversées by Erwan Tanguy, Morgan Daguent, Yves-Pol Ruelloux</a></iframe> -->
			    <?php if (get_option('player')==='oui'){?>
			    <div id="iframe" class="hidden-xs"><i class="fa fa-play-circle"></i><i class="fa fa-pause-circle" style="display:none;"></i></div>
			    <iframe id="sc-widget" width="<?php echo get_option('width'); ?>" height="<?php echo get_option('height'); ?>" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=<?php echo get_option('soundcloud'); ?>&amp;color=000000&amp;auto_play=false&amp;hide_related=false&amp;show_comments=false&amp;show_user=false&amp;show_reposts=false&amp;liking=false&amp;buying=false&amp;download=false&amp;sharing=false&amp;show_playcount=false&amp;show_artwork=false&amp;default_width=200&amp;default_height=65&amp;show_bpm=false&amp;theme_color=ffffff"></iframe>
				<?php }?>
            </header>
		</div>
		<div id="menu" class="container">
			<nav class="navbar navbar-default">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button aria-expanded="false" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
          <?php wp_nav_menu(array(
						'theme_location' => 'premier',
						'walker' => new Bootstrap_Walker_Nav_Menu(),
						'menu_class' => 'nav navbar-nav col-lg-9 col-sm-12'
					) );
					?>	
          <div id="moteurrecherche" class="nav navbar-nav navbar-right col-lg-3">
			<ul id="socialmedia" class="nav navbar-nav navbar-right">
            <?php if(get_option('facebook')){?>
							<li class="fb"><a href="<?php echo get_option('facebook'); ?>" title="Facebook <?php bloginfo('name'); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
						<?php }?>
						<?php if(get_option('twitter')){?>
							<li><a href="<?php echo get_option('twitter'); ?>" title="Twitter <?php bloginfo('name'); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
						<?php }?>
						<?php if(get_option('instagram')){?>
							<li><a href="<?php echo get_option('instagram'); ?>" title="Instagram <?php bloginfo('name'); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
						<?php }?>
						<?php if(get_option('pinterest')){?>
							<li><a href="<?php echo get_option('pinterest'); ?>" title="Pinterest <?php bloginfo('name'); ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
						<?php }?>
						<?php if(get_option('flickr')){?>
							<li class="hidden-md"><a href="<?php echo get_option('flickr'); ?>" title="Flickr <?php bloginfo('name'); ?>" target="_blank"><i class="fa fa-flickr"></i></a></li>
						<?php }?>
						<?php if(get_option('spotify')){?>
							<li><a href="<?php echo get_option('spotify'); ?>" title="Spotify <?php bloginfo('name'); ?>" target="_blank"><i class="fa fa-spotify"></i></a></li>
						<?php }?>
						<?php if(get_option('mail')){?>
							<li class="mail"><a href="mailto:<?php echo get_option('mail'); ?>" title="Mail à <?php bloginfo('name'); ?>" target="_blank"><i class="fa fa-envelope-o"></i></a></li>
						<?php }?>
          </ul>
		  </div>
        </div><!-- /.navbar-collapse -->
    </nav>
		</div>
		
		
		<div id="contenu" class="container">