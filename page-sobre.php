<!--Fizemos um template para a página sobre, para esse arquivo ser chamado devemos colocar page-slug da página, estamos na página sobre que tem o slug sobre, logo o nome da página precisa ser page-sobre.php.
Também é possível termos um template que serve para mais de uma página-->
<?php get_header(); ?>
	<div class="content-area">
		<main>
			<section class="middle-area">
				<div class="container">
					<div class="row">
						<aside class="sidebar col-md-4">Barra Lateral</aside>
						<div class="news col-md-8">
							<?php 
							// Se houver algum post
							if( have_posts() ):
								// Enquanto houver posts, mostre-os pra gente
								while( have_posts() ): the_post();

							?>

							<article>
								<h2><?php the_title(); ?></h2>
								<p>Published in <?php echo get_the_date(); ?> by <?php the_author_posts_link(); ?></p>
								<p>Categories: <?php the_category( ' ' ); ?></p>
								<p><?php the_tags( 'Tags: ', ', ' ); ?></p>
								<?php the_content(); ?>
							</article>

							<?php 
								endwhile;
							else:
							?>

							 <p>There's nothing yet to be displayed...</p>

							<?php endif; ?>

						</div>						
					</div>
				</div>				
			</section>
		</main>
	</div>
<?php get_footer(); ?>