<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <header class="header header--internal header--article">
            <div class="header__media">
                <div class="header__img">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/article.png" alt="">
                    <div class="bg-cover" style="background-image: url(img/article.png);"></div>
                </div>
            </div>
            <div class="header__text">
                <?php the_breadcrumb(); ?>
                <h1 class="header__title"><?php the_title(); ?></h1>
                <ul class="header__tags">
                    <li class="header__tag-item"></li>
                </ul>
                <div class="header__intro">
                    <p>Médecins Sans Frontières France a réorganisé son système d’approvisionnement pour privilégier le transport maritime et réduire le recours au transport aérien.</p>
                </div>
                
            </div>
        </header>

        <main class="main">
            <div class="grid grid--12">
                <?php get_template_part( 'template-parts/sidenav' ); ?>
                <?php get_template_part( 'template-parts/article' ); ?>
            </div>
        </main>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>