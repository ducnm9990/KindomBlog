<?php
/**
 * The Header for Kindom theme
 *
 * @package WordPress
 * @subpackage Kindom
 * @since Kindom 1.0
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
    <?php wp_head(); ?>
</head>

<body <?php body_class( $class ); ?>>

<header>
    <nav class="navbar">
        <div class="container">
            <div class="navbar-header">
                <div class="pull-right">
                	<span class="text-menu">Menu</span>
                	<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#mainNav" aria-expanded="false">
                		<span class="sr-only">Toggle navigation</span>
                		<span class="icon-bar"></span><span class="icon-bar"></span>
                		<span class="icon-bar"></span>
                	</button>
                </div>
                <h1 class="logo">
                	<a class="navbar-brand" href="<?php echo home_url()?>">
                		<img src="<?php the_field('logo', 'options')?>">
                	</a>
                </h1>
            </div>
			<?php $pageObjects = get_field('page_multi_pages', $post->ID);?>
            <div class="collapse navbar-collapse <?php echo $pageObjects ? 'navbar-page' : ''?>" id="mainNav">
                <ul class="nav navbar-nav navbar-right">
                	<?php if(!$pageObjects):?>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Who is Kindom for?</a></li>
                    <li><a href="#">Features</a></li>
                    <li><a href="#">Benefits</a></li>
                    <li><a href="#">Blog</a></li>
                    <?php else:?>
					<?php foreach($pageObjects as $pageObject):?>
                    <li><a href="#pageSection<?php echo $pageObject->ID?>"><?php echo get_the_title($pageObject->ID)?></a></li>
					<?php endforeach;?>
                    <?php endif;?>
                </ul>
            </div>
        </div>
    </nav>
</header>