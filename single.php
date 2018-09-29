<!-- Essa página é chamada para exibir um post, quando não havia essa página o template usado era o index.php, acontece isso na falta do single. Vamos usar o template chamado content-single.php -->
<?php get_header(); ?>
	<div id="primary">
		<div id="main">
			<div class="container">
				<?php 

				while( have_posts() ): the_post();

					get_template_part( 'template-parts/content', 'single' );

				endwhile;

				?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>