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
$about = get_field("about_the_artist"); 
?>

<?php get_header(); ?>

			<div id="content">

				<div class="inner-content" id="inner-content" class="cf">

						<main id="main" class="m-all t-3of3 d-7of7 " role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
							<div class="galleries">
							<?php 
							$gallery_query = new WP_Query(array('post_type' => "book_gallery"));
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
							
							<?php endwhile;?>
							</div>
							<div class="about">
								<div class="about_text">
									<?php echo $about; ?>
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

			</div>
<?php wp_footer(); ?>