<!-- post_class( array( 'class' => 'featured' ) );
Com esse código podemos juntar a classe featured com as demais classes que a função post_class gera para nós -->
<article <?php post_class( array( 'class' => 'featured' ) ); ?>>
	<h2><?php the_title(); ?></h2>
	<!-- Mostro a imagem full para ocupar as 12 colunas e adiciono a classe img-fluid do Bootstrpa 4 para a imagem ficar reponsiva -->
	<div class="thumbnail">
		<?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid' ) ); ?>
	</div>
	<div class="meta-info">
		<p>
			by <span><?php the_author_posts_link(); ?></span>
			Categories: <span><?php the_category( ' ' ); ?></span>
			<?php the_tags( 'Tags: <span>', ', ', '</span>' ); ?>
		</p>
		<p><span><?php echo get_the_date(); ?></span></p>
	</div>
	<!-- Ao inve´s de todo o conteúdo do post, nós mostramos apenas uma parte, resumo do conteúdo do post com a função abaixo -->
	<?php the_excerpt(); ?>
</article>