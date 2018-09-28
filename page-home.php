<?php get_header(); ?>
	<div class="content-area">
		<main>
			<section class="slide">
				<div class="container">
					<div class="row">Slide</div>
				</div>
			</section>
			<section class="services">
				<div class="container">
					<h1>Our Services</h1>
					<!--Dentro da idv row temos 3 divs cada uma com 4 colunas, somando as 3 da as 12 colunas do Bootstrap 4.
						Verificamos se a sidebar está ativa, caso esteja nós mostramos na tela, essas sidebars foram registradas no arquivo function e as chamamos pelo id que registramos-->
					<div class="row">
							<div class="col-sm-4">
							<div class="services-item">
								<?php 
								if( is_active_sidebar( 'services-1' )){
									dynamic_sidebar( 'services-1' );
								}

								?>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="services-item">
								<?php 
								if( is_active_sidebar( 'services-2' )){
									dynamic_sidebar( 'services-2' );
								}

								?>
							</div>
						</div>

						<div class="col-sm-4">
							<div class="services-item">
								<?php 
								if( is_active_sidebar( 'services-3' )){
									dynamic_sidebar( 'services-3' );
								}

								?>
							</div>
						</div>
					</div>
				</div>				
			</section>
			<section class="middle-area">
				<div class="container">
					<div class="row">
						<?php get_sidebar( 'home' ); ?>
						<div class="news col-md-8">
							<div class="container">
								<div class="row">
									<?php 
									/* Exitem vários tipos de posts do Wordpress, os posts nativos do wordpress são post e page, vamos usar post mesmo. Queremos um post por página, pois será o nosso post em destaque e colocamos a quais categorias queremos que exiba, usamos o id da categoria que pode ser visto no admin=> posts => categorias, ao passar o mouse em cima da categoria, aparece o id no fim da página */
										$featured = new WP_Query( 'post_type=post&posts_per_page=1&cat=10,4' );
										//Se existem posts então mostramos
										if( $featured->have_posts() ):
										while( $featured->have_posts() ): $featured->the_post();
										endwhile;
										/*Para que os parametros dessa consulta acima não infuencia outras consultas nessa mesma página, nós teremos que resetar essa consulta quando chegar no final*/
										wp_reset_postdata();
									endif;
									?>
								</div>
							</div>
						</div>						
					</div>
				</div>				
			</section>
			<section class="map">
				<div class="container">
					<div class="row">Mapa</div>
				</div>				
			</section>
		</main>
	</div>
<?php get_footer(); ?>