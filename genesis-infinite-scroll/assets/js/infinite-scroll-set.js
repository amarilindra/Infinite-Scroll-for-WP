jQuery(document).ready(function($) {

    // if ( $('.pagination').length ) {

        $('.gd-infinite-posts').infiniteScroll({
        
            // options
            path: '.pagination-next a',
            append: '.entry',
            history: 'push',
            status: '.scroller-status',
            hideNav: '.pagination',
            scrollThreshold: 100,
            historyTitle: true,
            status: '.page-load-status',
            debug: true,
            });

    // }

    });