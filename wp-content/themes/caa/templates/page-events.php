<?php /* Template Name: Events */ ?>
<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post();
        // $allTags = array();
        // $sectors = wp_get_post_terms($post->ID, 'sector');
        $featureImgId = get_post_thumbnail_id($post->ID);
        $featuredImgUrl = get_the_post_thumbnail_url($post->ID, 'large');
        $featuredImgAlt = get_post_meta($featureImgId, '_wp_attachment_image_alt', true);

        // if($sectors):
        //     foreach($sectors as $sector):
        //         array_push($allTags, $sector->name);
        //     endforeach;
        // endif;
    ?>

        <header class="header header--internal">

            <?php if (has_post_thumbnail()) : ?>

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

                    <?php if (!empty($allTags)) : ?>

                        <ul class="header__tags">
                            <?php foreach ($allTags as $tag) : ?>

                                <li class="header__tag-item"><?php echo $tag;  ?></li>

                            <?php endforeach; ?>
                        </ul>

                    <?php endif; ?>

                </div>

                <?php if (get_field('introduction')) : ?>
                    <div class="header__intro">
                        <?php echo get_field('introduction') ?>
                    </div>
                <?php endif; ?>

            </div>
        </header>

        <main class="main">
            <div class="page-content">
                <?php get_template_part('template-parts/sidenav'); ?>
                <?php get_template_part('template-parts/article'); ?>
            </div>
            <?php
            // WP_Query arguments

            $dateToday = date('Y-m-d');

            $args = array(
                'post_type' => 'events',
                'posts_per_page' => -1,
                'meta_query' => array(
                    array(
                        'key' => 'event_date',
                        'compare' => '>=',
                        'value' => $dateToday,
                    )
                ),
                'meta_key' => 'event_date',
                'orderby' => 'meta_value',
                'order' => 'ASC',

            );


            // The Query
            $events = new WP_Query($args);

            ?>
            <?php if ($events->have_posts()) : ?>
                <div class="card-grid">
                    <?php while ($events->have_posts()) : $events->the_post();
                        $postType = get_post_type();
                        $date = $postType == 'post' ? get_the_date() : get_field('event_date');
                        $date = date('d.m.y', strtotime($date));
                        $postThumbnail = get_the_post_thumbnail(get_the_ID(), 'large');
                        $postThumbnailUrl = get_the_post_thumbnail_url(get_the_ID(), 'large');

                        $tags = array_map(function (WP_Term $term) {
                            return $term->name;
                        }, wp_get_post_terms($post->ID, 'tags'));

                    ?>
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
                                    <?php if ($postThumbnail) : ?>
                                        <div class="card__media">
                                            <div class="card__img">
                                                <?php echo $postThumbnail; ?>
                                                <div class="img-cover" style="background-image: url('<?php echo $postThumbnailUrl; ?>')"></div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <footer class="card__footer">
                                    <?php if (!empty($tags)) : ?>
                                        <ul class="card__tags">
                                            <?php foreach ($tags  as $tag) : ?>
                                                <li class="card__tag-item"><?php echo $tag; ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>

                                </footer>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif;
            wp_reset_postdata(); ?>
        </main>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>