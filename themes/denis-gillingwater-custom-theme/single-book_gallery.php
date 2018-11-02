<?php
/*
 * CUSTOM POST TYPE TEMPLATE
 *
 * This is the custom post type post template. If you edit the post type name, you've got
 * to change the name of this template to reflect that name change.
 *
 * For Example, if your custom post type is "register_post_type( 'bookmarks')",
 * then your single template should be single-bookmarks.php
 *
 * Be aware that you should rename 'custom_cat' and 'custom_tag' to the appropiate custom
 * category and taxonomy slugs, or this template will not finish to load properly.
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="cf">

						<main id="main" class="m-all t-3of3 d-7of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php $gallery = get_field("book_gallery"); ?>
							<article class="gallery_single" id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">
								<?php for ($i=0; $i < count($gallery); $i++) : ?>
									<div class="picture_item">
										<img class="picture_thumb" src="<?php echo $gallery[$i]['url']; ?>">
									</div>
								<?php endfor; ?>
							</article>

							<?php endwhile; ?>
							<div class="about">
								<h2 class="about_title"><?php the_title(); ?></h2>
								<div class="about_text"><?php the_field("about"); ?></div>
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
											<p><?php _e( 'This is the error message in the single-custom_type.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</main>


				</div>

			</div>
<?php wp_footer(); ?>