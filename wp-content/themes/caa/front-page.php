<?php get_header(); 
    $whitelist = ['127.0.0.1', '::1', 'localhost', '', 'caa']; 
    $isLocalHost = in_array($_SERVER['REMOTE_ADDR'], $whitelist);

    $aIndex = $isLocalHost ? 'CAA-test' : 'climat_action_accelerator_en';
?>
<header class="header header--home">
    <?php 
        $homeGallery = array();
        $homeHeaderImages = get_field('header_images'); ?>
    <?php if($homeHeaderImages): ?>
    <?php 
        foreach( $homeHeaderImages as $image ):
            $imageUrl = $image['sizes']['large'];
            array_push($homeGallery, $imageUrl);
        endforeach;

        $theImage = $homeGallery[rand(0,4)];
    ?>
    <div class="header__media">
        <div class="header__img">
            <img src="<?php echo $theImage; ?>" alt="">
            <div class="bg-cover" style="background-image: url('<?php echo $theImage; ?>');"></div>
        </div>
    </div>
    <div class="header__front">
        <?php 
            $fixedText = get_field('fixed_text');
        ?>
        <h1> 
            <?php echo $fixedText; ?>
            <?php if(have_rows('rotating_text')): ?>
            <ul>
                <?php while( have_rows('rotating_text') ): the_row(); 
                    $item = get_sub_field('item');
                ?>
                    <li><?php echo $item; ?></li>
                <?php endwhile; ?>
            </ul>
            <?php endif; ?>
        </h1>

        <div class="home-search-bar" id="home-search-bar">
            <div class="home-search-bar__input"></div>
            <a href="<?php echo get_permalink( get_page_by_title( 'Resources' ) ); ?>?<?php echo $aIndex; ?>[query]=" class="home-search-bar__submit" data-query="">search</a>
        </div>
    </div>

    <?php endif; ?>
</header>  
<main style="padding: 50vh 0 0 0;">
    <h1>Home</h1>

    
</main>
<?php get_footer(); ?>