<section class="block block--ctas block--ctas--green" id="<?php echo $args['blockID']; ?>">
    <h2 class="block__title<?php echo $args['hideTitle']; ?>"><?php echo $args['blockTitle']; ?></h2>
    <?php if( have_rows('more_item') ): ?>

    <ul class="ctas">

        <?php while( have_rows('more_item') ): the_row(); 
            $title = get_sub_field('title');
            $desc = get_sub_field('description');
            $link = get_sub_field('link');
            $linkTarget = $link['target'] ? $link['target'] : '_self';
        ?>

            <li class="cta-item">
                <?php if($title): ?>
                    <h3 class="cta-item__title"><?php echo $title; ?></h3>
                <?php endif; ?>
                <?php if($desc): ?>
                    <p><?php echo $desc; ?></p>
                <?php endif; ?>
                <a href="<?php echo $link['url'];?>" class="cta-item__link" title="<?php echo $link['title']; ?>" target="<?php echo $linkTarget; ?>" ><?php echo $link['title'];?></a>
            </li>

        <?php endwhile; ?>

    </ul>

    <?php endif; ?>
</section>