<div class="side-nav">
    <?php 
        $partnerLink = get_field('partner_link'); 
        $partnerLogo = get_field('partner_logo');
    ?>
    <div class="side-nav__partner-info">
        <h1><?php the_title(); ?></h1>

        <?php if($partnerLink): 
            $linkUrl = $partnerLink['url'];
            $linkTitle = $partnerLink['title'];
            $linkTarget = $partnerLink['target'] ? $partnerLink['target'] : '_self';
        ?>
        <a href="<?php echo esc_url( $linkUrl ); ?>" target="<?php echo esc_attr( $linkTarget ); ?>"><?php echo esc_html( $linkTitle ); ?></a>
        <?php endif; ?>

        <?php if( !empty( $partnerLogo ) ): ?>
                <img src="<?php echo esc_url($partnerLogo['url']); ?>" alt="<?php echo esc_attr($partnerLogo['alt']); ?>" />
        <?php endif; ?>

    </div>

    <?php if( have_rows('content_block') ): ?>
    <ul class="side-nav__list">

        <?php while( have_rows('content_block') ): the_row(); 
            $showInNav = get_sub_field('show_in_navigation');
            $navItemTitle = get_sub_field('block_title');
            //$navItemLink = preg_replace('/[^A-Za-z0-9\-]/', '',  strtolower($navItemTitle));
            $navItemLink = str_replace(array( '\'', '"', '?', ',' , ';', '<', '>', ' ' ), '-', strtolower($navItemTitle));
            $navItemLink = str_replace('--', '', $navItemLink);
        ?>
            <?php if($showInNav): ?>

                <li class="side-nav__item"><a href="#<?php echo $navItemLink; ?>" class="side-nav__link" title="<?php echo $navItemTitle; ?>"><?php echo $navItemTitle; ?></a></li>

            <?php endif; ?>

        <?php endwhile; ?>

    </ul>
    <?php endif; ?>
</div>