// countdown-download.js
jQuery(function ($) {
    $('#countdown-download-button').click(function () {
        var $button = $(this);
        var link = $button.data('link');
        var countdown = countdown_download.countdown;

        $button.attr('disabled', true);
        var intervalId = setInterval(function () {
            countdown--;
            $button.text(countdown);
            if (countdown === 0) {
                clearInterval(intervalId);
                window.location = link;
            }
        }, 1000);
    });
});


