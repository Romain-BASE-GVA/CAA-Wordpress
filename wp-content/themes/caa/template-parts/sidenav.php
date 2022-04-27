<?php if( have_rows('content_block') ): ?>

<div class="side-nav">
    <ul class="side-nav__list">

        <?php while( have_rows('content_block') ): the_row(); 
            $showInNav = get_sub_field('show_in_navigation');
            $navItemTitle = get_sub_field('block_title');
            $navItemLink = preg_replace('/[^A-Za-z0-9\-]/', '-',  strtolower($navItemTitle));
            $navItemLink = str_replace('---', '-', $navItemLink);
        ?>
            <?php if($showInNav): ?>

                <li class="side-nav__item"><a href="#<?php echo $navItemLink; ?>" class="side-nav__link" title="<?php echo $navItemTitle; ?>"><?php echo $navItemTitle; ?></a></li>

            <?php endif; ?>

        <?php endwhile; ?>

    </ul>
</div>

<?php endif; ?>