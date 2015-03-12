<?php
return [
    /**
     * @var integer
     * @Default: 3
     */
    'items',
    /**
     * @var integer
     * @Default: 0
     */
    'margin',
    /**
     * @var Boolean
     * @Default: false
     * Inifnity loop . Duplicate last and first items to get loop illusion .
     */

    'loop',
    /**
     * @var Boolean
     * @Default: false
     * Center item . Works well with even an odd number of items .
     */
    'center',
    /**
     * @var Boolean
     * @Default: true
     * Mouse drag enabled .
     */
    'mouseDrag',

//Type: Boolean
//Default: true
//
//Touch drag enabled .
    'touchDrag',

//Type: Boolean
//Default: true
//
//Stage pull to edge .
    'pullDrag',
//Type: Boolean
//Default: false
//
//Item pull to edge .

    'freeDrag',


//Type: Number
//Default: 0
//
//Padding left and right on stage(can see neighbours).
    'stagePadding',

//Type: Boolean
//Default: false
//
//Merge items . Looking for data - merge = '{number}' inside item ..
    'merge',

//Type: Boolean
//Default: true
//
//Fit merged items if screen is smaller than items value .
    'mergeFit',

//Type: Boolean
//Default: false
//
//Set non grid content . Try using width style on divs .
    'autoWidth',

//Type: Number / String
//Default: 0
//
//Start position or URL Hash string like '#id' .
    'startPosition',

//Type: Boolean
//Default: false
//
//Listen to url hash changes . data - hash on items is required .
    'URLhashListener',

//Type: Boolean
//Default: false
//
//Show next / prev buttons .
    'nav',

//Type: Boolean
//Default: true
//
//Go to first / last .
    'navRewind',

//Type: Array
//Default: [&#x27;next&#x27;,&#x27;prev&#x27;]
//
//HTML allowed .
    'navText' => [
        '&#x27;пред&#x27;',
        '&#x27;след&#x27;'],

//Type: Number / String
//Default: 1
//
//Navigation slide by x . 'page' string can be set to slide by page .
    'slideBy',

//Type: Boolean
//Default: true
//
//Show dots navigation .
    'dots',

//Type: Number / Boolean
//Default: false
//
//Show dots each x item .

    'dotsEach',
//Type: Boolean
//Default: false
//
//Used by data - dot content .
    'dotData',

//Type: Boolean
//Default: false
//
//Lazy load images . data - src and data - src - retina for highres . Also load images into background inline style if element is not < img>
    'lazyLoad',

//Type: Boolean
//Default: false
//
//lazyContent was introduced during beta tests but i removed it from the final release due to bad implementation . It is a nice options so i will work on it in the nearest feature .
    'lazyContent',

//Type: Boolean
//Default: false
//
//Autoplay .
    'autoplay',

//Type: Number
//Default: 5000
//
//Autoplay interval timeout .
    'autoplayTimeout',

//Type: Boolean
//Default: false
//
//Pause on mouse hover .
    'autoplayHoverPause',

//Type: Number
//Default: 250
//
//Speed Calculate . More info to come ..
    'smartSpeed',

//Type: Boolean
//Default: Number
//
//Speed Calculate . More info to come ..
    'fluidSpeed',

//Type: Number / Boolean
//Default: false
//
//autoplay speed .
    'autoplaySpeed',

//Type: Number / Boolean
//Default: false
//
//Navigation speed .
    'navSpeed',

//Type: Boolean
//Default: Number / Boolean
//
//Pagination speed .
    'dotsSpeed',

//Type: Number / Boolean
//Default: false
//
//Drag end speed .
    'dragEndSpeed',

//Type: Boolean
//Default: true
//
//Enable callback events .
    'callbacks',

//Type: Object
//Default: empty object
//
//Object containing responsive options . Can be set to false to remove responsive capabilities .
    'responsive',

//Type: Number
//Default: 200
//
//Responsive refresh rate .

    'responsiveRefreshRate',
//Type: DOM element
//Default: window
//
//Set on any DOM element . If you care about non responsive browser(like ie8) then use it on main wrapper . This will prevent from crazy resizing .
    'responsiveBaseElement',

//Type: Boolean
//Default: false
//
//Optional helper class. Add 'owl-reponsive-' + 'breakpoint' class to main element . Can be used to stylize content on given breakpoint .
    'responsiveClass',

//Type: Boolean
//Default: false
//
//Enable fetching YouTube / Vimeo videos .

    'video',
//Type: Number / Boolean
//Default: false
//
//Set height for videos .

    'videoHeight',
//               Type: Number / Boolean
//Default: false
//
//Set width for videos .
    'videoWidth',

//              Type: String / Bolean
//Default: false
//
//CSS3 animation out .

    'animateOut',
//Type: String / Bolean
//Default: false
//
//CSS3 animation in .
    'animateIn',

//Type: String
//Default: swing
//
//Easing for CSS2 $.animate .
    'fallbackEasing',

//           Type: Function
//Default: false
//
//Callback to retrieve basic information(current item / pages / widths). Info function second parameter is Owl DOM object reference .
    'info',

//Type: String /Class
//Default: false
//
//Use it if owl items are deep nasted inside some generated content . E . g 'youritem' . Dont use dot before class name.
    'nestedItemSelector',

//Type: String
//Default: div
//
//DOM element type for owl - item .
    'itemElement',

//                     Type: String
//Default: div
//
//DOM element type for owl - stage .
    'stageElement',

//                     Type: String /Class/ID / Bolean
//Default: false
//
//Set your own container for nav .

    'navContainer',
//                           Type: String /Class/ID / Bolean
//Default: false
//
//Set your own container for nav .
    'dotsContainer',
];