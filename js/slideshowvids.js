$slideshowvids = {
	context: false,
	tabs: false,
	timeout: 0,      // time before next slide appears (in ms)
	slideSpeed: 0,   // time it takes to slide in each slide (in ms)
	tabSpeed: 0,      // time it takes to slide in each slide (in ms) when clicking through tabs
	fx: 'fade',   // the slide effect to use
    
    init: function() {
        // set the context to help speed up selectors/improve performance
        this.context = $('#slideshowvids');
        
        // set tabs to current hard coded navigation items
        this.tabs = $('ul.slides-nav li', this.context);
        
        // remove hard coded navigation items from DOM 
        // because they aren't hooked up to jQuery cycle
        this.tabs.remove();
        
        // prepare slideshowvids and jQuery cycle tabs
        this.prepareslideshowvids();
    },
    
    prepareslideshowvids: function() {
        // initialise the jquery cycle plugin -
        // for information on the options set below go to: 
        // http://malsup.com/jquery/cycle/options.html
        $('div.slides > ul', $slideshowvids.context).cycle({
            fx: $slideshowvids.fx,
            timeout: $slideshowvids.timeout,
            speed: $slideshowvids.slideSpeed,
            fastOnEvent: $slideshowvids.tabSpeed,
            pager: $('ul.slides-nav', $slideshowvids.context),
            pagerAnchorBuilder: $slideshowvids.prepareTabs,
            before: $slideshowvids.activateTab,
            pauseOnPagerHover: true,
            pause: true
        });            
    },
    
    prepareTabs: function(i, slide) {
        // return markup from hardcoded tabs for use as jQuery cycle tabs
        // (attaches necessary jQuery cycle events to tabs)
        return $slideshowvids.tabs.eq(i);
    },

    activateTab: function(currentSlide, nextSlide) {
        // get the active tab
        var activeTab = $('a[href="#' + nextSlide.id + '"]', $slideshowvids.context);
        
        // if there is an active tab
        if(activeTab.length) {
            // remove active styling from all other tabs
            $slideshowvids.tabs.removeClass('on');
            
            // add active styling to active button
            activeTab.parent().addClass('on');
        }            
    }            
};


$(function() {
    // add a 'js' class to the body
    $('body').addClass('js');
    
    // initialise the slideshowvids when the DOM is ready
    $slideshowvids.init();
});  