<?php get_header(); 
    $whitelist = ['127.0.0.1', '::1', 'localhost', '', 'caa']; 
    $isLocalHost = in_array($_SERVER['REMOTE_ADDR'], $whitelist);

    $aIndex = $isLocalHost ? 'CAA-test' : 'climat_action_accelerator_en';
?>
<header class="header header--home">
    <?php get_template_part( 'template-parts/topbar-news' ); ?>
    <?php 
        $homeGallery = array();
        $homeHeaderImages = get_field('header_images'); ?>
    <?php if($homeHeaderImages): ?>
    <?php 
        foreach( $homeHeaderImages as $image ):
            $imageUrl = $image['sizes']['large'];
            array_push($homeGallery, $imageUrl);
        endforeach;

        $howManyImage = count( $homeHeaderImages ) - 1;
        $theImage = $homeGallery[rand(0,$howManyImage)];
    ?>
    <div class="header__media">
        <div class="header__img">
            <img src="<?php echo $theImage; ?>" alt="">
            <div class="bg-cover" style="background-image: url('<?php echo $theImage; ?>');"></div>
        </div>
    </div>
    <?php endif; ?>
    <div class="header__front">
        <?php 
            $fixedText = get_field('fixed_text');
        ?>
        <h1> 
            <?php echo $fixedText; ?>
            <?php if(have_rows('rotating_text')): 
                $rows = get_field('rotating_text');
            ?>
            <ul>
                <?php while( have_rows('rotating_text') ): the_row(); 
                    $item = get_sub_field('item');
                    
                ?>
                    <li><?php echo $item; ?></li>
                <?php endwhile; ?>
                <li><?php echo $rows[0]['item']; ?></li>
            </ul>
            <?php endif; ?>
        </h1>

        <div class="home-search-bar" id="home-search-bar">
            <div class="home-search-bar__input"></div>
            <a href="<?php echo get_permalink( get_page_by_title( 'Resources' ) ); ?>?<?php echo $aIndex; ?>[query]=" class="home-search-bar__submit" data-query="">search</a>
        </div>
    </div>

    
</header>  
<?php get_template_part( 'template-parts/popup-nl' ); ?>
<main>

<?php get_template_part( 'template-parts/drop-cards' ); ?>

<section class="section section--how">
	<div class="section__header">
		<h2 class="section__title">Nous vous accompagnons pour réduire de moitié votre empreinte carbone d'ici 2030. 
			<span>Comment?</span>
		</h2>
	</div>
	<div class="how-list">
        <?php if(get_field('how_0_item')): ?>
		<div class="how-list__item how-list__item--1">
			<p><?php echo get_field('how_0_item'); ?></p>
		</div>
        <?php endif; ?>
        <?php if(get_field('how_1_item')): ?>
		<div class="how-list__item how-list__item--2">
			<p><?php echo get_field('how_1_item'); ?></p>
		</div>
        <?php endif; ?>
        <?php if(get_field('how_2_item')): ?>
		<div class="how-list__item how-list__item--3">
			<p><?php echo get_field('how_2_item'); ?></p>
		</div>
        <?php endif; ?>
        <?php if(get_field('how_3_item')): ?>
		<div class="how-list__item how-list__item--4">
			<p><?php echo get_field('how_3_item'); ?></p>
		</div>
        <?php endif;?>
		<div class="how-list__arrow how-list__arrow--1">
			<svg id="Calque_1" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 446">
				<!-- <rect class="cls-1" width="600" height="446"/> -->
				<path class="cls-2" d="M19.5,436.87S231.07-223.77,580.5,97" transform="translate(0)"/>
			</svg>
		</div>
		<div class="how-list__arrow how-list__arrow--2">
			<svg id="Calque_1" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 446">
				<!-- <rect class="cls-1" width="600" height="446"/> -->
				<path class="cls-2" d="M19.5,436.87S231.07-223.77,580.5,97" transform="translate(0)"/>
			</svg>
		</div>
		<div class="how-list__arrow how-list__arrow--3">
			<svg id="Calque_1" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 446">
				<!-- <rect class="cls-1" width="600" height="446"/> -->
				<path class="cls-2" d="M19.5,436.87S231.07-223.77,580.5,97" transform="translate(0)"/>
			</svg>
		</div>
	</div>
</section>

<?php get_template_part( 'template-parts/last-news-slider' ); ?>
<?php get_template_part( 'template-parts/partners-slider' ); ?>


    
</main>
<?php get_footer(); ?>