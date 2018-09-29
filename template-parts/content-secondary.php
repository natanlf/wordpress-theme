<!-- Perceba que como mudamos o template a classe agora é secondary -->
<article <?php post_class( array( 'class' => 'secondary' ) ); ?>>
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></h2></a>
	<div class="thumbnail">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid' ) ); ?></a>
	</div>
	<div class="meta-info">
		<p>
			by <span><?php the_author_posts_link(); ?></span>
			Categories: <span><?php the_category( ' ' ); ?></span>
			<?php the_tags( 'Tags: <span>', ', ', '</span>' ); ?>
		</p>
	</div>
	<?php the_excerpt(); ?>
</article>