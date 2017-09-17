<?php get_header(); ?>

<div id="page1" class="row">
	<section id="case1" class="col-lg-3 col-md-3 col-sm-6">
		<?php
		
		// check if the flexible content field has rows of data
		if( have_rows('case1') ):
		
		     // loop through the rows of data
		    while ( have_rows('case1') ) : the_row();
		
		        if( get_row_layout() == 'case1a' ):?>
		            <?php
                        if(is_page(2)):?>
                    <div id="search">
                        <?php dynamic_sidebar('recherche'); ?>
                    </div>
                        <?php endif;
                    ?>
		        	<div class="lestextes <?php if(is_page(2)):echo "infos";endif; ?>">
		        	
		        	<?php the_sub_field('case1_texte'); ?>
		        	</div>
		
		       <?php elseif( get_row_layout() == 'case1b' ): 
		       		$val = get_sub_field('nb');
		       		if ($val[0]==='oui'){$class1b = ' class="nb"';}
		        	$file = get_sub_field('case1_image');
					echo '<img src="'.$file.'"'.$class1b.'>';
					if(get_sub_field('image_nb')){?>
					<img src="<?php echo get_sub_field('image_nb'); ?>" alt="<?php echo get_the_title(); ?>" class="nbr hidden-xs hidden-sm">	
					<?php }?>
		        	<div class="lestextes top"><?php the_sub_field('case1_text'); ?></div>
		
		        <?php endif;
		
		    endwhile;
		
		else :
		
		    echo "test";// no layouts found
		
		endif;
		
		?>
	</section>
	
		<?php
		
		// check if the flexible content field has rows of data
		if( have_rows('case2') ):
		
		     // loop through the rows of data
		    while ( have_rows('case2') ) : the_row();
		
		     if( get_row_layout() == 'case2a' ):?>
		<section id="case2" class="col-lg-6 col-md-6 hidden-sm texte">
		        	<div class="lestextes"><?php the_sub_field('case2_texte'); ?></div>
		
		        <?php elseif( get_row_layout() == 'case2b' ): ?>
		<section id="case2" class="col-lg-6 col-md-6 hidden-sm">
                <?php if(get_sub_field('lien')){?>
            <a href="<?php echo get_sub_field('lien'); ?>">
                <?php }?>
		        	<?php $file = get_sub_field('case2_image');
		        	$val2 = get_sub_field('nb');
		        	if ($val2[0]==='oui'){$class2 = ' class="nb"';}
					echo '<img src="'.$file.'" alt="'.get_the_title().'"'.$class2.'>';
					if(get_sub_field('image_nb')){?>
					<img src="<?php echo get_sub_field('image_nb'); ?>" alt="<?php echo get_the_title(); ?>" class="nbr hidden-xs hidden-sm">	
					<?php }
		      if(get_sub_field('lien')){?>
            </a>
                <?php };
                elseif( get_row_layout() == 'case3c' ): ?>
                    <section id="case2" class="col-lg-6 col-md-6 hidden-sm textecourt">
                        <div class="lestextes"><?php the_sub_field('case3_texte'); ?></div>
		       <?php 
		        endif;?>
		</section>
		    <?php endwhile;
		
		else :
		
		    echo "test";// no layouts found
		
		endif;
		
		?>
	
	<section id="texteP" class="col-lg-3 col-md-3 col-sm-6">
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="lestextes"><?php the_content(); ?></div>
	<?php endwhile; ?>
	</section>
</div>
<div id="page2" class="row">
		<?php
		
		// check if the flexible content field has rows of data
		if( have_rows('case3') ):
		
		     // loop through the rows of data
		    while ( have_rows('case3') ) : the_row();?>	
		       
               <?php if( get_row_layout() == 'case3a' ):?>
                <section id="case3" class="col-lg-6 col-md-6 col-sm-6 texte">
		        	<div class="lestextes"><?php the_sub_field('case3_texte'); ?></div>
				<?php elseif( get_row_layout() == 'case3c' ): ?>
		        <section id="case3" class="col-lg-6 col-md-6 col-sm-6 textecourt">
		        	<div class="lestextes"><?php the_sub_field('case3_texte'); ?></div>
		        <?php elseif( get_row_layout() == 'case3b' ): ?>
		        <section id="case3" class="col-lg-6 col-md-6 col-sm-6">
		        	<?php $file = get_sub_field('case3_image');
		        	$val3 = get_sub_field('nb');
		        	if ($val3[0]==='oui'){$class3 = ' class="nb"';}
					echo '<img src="'.$file.'" alt="'.get_the_title().'"'.$class3.'>';
					if(get_sub_field('image_nb')){?>
					<img src="<?php echo get_sub_field('image_nb'); ?>" alt="<?php echo get_the_title(); ?>" class="nbr hidden-xs hidden-sm">	
					<?php }
                    
		       endif;?>
			</section>
		   <?php endwhile;
		
		else :
		
		    echo "test";// no layouts found
		
		endif;
		
		?>
	<section id="case4" class="col-lg-6 col-md-6 col-sm-6">
		<?php
		
		// check if the flexible content field has rows of data
		if( have_rows('case4') ):
		
		     // loop through the rows of data
		    while ( have_rows('case4') ) : the_row();
		
		        if( get_row_layout() == 'case4a' ):?>
		
		        	<div class="lestextes"><?php the_sub_field('case4_texte'); ?></div>
		
		        <?php elseif( get_row_layout() == 'case4b' ):
		        	$val4 = get_sub_field('nb');
		        	if ($val4[0]==='oui'){$class4b = ' class="nb"';}
		        	$file = get_sub_field('case4_image');
					echo '<img src="'.$file.'" alt="'.get_the_title().'"'.$class4b.'>';
					if(get_sub_field('image_nb')){?>
					<img src="<?php echo get_sub_field('image_nb'); ?>" alt="<?php echo get_the_title(); ?>" class="nbr hidden-xs hidden-sm">
					<?php }
		        endif;
		
		    endwhile;
		
		else :
		
		    echo "test";// no layouts found
		
		endif;
		
		?>
	</section>
</div>


<?php get_footer(); ?>