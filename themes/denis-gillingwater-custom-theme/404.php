
<a id="logo" href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a>
			<div id="content">

				<div id="inner-content" class="wrap cf">

					<main id="main" class="m-all t-3of3 d-7of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<article id="post-not-found" class="hentry cf">

							<header class="article-header">

								<h1><?php _e( 'Epic 404 - Article Not Found', 'bonestheme' ); ?></h1>

							</header>

							<section class="entry-content">

								<p><?php _e( 'The article you were looking for was not found.', 'bonestheme' ); ?></p>
								<p href='<?php echo home_url(); ?>'> Escape </p>

							</section>

						</article>

					</main>

				</div>

			</div>

<?php get_footer(); ?>
