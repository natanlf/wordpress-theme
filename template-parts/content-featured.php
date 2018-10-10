<!-- post_class( array( 'class' => 'featured' ) );
Com esse código podemos juntar a classe featured com as demais classes que a função post_class gera para nós -->
<article <?php post_class( array( 'class' => 'featured' ) ); ?>>
	<!-- Mostro a imagem full para ocupar as 12 colunas e adiciono a classe img-fluid do Bootstrpa 4 para a imagem ficar reponsiva -->
	<div class="thumbnail">
		<!-- permalinks os locais das urls de um recurso ou um artigo vai ser permanentemente guardado.
		São links dos posts, das páginas -->
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid' ) ); ?></a>
	</div>
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<div class="meta-info">
		<p>
			<?php _e( 'by', 'wpwordpress' ); ?> <span><?php the_author_posts_link(); ?></span>
			<?php _e( 'Categories: ', 'wpwordpress' ); ?> <span><?php the_category( ' ' ); ?></span>
			<?php the_tags( __( 'Tags: ', 'wpwordpress' ), ', ' ); ?>
		</p>
		<p><span><?php echo get_the_date(); ?></span></p>
	</div>
	<!-- Ao inve´s de todo o conteúdo do post, nós mostramos apenas uma parte, resumo do conteúdo do post com a função abaixo -->
	<?php the_excerpt(); ?>
</article>