	<?php get_header(); ?>
	<!-- Chama nosso cabeçalho customizado. A classe img-fluid faz a imagem ficar responsiva -->
<img class="img-fluid" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
	<div class="content-area">
		<main>
			<section class="slide">Slide</section>
			<section class="services">Serviços</section>
			<section class="middle-area">
				<div class="container">
					<div class="row">
						<aside class="sidebar col-md-4">Barra lateral</aside>
						<div class="news col-md-8">
								<?php 
							// Se houver algum post
							if( have_posts() ):
								// Enquanto houver posts, mostre-os pra gente
								while( have_posts() ): the_post();

							?>
							<!-- Chamamos os métodos correspondentes e nas categorias comocamos como parametro um espaço pois pode ter algum post que pertence a mais de uma categoria, assim funciona como um separador. Em Tags usamos a vírgula como separador -->
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
			<section class="map">Mapa</section>
		</main>
	</div>
	<?php get_footer(); ?>
	