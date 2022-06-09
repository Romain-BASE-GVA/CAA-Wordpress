<section class="section section--last-news">
    <div class="section__header">
        <h2 class="section__title">Newsroom</h2>
        <a href="#" title="Voir toutes nos news">Voir toutes nos news</a>
    </div>
<?php 

$args = array(
    'post_type' => array( 'post', 'events' ),
    'posts_per_page' => 10
);

$lastNews = new WP_Query( $args ); ?>

<?php if ( $lastNews->have_posts() ) : ?>
    <div class="slider slider--4-card slider--last-news">
        <?php while ( $lastNews->have_posts() ) : $lastNews->the_post();
            $postType = get_post_type();
            $date = $postType == 'post' ? get_the_date() : get_field('event_date');
            $date = date('d.m.y', strtotime($date));
            $postThumbnail = get_the_post_thumbnail( get_the_ID(), 'large' );
            $postThumbnailUrl = get_the_post_thumbnail_url( get_the_ID(), 'large' );

            $tags = array_map(function (WP_Term $term) {
                return $term->name;
            }, wp_get_post_terms($post->ID, 'tags'));
             
        ?>  
            <div class="slide">
                <div class="card card--news">
                    <a href="<?php the_permalink(); ?>" class="card__link" title="<?php the_title(); ?>"><span><?php the_title(); ?></span></a>
                    <div class="card-in">
                        <header class="card__header">
                            <span class="card__type">
                                <span class="card__type__icon"></span>
                                <span class="card__type__name"><?php echo $postType; ?></span>
                            </span>
                            <span class="card__time"><?php echo $date; ?></span>
                        </header>
                        <div class="card__main">
            
                            <div class="card__main__top">
                                <h2 class="card__title"><?php the_title(); ?></h2>
                                <span class="card__read-more">Read More</span>
                            </div>
                            <?php if($postThumbnail): ?>
                            <div class="card__media">
                                <div class="card__img">
                                    <?php echo $postThumbnail; ?>
                                    <div class="img-cover" style="background-image: url('<?php echo $postThumbnailUrl; ?>')"></div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                        <footer class="card__footer">
                            <?php if(!empty($tags)): ?>
                            <ul class="card__tags">
                                <?php foreach ($tags  as $tag ): ?>
                                <li class="card__tag-item"><?php echo $tag; ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                            
                        </footer>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <?php wp_reset_postdata(); endif; ?>
</section>