<?php 
/*
Template Name: General Template
*/
?>
<!--Template que serve para várias páginas, para aplicar nas páginas devemos ir na administração do WordPress, escolher a página e selecionar o modelo de template e salvar
Esse nome que demos a esse template vai aparecer na administração do WordPress-->
<?php get_header(); ?>
<!-- Chama nosso cabeçalho customizado. A classe img-fluid faz a imagem ficar responsiva -->
<img class="img-fluid" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
	<div class="content-area">
		<main>
			<section class="middle-area">
				<div class="container">

						<div class="general-template">
							<?php 
							// Se houver algum post
							if( have_posts() ):
								// Enquanto houver posts, mostre-os pra gente
								while( have_posts() ): the_post();

							?>

							<article>
								<h2><?php the_title(); ?></h2>
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
			</section>
		</main>
	</div>
<?php get_footer(); ?>