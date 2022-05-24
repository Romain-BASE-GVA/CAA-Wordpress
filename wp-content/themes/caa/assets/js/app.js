$( document ).ready(function() {
    var isTouch = window.matchMedia("(pointer: coarse)").matches || 'ontouchstart' in window || navigator.msMaxTouchPoints;
    var isLocalHost = location.hostname === 'localhost' || location.hostname === '127.0.0.1' || location.hostname === '' || location.hostname === 'caa';
    var isLightMode = true;
    var topbarH = 152;
    var aIndex =  isLocalHost ? 'CAA-test' : 'climat_action_accelerator_en';
    var aIndexQuerySug = isLocalHost ? 'CAA-test_query_suggestions' : 'climat_action_accelerator_en_query_suggestions';
    var algoliaAppID = isLocalHost ? 'B98TMUO56H' : 'H4335KHPRJ';
    var algoliaSearchApiKey =  isLocalHost ? '8b48aaf35c4ae7c58ad17cf8f9ea5d9d' : 'afed438caf6adb03b3cc1d6846418938';
    //var isOnce = true;
    //var navIsOpen = false;

    const searchClient = algoliasearch(
        algoliaAppID,
        algoliaSearchApiKey
    );

    if($('.home-search-bar').length){
        var theTextQuery = '';

        const { autocomplete } = window['@algolia/autocomplete-js'];
        const { createQuerySuggestionsPlugin } = window['@algolia/autocomplete-plugin-query-suggestions'];
        
        const querySuggestionsPlugin = createQuerySuggestionsPlugin({
            searchClient,
            indexName: aIndexQuerySug,
            onSelect: (query) => {console.log(query)},
            getSearchParams() {
                return {
                    hitsPerPage: 10,
                };
            },
        });
        
        const autocompleteSearch = autocomplete({
          container: '.home-search-bar__input',
          placeholder: 'Search',
          openOnFocus: false,
          plugins: [querySuggestionsPlugin],
          onStateChange({ state }) {
            theTextQuery = state.query;
          },
        });

        $('.home-search-bar__submit').on('click', function(e){
            e.preventDefault();
            var baseUrl = $(this).attr('href');
            var endUrl = baseUrl + theTextQuery;
    
            if(theTextQuery != ''){
                console.log(endUrl);
                window.location = endUrl;
            }
        });
    
        $('body').find('.home-search-bar__input input').keypress(function(e){
            
            if(e.originalEvent.key == 'Enter'){
                $('.home-search-bar__submit').trigger('click');
            }
        });
    }

    if($('.ressources-search-bar').length){

        const search = instantsearch({
            indexName: aIndex,
            searchClient,
            routing: true
        });

        const config = instantsearch.widgets.configure({
            hitsPerPage: 10,
            enablePersonalization: false
        });
        
        const searchBox = instantsearch.widgets.searchBox({
            container: '#ressources-search-bar',
            placeholder: 'Search for products',
            searchAsYouType: true,
            showReset: true,
            showLoadingIndicator: true,
        })

        search.on('render', function() {
            console.log('COOL');   
            setTimeout(() => {
                ScrollTrigger.refresh();
            }, 500);
        });

        // Create the render function
        const renderInfiniteHits = (renderOptions, isFirstRender) => {
            const {
                hits,
                widgetParams,
                showPrevious,
                isFirstPage,
                showMore,
                isLastPage,
            } = renderOptions;
    
        if (isFirstRender) {
            const list = document.createElement('div');
            list.className = 'card-grid';
    
            const moreButton = document.createElement('button');
            const moreButtonContainer = document.createElement('div'); 
            moreButton.className = 'more-button';
            moreButton.textContent = 'Show more';
            moreButtonContainer.className = 'ressources-results__show-more';
    
            moreButton.addEventListener('click', () => {
                showMore();
            });
    
            widgetParams.container.appendChild(list);
            moreButtonContainer.appendChild(moreButton)
            widgetParams.container.appendChild(moreButtonContainer);
        
            return;
        }
        
        widgetParams.container.querySelector('.more-button').disabled = isLastPage;
    
        widgetParams.container.querySelector('.card-grid').innerHTML = `
            ${hits
                .map(
                    hit => {
                        if(hit.postType === 'solutions'){
                            return `
                            <div class="card card--rounded card--solution card--${hit.bgColor}">
                                <a href="${hit.url}" class="card__link" title="${hit.title}"><span>${hit.title}</span></a>
                                <div class="card-in">
                                    <header class="card__header">
                                        <span class="card__type">
                                            <span class="card__type__icon"></span>
                                            <span class="card__type__name">${hit.postType}</span>
                                        </span>
                                    </header>
                                    <div class="card__main">
                                        <div class="card__main__top">
                                            <h2 class="card__title">${hit.title}</h2>
                                        </div>
                                    </div>
                                    <footer class="card__footer">
                                        <ul class="card__tags">
                                            ${hit.areas.map(area => `<li class="card__tag-item">${area}</li>`).join("")}
                                        </ul>
                                    </footer>
                                </div>
                            </div>
                            `
                        } else if(hit.postType === 'page'){
                            return `
                            <div class="card">
                                <a href="${hit.url}" class="card__link" title="${hit.title}"><span>${hit.title}</span></a>
                                <div class="card-in">
                                    <header class="card__header">
                                        <span class="card__type">
                                            <span class="card__type__icon"></span>
                                            <span class="card__type__name">${hit.postType}</span>
                                        </span>
                                    </header>
                                    <div class="card__main">
                                        <div class="card__main__top">
                                            <h2 class="card__title">${hit.title}</h2>
                                        </div>
                                    </div>
                                    <footer class="card__footer">
                                        <ul class="card__tags">
                                            ${hit.areas.map(area => `<li class="card__tag-item">${area}</li>`).join("")}
                                        </ul>
                                    </footer>
                                </div>
                            </div>
                            `
                        } else if(hit.postType === 'experiences'){
                            return `
                            <div class="card">
                                <a href="${hit.url}" class="card__link" title="${hit.title}"><span>${hit.title}</span></a>
                                <div class="card-in">
                                    <header class="card__header">
                                        <span class="card__type">
                                            <span class="card__type__icon"></span>
                                            <span class="card__type__name">${hit.postType}</span>
                                        </span>
                                    </header>
                                    <div class="card__main">
                                        <div class="card__main__top">
                                            <h2 class="card__title">${hit.title}</h2>
                                        </div>
                                    </div>
                                    <footer class="card__footer">
                                        <ul class="card__tags">
                                            ${hit.areas.map(area => `<li class="card__tag-item">${area}</li>`).join("")}
                                        </ul>
                                    </footer>
                                </div>
                            </div>
                            `
                        
                        } else if(hit.postType === 'experts'){

                            return `
                            <div class="card card--expert">
                                <a href="${hit.url}" class="card__link" title="${hit.title}"><span>${hit.title}</span></a>
                                <div class="card-in">
                                    <header class="card__header">
                                        <span class="card__type">
                                            <span class="card__type__icon"></span>
                                            <span class="card__type__name">${hit.postType}</span>
                                        </span>
                                    </header>
                                    <div class="card__main">
                                        <div class="card__main__top">
                                            <h2 class="card__title">${hit.title}</h2>
                                            <p class="card__sub-title">Fondateur de projet Drawdown</p>
                                        </div>
                                        <div class="card__media">
                                            <div class="card__img">
                                                <img src="${hit.mainImage}" alt="">
                                                <div class="img-cover" style="background-image: url(${hit.mainImage})"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <footer class="card__footer">
                                        <ul class="card__tags">
                                            ${hit.tags.map(tag => `<li class="card__tag-item">${tag}</li>`).join("")}
                                        </ul>
                                    </footer>
                                </div>
                            </div>`
                        } else if(hit.postType === 'areas'){
                            return `
                            <div class="card card--field">
                                <a href="${hit.url}" class="card__link" title="${hit.title}"><span><${hit.title}</span></a>
                                <div class="card-in">
                                    <header class="card__header">
                                        <span class="card__type">
                                            <span class="card__type__icon"></span>
                                            <span class="card__type__name">${hit.postType}</span>
                                        </span>
                                    </header>
                                    <div class="card__main">
                                        <div class="card__main__top">
                                            <h2 class="card__title">${hit.title}</h2>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            `
                        } else if(hit.postType === 'post'){
                            return `
                            <div class="card card--news">
                                <a href="${hit.url}" class="card__link" title="${hit.title}"><span>${hit.title}</span></a>
                                <div class="card-in">
                                    <header class="card__header">
                                        <span class="card__type">
                                            <span class="card__type__icon"></span>
                                            <span class="card__type__name">actualites</span>
                                        </span>
                                        <span class="card__time">${hit.date}</span>
                                    </header>
                                    <div class="card__main">
                        
                                        <div class="card__main__top">
                                            <h2 class="card__title">${hit.title}</h2>
                                            <span class="card__read-more">Lire plus</span>
                                        </div>
                        
                                    </div>
                                    <footer class="card__footer">
                                        <ul class="card__tags">
                                            ${hit.areas.map(area => `<li class="card__tag-item">${area}</li>`).join("")}
                                        </ul>
                                    </footer>
                                </div>
                            </div>`
                        } else if(hit.postType === 'events'){
                            return `
                            <div class="card card--news">
                                <a href="${hit.url}" class="card__link" title="${hit.title}"><span>${hit.title}</span></a>
                                <div class="card-in">
                                    <header class="card__header">
                                        <span class="card__type">
                                            <span class="card__type__icon"></span>
                                            <span class="card__type__name">${hit.postType}</span>
                                        </span>
                                        ${hit.date ? `<span class="card__time">${hit.date}</span>` : ''}
                                    </header>
                                    <div class="card__main">
                        
                                        <div class="card__main__top">
                                            <h2 class="card__title">${hit.title}</h2>
                                            <span class="card__read-more">Lire plus</span>
                                        </div>
                        
                                    </div>
                                    <footer class="card__footer">
                                        <ul class="card__tags">
                                            ${hit.areas.map(area => `<li class="card__tag-item">${area}</li>`).join("")}
                                        </ul>
                                    </footer>
                                </div>
                            </div>`
                        } else if(hit.postType === 'partners'){
                            return `
                            <div class="card card--partner">
                                <a href="${hit.url}" class="card__link" title="${hit.title}"><span>${hit.title}</span></a>
                                <div class="card-in">
                                    <header class="card__header">
                                        <span class="card__type">
                                            <span class="card__type__icon"></span>
                                            <span class="card__type__name">${hit.postType}</span>
                                        </span>
                                    </header>
                                    <div class="card__main">
                                        <div class="card__main__top">
                                            <h2 class="card__title">${hit.title}</h2>
                                            <p class="card__sub-title">On the ground in over 90 countries - neutral, impartial, and independent - we are the International Committee of the Red Cross.</p>
                                        </div>
                                        <div class="card__media">
                                            <div class="card--partner__logo">
                                                <img src="${hit.partnerInfo.logoUrl}" alt="${hit.title}">
                                            </div>
                                            <div class="card__img">
                                                <img src="${hit.mainImage}" alt="">
                                                <div class="img-cover" style="background-image: url(${hit.mainImage})"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <footer class="card__footer">
                                        <ul class="card__tags">
                                            ${hit.sectors.map(sector => `<li class="card__tag-item">${sector}</li>`).join("")}
                                        </ul>
                                    </footer>
                                </div>
                            </div>`
                        } else {
                            return `<h3>${hit.postType} : ${hit.title}</h3>`
                        }
                        
                    }

                )
                .join('')}
            `;
        };
    
        // Create the custom widget
        const customInfiniteHits = instantsearch.connectors.connectInfiniteHits(
            renderInfiniteHits
        );
    
        const refListAreas = instantsearch.widgets.refinementList({
            container: '.ref-list__list--areas',
            attribute: 'areas',
            sortBy: ['name:asc'],
            //searchable: true,
            limit: 1000
        });

        const refListSectors = instantsearch.widgets.refinementList({
            container: '.ref-list__list--sectors',
            attribute: 'sectors',
            sortBy: ['name:asc'],
            //searchable: true,
            limit: 1000
        });

        const refListPostType = instantsearch.widgets.refinementList({
            container: '.ref-list__list--post-type',
            attribute: 'postType',
            sortBy: ['name:asc'],
            limit: 1000
        });

        const currentFilters = instantsearch.widgets.currentRefinements({
            container: '.current-filters',
        });

        const clearRef = instantsearch.widgets.clearRefinements({
            container: '.clear-all',
            templates: {
              resetLabel: 'Remove all',
            },
          });

        // Instantiate the custom widget
        search.addWidgets([config, searchBox, refListAreas, refListSectors, refListPostType, currentFilters, clearRef,
            customInfiniteHits({
            container: document.querySelector('.ressources-results')
            })
        ]);
        
        search.start();

    }

    // TOPBAR
    // var topBarTransitionDuration = $('.top-bar').css('transition-duration').replace('s', '') * 1000;

    var setTopBarHVarDebounce = debounce(function() {
        var $topBar = $('.top-bar');
        topBarH = $topBar.outerHeight(true) + $topBar.position().top;
        document.documentElement.style.setProperty('--top-bar-h', topBarH + 'px');
    }, 350);

    setTopBarHVarDebounce();

    ScrollTrigger.create({
        trigger: '.header',
        // start: 'top -40%',
        start: 'top -50px',
        end: 99999,
        // onUpdate: (self) => {
        //     if(self.direction === -1){
        //         $('.top-bar').removeClass('top-bar--small');
        //     } else {
        //         $('.top-bar').addClass('top-bar--small');
        //     }
        // },
        onEnter: (self)=>{
            $('.top-bar').addClass('top-bar--small');
            setTopBarHVarDebounce();
        },
        onLeaveBack: (self)=>{
            $('.top-bar').removeClass('top-bar--small');
            setTopBarHVarDebounce();
        },
    });

    if($('.top-bar__sub').length){
        ScrollTrigger.create({
            trigger: '.header',
            //start: 'bottom top',
            start: ()=>{ return 'bottom ' + topbarH +'px' },
            end: 99999,
            // onUpdate: (self) => {
            //     if(self.direction === -1){
            //         $('.top-bar').removeClass('top-bar--small');
            //     } else {
            //         $('.top-bar').addClass('top-bar--small');
            //     }
            // },
            onEnter: (self)=>{
                $('.top-bar__sub').addClass('top-bar__sub--is-visible');
                setTopBarHVarDebounce();
            },
            onLeaveBack: (self)=>{
                $('.top-bar__sub').removeClass('top-bar__sub--is-visible');
                setTopBarHVarDebounce();
            },
        });
    }

    $('.color-mode__button').on('click', function(e){
        e.preventDefault();
        
        if(isLightMode){
            $('body').addClass('dark-mode');
            $(this).removeClass('color-mode__button--light').addClass('color-mode__button--dark');
            isLightMode = false;
        } else {
            $('body').removeClass('dark-mode');
            $(this).removeClass('color-mode__button--dark').addClass('color-mode__button--light');
            isLightMode = true;
        }
        
    });

    Marquee3k.init({
        selector: 'news-bar__marquee'
    });
    Marquee3k.refreshAll();


    //// TOPBAR

    // HEADER HOME
    var el = $('.header__front li');
    gsap.set(el.not(':first'), {autoAlpha:0, yPercent: 100, scale: .95});
    var animHeader = new TimelineMax({repeat:0, delay: 1, repeatDelay: 0, onComplete: ()=>{animHeader.restart(true)} });
    
    for(var i=0;i<el.length;i++){
      var E = el[i];
        var nextE = el[i + 1];
      // tl.to(E, 0.5, {yPercent: 0, autoAlpha:1, duration: .25, ease: Power2.easeOut})
      //   .to(E, 0.5, {yPercent: -100, autoAlpha:0, duration: .25, ease:Power2.easeOut},'+=2.5')
        
        if(nextE){
            animHeader.to(E, {scale: .95, yPercent: -100, autoAlpha:0, duration: 1.25, ease:Circ.easeInOut},'sameTime+=' + 2*i)
                                .to(nextE, {scale: 1, yPercent: 0, autoAlpha:1, duration: 1.25, ease:Circ.easeInOut},'sameTime+=' + 2*i)
        }
        
    
    };
    //// HEADER HOME
    // HOME HOW

    if($('.how-list').length){
        let howToAnim = gsap.timeline({
            scrollTrigger: {
                trigger: '.section--how',
                start: 'top top',
                //markers: true
            }
        });
        
        howToAnim	.from('.how-list__item', {autoAlpha: 0, stagger: .4, duration: .5, ease: Power3.easeInOut}, 'how-to')
                    .from('.how-list__arrow path', {autoAlpha: 0, drawSVG: '0%', stagger: .4, duration: .5, ease: Power3.easeInOut}, 'how-to+=.1');
    }

    //// HOME HOW
    // CARD

    $('body').on('mouseenter', '.card__link', function(){
        var thisCard = $(this).parent('.card');
        console.log(thisCard);
        thisCard.addClass('card--hover');
    });

    $('body').on('mouseleave', '.card__link', function(){
        var thisCard = $(this).parent('.card');
        thisCard.removeClass('card--hover');
    });

    //// CARD

    // SIDE NAV

    $('.side-nav a').on('click', function(e){
        e.preventDefault();
        var thisHash = $(this).attr('href');
        //gsap.to(window, {duration: 1, scrollTo: thisHash});
        gsap.to(window, {duration: 1, scrollTo: {y: thisHash, offsetY: topbarH - 2}, ease: Power3.easeOut });
    });

    $('.article .block[id]').each(function(){
        var thisId = $(this).attr('id')
        var $thisRelatedNavItem = $('.side-nav__link[href="#'+ thisId +'"]');
    
        ScrollTrigger.create({
            trigger: $(this),
            // start: 'top 40px',
            start: ()=>{ return 'top ' + topbarH +'px' },
            end: '1000000px',
            toggleClass: {targets: $thisRelatedNavItem, className: 'side-nav__link--is-active'},
            onEnter: function(){
                //console.log($thisRelatedNavItem.parent('li').length)
                if($thisRelatedNavItem.parent('li').length){
                    var h = $thisRelatedNavItem.parent('li').position().top + $thisRelatedNavItem.parent('li').outerHeight(true);
                    gsap.to('.side-nav__list', {'--h': h + 'px', duration: .5});
                }
                
            },
            onLeaveBack: function(){
                //console.log($thisRelatedNavItem.parent('li').length)
                if($thisRelatedNavItem.parent('li').length){
                    var h = $thisRelatedNavItem.parent('li').position().top;
                    gsap.to('.side-nav__list', {'--h': h + 'px', duration: .5});
                }
            }
        });
    });

    //// SIDE NAV

    // SLIDERS
        // SLIDER STAT

        $('.stats-slider').each(function(){
            var statSlide = $(this).flickity({
                // options
                cellAlign: 'left',
                contain: true,
                prevNextButtons: false,
                pageDots: false
            });
        });

        

        // SLIDER TIMELINE  
        var timeLineSlider = $('.timeline-slider').flickity({
            // options
            cellAlign: 'left',
            contain: true,
            prevNextButtons: false,
            pageDots: false,
            freeScroll: true
          });

        timeLineSlider.on( 'scroll.flickity', function( event, progress ) {
            //progress = Math.max( 0, Math.min( 1, progress ) );
            //$progressBar.width( progress * 100 + '%' );
            progress = gsap.utils.clamp(0, 1, progress)
            console.log(progress * 100);
            gsap.set('.timeline-slider', {'--position' : progress * 100 + '%'});
        });

    //// SLIDERS

    // DROPDOWNS

    $('.dropdown__trigger').on('click', function(){
        var thisDropdown = $(this).parents('.dropdown');
        var isClosed = thisDropdown.hasClass('dropdown--is-closed');
        var thisDropdownContent = thisDropdown.find('.dropdown__content');
        var dropDownH = thisDropdownContent.find('>div').outerHeight(true);
    
        if(isClosed){
            $('.dropdown').removeClass('dropdown--is-open').addClass('dropdown--is-closed');
            gsap.to($('.dropdown__content'), 1, {height: 0, ease: Expo.easeInOut});
            gsap.to(thisDropdownContent, 1, {height: dropDownH + 'px', ease: Expo.easeInOut, onComplete: function(){
                gsap.set(thisDropdownContent, {height: 'auto'});
                ScrollTrigger.refresh();
            }});


            $(this).parents('.dropdown').removeClass('dropdown--is-closed').addClass('dropdown--is-open');
    
        } else {
            gsap.to(thisDropdownContent, 1, {height: 0, ease: Expo.easeInOut, onComplete: function(){
                ScrollTrigger.refresh();
            }});
            $(this).parents('.dropdown').removeClass('dropdown--is-open').addClass('dropdown--is-closed');
        };
    });

    // VIDEOS

    const players = Array.from(document.querySelectorAll('.block--video__video')).map((p) => new Plyr(p));

    $('.block--video__video button').on('click', function(e){
        e.preventDefault();
        var vidId = $(this).data('video-id');

        var youtubeIframe = `<iframe class="block--video__iframe" type="text/html" width="720" height="405"
        src="https://www.youtube.com/embed/${vidId}?modestbranding=1&playsinline=1&autoplay=1&color=white&iv_load_policy=3"
        frameborder="0" allowfullscreen>`;

        $(this).parent('.block--video__video').append(youtubeIframe);

        $(this).remove();
    });

    // LAZY LOAD IMAGE

    var lazyLoadInstance = new LazyLoad({
        // Your custom settings go here
    });

    // FEATURED BLOCK / DRAGGABLE
    $('.block--featured').each(function(){
        var thisFeaturedBlock = $(this);
        var thisCards = thisFeaturedBlock.find('.card');

        thisCards.each(function(){
            var rotation = randomNumBetween(-10,10);
            $(this).css('transform', 'rotate('+ rotation +'deg)');
        });
    });

    Draggable.create('.block--featured .card', {type:'x,y', edgeResistance:0.65, bounds:'.block--featured', inertia:true, zIndexBoost: true});

    //// FEATURED BLOCK / DRAGGABLE

    // FOOTER

    gsap.from('.footer__contact', {
        yPercent: 100,
        scale: .95,
        scrollTrigger : {
            //markers: true,
            trigger: '.footer',
            start: 'top bottom',
            end: 'bottom bottom',
            scrub: .1,
            // onEnter: () => {console.log('enter')},
            // onLeave: () => {console.log('leave')},
            // onUpdate: self => {
            // 	console.log("progress:", self.progress.toFixed(3), "direction:", self.direction, "velocity", self.getVelocity());
            // },
            immediateRender: false
            //invalidateOnRefresh: true
        },
    });

    //// FOOTER

    ScrollTrigger.refresh();


    function killAllScrollTrigger(){
        // let Alltrigger = ScrollTrigger.getAll();

        // for (let i = 0; i < Alltrigger.length; i++) {
        //     Alltrigger[i].kill(true)
        // };
        ScrollTrigger.getAll().forEach(t => t.kill(false));
        ScrollTrigger.refresh();
        //window.dispatchEvent(new Event("resize"));
    };
    
    function preventSamePageReload(){
        var links = document.querySelectorAll('a[href]');
        var cbk = function(e) {
            if(e.currentTarget.href === window.location.href) {
                e.preventDefault();
                e.stopPropagation();
            }
        };

        for(var i = 0; i < links.length; i++) {
            links[i].addEventListener('click', cbk);
        }
    };

    function randomNumBetween(min,max){
        return Math.floor(Math.random()*(max-min+1)+min);
    }

    function debounce(func, wait, immediate) {
        var timeout;
      
        return function executedFunction() {
          var context = this;
          var args = arguments;
              
          var later = function() {
            timeout = null;
            if (!immediate) func.apply(context, args);
          };
      
          var callNow = immediate && !timeout;
          
          clearTimeout(timeout);
      
          timeout = setTimeout(later, wait);
          
          if (callNow) func.apply(context, args);
        };
      };

});