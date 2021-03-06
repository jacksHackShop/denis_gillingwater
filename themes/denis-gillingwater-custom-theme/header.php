<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
            <meta name="theme-color" content="#121212">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

	</head>

	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

		<div id="container">

			<header class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">

				<div id="inner-header" class="cf">

					<?php // to use a image just replace the bloginfo('name') with your img src and remove the surrounding <p> ?>
					<a id="logo" href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a>
					<?php // if you'd like to use the site description you can un-comment it below ?>
					<?php // bloginfo('description'); ?>


					<div id="navigation" itemscope class="<?php if(get_post_type() === 'book_gallery') echo 'open'?>" itemtype="http://schema.org/SiteNavigationElement">
						<a id="header_button" class="desktop_only">View Books</a>
						<div class="mobile_only" id="hamburger_nav">
							<div id="hamburger">
							    <div id="top" class="bun"></div>
							    <div id="middle" class="bun"></div>
							    <div id="bottom" class="bun"></div>
							</div>
							<div id="mobile_nav">
								<ul>
								<?php
									// store title before wp_query over rights the post
									$current_title = get_the_title($post->ID);
									$args = [
										'post_type' => "book_gallery", 
										'posts_per_page' => "-1", 
										'meta_key' => "nav_weight", 
										'orderby' => "meta_value", 
										'order' => "ASC"
									];
									$iterable = 1; 
									$gallery_query = new WP_Query( $args );
									while ($gallery_query->have_posts()) : 
										$gallery_query->the_post();?>
										<li>
											<a href="<?php the_permalink();?>">
												<?php the_title(); ?>
											</a>
										</li>
									<?php endwhile;?>
								</ul>
							</div>
						</div>
						<div class="desktop_only" id='book_nav'>
							<ul id="book_items">
							<?php
								$args = array(
									'post_type' => "book_gallery", 
									'posts_per_page' => "-1", 
									'meta_key' => "nav_weight", 
									'orderby' => "meta_value", 
									'order' => "ASC"
								);
								
								$iterable = 1; 
								$gallery_query = new WP_Query( $args );
								if ($gallery_query->have_posts()) : 
									while ($gallery_query->have_posts()) : 
										$gallery_query->the_post(); ?>
											<li class="book_item <?php if(get_the_title() === $current_title) echo 'current' ; ?>"><!--
												--><a class="book_id" href="<?php the_permalink(); ?>"><?php echo $iterable?></a><!--
												--><a class="book_title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a><!--
											--></li><!--	
							--><?php
							$iterable++;
							endwhile;
							endif;
							wp_reset_postdata();
							?>
						</ul>
						</div>

					</div>

				</div>

			</header>
