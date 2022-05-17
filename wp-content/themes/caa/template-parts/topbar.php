<div class="top-bar top-bar--grey">
    <div class="top-bar__main">
        <a href="<?php echo get_home_url(); ?>" class="top-bar__logo" title="Back Home">
        <?php get_template_part( 'template-parts/logo-svg' ); ?>
        </a>
        <div class="top-bar__tools">
            <nav class="nav nav--top-bar">
                <div class="nav-box">
                    <h2>Solutions</h2>
                    <div class="nav-box__wrap-list">
                        <ul class="nav-list nav-list--level-1">
                            <li class="nav-item nav-item--level-1">
                                <a href="#" title="">Agir</a>
                                <ul class="nav-list nav-list--level-2">
                                    <li class="nav-item nav-item--level-2">
                                        <a href="#">Domaines</a>
                                        <ul class="nav-list nav-list--level-3">
                                            <li><a href="">Transport</a></li>
                                            <li><a href="">Achats</a></li>
                                            <li><a href="">Energie</a></li>
                                            <li><a href="">Dechets</a></li>
                                            <li><a href="">Ecosysteme</a></li>
                                            <li><a href="">Transversal</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item nav-item--level-2">
                                        <a href="#">Solutions</a>
                                        <ul class="nav-list nav-list--level-3">
                                            <li><a href="">Solutions a</a></li>
                                            <li><a href="">Solutions b</a></li>
                                            <li><a href="">Solutions c</a></li>
                                            <li><a href="">Solutions d</a></li>
                                            <li><a href="">Solutions e</a></li>
                                            <li><a href="">Solutions e</a></li>
                                            <li><a href="">Solutions f</a></li>
                                            <li><a href="">Solutions g</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item nav-item--level-2"><a href="#">Outils</a></li>
                                </ul>
                            </li>
                            <li class="nav-item nav-item--level-1" data-related-sub="comprendre">
                                <a href="">Comprendre</a>
                                <ul class="nav-list nav-list--level-2">
                                    <li class="nav-item nav-item--level-2">
                                        <a href="#">Comprendre 1</a>
                                        <ul class="nav-list nav-list--level-3">
                                            <li><a href="">Comprendre 1 a</a></li>
                                            <li><a href="">Comprendre 1 b</a></li>
                                            <li><a href="">Comprendre 1 c</a></li>
                                            <li><a href="">Comprendre 1 d</a></li>
                                            <li><a href="">Comprendre 1 e</a></li>
                                            <li><a href="">Comprendre 1 f</a></li>
                                            <li><a href="">Comprendre 1 g</a></li>
                                            <li><a href="">Comprendre 1 h</a></li>
                                            <li><a href="">Comprendre 1 i</a></li>
                                            <li><a href="">Comprendre 1 g</a></li>
                                            <li><a href="">Comprendre 1 h</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item nav-item--level-2"><a href="#">Comprendre 2</a></li>
                                    <li class="nav-item nav-item--level-2"><a href="#">Comprendre 3</a></li>
                                    <li class="nav-item nav-item--level-2"><a href="#">Comprendre 4</a></li>
                                </ul>
                            </li>
                            <li class="nav-item nav-item--level-1" data-related-sub="secteurs"><a href="">Secteurs</a></li>
                        </ul>
                    </div>
                </div>
                <div class="nav-box">
                    <h2>Acteurs</h2>
                    <div class="nav-box__wrap-list">
                        <ul class="nav-list nav-list--level-1">
                            <li class="nav-item nav-item--level-1"><a href="#">Rencontrer</a></li>
                            <li class="nav-item nav-item--level-1"><a href="#">Rejoindre</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="switches">

                <div class="lang-switch"></div>

                <div class="color-mode">
                    <button class="color-mode__button color-mode__button--light">
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
    <?php get_template_part( 'template-parts/topbar-sub' ); ?>
</div>