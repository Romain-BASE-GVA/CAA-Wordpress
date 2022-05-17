<section class="block block--dropdowns" id="<?php echo $args['blockID']; ?>">
    <h2 class="block__title<?php echo $args['hideTitle']; ?>"><?php echo $args['blockTitle']; ?></h2>
    <?php if( have_rows('dropdown') ): ?>

    <div class="dropdowns">

        <?php while( have_rows('dropdown') ): the_row(); 
            $title = get_sub_field('title');
            $content = get_sub_field('content');
        ?>

        <div class="dropdown dropdown--is-closed">
            <div class="dropdown__top">
                <button class="dropdown__trigger"></button>
                <h3 class="dropdown__title"><?php echo $title; ?></h3>
            </div>
            <div class="dropdown__content">
                <div><?php echo $content; ?></div>
            </div>
        </div>

        <?php endwhile; ?>

    </div>
    <?php endif; ?>
</section>