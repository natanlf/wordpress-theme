<?php get_header(); ?>
	<div id="primary">
		<div id="main">
			<div class="container">
				<!-- Mostra o que o usuário pesquisou -->
				<h2><?php _e( 'Search results for:', 'wpwordpress' ); ?> <?php echo get_search_query(); ?></h2>
				<?php 

				//Chama o formulário de pesquisa
				get_search_form();

				while( have_posts() ): the_post();

					get_template_part( 'template-parts/content', 'search' );

					if( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile;
				
				//Paginação com números
				the_posts_pagination(
					array(
						'prev_text' => __( 'Previous', 'wpwordpress' ),
						'next_text' => __( 'Next', 'wpwordpress')
					)
				);
				?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>