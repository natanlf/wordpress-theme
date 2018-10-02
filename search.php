<?php get_header(); ?>
	<div id="primary">
		<div id="main">
			<div class="container">
				<!-- Mostra o que o usuário pesquisou -->
				<h2>Search results for: </h2><?php echo get_search_query(); ?>
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
						'prev_text' => 'Previous',
						'next_text' => 'Next',
						'screen_reader_text' => ' '
					)
				);
				?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>