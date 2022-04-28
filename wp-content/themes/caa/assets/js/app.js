$( document ).ready(function() {
    var isTouch = window.matchMedia("(pointer: coarse)").matches || 'ontouchstart' in window || navigator.msMaxTouchPoints;
    var isLightMode = true;
    var topbarH = 152;
    //var isOnce = true;
    //var navIsOpen = false;


    const searchClient = algoliasearch(
        'B98TMUO56H',
        '8b48aaf35c4ae7c58ad17cf8f9ea5d9d'
    );
    
    if($('.home-search-bar').length){
        const search = instantsearch({
            indexName: 'CAA-test',
            searchClient,
            routing: true,
            urlSync: true
        });

        const searchBox = instantsearch.widgets.searchBox({
            container: '#home-search-bar',
            placeholder: 'Search for products',
            searchAsYouType: false,
            showReset: true,
            showLoadingIndicator: true,
        });

        search.addWidgets([searchBox]);
        
        search.start();

    }

    if($('.ressources-search-bar').length){

        const search = instantsearch({
            indexName: 'CAA-test',
            searchClient,
            routing: true
        });

        const config = instantsearch.widgets.configure({
            hitsPerPage: 8,
            enablePersonalization: false
        });
        
        const searchBox = instantsearch.widgets.searchBox({
            container: '#ressources-search-bar',
            placeholder: 'Search for products',
            searchAsYouType: true,
            showReset: true,
            showLoadingIndicator: true,
        })


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
                            <div class="card card--rounded card--solution card--yellow">
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
                                            <h2 class="card__title"><span class="card__number">05</span>${hit.title}</h2>
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
                                            <h2 class="card__title"><span class="card__number">05</span>${hit.title}</h2>
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
              resetLabel: 'Clear refinements',
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
        start: 'top -40%',
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