(function ($) {
    $(document).ready(function () {
        if (typeof customBannerData !== 'undefined') {
            var bannerImageUrl = customBannerData.bannerImageUrl;
            if (bannerImageUrl) {
                var css = '<style>#category_banner { background-image: url("' + bannerImageUrl + '"); }</style>';
                $('head').append(css);
            }
        }
    });
})(jQuery);