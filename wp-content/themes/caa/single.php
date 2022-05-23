<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); 
        $allTags = array();
        $sectors = wp_get_post_terms($post->ID, 'sector');
        $tags = wp_get_post_terms($post->ID, 'tags');
        $areas = get_field('solution_areas');
        $featureImgId = get_post_thumbnail_id( $post->ID );
        $featuredImgUrl = get_the_post_thumbnail_url($post->ID, 'large');
        $featuredImgAlt = get_post_meta ( $featureImgId, '_wp_attachment_image_alt', true );

        if($areas):
            foreach( $areas as $area ):
                array_push($allTags, get_the_title( $area->ID ));
            endforeach;
        endif;

        if($sectors):
            foreach($sectors as $sector):
                array_push($allTags, $sector->name);
            endforeach;
        endif;

        if($tags):
            foreach($tags as $tag):
                array_push($allTags, $tag->name);
            endforeach;
        endif;

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
        </main>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>