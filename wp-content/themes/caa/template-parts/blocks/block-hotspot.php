<section class="block block--hotspot" id="<?php echo $args['blockID']; ?>">
    <h2 class="block__title hidden"><?php echo $args['blockTitle']; ?></h2>
    <div class="hotspot">
        <picture>
            <!--
            <source srcset="logo-768.png 768w, logo-768-1.5x.png 1.5x">
            <source srcset="logo-480.png, logo-480-2x.png 2x">
            -->
            <img src="<?php echo $args['image']['url']; ?>" alt="<?php echo $args['image']['alt']; ?>">
        </picture>    
        <?php if( have_rows('hotspot') ): ?>
            <?php while( have_rows('hotspot') ): the_row(); 
                $xPos = get_sub_field('x_position');
                $yPos = get_sub_field('y_position');
                $contentPosition = get_sub_field('content_position');
            ?>
            <div class="hotspot__spot hotspot__spot--is-closed" style="--x-pos: <?php echo $xPos; ?>%; --y-pos: <?php echo $yPos; ?>%">
                <button class="hotspot__btn"></button>
                <div class="hotspot__content hotspot__content--<?php echo $contentPosition; ?>">
                    <p><?php echo get_sub_field('content'); ?></p>
                </div>
            </div>
            <?php endwhile; ?>
        <?php endif ?>
    </div>
</section>