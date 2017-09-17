<footer id="footer" class="row">
				<div id="logo" class="col-lg-1 col-md-1 col-sm-2 hidden-xs">
					<a href="<?php bloginfo('url'); ?>"><?php 
				      	//$test = get_option("tl_logo_src");
						//print_r($test);
				      	if(!get_option("tl_logo_src")){bloginfo('name');} else{theme_logo();} 
				      ?></a>
				</div>
				<div id="adresse" class="col-lg-7 col-md-6 col-sm-10"><!-- © -->
				<?php if(get_option('footer')){echo '<p>'.get_option('footer').'</p>';} else{ ?>
					<p><!--<span class="alafolie">à la folie</span> -->26 avenue Corentin Cariou, Paris 19 - 07 76 79 70 66 - info[at]alafolie.paris<br>ouvert du mercredi au dimanche de 11h30 à 2h</p>
				<?php } ?>
				</div>
				<div id="nl" class="col-lg-2 col-md-2 col-sm-12">
					<a href="#newsletter" class="fancybox-inline">news&shy;letter</a>
					<aside class="hidden">
						<div id="newsletter" rel="col" class="fancybox-inline">
							<h2 class="alafolie">la newsletter</h2>
							<h3>Pour suivre nos actualités, nos événements, inscrivez-vous gratuitement à notre lettre d'information&nbsp;:</h3>
							<?php //print_r(do_shortcode("[mc4wp_form id='870']"));
							echo do_shortcode("[mc4wp_form id='870']"); ?>
						</div>
						
						<form method="post" action="http://ymlp.com/subscribe.php?id=geqwsyegmgw" target="signup_popup" onsubmit="window.open( 'http://ymlp.com/subscribe.php?id=geqwsyegmgw','signup_popup','scrollbars=yes,width=600,height=450'); return true;">
							  <!--<label>Votre email</label>
							  <input class="inputtext" placeholder="email" type="text" name="YMP0" size="50" />-->
							  <div class="input-group">
								  <span class="input-group-addon" id="basic-addon1">votre email</span>
								  <input type="text" class="inputtext form-control" placeholder="email" aria-describedby="basic-addon1" name="YMP0">
								  <span class="input-group-btn">
							        <!--<button class="btn btn-default" type="button">ok</button>--><input class="inputsubmit btn btn-default" type="submit" value="ok"  />
							      </span>
							  </div>
							  
							</form>
						
					</aside>
				</div>
				<div id="ml" class="col-lg-2 col-md-2 col-sm-12">
					<?php wp_nav_menu(array(
						'theme_location' => 'troisieme',
						//'walker' => new Bootstrap_Walker_Nav_Menu(),
						//'menu_class' => ''
					) );
					?>
				</div>
				
				<?php wp_footer(); ?>
		</footer>
		</div>
		
	</body>
</html>