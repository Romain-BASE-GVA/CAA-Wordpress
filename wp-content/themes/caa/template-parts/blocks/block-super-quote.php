<section class="block block--super-quote" id="<?php echo $args['blockID']; ?>">
    <h2 class="block__title"><?php echo $args['blockTitle']; ?></h2>
    <?php if( have_rows('quote') ): ?>

    <div class="super-quotes">

        <?php while( have_rows('quote') ): the_row(); 
            $image = get_sub_field('image');
            $content = get_sub_field('content');
            $caption = get_sub_field('caption');
        ?>
        <div class="super-quote">
            <div class="super-quote__img">
                <img src="<?php echo $image['sizes']['medium'] ?>" alt="<?php echo $image['alt'] ?>">
                <div class="bg-cover" style="background-image: url(<?php echo $image['sizes']['medium'] ?>);"></div>
            </div>
            <blockquote class="super-quote__blockquote">
                <p class="super-quote__content">
                <?php echo $content; ?> 
                <?php if($caption): ?>
                    <span class="super-quote__caption"><?php echo $caption; ?></span>
                <?php endif; ?>
                </p>
            </blockquote>
        </div>
        <?php endwhile; ?>

    </div>
    
    <?php endif; ?>
</section>