<?php /* Template Name: Solutions */ ?>
<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); 
        // $allTags = array();
        // $sectors = wp_get_post_terms($post->ID, 'sector');
        $featureImgId = get_post_thumbnail_id( $post->ID );
        $featuredImgUrl = get_the_post_thumbnail_url($post->ID, 'large');
        $featuredImgAlt = get_post_meta ( $featureImgId, '_wp_attachment_image_alt', true );

        // if($sectors):
        //     foreach($sectors as $sector):
        //         array_push($allTags, $sector->name);
        //     endforeach;
        // endif;
    ?>

        <header class="header header--internal">

            <?php if(has_post_thumbnail()): ?>

            <div class="header__media">
                <div class="header__img">
                    <img src="<?php echo $featuredImgUrl; ?>" alt="<?php echo esc_html($featuredImgAlt); ?>">
                    <div class="bg-cover" style="background-image: url(<?php echo $featuredImgUrl; ?>);"></div>
                </div>
            </div>

            <?php endif; ?>
            <div class="header__text">
                <?php the_breadcrumb(); ?>

                <div class="header__head">
                    <h1 class="header__title"><?php the_title(); ?></h1>

                    <?php if(!empty($allTags)): ?>

                    <ul class="header__tags">
                        <?php foreach ($allTags as $tag): ?>

                            <li class="header__tag-item"><?php echo $tag;  ?></li>
                        
                        <?php endforeach; ?>
                    </ul>

                    <?php endif; ?>

                </div>

                <?php if( get_field('introduction') ): ?>
                <div class="header__intro">
                    <?php echo get_field('introduction') ?>
                </div>
                <?php endif; ?>
                
            </div>
        </header>

        <main class="main">
            <div class="page-content">
                <?php get_template_part( 'template-parts/sidenav' ); ?>
                <?php get_template_part( 'template-parts/article' ); ?>
            </div>
            <?php 
                // WP_Query arguments
                $args = array(
                    'post_type' => array( 'solutions' ),
                    'posts_per_page' => -1
                );

                // The Query
                $solutions = new WP_Query( $args );

            ?>
            <?php if ( $solutions->have_posts() ): ?>
            <div class="card-grid">
                <?php while($solutions->have_posts()) : $solutions->the_post(); 
                    $areas = get_field('solution_areas');

                    if( $areas ):
                        foreach( $areas as $area ):
                
                            if(get_field('color', $area->ID)):
                                $bgColor = get_field('color', $area->ID);
                            elseif( get_field('color', wp_get_post_parent_id($area->ID)) ):
                                $bgColor = get_field('color', wp_get_post_parent_id($area->ID));
                            else:
                                $bgColor = null;
                            endif;
                            
                        endforeach;
                    endif;
                ?>
                <div class="card card--rounded card--solution card--<?php echo $bgColor; ?>">
                    <a href="<?php the_permalink(); ?>" class="card__link" title="<?php the_title(); ?>"><span><?php the_title(); ?></span></a>
                    <div class="card-in">
                        <header class="card__header">
                            <span class="card__type">
                                <span class="card__type__icon"></span>
                                <span class="card__type__name">solution</span>
                            </span>
                        </header>
                        <div class="card__main">
                            <div class="card__main__top">
                                <h2 class="card__title"><?php the_title(); ?></h2>
                            </div>
                        </div>
                        <?php if($areas): ?>
                        <footer class="card__footer">
                            <ul class="card__tags">
                            <?php foreach( $areas as $area ): 
                                $title = get_the_title( $area->ID );
                            ?>
                                <li class="card__tag-item"><?php echo $title; ?></li>
                            <?php endforeach; ?>
                            </ul>
                        </footer>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endwhile;?>
            </div>
            <?php endif; wp_reset_postdata(); ?>
        </main>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>