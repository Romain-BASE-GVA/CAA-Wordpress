$( document ).ready(function() {
    var isTouch = window.matchMedia("(pointer: coarse)").matches || 'ontouchstart' in window || navigator.msMaxTouchPoints;
    var isLightMode = true;
    var topbarH = 152;

    //var isOnce = true;
    //var navIsOpen = false;


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
        gsap.to(window, {duration: 1, scrollTo: {y: thisHash, offsetY: topbarH - 1}, ease: Power3.easeOut });
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
                var h = $thisRelatedNavItem.parent('li').position().top + $thisRelatedNavItem.parent('li').outerHeight(true);
                gsap.to('.side-nav__list', {'--h': h + 'px', duration: .5});
            },
            onLeaveBack: function(){
                var h = $thisRelatedNavItem.parent('li').position().top;
                gsap.to('.side-nav__list', {'--h': h + 'px', duration: .5});
            }
        });
    });

    //// SIDE NAV

    // SLIDERS
        // SLIDER STAT

        $('.stats-slider').flickity({
            // options
            cellAlign: 'left',
            contain: true,
            prevNextButtons: false,
            pageDots: false
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