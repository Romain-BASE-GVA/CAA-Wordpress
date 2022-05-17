<section class="block block--featured" id="<?php echo $args['blockID']; ?>">
    <h2 class="block__title<?php echo $args['hideTitle']; ?>"><?php echo $args['blockTitle']; ?></h2>
    <?php
        $howManyItems = 0;
        $featuredPosts = get_sub_field('featured_items');
        $otherItems = get_sub_field('other_items');    
    ?>

    <ul>
    <?php if( $featuredPosts ): ?>
        <?php foreach( $featuredPosts as $featuredPost ): 
            $howManyItems ++;
            $permalink = get_permalink( $featuredPost->ID );
            $title = get_the_title( $featuredPost->ID );
            ?>
            <li>
                <a href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a>
            </li>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php
        $otherItemsLoop = new WP_Query(
            array(
                'post_type' => $otherItems, 
                'posts_per_page' => 4 - $howManyItems
            )
        );
        while ( $otherItemsLoop->have_posts() ) : $otherItemsLoop->the_post();
            $permalink = get_permalink( $post->ID );
        ?>
        
        <li><a href="<?php echo esc_url( $permalink ); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
        
        <?php endwhile; wp_reset_postdata(); ?>

    </ul>
    
</section>