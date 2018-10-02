<!-- Essa página é chamada para exibir um post, quando não havia essa página o template usado era o index.php, acontece isso na falta do single. Vamos usar o template chamado content-single.php -->
<?php get_header(); ?>
	<div id="primary">
		<div id="main">
			<div class="container">
				<?php 

				while( have_posts() ): the_post();

					get_template_part( 'template-parts/content', 'single' );
					?>
					<!--Link para post mais novo e antigo. Assim o visitante pode navegar pelos posts sem sair da página. O &laquo é um caracter especial do HTML que é uma seta-->
					<div class="row">
						<div class="page text-left col-6">
							<?php next_post_link( '&laquo; %link' ); ?>
						</div>
						<div class="page text-right col-6">
							<?php previous_post_link( '%link &raquo;' ); ?>
						</div>
					</div>

					<?php
					/* Verifica o post esteja aberto para comentário ou se há comentários para o post, então exibe os comentários. Deixamos como ou porque pode ser que o post não esteja aberto para comentário mas pode ser que já esteve então a partir do momento que teve comentários mesmo não estando aberto para eu exibo os comentários */
					if(comments_open() || get_comments_number()):
						comments_template();
					endif;	

				endwhile;

				?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>