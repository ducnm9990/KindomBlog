<?php
/*
 * Template Name: Multi-page 
 * Description: Multi-page Template 
 */

get_header();
?>

<?php if (have_posts()): while(have_posts()): the_post(); ?>

<?php 
	$backgroundImage = get_field('page_background_image');
	$backgroundGradientColor1 = get_field('page_background_color_1');
	$backgroundGradientColor2 = get_field('page_background_color_2');
	$title = get_the_title();
	$subtitle = get_field('page_subtitle');
	$pageObjects = get_field('page_multi_pages');
?>

<main>
	<?php /* 
    <section class="home-section <?php echo get_field('page_is_text_color_reversed') ? 'color-reverse' : ''?>">
        <div class="section-mobile visible-xs">
            <div 
            	class="section-image full-cover"
            	<?php if($backgroundImage):?> 
            	style="background-image:url('<?php echo $backgroundImage;?>')"
            	<?php elseif($backgroundGradientColor1 && $backgroundGradientColor2):?>
            	style="background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $backgroundGradientColor1?>), to(<?php echo $backgroundGradientColor2?>));background: -webkit-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $backgroundGradientColor1?>), to(<?php echo $backgroundGradientColor2?>));background: -moz-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $backgroundGradientColor1?>), to(<?php echo $backgroundGradientColor2?>));background: -o-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $backgroundGradientColor1?>), to(<?php echo $backgroundGradientColor2?>));background: -ms-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $backgroundGradientColor1?>), to(<?php echo $backgroundGradientColor2?>));"
            	<?php elseif($backgroundGradientColor1):?>
            	style="background: <?php echo $backgroundGradientColor1?>"
            	<?php endif;?>
            >
                <div class="section-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-9 col-sm-6 col-md-6">
                                <div class="section-text">
                                    <h1 class="main-title"><?php echo $title;?></h1>
                                </div>
                            </div>
                        </div>
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
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="section-text">
                            	<?php if($subtitle):?>
                                <h2 class="main-subtitle"><?php echo $subtitle;?></h2>
                                <?php endif;?>
                                <p class="section-description font-light"><?php the_content();?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div 
        	class="section-desktop full-cover hidden-xs"
			<?php if($backgroundImage):?> 
			style="background-image:url('<?php echo $backgroundImage;?>')"
			<?php elseif($backgroundGradientColor1 && $backgroundGradientColor2):?>
			style="background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $backgroundGradientColor1?>), to(<?php echo $backgroundGradientColor2?>));background: -webkit-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $backgroundGradientColor1?>), to(<?php echo $backgroundGradientColor2?>));background: -moz-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $backgroundGradientColor1?>), to(<?php echo $backgroundGradientColor2?>));background: -o-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $backgroundGradientColor1?>), to(<?php echo $backgroundGradientColor2?>));background: -ms-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $backgroundGradientColor1?>), to(<?php echo $backgroundGradientColor2?>));"
			<?php elseif($backgroundGradientColor1):?>
			style="background: <?php echo $backgroundGradientColor1?>"
			<?php endif;?>
        >
            <div class="section-content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 <?php if(get_field('page_content_position')):?>col-sm-offset-6 col-md-offset-6<?php endif;?>">
                            <div class="section-text">
                                <h1 class="main-title"><?php echo $title?></h1>
                            	<?php if($subtitle):?>
                                <h2 class="main-subtitle"><?php echo $subtitle;?></h2>
                                <?php endif;?>
                                <p class="section-description font-light"><?php the_content();?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	*/?>
    <?php 
    	foreach($pageObjects as $pageObject):
    		$pageID = $pageObject->ID;
			$pageBackgroundImage = get_field('page_background_image', $pageID);
			$pageBackgroundGradientColor1 = get_field('page_background_color_1', $pageID);
			$pageBackgroundGradientColor2 = get_field('page_background_color_2', $pageID);
			$pageExpandedContentTitle = get_field('page_expanded_content_title', $pageID);
			$pageTitle = get_the_title($pageID);
			$pageContent = do_shortcode($pageObject->post_content);
			$pagePadding = get_field('page_padding', $pageID);
    ?>
    <section id="pageSection<?php echo $pageID;?>" class="home-section <?php if($pageBackgroundImage):?>full-cover-section<?php endif;?><?php echo get_field('page_is_text_color_reversed', $pageID) ? ' color-reverse' : ''?>">
		<?php if($pageBackgroundImage):?>
        <div class="section-mobile visible-xs">
            <div 
            	class="section-image <?php if($pageBackgroundImage):?>full-cover<?php endif;?>"
            	<?php if($pageBackgroundImage):?> 
            	style="background-image:url('<?php echo $pageBackgroundImage;?>')"
            	<?php elseif($pageBackgroundGradientColor1 && $pageBackgroundGradientColor2):?>
            	style="background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $pageBackgroundGradientColor1?>), to(<?php echo $pageBackgroundGradientColor2?>));background: -webkit-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $pageBackgroundGradientColor1?>), to(<?php echo $pageBackgroundGradientColor2?>));background: -moz-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $pageBackgroundGradientColor1?>), to(<?php echo $pageBackgroundGradientColor2?>));background: -o-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $pageBackgroundGradientColor1?>), to(<?php echo $pageBackgroundGradientColor2?>));background: -ms-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $pageBackgroundGradientColor1?>), to(<?php echo $pageBackgroundGradientColor2?>));"
            	<?php elseif($pageBackgroundGradientColor1):?>
            	style="background: <?php echo $pageBackgroundGradientColor1?>"
            	<?php endif;?>
            >
                <div class="section-content">
                    <div class="container">
						<?php echo $pageContent;?>
                    </div>
                </div>
            </div>
            <div 
            	class="section-mobile-description"
            	<?php if($pageBackgroundGradientColor1 && $pageBackgroundGradientColor2):?>
            	style="background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $pageBackgroundGradientColor1?>), to(<?php echo $pageBackgroundGradientColor2?>));background: -webkit-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $pageBackgroundGradientColor1?>), to(<?php echo $pageBackgroundGradientColor2?>));background: -moz-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $pageBackgroundGradientColor1?>), to(<?php echo $pageBackgroundGradientColor2?>));background: -o-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $pageBackgroundGradientColor1?>), to(<?php echo $pageBackgroundGradientColor2?>));background: -ms-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $pageBackgroundGradientColor1?>), to(<?php echo $pageBackgroundGradientColor2?>));"
            	<?php elseif($pageBackgroundGradientColor1):?>
            	style="background: <?php echo $pageBackgroundGradientColor1?>;<?php echo $pagePadding ? ('padding: ' . $pagePadding . 'em') : ''?>"
            	<?php endif;?>
            >
                <div class="container">
                	<?php echo $pageContent;?>
                </div>
            </div>
        </div>
        <div 
        	class="section-desktop hidden-xs <?php if($pageBackgroundImage):?>full-cover<?php endif;?>"
			<?php if($pageBackgroundImage):?> 
			style="background-image:url('<?php echo $pageBackgroundImage;?>')"
			<?php elseif($pageBackgroundGradientColor1 && $pageBackgroundGradientColor2):?>
			style="background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $pageBackgroundGradientColor1?>), to(<?php echo $pageBackgroundGradientColor2?>));background: -webkit-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $pageBackgroundGradientColor1?>), to(<?php echo $pageBackgroundGradientColor2?>));background: -moz-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $pageBackgroundGradientColor1?>), to(<?php echo $pageBackgroundGradientColor2?>));background: -o-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $pageBackgroundGradientColor1?>), to(<?php echo $pageBackgroundGradientColor2?>));background: -ms-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $pageBackgroundGradientColor1?>), to(<?php echo $pageBackgroundGradientColor2?>));"
			<?php elseif($pageBackgroundGradientColor1):?>
			style="background: <?php echo $pageBackgroundGradientColor1?>;<?php echo $pagePadding ? ('padding: ' . $pagePadding . 'em') : ''?>"
			<?php endif;?>
        >
            <div class="section-content">
                <div class="container">
                	<?php echo $pageContent;?>
                </div>
            </div>
        </div>
        <?php else:?>
        <div 
        	class="section-content"
			<?php if($pageBackgroundGradientColor1 && $pageBackgroundGradientColor2):?>
			style="background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $pageBackgroundGradientColor1?>), to(<?php echo $pageBackgroundGradientColor2?>));background: -webkit-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $pageBackgroundGradientColor1?>), to(<?php echo $pageBackgroundGradientColor2?>));background: -moz-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $pageBackgroundGradientColor1?>), to(<?php echo $pageBackgroundGradientColor2?>));background: -o-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $pageBackgroundGradientColor1?>), to(<?php echo $pageBackgroundGradientColor2?>));background: -ms-linear-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $pageBackgroundGradientColor1?>), to(<?php echo $pageBackgroundGradientColor2?>));"
			<?php elseif($pageBackgroundGradientColor1):?>
			style="background: <?php echo $pageBackgroundGradientColor1?>;<?php echo $pagePadding ? ('padding: ' . $pagePadding . 'em') : ''?>"
			<?php endif;?>
        >
			<div class="container">
				<?php echo $pageContent;?>	
			</div>
        </div>
        <?php endif;?>
    </section>
    <?php if($pageExpandedContentTitle):?>
    <section id="expandedContent<?php echo implode('', explode(' ', $pageTitle))?>" class="home-section help-detail-section expanded-section">
        <h1 class="main-title section-title text-center"><?php echo $pageExpandedContentTitle?></h1>
        <?php 
        	$rows = get_field('page_expanded_content_rows', $pageID);
        ?>
		<?php foreach($rows as $k => $row):?>
		<article class="help-item">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-md-6 <?php if(!($k%2)):?>col-md-push-6<?php endif;?>">
						<div class="help-item-img <?php if(!($k%2)):?>text-left<?php else:?>text-right<?php endif;?>">
							<img class="block-img" src="<?php echo $row['page_expanded_content_row_image']?>">
						</div>
					</div>
					<div class="col-xs-12 col-md-6 <?php if(!($k%2)):?>col-md-pull-6<?php endif;?>">
						<h2 class="help-item-title"><?php echo $row['page_expanded_content_row_title']?></h2>
						<p class="help-item-description font-light"><?php echo $row['page_expanded_content_row_description']?></p>
					</div>
				</div>
			</div>
		</article>
		<?php endforeach;?>
        <a class="btn-show-less" href="javascript:void(0);">Show less</a>
    </section>
    <?php endif;?>
    <?php endforeach;?>
</main>


<?php endwhile; else: ?>
	<p><?php _e('Sorry, this page does not exist.'); ?></p>
<?php endif; ?>

<?php get_footer();?>