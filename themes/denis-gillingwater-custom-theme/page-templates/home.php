<?php
/*
 Template Name: Home
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/	

$current_post_id = get_the_ID();
?>

<?php get_header(); ?>

			<div id="content">

				<div class="inner-content" id="inner-content" class="cf">

						<main id="main" class="m-all t-3of3 d-7of7 " role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
							<div class="galleries">
							<?php 
							$args = array(
								'post_type' => "book_gallery", 
								'posts_per_page' => "-1", 
								'meta_key' => "nav_weight", 
								'orderby' => "meta_value", 
								'order' => "ASC"
							);

							$gallery_query = new WP_Query( $args );
							if ($gallery_query->have_posts()) : while ($gallery_query->have_posts()) : $gallery_query->the_post();
							$gallery = get_field('book_gallery');
							?>
							
								<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
									<div class='book_wrapper'>	
										<a class= 'gallery_item'  href="<?php the_permalink() ?>">
											<div class="gallery_thumb" style="background-image:url('<?php the_field('display_image') ?>')">
											</div>
										</a>
									</div>
									<div class="hover_thumb" style="background-image:url('<?php the_field('hover_image') ?>')">
									</div>
								</article>
							
							<?php endwhile;
							wp_reset_postdata(); ?>
							</div>
							<div class="about desktop_only">
								<h2>ARTIST STATEMENT</h2>
								<div class="about_text">
									<?php echo substr(get_field('artist_statement'), 0, 1000); ?>...
									<div id="more_button" class="text_button">SEE MORE</div>
								</div>
								<p class="copyright"> © 2018 Denis Gillingwater </p>
							</div>
							<?php else : ?>
									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</main>

				</div>
				<div class="modal_wrapper" id='modal_wrapper'>
					<div class='modal' id='about_modal'>
						<div class="text_button desktop_only" id='close_modal'>CLOSE</div>
						<div id='modal_content'>		
							<section id="artist_statement">
								<h2 class="section_header">ARTIST STATEMENT</h2>
								<div><?php echo get_field('artist_statement') ; ?></div>
							</section>
							<section id="bio">
								<h2 class="section_header">BIO</h2>
								<div><?php echo get_field('bio') ; ?></div>
							</section>
							<section id="cv">
								<h2 class="section_header">SOLO EXHIBITIONS AND SHOWS</h2>
								<div>
									<ul class="cv_list">
										<?php $solo_shows = get_field('solo_exhibitions_and_shows') ; 
										foreach ($solo_shows as $show) : 
											$link = $show['link'];
											$venue = $show['venue'];
											$show_name = $show['show_name']; ?>
											<li>
												<?php if ($link != '') : ?>
												<a href="<?php echo $link ;?>">
												<?php endif ; ?>
													<p class="venue"><?php echo $venue; ?></p>
													<?php if ($show_name != '') : ?>
													<p class="show_name">( <?php echo $show_name; ?> )</p>
													<?php endif; ?>
												<?php if ($link != '') : ?>
												</a>
												<?php endif; ?>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
								<h2 class="section_header">GROUP SHOWS</h2>
								<div>
									<ul class="cv_list">
										<?php $group_shows = get_field('group_shows') ; 
										foreach ($group_shows as $show) : 
											$link = $show['link'];
											$venue = $show['venue'];
											$show_name = $show['show_name']; ?>
											<li>
												<?php if ($link != '') : ?>
												<a href="<?php echo $link ;?>">
												<?php endif ; ?>
													<p class="venue"><?php echo $venue; ?></p>
													<?php if ($show_name != '') : ?>
													<p class="show_name">( <?php echo $show_name; ?> )</p>
													<?php endif; ?>
												<?php if ($link != '') : ?>
												</a>
												<?php endif; ?>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
								<h2 class="section_header">RESIDENCIES</h2>
								<div>
									<ul class="cv_list">
										<?php $solo_shows = get_field('residencies') ; 
										foreach ($solo_shows as $show) : 
											$link = $show['link'];
											$venue = $show['venue'];?>
											<li>
											<?php if ($link != '') : ?>
												<a href="<?php echo $link ;?>">
											<?php endif ; ?>
													<p><?php echo $venue; ?></p>
												<?php if ($link != '') : ?>
												</a>
												<?php endif; ?>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
							</section>
							<section id="contact_info">
								<h2 class="section_header">CONTACT INFO</h2>
								<div id="contact_email">
									<span>EMAIL: <a href="mailto:<?php echo get_field('email') ?>"><?php echo get_field('email') ?></a></span>
								</div>
								<div id="contact_phone">
									<span>PHONE: <a href="tel:<?php echo get_field('phone_number') ?>"><?php echo get_field('phone_number') ?></a></span>
								</div>
							</section>
						</div>
					</div>
				</div>

			</div>
<?php wp_footer(); ?>