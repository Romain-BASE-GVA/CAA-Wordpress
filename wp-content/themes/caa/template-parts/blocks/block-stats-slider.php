<section class="block block--stats-slider" id="<?php echo $args['blockID']; ?>">
    <h2 class="block__title<?php echo $args['hideTitle']; ?>"><?php echo $args['blockTitle']; ?></h2>
    <?php if( have_rows('slide') ): ?>

    <div class="stats-slider">

        <?php while( have_rows('slide') ): the_row(); 
            $title = get_sub_field('title');
            $statistic = get_sub_field('statistic');
            $content = get_sub_field('content');
            $bgColorClass = get_sub_field('background_color') ? 'stat-slide--bg-' . get_sub_field('background_color')  : '';
            $txtColorClass = get_sub_field('text_color') ? 'stat-slide--text-' . get_sub_field('text_color') : '';
        ?>

        <div class="stat-slide <?php echo $bgColorClass . ' ' . $txtColorClass ?>">
            <div class="stat-slide__in">
                <?php if($title): ?>
                    <h3 class="stat-slide__title"><?php echo $title; ?></h3>
                <?php endif; ?>
                <span class="stat-slide__stat"><?php echo $statistic; ?></span>
                <?php if($content): ?>
                <div class="stat-slide__detail">
                    <?php echo $content; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <?php endwhile; ?>

    </div>
    <?php endif; ?>
</section>