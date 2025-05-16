(function($) {
    'use strict';

    // Mobile Menu Toggle
    const mobileMenuToggle = () => {
        const $toggle = $('.mobile-menu-toggle');
        const $mobileMenu = $('.mobile-menu');
        const $body = $('body');

        $toggle.on('click', function() {
            const isExpanded = $(this).attr('aria-expanded') === 'true';
            $(this).attr('aria-expanded', !isExpanded);
            $mobileMenu.toggleClass('is-active');
            $body.toggleClass('menu-is-open');
        });

        // Close menu when clicking outside
        $(document).on('click', function(event) {
            if (!$(event.target).closest('.mobile-menu, .mobile-menu-toggle').length) {
                $toggle.attr('aria-expanded', 'false');
                $mobileMenu.removeClass('is-active');
                $body.removeClass('menu-is-open');
            }
        });
    };

    // Sticky Header
    const stickyHeader = () => {
        const $header = $('.site-header');
        const headerHeight = $header.outerHeight();
        let lastScroll = 0;

        $(window).on('scroll', function() {
            const currentScroll = $(this).scrollTop();

            // Add sticky class when scrolling down
            if (currentScroll > headerHeight) {
                $header.addClass('is-sticky');
            } else {
                $header.removeClass('is-sticky');
            }

            // Hide/show header based on scroll direction
            if (currentScroll > lastScroll && currentScroll > headerHeight) {
                $header.addClass('is-hidden');
            } else {
                $header.removeClass('is-hidden');
            }

            lastScroll = currentScroll;
        });
    };

    // Insights Filter
    const insightsFilter = () => {
        const $filterButtons = $('.filter-menu a');
        const $insightsGrid = $('.insights-grid');
        const $insights = $('.insight-card');

        $filterButtons.on('click', function(e) {
            e.preventDefault();
            const category = $(this).data('category');

            // Update active state
            $filterButtons.parent().removeClass('active');
            $(this).parent().addClass('active');

            // Filter insights
            if (category === 'all') {
                $insights.show();
            } else {
                $insights.each(function() {
                    const $insight = $(this);
                    const insightCategories = $insight.data('categories').split(',');
                    if (insightCategories.includes(category)) {
                        $insight.show();
                    } else {
                        $insight.hide();
                    }
                });
            }

            // Trigger layout adjustment
            $insightsGrid.trigger('layout-update');
        });
    };

    // Statistics Counter Animation
    const statsCounter = () => {
        const $stats = $('.stat-number');
        
        const startCounter = ($element) => {
            const value = $element.text();
            const prefix = value.startsWith('$') ? '$' : '';
            const suffix = value.endsWith('B') ? 'B' : (value.endsWith('%') ? '%' : '');
            const number = parseFloat(value.replace(/[^0-9.]/g, ''));
            
            $({ counter: 0 }).animate({
                counter: number
            }, {
                duration: 2000,
                easing: 'swing',
                step: function() {
                    $element.text(prefix + this.counter.toFixed(2) + suffix);
                },
                complete: function() {
                    $element.text(value); // Ensure final value is exact
                }
            });
        };

        // Start animation when element comes into view
        const observerCallback = (entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
                    startCounter($(entry.target));
                    entry.target.classList.add('counted');
                }
            });
        };

        const observer = new IntersectionObserver(observerCallback, {
            threshold: 0.5
        });

        $stats.each(function() {
            observer.observe(this);
        });
    };

    // Smooth Scroll
    const smoothScroll = () => {
        $('a[href*="#"]').not('[href="#"]').not('[href="#0"]').click(function(event) {
            if (
                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
                && 
                location.hostname == this.hostname
            ) {
                let target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                
                if (target.length) {
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top - 100
                    }, 1000);
                }
            }
        });
    };

    // Initialize all functions when DOM is ready
    $(document).ready(function() {
        mobileMenuToggle();
        stickyHeader();
        insightsFilter();
        statsCounter();
        smoothScroll();
    });

})(jQuery);
