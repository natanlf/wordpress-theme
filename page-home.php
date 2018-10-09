<?php get_header(); ?>
	<div class="content-area">
		<main>
			<section class="slide">
				<?php 
					$design = get_theme_mod('set_slider_option');
					$limit = get_theme_mod('set_slider_limit');
					$category = get_theme_mod('set_slider_categories');
					echo do_shortcode('[recent_post_slider design="design-'.$design.' " limit="'.$limit.'" category='. $category.'"]');
				?>
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
								<h1>Latest News</h1>
								<div class="row">
									<?php 
										/*Tenho todas as categorias que informamos no customizer pa ra poder exibir no primeiro loop*/
										$loop1cats = get_theme_mod( 'set_loop1_categories' );
										$featured = new WP_Query( 'post_type=post&posts_per_page=1&cat='.$loop1cats );
										//Se existem posts então mostramos
										if( $featured->have_posts() ):
										while( $featured->have_posts() ): $featured->the_post();
										?>
										
										<!-- Col12, pois vai ocupar todo o espaço de minha row pois é a notícia em destaque, indico o template que será usado que é o content-featured.php -->
										<div class="col-12">
											<?php get_template_part( 'template-parts/content', 'featured' ); ?>
										</div>

										<?php	
										endwhile;
										/*Para que os parametros dessa consulta acima não infuencia outras consultas nessa mesma página, nós teremos que resetar essa consulta quando chegar no final*/
										wp_reset_postdata();
									endif;

									// Segundo Loop
									/*Usamos array para passar os argumentos, assim conforme o número de argumentos aumenta as chances de nos confundirmos é menor, pois fica tudo mais organizado separando por arrays.
									O post_type é opcional, caso não passarmos o wordpress coloca automaticamente como post.
									posts_per_page é a quantidade de post que vamos trazer.
									category__not_in significa quais categorias vamos excluir da listagem
									category__in significa quais categorias queremos que retornem
									offset assim dizemos quantos itens o wordpress deve ignorar no início da lista
									*/
									/*Temos as informações de ctagorias para exbir, exlcuir e posts por páginas que informamos no customizer*/
									$per_page = get_theme_mod( 'set_loop2_posts_per_page' );
									
									$loop2_cat_exclude = explode( ',', get_theme_mod( 'set_loop2_categories_to_exclude' ));
									$loop2_cat_include = explode( ',', get_theme_mod( 'set_loop2_categories_to_include' ));

									$args = array(
										'post_type' => 'post',
										'posts_per_page' => $per_page,
										'category__not_in' => $loop2_cat_exclude,
										'category__in' => $loop2_cat_include,
										'offset' => 1
									);

									$secondary = new WP_Query( $args );

									if( $secondary->have_posts() ):
										while( $secondary->have_posts() ): $secondary->the_post();
									?>

									<!-- Teremos 6 colunas para cada post, desde os dispostivos pequenos até os grandes -->
									<div class="col-sm-6">
										<?php get_template_part( 'template-parts/content', 'secondary' ); ?>
									</div>

									<?php
										endwhile;
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
				<?php 
					$key = get_theme_mod( 'set_map_apikey' );
					/*o endereço pode estar com a formatação errada, por isso vamos usar urlencode,
					assim se houver espaço vazio, caracteres especiais essa função tira*/
					$address = urlencode(get_theme_mod( 'set_map_address' ));
				?>
				<iframe
				  width="100%"
				  height="350"
				  frameborder="0" style="border:0"
				  src="https://www.google.com/maps/embed/v1/place?key=<?php echo $key; ?>
				    &q=<?php echo $address; ?>&zoom=15" allowfullscreen>
				</iframe>		
			</section>
		</main>
	</div>
<?php get_footer(); ?>