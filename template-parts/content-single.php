<!-- the_ID, significa que cada post tem um id -->
<article id="post-<?php the_ID();?>" <?php post_class(); ?>>
    
    <header>
        <h1><?php the_title(); ?></h1>
		<div class="meta-info">
			 <p><?php _e( 'Posted in', 'wpwordpress' ); ?> <?php echo get_the_date(); ?> <?php _e( 'by', 'wpwordpress' ); ?> <?php the_author_posts_link(); ?></p>
            <p><?php _e( 'Categories:', 'wpwordpress' ); ?> <?php the_category( ' ' ); ?></p>
            <p><?php the_tags( __( 'Tags: ', 'wpwordpress' ), ', ' ); ?></p>    
		</div>
    </header>

    <div class="content">
        <?php the_content(); ?>
    </div>

</article>