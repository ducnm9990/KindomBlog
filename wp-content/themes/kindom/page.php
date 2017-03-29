<?php get_header(); ?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>

<?php 
	$backgroundImage = get_field('page_background_image');
	$backgroundGradientColor1 = get_field('page_background_color_1');
	$backgroundGradientColor2 = get_field('page_background_color_2');
	$expandedContentTitle = get_field('page_expanded_content_title');
	$padding = get_field('page_padding');
?>

<main>
    <section class="home-section <?php if($backgroundImage):?>full-cover-section<?php endif;?><?php echo get_field('page_is_text_color_reversed') ? ' color-reverse' : ''?>">
    
    	<?php if($backgroundImage):?>
        <div class="section-mobile visible-xs">
            <div 
            	class="section-image <?php if($backgroundImage):?>full-cover<?php endif;?>"
            	<?php if($backgroundImage):?> 
            	style="background-image:url('<?php echo $backgroundImage;?>')"
            	<?php elseif($backgroundGradientColor1 && $backgroundGradientColor2):?>
            	style="background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $backgroundGradientColor1?>), to(<?php echo $backgroundGradientColor2?>));background: -webkit-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $backgroundGradientColor1?>), to(<?php echo $backgroundGradientColor2?>));background: -moz-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $backgroundGradientColor1?>), to(<?php echo $backgroundGradientColor2?>));background: -o-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $backgroundGradientColor1?>), to(<?php echo $backgroundGradientColor2?>));background: -ms-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $backgroundGradientColor1?>), to(<?php echo $backgroundGradientColor2?>));"
            	<?php elseif($backgroundGradientColor1):?>
            	style="background: <?php echo $backgroundGradientColor1?>;<?php echo $padding ? ('padding: ' . $padding . 'em') : ''?>"
            	<?php endif;?>
            >
                <div class="section-content">
                    <div class="container">
						<?php the_content();?>
                    </div>
                </div>
            </div>
            <div 
            	class="section-mobile-description"
            	<?php if($backgroundGradientColor1 && $backgroundGradientColor2):?>
            	style="background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $backgroundGradientColor1?>), to(<?php echo $backgroundGradientColor2?>));background: -webkit-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $backgroundGradientColor1?>), to(<?php echo $backgroundGradientColor2?>));background: -moz-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $backgroundGradientColor1?>), to(<?php echo $backgroundGradientColor2?>));background: -o-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $backgroundGradientColor1?>), to(<?php echo $backgroundGradientColor2?>));background: -ms-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $backgroundGradientColor1?>), to(<?php echo $backgroundGradientColor2?>));"
            	<?php elseif($backgroundGradientColor1):?>
            	style="background: <?php echo $backgroundGradientColor1?>"
            	<?php endif;?>
            >
                <div class="container">
					<?php the_content();?>
                </div>
            </div>
        </div>
        <div 
        	class="section-desktop hidden-xs <?php if($backgroundImage):?>full-cover<?php endif;?>" 
			<?php if($backgroundImage):?> 
			style="background-image:url('<?php echo $backgroundImage;?>')"
			<?php elseif($backgroundGradientColor1 && $backgroundGradientColor2):?>
			style="background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $backgroundGradientColor1?>), to(<?php echo $backgroundGradientColor2?>));background: -webkit-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $backgroundGradientColor1?>), to(<?php echo $backgroundGradientColor2?>));background: -moz-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $backgroundGradientColor1?>), to(<?php echo $backgroundGradientColor2?>));background: -o-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $backgroundGradientColor1?>), to(<?php echo $backgroundGradientColor2?>));background: -ms-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $backgroundGradientColor1?>), to(<?php echo $backgroundGradientColor2?>));"
			<?php elseif($backgroundGradientColor1):?>
			style="background: <?php echo $backgroundGradientColor1?>;<?php echo $padding ? ('padding: ' . $padding . 'em') : ''?>"
			<?php endif;?>
        >
            <div class="section-content">
                <div class="container">
                	<?php the_content();?>
                </div>
            </div>
        </div>
        <?php else:?>
        <div 
        	class="section-content"
			<?php if($backgroundGradientColor1 && $backgroundGradientColor2):?>
			style="background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $backgroundGradientColor1?>), to(<?php echo $backgroundGradientColor2?>));background: -webkit-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $backgroundGradientColor1?>), to(<?php echo $backgroundGradientColor2?>));background: -moz-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $backgroundGradientColor1?>), to(<?php echo $backgroundGradientColor2?>));background: -o-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $backgroundGradientColor1?>), to(<?php echo $backgroundGradientColor2?>));background: -ms-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $backgroundGradientColor1?>), to(<?php echo $backgroundGradientColor2?>));"
			<?php elseif($backgroundGradientColor1):?>
			style="background: <?php echo $backgroundGradientColor1?>;<?php echo $padding ? ('padding: ' . $padding . 'em') : ''?>"
			<?php endif;?>
        >
        	<div class="container">
        		<?php the_content();?>
        	</div>
        </div>
        <?php endif;?>
    </section>
    <?php if($expandedContentTitle):?>
    <section id="expandedContent<?php echo implode('', explode(' ', $title))?>" class="home-section help-detail-section expanded-section">
        <h1 class="main-title section-title text-center"><?php echo $expandedContentTitle?></h1>
        <?php if(have_rows('page_expanded_content_rows')):?>
        	<?php 
        		$k = 0;
        		while(have_rows('page_expanded_content_rows')): the_row();
        	?>
			<article class="help-item">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-md-6 <?php if(!($k%2)):?>col-md-push-6<?php endif;?>">
							<div class="help-item-img <?php if(!($k%2)):?>text-left<?php else:?>text-right<?php endif;?>">
								<img class="block-img" src="<?php the_sub_field('page_expanded_content_row_image')?>">
							</div>
						</div>
						<div class="col-xs-12 col-md-6 <?php if(!($k%2)):?>col-md-pull-6<?php endif;?>">
							<h2 class="help-item-title"><?php the_sub_field('page_expanded_content_row_title')?></h2>
							<p class="help-item-description font-light"><?php the_sub_field('page_expanded_content_row_description')?></p>
						</div>
					</div>
				</div>
			</article>
        	<?php 
        			$k++;
        		endwhile;
        	?>
        <?php endif;?>
        <a class="btn-show-less" href="javascript:void(0);">Show less</a>
    </section>
    <?php endif;?>
</main>


<?php endwhile; else: ?>
	<p><?php _e('Sorry, this page does not exist.'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>