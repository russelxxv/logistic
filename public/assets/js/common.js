(function ($) {
    "use strict";

    app.data = {
        csrf: $('meta[name="csrf-token"]').attr("content"),
        appUrl: $('meta[name="app-url"]').attr("content"),
        // fileBaseUrl: $('meta[name="file-base-url"]').attr("content"),
    };

})(jQuery);