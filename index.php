	<?php get_header(); ?>
	<!-- Chama nosso cabeçalho customizado. A classe img-fluid faz a imagem ficar responsiva -->
<img class="img-fluid" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
	<div class="content-area">
		<main>		
			<section class="middle-area">
				<div class="container">
					<div class="row">
						
						<div class="news col-md-8">
								<?php 
							// Se houver algum post
							if( have_posts() ):
								// Enquanto houver posts, mostre-os pra gente
								while( have_posts() ): the_post();

							?>
							<!--Aqui chamamos o template da página. Chamamos o content e se tiver um formato de image ou video, chamaremos o content-image ou content-vide.
								Isso depende do formato do post, se tiver um formato padrão então chama o template content, caso seja imagem o content-image, pois esse método get_post_format(), imprime na tela o formato do post, assim podemos concatenar a chamada do template, se o formato for image fica assim: content-image-->
							<?php get_template_part( 'template-parts/content', get_post_format() ); ?>

							<?php 
								endwhile;
								?>
								<!-- Paginação dos posts, previous mostra os posts mais novos e next os mais antigos, pois o wordpress sempre coloca no início os mais recentes -->
								<div class="row">
									<div class="pages text-left col-6">
										<?php previous_posts_link( __( "<< Newer posts", 'wpwordpress' ) ); ?>
									</div>
									<div class="pages text-right col-6">
										 <?php next_posts_link( __( "Older posts >>", 'wpwordpress' ) ); ?>
									</div>
								</div>
								<?php
							else:
							?>

							 <p><?php _e( 'There&rsquo;s nothing yet to be displayed...', 'wpwordpress' ); ?></p>

							<?php endif; ?>
						</div>
						<!-- chama o widget -->
						<?php get_sidebar( 'blog' ); ?>	
					</div>
				</div>			
			</section>
		</main>
	</div>
	<?php get_footer(); ?>
	