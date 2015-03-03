<?php
/**
 * Template Name: Index Page
 * Description: page used as template for index of COR site.
 * @package WordPress
 * @subpackage COR 2015
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<!-- index page template -->
	<div class="indexHeader">
		<div class="agoraLogin">

		<?php echo do_shortcode( '[agora_middleware_login]' ); ?>
		
		</div>
		<img class="indexImage" src="<?php echo content_url(); ?>/uploads/2015/02/cor-welcome-banner.jpg" alt="COR Advisor banner image" >
		<div class="headerWrapper">
			<header class="entry-header">
			</header><!-- .entry-header -->		
		</div><!-- .headerWrapper -->
	</div><!-- .indexHeader -->


<div id="main-content" class="indexMain">

<!-- index full-width -->
		<div id="content" class="indexContent" role="main">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'page' );

				endwhile;
			?>
		</div><!-- #content -->
</div><!-- #main-content -->

<?php
//get_sidebar();
get_footer();
