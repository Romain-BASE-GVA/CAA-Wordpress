<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); 
        $featureImgId = get_post_thumbnail_id( $post->ID );
        $featuredImgUrl = get_the_post_thumbnail_url($post->ID, 'large');
        $featuredImgAlt = get_post_meta ( $featureImgId, '_wp_attachment_image_alt', true );
    ?>

        <header class="header header--partners">

            <?php if(has_post_thumbnail()): ?>

            <div class="header__media">
                <div class="header__img">
                    <img src="<?php echo $featuredImgUrl; ?>" alt="<?php echo esc_html($featuredImgAlt); ?>">
                    <div class="bg-cover" style="background-image: url(<?php echo $featuredImgUrl; ?>);"></div>
                </div>
            </div>

            <?php endif; ?>
        </header>

        <main class="main">
            <div class="page-content">
                <?php get_template_part( 'template-parts/partner-sidebar' ); ?>
                <?php get_template_part( 'template-parts/article' ); ?>
            </div>
        </main>
        
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>