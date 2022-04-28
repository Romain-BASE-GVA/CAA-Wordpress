<section class="block block--ctas block--ctas--blue" id="<?php echo $args['blockID']; ?>">
    <h2 class="block__title hidden"><?php echo $args['blockTitle']; ?></h2>

    <?php if( have_rows('download') ): ?>

    <ul class="ctas">

        <?php while( have_rows('download') ): the_row(); 
            $title = get_sub_field('download_title');
            $desc = get_sub_field('download_description');
            $file = get_sub_field('download_file');
        ?>

        <li class="cta-item">
            <?php if($title): ?>
                <h3 class="cta-item__title"><?php echo $title; ?></h3>
            <?php endif; ?>
            <?php if($desc): ?>
                <p><?php echo $desc; ?></p>
            <?php endif; ?>
            <a href="<?php echo $file['url'] ?>" class="btn btn--regular btn--blue btn--rounded" title="Download : <?php echo $title; ?>">Download</a>
        </li>

        <?php endwhile; ?>

    </ul>

    <?php endif; ?>
</section>