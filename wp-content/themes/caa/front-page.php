<?php get_header(); 
    $whitelist = ['127.0.0.1', '::1', 'localhost', '', 'caa']; 
    $isLocalHost = in_array($_SERVER['REMOTE_ADDR'], $whitelist);

    $aIndex = $isLocalHost ? 'CAA-test' : 'climat_action_accelerator_en';
?>
<main style="padding: 50vh 0 0 0;">
    <h1>Home</h1>
    <div class="home-search-bar" id="home-search-bar">
        <div class="home-search-bar__input"></div>
        <a href="<?php echo get_permalink( get_page_by_title( 'Resources' ) ); ?>?<?php echo $aIndex; ?>[query]=" class="home-search-bar__submit" data-query="">search</a>
    </div>
</main>
<?php get_footer(); ?>