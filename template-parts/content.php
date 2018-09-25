<!-- Chamamos os métodos correspondentes e nas categorias comocamos como parametro um espaço pois pode ter algum post que pertence a mais de uma categoria, assim funciona como um separador. Em Tags usamos a vírgula como separador -->
<article>
	<h2><?php the_title(); ?></h2>
	<?php the_post_thumbnail(array(275, 275));  ?>
	<p>Published in <?php echo get_the_date(); ?> by <?php the_author_posts_link(); ?></p>
	<p>Categories: <?php the_category( ' ' ); ?></p>
	<p><?php the_tags( 'Tags: ', ', ' ); ?></p>
	<?php the_content(); ?>
</article>
