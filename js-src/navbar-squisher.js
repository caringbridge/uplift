$(function(){

    'use strict';

    var NavbarSquisher = function() {

        /**
         * Module-level scope
         */
        var module = this;

        /**
         * @param  jQuery Object  .navbar-nav we want to squish
         */
        var $nav;

        /**
         * @param  jQuery Object  All of the children inside of .navbar-nav
         */
        var $navChildren;

        /**
         * @param  jQuery Object  Squishable children inside of .navbar-nav (sorted by expendability)
         */
        var $expendableNavChildren;

        /**
         * @param  jQuery Object  "Spill-over" dropdown to place expendable elements into
         */
        var $dropdown;

        /**
         * @param  jQuery Object  .collapse.navbar-collapse container
         */
        var $navbarCollapse;

        /**
         * @param  jQuery Object  .navbar-header before .collapse.navbar-collapse
         */
        var $navbarHeader;

        /**
         * Sorting callback to order items by expendability
         * @param  a  element  an HTML element with expendability data
         * @param  b  element  an HTML element with expendability data
         * @return    int      -1 if a < b, 0 if equal, 1 if a > b
         */
        this.sortByExpendability = function(a, b) {
            var $a = $(a);
            var $b = $(b);
            if ($a.data('expendability') < $b.data('expendability')) {
                return -1;
            }
            else if ($a.data('expendability') > $b.data('expendability')) {
                return 1;
            }
            return 0;
        };

        /**
         * Set up
         * @param  $nav  jQuery Object  navbar to apply squishing to
         */
        this.initialize = function($nav) {
            module.$nav = $nav;
            module.$navChildren = module.$nav.children();

            module.$expendableNavChildren = module.$navChildren.filter('[data-expendability]');

            module.$dropdown = $(module.$nav.data('navbarSquish'));

            // Clone each item in the "More" dropdown and store a reference to it
            var $dropdownMenu = module.$dropdown.find('ul.dropdown-menu');
            module.$expendableNavChildren.each(function() {
                var $clone = $(this).clone().addClass('hidden');
                $clone.appendTo($dropdownMenu);
                $(this).data('clone', $clone);
            });

            // Sort jQuery collection of expendable children by expendability weight
            module.$expendableNavChildren.sort(module.sortByExpendability);

            module.$navbarCollapse = module.$nav.parents('.collapse.navbar-collapse');
            module.$navbarHeader = module.$navbarCollapse.prev('.navbar-header');

            // If any of these are zero, no link squishing can happen, so bail out early
            if (!module.$nav.size() ||
                !module.$navChildren.size() ||
                !module.$expendableNavChildren.size() ||
                !module.$dropdown.size() ||
                !module.$navbarCollapse.size() ||
                !module.$navbarHeader.size()) {
                return;
            }

            if (typeof $.throttle !== 'undefined') {
                $(window).on('resize.navbar-squisher', $.throttle(250, function() {
                    module.refitLinks();
                }));
            }

            module.refitLinks();

        };

        /**
         * Show all the links, hide the more dropdown
         */
        this.reset = function() {
            module.$expendableNavChildren.removeClass('hidden');
            module.$dropdown.addClass('hidden');
        };

        /**
         * Figure out the width available to the navbar items (total navbar width minus 115% the header width)
         */
        this.maxNavbarWidth = function() {
            return module.$navbarCollapse.innerWidth() - module.$navbarHeader.outerWidth() * 1.15;
        };

        /**
         * Figure out if navbar is collapsed (for small screen)
         */
        this.navbarIsCollapsed = function() {
            if (module.$navbarHeader.find('.navbar-toggle:visible').size()) {
                return true;
            }
            return false;
        };


        /**
         * If child elements take up too much space, pluck the expendable children one-by-one and put them into a spillover dropdown until they fit
         */
        this.refitLinks = function() {
            // If we just caused the navbar to be vertical, stop everything and reset it to normal
            if (module.navbarIsCollapsed()) {
                module.reset();
                return;
            }

            // If we have room, see if we can show any hidden children
            while (module.$expendableNavChildren.filter('.hidden').size() && module.thereIsRoom()) {
                var $candidate = module.$expendableNavChildren.filter('.hidden').first();
                // If adding this child's width is still under the limit, do it
                if (module.thereWouldBeRoomFor($candidate)) {
                    $candidate.removeClass('hidden');
                    module.updateMoreDropdown();
                }
                // Otherwise we're done trying to add children
                else {
                    break;
                }
            }

            // Try to reduce the visible children if we're over the limit
            while (module.$expendableNavChildren.not('.hidden').size() && !module.thereIsRoom()) {
                module.$expendableNavChildren.not('.hidden').last().addClass('hidden');
                module.updateMoreDropdown();
            }

            // Make sure we're in a sane navbar link / more menu link state one last time
            module.updateMoreDropdown();

        };

        /**
         * Show/hide links inside the more dropdown, and show/hide the dropdown itself as needed
         */
        this.updateMoreDropdown = function() {
            module.$expendableNavChildren.each(function() {
                if ($(this).is('.hidden')) {
                    $(this).data('clone').removeClass('hidden');
                }
                else {
                    $(this).data('clone').addClass('hidden');
                }
            });

            // Toggle the visibility of the more menu based on whether or not there are any non-hidden links in there
            if (module.$dropdown.find('ul li').not('.hidden').size()) {
                module.$dropdown.removeClass('hidden');
            } else {
                module.$dropdown.addClass('hidden');
            }

        };

        /**
         * Find out if the current visible links in the navbar fit or not
         *
         * @return  boolean  TRUE if the sum of the widths of the visible elements is less than our threshhold, FALSE otherwise
         */
        this.thereIsRoom = function() {
            return (module.widthOf(module.$navChildren.not('.hidden')) <= module.maxNavbarWidth());
        };

        /**
         * Find out if adding the given element would still let the links fit in the navbar or not
         * Note: If the candidate link is the only one still hidden, when we compute the potential width sum,
         *       we remove the width of the "More" dropdown, since that would be hidden if the candidate were made visible
         *
         * @param  jQuery object  $candidate  a link element that we want to try to unhide if there's room
         * @return  boolean  TRUE if the sum of the widths of the visible elements is less than our threshhold, FALSE otherwise
         */
        this.thereWouldBeRoomFor = function($candidate) {
            // If there is only one hidden child link, don't include More link in width sum, since it wouldn't show up
            if (module.$navChildren.not(module.$dropdown).filter('.hidden').size()) {
                return (module.widthOf(module.$navChildren.not('.hidden').not(module.$dropdown).add($candidate)) <= module.maxNavbarWidth());
            }
            // Otherwise include the visible children plus the more link
            else {
                return (module.widthOf(module.$navChildren.not('.hidden').add($candidate).add(module.$dropdown)) <= module.maxNavbarWidth());
            }
        };

        /**
         * Find the total width of the given element set
         *
         * @param  jQuery object  $elements  collection of elements, of which we want to find the sum width
         * @return int|float  CSS px length of elements
         */
        this.widthOf = function($elements) {
            var result = 0;
            if ($elements.size()) {
                $elements.each(function() {
                    result += $(this).outerWidth();
                });
            }
            return result;
        };

    };

    // Qualifier
    var $squishableNavbars = $('.navbar [data-navbar-squish]');
    if ($squishableNavbars.size()) {
        // Just in case there's more than one on the page... loop over them and do a separate NavbarSquisher for each
        $squishableNavbars.each(function() {
            (new NavbarSquisher()).initialize($(this));
        });
    }
});
