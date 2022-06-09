<section class="section section--partners">
    <div class="section__header">
        <h2 class="section__title">Notre <br>communauté</h2>
        <a href="#" title="Voir toutes nos news">Rencontrer tous les acteurs du changement</a>
    </div>
<?php 

$args = array(
    'post_type' => array( 'partners' ),
    'posts_per_page' => 10
);

$partners = new WP_Query( $args ); ?>

<?php if ( $partners->have_posts() ) : ?>
    <div class="slider slider--5-card slider--partners">
        <?php while ( $partners->have_posts() ) : $partners->the_post();
            $postType = get_post_type();
            $partnerLogo = get_field('partner_logo');
            $postThumbnail = get_the_post_thumbnail( get_the_ID(), 'large' );
            $postThumbnailUrl = get_the_post_thumbnail_url( get_the_ID(), 'large' );
            $partnerIntro = wp_trim_words( get_field('introduction'), 20, '...' );

            $tags = array_map(function (WP_Term $term) {
                return $term->name;
            }, wp_get_post_terms($post->ID, 'tags'));
             
        ?>     
        
            <div class="slide">
                <div class="card card--partner">
                    <a href="<?php the_permalink(); ?>" class="card__link" title="<?php the_title(); ?>"><span><?php the_title(); ?></span></a>
                    <div class="card-in">

                        <header class="card__header">
                            <span class="card__type">
                                <span class="card__type__icon"></span>
                                <span class="card__type__name"><?php echo $postType; ?></span>
                            </span>
                        </header>

                        <div class="card__main">
            
                            <div class="card__main__top">
                                <h2 class="card__title"><?php the_title(); ?></h2>
                                <?php if($partnerIntro): ?>
                                <div class="card__sub-title">
                                    <?php echo $partnerIntro; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="card__media">
                                <?php if( !empty( $partnerLogo ) ): ?>
                                <div class="card--partner__logo">
                                    <img src="<?php echo esc_url($partnerLogo['url']); ?>" alt="<?php echo esc_attr($partnerLogo['alt']); ?>" />
                                </div>
                                <?php endif; ?>
                                <div class="card__img">
                                    <?php echo $postThumbnail; ?>
                                    <div class="img-cover" style="background-image: url('<?php echo $postThumbnailUrl; ?>')"></div>
                                </div>
                            </div>
            
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