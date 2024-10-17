import { domReady } from '@roots/sage/client';
import $ from 'jquery';
import 'bootstrap';

const main = async (err) => {
    if (err) {
        console.error(err);
    }

    // Use jQuery's $(document).ready() function to ensure DOM is fully loaded
    $(document).ready(function () {

        jQuery('#loginLinkButton, .login-panel-link a').on('click', function (e) {
            $('#mobileNavToggleBtn').addClass('collapsed');
        });

        // Mega Menu Desktop - mega col
        $('#mimeoMegaDropdown .mega-col > a').on('click', function (e) {
            $('ul.sub-menu.depth_2').hide();
            $('.mega-column-wrapper_2 > li:first-child').addClass('active-menu-link');
            $('.mega-col').removeClass('active-menu-link');
            $('li.mega-tab a').removeClass('active-menu-link');
            $(this).addClass('active-menu-link');
            $(this).next().fadeIn();
            $('li.mega-column_2>ul>li.menu-item:first-child > ul').fadeIn();
            e.preventDefault();
        });

        // Mega Menu Desktop - mega col sub
        $('#mimeoMegaDropdown .mega-col-sub > a').on('click', function (e) {
            $('.mega-col-sub').removeClass('active-menu-link');
            $('.mega-col-sub > a').removeClass('active-menu-link');
            $('ul.sub-menu.depth_3').hide();
            $(this).addClass('active-menu-link');
            $(this).next().fadeIn();
            e.preventDefault();
        });

        // Mobile menu - prevent clicks
        $('#offcanvasmenu .dropdown-menu .mega-col > a.dropdown-item').on(
            'click',
            function (e) {
                e.preventDefault();
                e.stopPropagation();
            },
        );

        // Mobile menu - mega col
        $('#offcanvasmenu .mega-col > a').on('click', function (e) {
            $('.grandchild-menu').hide();
            $(this).next().slideToggle();
            e.preventDefault();
        });

        // MOBILE MENU 
        // Handler for link-depth-0 clicks
        $(document).on('click', '.link-depth-0', function (event) {
            // Remove the CSS class "open-default" from the parent
            $('.link-depth-0-active').removeClass('link-depth-0-active');
            $(this).parent().removeClass('open-default');
            // Toggle the CSS class
            $(this).toggleClass('link-depth-0-active');
            // Check if the next item has the class "dropdown-menu"
            if ($(this).next().hasClass('dropdown-menu')) {
                event.preventDefault(); // Prevent default action
            }
            // Collapse all other dropdown menus
            $('.dropdown-menu').not($(this).next('.dropdown-menu')).slideUp();
            // Toggle the view of the dropdown menu
            var dropdownMenu = $(this).next('.dropdown-menu');
            if (dropdownMenu.length) {
                dropdownMenu.slideToggle();
            }
        });

        // Handler for link-depth-1 clicks
        $(document).on('click', '.link-depth-1.dropdown-item', function (event) {
            // Prevent the default behavior of the link

            // Check if the clicked item contains the class 'regular-link'
            if (!$(this).parent().hasClass('regular-link')) {
                // If it doesn't contain the class, prevent the default behavior of the link
                event.preventDefault();
            }

            $('.link-depth-1-active').removeClass('link-depth-1-active');
            $(this).toggleClass('link-depth-1-active');

            $('.submenu-depth-2').not($(this).next('.submenu-depth-2')).slideUp();

            var dropdownMenu = $(this).next('.dropdown-menu');
            if (dropdownMenu.length) {
                dropdownMenu.slideToggle();
            }
        });
        // END: MOBILE MENU 

        // Desktop Dropdown Menus Overlay on Main
        if (window.innerWidth > 1200) {
            const mainElement = document.getElementById("main");
            document.querySelectorAll('.navbar .dropdown').forEach(function (dropdown) {
                dropdown.addEventListener('shown.bs.dropdown', function () {
                    const overlay = document.createElement('span');
                    overlay.className = 'screen-darken';
                    mainElement.appendChild(overlay);
                });
                dropdown.addEventListener('hide.bs.dropdown', function () {
                    const overlay = document.querySelector('.screen-darken');
                    if (overlay) {
                        overlay.parentNode.removeChild(overlay);
                    }
                });
            });
        }
    }); // $(document).ready()

};

// Initialize on DOM ready
domReady(main);
