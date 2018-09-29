<!-- Chamamos os métodos correspondentes e nas categorias comocamos como parametro um espaço pois pode ter algum post que pertence a mais de uma categoria, assim funciona como um separador. Em Tags usamos a vírgula como separador -->
<article <?php post_class(); ?>>
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></h2></a>
	<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( array( 275, 275 ) ); ?></a>
	<div class="meta-info">
		<p>Published in <?php echo get_the_date(); ?> by <?php the_author_posts_link(); ?></p>
		<p>Categories: <?php the_category( ' ' ); ?></p>
		<p><?php the_tags( 'Tags: ', ', ' ); ?></p>
	</div>
	<?php the_content(); ?>
</article>
