	<h1>Options</h1>
	

<style>
	input[type=text], input[type=url] {
		display: block;
		max-width: 90%;
		width: 600px;
	}
	label{
		display: block;
		font-weight: bold;
		margin-bottom: 15px;
		margin-top: 25px;
	}
	hr{
		color:#000;
		background-color: #000;
		height: 4px;
		max-width: 500px;
		margin-left:0;
	}
</style>

<form method="post" action="options.php">
	<?php wp_nonce_field('update-options'); ?>
	<h2>Mode maintenance</h2>
	<input name="maintenance" type="radio" value="oui" <?php checked('oui',get_option('maintenance')); ?> /> oui
	<input name="maintenance" type="radio" value="non" <?php checked('non',get_option('maintenance')); ?> /> non
	<hr>
	
	<h2>Player soundcloud</h2>
	<input name="player" type="radio" value="oui" <?php checked('oui',get_option('player')); ?> /> oui
	<input name="player" type="radio" value="non" <?php checked('non',get_option('player')); ?> /> non
	<label>Largeur du player (250 à 500)</label>
	<input type="number" name="width" id="width" value="<?php echo get_option('width'); ?>">
	<label>Hauteur du player (65 à 92 max)</label>
	<input type="number" name="height" id="height" value="<?php echo get_option('height'); ?>">
	<label>Url de la playlist</label>
	<p>ex : https://api.soundcloud.com/playlists/190680149</p>
	<input type="url" name="soundcloud" id="soundcloud" value="<?php echo get_option('soundcloud'); ?>">
	<hr>
	
	<h2>Gestion de la page d'accueil</h2>
	<h3>Les 4 cadres d'actualités ou de mise en avant</h3>
	<p>Certains, s'ils sont vides, afficheront des informations automatiquement (flux d'actus,carte des menus hors menu du jour...).</p>
	<h4>Image principale</h4>
	<label>Image principale COULEUR de l'accueil (taille 960px / 640px)</label>
	<input type="url" name="image1" id="image1" value="<?php echo get_option('image1'); ?>">
	<label>Image principale N&B de l'accueil (taille 960px / 640px)</label>
	<input type="url" name="image1nb" id="image1nb" value="<?php echo get_option('image1nb'); ?>">
	<label>Lien image principale de l'accueil</label>
	<input type="url" name="link1" id="link1" value="<?php echo get_option('link1'); ?>">
	<label>filtre image</label>
	<input name="nbP" type="radio" value="oui" <?php checked('oui',get_option('nbP')); ?> /> oui
	<input name="nbP" type="radio" value="non" <?php checked('non',get_option('nbP')); ?> /> non
	
	<hr>
	<h4>Premier cadre à gauche</h4>
	<label>Identifiant de l'article ou de la page (obligatoire)</label>
	<input type="number" name="cadre1ID" id="cadre1ID" value="<?php echo get_option('cadre1ID'); ?>">
	<label>Titre de l'encart (option)</label>
	<input type="text" name="cadre1Titre" id="cadre1Titre" value="<?php echo get_option('cadre1Titre'); ?>">
	<label>Image de l'encart (option) (taille 960px / 640px)</label>
	<input type="url" name="cadre1IMG" id="cadre1IMG" value="<?php echo get_option('cadre1IMG'); ?>">
	<label>Image de l'encart N&B (option) (taille 960px / 640px)</label>
	<input type="url" name="cadre1IMGnb" id="cadre1IMGnb" value="<?php echo get_option('cadre1IMGnb'); ?>">
	<label>Lien de l'encart (option) (si élément hors ID article ou page)</label>
	<input type="url" name="cadre1LINK" id="cadre1LINK" value="<?php echo get_option('cadre1LINK'); ?>">
	<label>filtre image</label>
	<input name="nb1" type="radio" value="oui" <?php checked('oui',get_option('nb1')); ?> /> oui
	<input name="nb1" type="radio" value="non" <?php checked('non',get_option('nb1')); ?> /> non
	
	<hr>
	<h4>Deuxième cadre à gauche</h4>
	<label>Identifiant de l'article ou de la page (obligatoire)</label>
	<input type="number" name="cadre2ID" id="cadre2ID" value="<?php echo get_option('cadre2ID'); ?>">
	<label>Titre de l'encart (option)</label>
	<input type="text" name="cadre2Titre" id="cadre2Titre" value="<?php echo get_option('cadre2Titre'); ?>">
	<label>Image de l'encart (option) (taille 960px / 640px)</label>
	<input type="url" name="cadre2IMG" id="cadre2IMG" value="<?php echo get_option('cadre2IMG'); ?>">
	<label>Image de l'encart N&B (option) (taille 960px / 640px)</label>
	<input type="url" name="cadre2IMGnb" id="cadre2IMGnb" value="<?php echo get_option('cadre2IMGnb'); ?>">
	<label>Lien de l'encart (option) (si élément hors ID article ou page)</label>
	<input type="url" name="cadre2LINK" id="cadre2LINK" value="<?php echo get_option('cadre2LINK'); ?>">
	<label>filtre image</label>
	<input name="nb2" type="radio" value="oui" <?php checked('oui',get_option('nb2')); ?> /> oui
	<input name="nb2" type="radio" value="non" <?php checked('non',get_option('nb2')); ?> /> non
	
	<hr>
	<h4>Troisième cadre à gauche</h4>
	<label>INACTIF <em>Identifiant de l'article ou de la page</em></label>
	<input type="number" name="cadre4ID" id="cadre4ID" value="<?php echo get_option('cadre4ID'); ?>">
	<label>Titre de l'encart</label>
	<input type="text" name="cadre4Titre" id="cadre4Titre" value="<?php echo get_option('cadre4Titre'); ?>">
	<label>Image de l'encart (taille 960px / 640px)</label>
	<input type="url" name="cadre4IMG" id="cadre4IMG" value="<?php echo get_option('cadre4IMG'); ?>">
	<label>Image de l'encart N&B (taille 960px / 640px)</label>
	<input type="url" name="cadre4IMGnb" id="cadre4IMGnb" value="<?php echo get_option('cadre4IMGnb'); ?>">
	<label>Lien de l'encart (option) (si élément hors ID article ou page)</label>
	<input type="url" name="cadre4LINK" id="cadre4LINK" value="<?php echo get_option('cadre4LINK'); ?>">
	<label>filtre image</label>
	<input name="nb4" type="radio" value="oui" <?php checked('oui',get_option('nb4')); ?> /> oui
	<input name="nb4" type="radio" value="non" <?php checked('non',get_option('nb4')); ?> /> non
	
	<hr>
	<h2>Boutons réseaux sociaux</h2>
	<label>Facebook</label>
	<input type="url" name="facebook" id="facebook" value="<?php echo get_option('facebook'); ?>">

	<label>Twitter</label>
	<input type="url" name="twitter" id="twitter" value="<?php echo get_option('twitter'); ?>">

	<label>Instagram</label>
	<input type="url" name="instagram" id="instagram" value="<?php echo get_option('instagram'); ?>">

	<label>Pinterest</label>
	<input type="url" name="pinterest" id="pinterest" value="<?php echo get_option('pinterest'); ?>">
	
	<label>Flickr</label>
	<input type="url" name="flickr" id="flickr" value="<?php echo get_option('flickr'); ?>">
	
	<label>Spotify</label>
	<input type="url" name="spotify" id="spotify" value="<?php echo get_option('spotify'); ?>">
	
	<label>Mail</label>
	<input type="email" name="mail" id="mail" value="<?php echo get_option('mail'); ?>">
	
	<hr>
	<h2>Texte footer</h2>
	<label>Texte dans la barre du pied de page</label>
	<input type="text" name="footer" id="footer" value="<?php echo get_option('footer'); ?>">
	
	<!-- <h2>Images</h2>
	
	<label>Cadre 3</label>
	<input type="url" name="image2" id="image2" value="<?php echo get_option('image2'); ?>">
	<label>Cadre 4</label>
	<input type="url" name="image3" id="image3" value="<?php echo get_option('image3'); ?>">
	<label>Cadre 5</label>
	<input type="url" name="image4" id="image4" value="<?php echo get_option('image4'); ?>"> -->
	
<!-- Mise à jour des valeurs -->
<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="mail, height, width, player, soundcloud, image1nb, cadre1IMGnb, cadre2IMGnb, cadre4IMGnb, spotify, footer, maintenance, link1, cadre1ID, cadre1Titre, cadre1IMG, cadre1LINK, cadre2ID, cadre2Titre, cadre2IMG, cadre2LINK, cadre4ID, cadre4Titre, cadre4IMG, cadre4LINK, facebook, twitter, instagram, pinterest,flickr, image1, image2, image3, image4, nbP, nb1, nb2, nb4" />

<!-- Bouton de sauvegarde -->
<p>
<input type="submit" value="<?php _e('Save Changes'); ?>" />
</p>
</form>
