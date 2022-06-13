<div class="top-bar top-bar--grey">
    <div class="top-bar__main">
        <a href="<?php echo get_home_url(); ?>" class="top-bar__logo" title="Back Home">
            <?php get_template_part('template-parts/logo-svg'); ?>
        </a>
        <div class="top-bar__tools">
            <nav class="nav nav--top-bar">
                <div class="nav-box">
                    <span class="nav__title">Solutions</span>
                    <div class="nav-box__wrap-list">
                        <?php wp_nav_menu( array('theme_location' => 'solutions' )); ?>
                    </div>
                </div>
                <div class="nav-box">
                    <span class="nav__title">Community</span>
                    <div class="nav-box__wrap-list">
                        <?php wp_nav_menu( array('theme_location' => 'community' )); ?>
                    </div>
                </div>
            </nav>
            <div class="switches">

                <div class="lang-switch"><?php echo do_shortcode('[wpml_language_selector_widget]') ?></div>
                <?php
                $lightMode = isset($_COOKIE['lightMode']) ? $_COOKIE['lightMode'] : 'light';
                ?>
                <div class="color-mode">
                    <button class="color-mode__button color-mode__button--<?php echo $lightMode; ?>">
                        <span>
                            <svg viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="11.5" x2="11.5" y2="22" stroke="black" />
                                <line x1="22" y1="11.5" x2="-4.37114e-08" y2="11.5" stroke="black" />
                                <line x1="18.4238" y1="19.1309" x2="2.86744" y2="3.57455" stroke="black" />
                                <line x1="3.64645" y1="19.2031" x2="19.2028" y2="3.64674" stroke="black" />
                                <rect x="5.5" y="5.5" width="11" height="11" rx="5.5" fill="white" stroke="black" />
                            </svg>
                        </span>
                    </button>
                </div>

            </div>
        </div>
    </div>
    <?php
    if (!is_front_page()) :
        get_template_part('template-parts/topbar-sub');
    endif;
    ?>
</div>