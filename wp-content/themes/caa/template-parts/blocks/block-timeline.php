<section class="block block--timeline" id="<?php echo $args['blockID']; ?>">
    <h2 class="block__title<?php echo $args['hideTitle']; ?>"><?php echo $args['blockTitle']; ?></h2>
    <?php if( have_rows('slide') ): ?>

    <div class="timeline-slider">

        <?php while( have_rows('slide') ): the_row();
            $time = get_sub_field('time');
            $title = get_sub_field('title');
            $content = get_sub_field('content');
        ?>
        
        <div class="timeline-slide timeline-slide--up">
            <div class="timeline-slide__in">
                <div class="timeline-slide__content">
                    <span class="timeline-slide__date"><?php echo $time; ?></span>
                    <div class="timeline-slide__text">
                        <h3 class="timeline-slide__title"><?php echo $title; ?></h3>
                        <div>
                            <?php echo $content; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php endwhile; ?>

    </div>

    <?php endif; ?>
</section>