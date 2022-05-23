<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); 
        $allTags = array();
        $sectors = wp_get_post_terms($post->ID, 'sector');
        $featureImgId = get_post_thumbnail_id( $post->ID );
        $featuredImgUrl = get_the_post_thumbnail_url($post->ID, 'large');
        $featuredImgAlt = get_post_meta ( $featureImgId, '_wp_attachment_image_alt', true );
        $headerColor = get_field('color') ? get_field('color') : get_field('color', wp_get_post_parent_id( $post->ID ));

        if($sectors):
            foreach($sectors as $sector):
                array_push($allTags, $sector->name);
            endforeach;
        endif;
    ?>

        <header class="header header--internal header--solution header--<?php echo $headerColor; ?>">

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
                /*
                *  Query posts for a relationship value.
                *  This method uses the meta_query LIKE to match the string "123" to the database value a:1:{i:0;s:3:"123";} (serialized array)
                */

                $solutions = get_posts(array(
                    'post_type' => 'solutions',
                    'meta_query' => array(
                        array(
                            'key' => 'solution_areas', // name of custom field
                            'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
                            'compare' => 'LIKE'
                        )
                    )
                ));

            ?>
            <?php if( $solutions ): ?>
            <div class="card-grid">
                <?php foreach( $solutions as $solution ): ?>
                <div class="card card--rounded card--solution card--<?php echo $headerColor; ?>">
                    <a href="<?php echo get_permalink( $solution->ID ); ?>" class="card__link" title="<?php echo get_the_title( $solution->ID ); ?>"><span><?php echo get_the_title( $solution->ID ); ?></span></a>
                    <div class="card-in">
                        <header class="card__header">
                            <span class="card__type">
                                <span class="card__type__icon"></span>
                                <span class="card__type__name">solutions</span>
                            </span>
                        </header>
                        <div class="card__main">
                            <div class="card__main__top">
                                <h2 class="card__title"><?php echo get_the_title( $solution->ID ); ?></h2>
                            </div>
                        </div>
                        <!--
                        <footer class="card__footer">
                            <ul class="card__tags">
                                <li class="card__tag-item">Digital</li><li class="card__tag-item">Digital equipment</li>
                            </ul>
                        </footer>
                        -->
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </main>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>