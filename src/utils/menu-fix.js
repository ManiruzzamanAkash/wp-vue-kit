export const pluginSlug = 'wp-vue-kit';

/**
 * As we are using hash based navigation, hack fix
 * to highlight the current selected menu
 *
 * Requires jQuery
 */
export function menuFix() {
    const $ = jQuery;

    const menuRoot = $('#toplevel_page_' + pluginSlug);
    const currentUrl = window.location.href;
    const currentPath = currentUrl.substr(currentUrl.indexOf('admin.php'));

    $('ul.wp-submenu li', menuRoot).removeClass('current');

    menuRoot.on('click', 'a', function () {
        const self = $(this);

        $('ul.wp-submenu li', menuRoot).removeClass('current');

        if (self.hasClass('wp-has-submenu')) {
            $('li.wp-first-item', menuRoot).addClass('current');
        } else {
            self.parents('li').addClass('current');
        }
    });

    $('ul.wp-submenu a', menuRoot).each(function (index, el) {
        let hrefRoute = $(el).attr('href').substring($(el).attr('href').indexOf('/admin.php') + 1);

        if (hrefRoute === currentPath) {
            $(el).parent().addClass('current');
        }
    });
}

menuFix();
