<div class="news-bar">
    <div class="news-bar__last-news">
        <?php
            $args = array(
                'post_type'=> array( 'post' ),
                'posts_per_page' => 10,
            ); 
            $lastNews = new WP_Query( $args );
        ?>
        <?php if($lastNews->have_posts()): ?>
        <div class="news-bar__marquee" data-pausable="true" data-speed="1">
            <div>
            <?php while ( $lastNews->have_posts() ): $lastNews->the_post(); ?>
                <a href="<?php the_permalink(); ?>" title="<?php echo the_title(); ?>"><?php the_title(); ?> -&nbsp;</a>
            <?php endwhile; ?>
            </div>
        </div>
        <?php endif; wp_reset_postdata(); ?>
    </div>
    <!--
    <div class="nl-sub">
        <div class="nl-sub__front">S’inscrire à la newsletter</div>
        <div class="nl-sub__back">cool</div>
    </div>
    -->
    <button class="nl-sub"><span>S’inscrire à la newsletter</span></button>
</div>