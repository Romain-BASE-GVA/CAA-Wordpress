<section class="block block--grid-list" id="<?php echo $args['blockID']; ?>">
    <h2 class="block__title<?php echo $args['hideTitle']; ?>"><?php echo $args['blockTitle']; ?></h2>
    <?php if( have_rows('item') ): ?>
    <ul class="grid-list grid-list--<?php echo $args['type']; ?>">
        <?php while( have_rows('item') ): the_row(); 
            $title = get_sub_field('title');
            $content = get_sub_field('content');
        ?>
        <li class="grid-list__item">
            <h3 class="grid-list__title"><?php echo $title; ?></h3>
            <div class="grid-list__content">
                <p><?php echo $content; ?></p>
            </div>
        </li>
        <?php endwhile; ?>
    </ul>
    <?php endif; ?>
</section>