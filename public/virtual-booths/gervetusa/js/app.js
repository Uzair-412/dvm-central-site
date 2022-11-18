let vid = document.getElementById("myVideo"),
    stops = [16,22,28,34,41,51],    
    ptime = 0,
    ctime = 0,
    counter = 0;
    

    vid.ontimeupdate = function() {myFunction()};
    
    function myFunction()
    {
        ctime = Math.round(vid.currentTime);
        if(stops.includes(ctime) && ptime != ctime)
        {
            counter++;
            ptime = ctime;
            vid.pause();
            show_slide(ctime);
        }
    }

    function play()
    {
        $('.slide-container').addClass('hidden');
        $('.video-slides').addClass('hidden');
        vid.play();
    }
    
    function prev()
    {   
        counter = counter - 2;
        id = stops[counter];
        vid.currentTime = id;
        show_slide(id);
    }

    function show_slide(id)
    {
        if(counter == 1) 
        {
            $('#nav-prev').addClass('hidden');
        }
        else
        {
            $('#nav-prev').removeClass('hidden');
        }
        $('.slide-container').removeClass('hidden');
        $('.video-slides').addClass('hidden');
        $('#slide-'+id).removeClass('hidden');
    }

    Splitting()

    let slidesWall = document.querySelectorAll('.wall-img'),
        detailContainer = document.querySelectorAll('.slide-detail-container'),
        closeBtn = document.querySelectorAll('.wall-img .close-btn'),
        g = gsap,
        stagger = 0.003;

    ScrollTrigger.matchMedia({
        '(min-width: 1024px)': function() {
            slidesWall.forEach((wall) => {                
                g.set('.variation-text .char',{autoAlpha: 0})       

                    let wallInTl = g.timeline({
                        paused: true,
                        defaults: {
                            duration: 0.5
                        }
                    })

                    wallInTl        
                        .set(wall.querySelector('.slide-detail-container'),{autoAlpha: 1})
                        .fromTo(wall.querySelector('.slide-detail-wrapper'), {
                            xPercent: 100},{
                                xPercent: 0
                        })

                        .fromTo(wall.querySelector('.slide-detail-img-wrapper'),{
                            xPercent: 100},{
                                xPercent: 0,
                                duration: 1,
                                ease: 'power2'
                            },'<0.1')

                        .fromTo(wall.querySelector('.slide-detail-img-wrapper img'),{
                            xPercent: -100},{
                                xPercent: 0,
                                duration: 1,
                                ease: 'power2'
                            },'<')

                        .fromTo(wall.querySelectorAll('h1 .char'),{                
                            autoAlpha: 0},{
                                autoAlpha: 1,
                                stagger: 0.02
                            })

                        .fromTo(wall.querySelectorAll('.detail .char'),{                
                            autoAlpha: 0},{
                                autoAlpha: 1,
                                stagger: stagger,
                                ease: 'expo.in'
                            },'<0.4')

                        .add(function() {
                            if(wall.querySelector('.variation-text')){
                                g.fromTo(wall.querySelectorAll('.variation-text .char'),{
                                autoAlpha: 0}, {
                                    autoAlpha: 1,
                                    stagger: 0.03,
                                    ease: 'expo.in',
                                    duration: 0.5
                                })
                            }
                        }) 
                        
                         .fromTo(wall.querySelector('.slide-btn'),{
                        yPercent: 100,
                        autoAlpha: 0}, {
                            yPercent: 0,
                            autoAlpha: 1
                        })

                        .fromTo(wall.querySelector('.close-btn'), {
                            scale: 0},{
                                scale: 1,
                                ease: 'back(1)',
                                duration: 0.3
                        },'<0.3')

                        wall.querySelector('.slide-img').addEventListener('click', function(){ 
                            wallInTl.restart()
                        })

                        wall.querySelector('.close-btn').addEventListener('click', function() {
                            let wallOutTl = g.timeline()
                            wallOutTl
                            .fromTo(wall.querySelector('.slide-detail-wrapper'),{
                                xPercent: 0},{
                                xPercent: 100,
                                duration: 0.3,
                                ease: 'expo.in'
                            })

                            .add(function() {
                                if(wall.querySelector('.variation-text')){
                                    g.set(wall.querySelectorAll('.variation-text .char'),{
                                        autoAlpha: 0
                                    })
                                }
                            })

                            .set(wall.querySelector('.slide-detail-container'),{autoAlpha: 0})

                        })
                    })
                },

                '(max-width: 1023px)': function() {
                    g.fromTo('#alert h3 .char', {
                        autoAlpha: 0},{
                            autoAlpha: 1,
                            stagger: 0.025,
                            ease: 'expo.in',
                            duration: 0.5
                    })
                }
            })

            //navigation hamburger menu
            let hbMenu = document.querySelector('.hamburger-menu'),
                hbLines = document.querySelectorAll('.hb-lines'),   
                 navItemsContainer = document.querySelector('.nav-items-container'),             
                navItem = document.querySelectorAll('.nav-item-link h3'),
                menuOpen = false

           

            let navOpenTl = g.timeline({
                    paused: true
                })
                
                    navOpenTl
                        .to('.first', {
                            rotate: '-27deg',
                            duration: 0.3
                        })
                        .to('.second', {
                            xPercent: 5,
                            duration: 0.3
                        },'<')
                        .to('.last', {
                            rotate: '27deg',
                            duration: 0.3
                        },'<')
                        .to(hbLines,{
                            xPercent: -5,
                            duration: 0.3
                        },'<')
                        .to(navItemsContainer,{
                            xPercent: 0,
                            ease: 'expo.out',
                            duration: 0.75
                        })
                        .set(hbMenu,{
                            backgroundColor: '#fff',
                        },'<')
                        .set(hbLines, {
                            backgroundColor: '#000'
                        },'<')
                        .fromTo(navItem, {
                            yPercent: 100,
                            autoAlpha: 0}, {
                                yPercent: 0,
                                autoAlpha: 1,
                                stagger: 0.075
                        },'<0.8')

            hbMenu.addEventListener('click', function(e) {
                e.preventDefault()

                    if(menuOpen === false) {
                        menuOpen = true;
                        navOpenTl.timeScale(1).restart()
                    } else if(menuOpen === true){
                        menuOpen = false;
                        navOpenTl.timeScale(2).reverse()
                    }
            })



        // nav-items-container elements        

        let  navItems = document.querySelectorAll('.nav-items'),
            navDetailContainer = document.querySelectorAll('.nav-detail-container')            

        //navigation, products and downloads section
        let navProd = document.querySelectorAll('.nav-navigation, .products, .downloads')

            navProd.forEach(function(item){
                let navProdTl = g.timeline({
                    paused: true,
                    defaults: {
                        ease: 'expo.out',
                        duration: 0.7
                    }
                })

                navProdTl

                .fromTo(hbMenu, {
                    scale: 1}, {
                        scale: 0,
                        duration: 0.3,
                        immediateRender: false
                })
                .set(item.querySelector('.nav-detail-container'),{
                    autoAlpha: 1
                },'<')
                .fromTo(item.querySelector('.nav-detail-left-overlay'),{
                    yPercent: -100}, {
                        yPercent:0
                },'<')
                .fromTo(item.querySelector('.nav-detail-right'),{
                    yPercent: 100}, {
                        yPercent:0
                },'<')
                .fromTo(item.querySelector('.nav-detail-wrapper h3'),{
                    yPercent: 100,
                autoAlpha: 0},{
                        yPercent: 0,
                        autoAlpha: 1
                },'<0.4')
                .fromTo(item.querySelectorAll('.nav-img-container'),{
                    scale: 0.5,
                    autoAlpha: 0}, {
                        scale: 1,
                        autoAlpha: 1,
                        stagger: 0.075
                },'<0.25')
                .fromTo(item.querySelector('.close-btn'),{
                    scale: 0}, {
                        scale: 1,
                        ease: 'back(1)'
                    },'<0.5')

                item.querySelector('.nav-item-link').addEventListener('click', function(){
                navProdTl.timeScale(1).restart()
                
                item.querySelector('.close-btn').addEventListener('click', function(){
                    navProdTl.timeScale(2).reverse()
                })
            })
        })

        // visit site link
            let visitLink = document.querySelector('.visit-site .nav-item-link');
                 let visitTl = g.timeline({
                        paused: true,
                        defaults: {
                        ease: 'expo.out',
                        duration: 0.7
                    }
                    })

                        visitTl
                        .fromTo(hbMenu, {
                            scale: 1}, {
                                scale: 0,
                                duration: 0.3,
                                immediateRender: false
                        })
                            .set('.visit-site .nav-detail-container',{
                                autoAlpha: 1
                            },'<')
                            .fromTo('.visit-site .nav-detail-left-overlay',{
                                yPercent: -100}, {
                                    yPercent:0
                            },'<')
                            .fromTo('.visit-site .nav-detail-right',{
                                yPercent: 100}, {
                                    yPercent:0
                            },'<')
                            .fromTo('.visit-site .visit-img-wrapper',{
                                xPercent: -100},{
                                    xPercent: 0,
                                    ease:'power2'
                            })

                            .fromTo('.visit-site .visit-img-wrapper img',{
                                    xPercent: 100},{
                                        xPercent: 0,
                                        ease:'power2'
                            },'<')
                            .fromTo('.visit-site h3 .char',{
                                autoAlpha: 0},{
                                    autoAlpha: 1,
                                    stagger: 0.05,
                                    ease: 'expo.in'
                            },'<0.4')
                            .fromTo('.visit-site p .char',{
                                autoAlpha: 0},{
                                    autoAlpha: 1,
                                    stagger: stagger,
                                    ease: 'expo.in'
                            },'<0.4')
                            .fromTo('.visit-site .slide-btn',{
                                autoAlpha: 0,
                                yPercent: 100}, {
                                    autoAlpha: 1,
                                    yPercent: 0
                            })

                visitLink.addEventListener('click', function() {
                   visitTl.timeScale(1).restart()
                })

                 document.querySelector('.visit-site .close-btn').addEventListener('click', function() {
                   visitTl.timeScale(3).reverse()
                })

                // social and contact navigation

                let socialContact = document.querySelectorAll('.social-media-accounts, .contact');

                    socialContact.forEach(function(item) {
                        let socontTl = g.timeline({
                            paused: true,
                            defaults: {
                                ease: 'expo.out',
                                duration: 0.7
                            }
                        })

                            socontTl
                                .fromTo(hbMenu, {
                                    scale: 1}, {
                                        scale: 0,
                                        duration: 0.3,
                                        immediateRender: false
                                })
                                .set(item.querySelector('.nav-detail-container'),{
                                    autoAlpha: 1
                                },'<')
                                .fromTo(item.querySelector('.nav-detail-left-overlay'),{
                                    yPercent: -100}, {
                                        yPercent:0
                                },'<')
                                .fromTo(item.querySelector('.nav-detail-right'),{
                                    yPercent: 100}, {
                                        yPercent:0
                                },'<')
                                 .fromTo(item.querySelector('.nav-detail-wrapper h3'),{
                                    yPercent: 100,
                                    autoAlpha: 0},{
                                        yPercent: 0,
                                        autoAlpha: 1
                                },'<0.4')
                                .fromTo(item.querySelectorAll('.nav-detail-wrapper div div'),{
                                    yPercent: 100,
                                    autoAlpha: 0},{
                                        yPercent: 0,
                                        autoAlpha: 1,
                                        stagger: 0.1,
                                        ease: 'power1'
                                },'<0.1')
                                .fromTo(item.querySelector('.close-btn'),{
                                    scale: 0}, {
                                        scale: 1,
                                        ease: 'back(1)'
                                    },'<0.5')
                                   
                            item.querySelector('.nav-item-link').addEventListener('click', function(){
                                socontTl.timeScale(1).restart()
                                
                            item.querySelector('.close-btn').addEventListener('click', function(){
                                socontTl.timeScale(2).reverse()
                            })                            
                            
                            })
                        })

                        window.addEventListener('load', function() {
                            let loadTl = g.timeline()
                                loadTl
                                .set(detailContainer,{autoAlpha: 0})
                                .set(navItemsContainer, {
                                    xPercent: -100
                                })
                                .set(navDetailContainer,{
                                    autoAlpha: 0,
                                    onComplete: function() {
                                        g.set('body',{
                                            autoAlpha: 1
                                        })
                                    }})
                            })

            
    // vid.addEventListener('ended',myHandler,false);
    // function myHandler(e) {$('.slide-container').removeClass('hidden')}